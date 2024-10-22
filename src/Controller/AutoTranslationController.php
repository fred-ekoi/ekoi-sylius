<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\Translation\AutoTranslationBodyDTO;
use App\Repository\Translation\TranslationOverrideDictionaryRepository;
use OpenAI\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class AutoTranslationController extends AbstractController
{
    private TranslationOverrideDictionaryRepository $repository;

    public function __construct(TranslationOverrideDictionaryRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route('/admin/auto-translation', methods: ['POST'])]
    public function index(
        #[MapRequestPayload] AutoTranslationBodyDTO $data,
        Client $openAI): Response
    {
        // Validate the request body
        $defaultLocale = $data->getData()[0]['locale'];
        $targetLocales = $data->getTargetLocales();
        if (!isset($defaultLocale) || !isset($targetLocales)) {
            return $this->json([
                'error' => 'Invalid request body'
            ], Response::HTTP_BAD_REQUEST);
        }

        // Fetch the relevant overrides
        $overrides = $this->repository->findRelevant($defaultLocale, $targetLocales);
        $requestStr = "";
        // Prepare the request string with the overrides
        foreach ($overrides as $override) {
            $keyText = $override->getKeyText();
            $keyLocale = $override->getKeyLocale()->getCode();
            $valueText = $override->getValueText();
            $valueLocale = $override->getValueLocale()->getCode();
            $requestStr .= <<<EOT
            "$keyText" ($keyLocale) => "$valueText" ($valueLocale)

            EOT;
        }
        $encodedData = json_encode($data->getData());
        $encodedTargetLocales = json_encode($targetLocales);
        // Append the data and targetLocales to the request string
        $requestStr .= <<<EOT

        {"data": $encodedData,"targetLocales": $encodedTargetLocales}
        EOT;

        // Define the instructions for the OpenAI model
        $instructions = <<<EOT
        You will receive two inputs and return a JSON output with translations in a specific format.
        The first input is a list of key/value pairs with their corresponding locales, structured like this: "key" (locale) => "value" (locale)
        You must respect the specific requirements of this list during translation, ensuring the key is used in the correct locale, and that the value is translated according to its locale. Only adapt the translation when it aligns with the locale of the value. You can ignore case for this input.
        The second input will look like this:
        {"data": [{"locale": "fr_FR","name": "name","value": "Combinaison vélo"},{"locale": "fr_FR","name": "slug","value": "combinaison-velo"}],"targetLocales": ["en", "es"]}
        The data array contains objects with three properties:
        * locale: The locale of the text
        * name: The field name of the input, which needs to be taken into account. For instance, a "slug" should follow the proper format (no accents, spaces, etc.)
        * value: The text to be translated
        The targetLocales array specifies the locales into which you need to translate the data.
        Your output should be a JSON array structured as follows:
        {"data": [{"locale": "en","localeData": [{"name": "name","value": "Bike suit"},{"name": "slug","value": "bike-suit"}]},{"locale": "es","localeData": [{"name": "name","value": "Traje de ciclismo"},{"name": "slug","value": "traje-de-ciclismo"}]}]}
        Ensure you respect the list of key/value pairs for overriding translations in specific locales. And respect absolutely the output format.
        EOT;

        // Call the OpenAI model
        $openAIResponse = $openAI->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $instructions
                ],
                [
                    'role' => 'user',
                    'content' => $requestStr
                ]
            ],
        ]);
        // TODO: Handle possible errors
        $resultStr = $openAIResponse->choices[0]->message->content;
        $resultJson = json_decode($resultStr, true);
        return $this->json($resultJson);
    }
}
