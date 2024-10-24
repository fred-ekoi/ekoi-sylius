<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product\Product;
use App\Entity\Product\ProductDescriptionTemplateBlock;
use App\Entity\Product\ProductTranslation;
use App\Enum\BlockAlign;
use App\Enum\BlockType;
use App\Form\Type\ProductDescriptionBlockContentType;
use App\Repository\Product\ProductDescriptionBlockContentRepository;
use App\Repository\Product\ProductDescriptionTemplateBlockRepository;
use App\Repository\Product\ProductDescriptionTemplateRepository;
use App\Service\ProductService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormView;

class AdminProductTemplateController extends AbstractController
{
    public function __construct()
    {
    }

    #[Route('/admin/product-template/prototype/render', name: 'admin_product_template_prototype_render', methods: ['POST'])]
    public function renderPrototype(Request $request): JsonResponse
    {
        $baseSlug = $request->request->get('base_slug');
        $baseId = $request->request->get('base_id');

        $formHtml = $this->renderView('productTemplate/partials/_children_prototype.html.twig', [
            'types' => BlockType::getAvailableTypes(),
            'alignments' => BlockAlign::getAvailableAlignments(),
        ]);

        return new JsonResponse(['success' => true, 'form' => $formHtml, 'types' => BlockType::getAvailableTypes()]);
    }
}
