<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\Translation\AutoTranslationBodyDTO;
use App\Entity\Translation\TranslationOverrideDictionary;
use Doctrine\ORM\EntityManagerInterface;
use OpenAI\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class AutoTranslationController extends AbstractController
{
    #[Route('/admin/auto-translation', methods: ['POST'])]
    public function index(
        #[MapRequestPayload] AutoTranslationBodyDTO $data,
        Client $openAI,
        EntityManagerInterface $entityManager
    ): Response
    {
        $systemInstructions = <<<INSTRUCTIONS
        You will receive two inputs and return a JSON output with translations in a specific format.
        The first input is a list of key/value pairs with their corresponding locales, structured like this:
        "key"(locale) => "value"(locale)
        You must respect the specific requirements of this list during translation, ensuring the key is used in the correct locale, and that the value is translated according to its locale. Only adapt the translation when it aligns with the locale of the value.
        The second input will look like this:
        {"data": [{"locale": "fr_FR","name": "name","value": "Salut"},{"locale": "fr_FR","name": "slug","value": "salut"}],"targetLocales": ["en", "es"]}
        The data array contains objects with three properties:
        * locale: The locale of the text
        * name: The field name of the input, which needs to be taken into account. For instance, a "slug" should follow the proper format (no accents, spaces, etc.)
        * value: The text to be translated
        The targetLocales array specifies the locales into which you need to translate the data.
        Your output should be a JSON array structured as follows:
        {"data": [{"locale": "en","localeData": [{"name": "name","value": "Hi"},{"name": "slug","value": "hi"}]},{"locale": "es","localeData": [{"name": "name","value": "Hola"},{"name": "slug","value": "hola"}]}]}
        Ensure you respect the list of key/value pairs for overriding translations in specific locales. And respect absolutely the output format.
        INSTRUCTIONS;

        $responseStr = <<<RESPONSE
        {
          "data": [
            {
              "locale": "en",
              "localeData": [
                {
                  "name": "name",
                  "value": "Total jumpsuit"
                },
                {
                  "name": "slug",
                  "value": "total-jumpsuit"
                },
                {
                  "name": "description",
                  "value": "It's a great jumpsuit. It keeps you warm in the winter and ventilates well in the summer. A jewel of technology!"
                },
                {
                  "name": "shortDescription",
                  "value": "Top-notch jumpsuit."
                }
              ]
            },
            {
              "locale": "fr",
              "localeData": [
                {
                  "name": "name",
                  "value": "Combinaison totale"
                },
                {
                  "name": "slug",
                  "value": "combinaise-totale"
                },
                {
                  "name": "description",
                  "value": "C'est une super combinaison. Elle tient chaud l'hiver et ventile bien l'été. Un bijou de technologie !"
                },
                {
                  "name": "shortDescription",
                  "value": "Combinaison au top."
                }
              ]
            }
          ]
        }
        RESPONSE;
        $response = json_decode($responseStr, true);
        return $this->json($response);
    }
}
