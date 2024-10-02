<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AutoTranslationController extends AbstractController
{
    #[Route('/admin/auto-translation', methods: ['POST'])]
    public function index(Request $request): Response
    {
        $data = $request->request->all();
        return $this->json(['message' => 'Hello world']);
    }
}
