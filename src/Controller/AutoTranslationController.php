<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\Translation\AutoTranslationBodyDTO;
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
        Client $openAI
    ): Response
    {
        try {
            $result = $openAI->completions()->create([
                'prompt' => "Hello !",
                'model' => 'gpt-4o-mini-2024-07-18'
            ]);
            return $this->json($result);
        } catch (\OpenAI\Exceptions\ErrorException $e) {
            return $this->json(['error' => $e->getErrorMessage()], 500);
        }
    }
}
