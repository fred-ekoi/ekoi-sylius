<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product\Product;
use App\Entity\Product\ProductDescriptionTemplateBlock;
use App\Entity\Product\ProductTranslation;
use App\Enum\BlockType;
use App\Form\Type\ProductDescriptionBlockContentType;
use App\Repository\Product\ProductDescriptionBlockContentRepository;
use App\Repository\Product\ProductDescriptionTemplateBlockRepository;
use App\Repository\Product\ProductDescriptionTemplateRepository;
use App\Service\ProductService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormView;

class AdminProductController extends AbstractController
{
    private $entityManager;
    private $productService;
    private $productDescriptionTemplateRepository;
    private $productDescriptionTemplateBlockRepository;

    // Inject EntityManagerInterface via constructor
    public function __construct(EntityManagerInterface $entityManager, ProductService $productService, ProductDescriptionTemplateRepository $productDescriptionTemplateRepository, ProductDescriptionTemplateBlockRepository $productDescriptionTemplateBlockRepository)
    {
        $this->entityManager = $entityManager;
        $this->productService = $productService;
        $this->productDescriptionTemplateRepository = $productDescriptionTemplateRepository;
        $this->productDescriptionTemplateBlockRepository = $productDescriptionTemplateBlockRepository;
    }

    #[Route('/admin/product-description-form/{id}/render', name: 'admin_product_description_form_show', methods: ['POST'])]
    public function show(Request $request, Product $product): JsonResponse
    {
        $formHtml = null;
        // Get the template ID from the AJAX request
        $templateId = $request->request->get('template_id');
        $locale = $request->request->get('locale');

        // Fetch the selected template
        $template = $this->productDescriptionTemplateRepository->find($templateId);

        $productTranslation = $product->getTranslation($locale);

        if($productTranslation->getLocale() != $locale) {
            $newProductTranslation = new ProductTranslation();
            $newProductTranslation->setLocale($locale);
            $newProductTranslation->setName($productTranslation->getName());
            $newProductTranslation->setSlug($productTranslation->getSlug());
            $newProductTranslation->setTranslatable($product);
            $productTranslation = $newProductTranslation;
        }

        foreach ($productTranslation->getProductDescriptionBlockContents() as $productDescriptionBlockContent) {
            $productDescriptionBlockContent->setProductDescriptionTemplateBlock(null);
            $this->entityManager->persist($productTranslation);
            $this->entityManager->flush();
        }


        $blocks = [];
        if ($template) {
            $templateBlocks = $this->productDescriptionTemplateBlockRepository->findBy(['template' => $template->getId()], ['sortOrder' => 'ASC']);
            foreach ($templateBlocks as $templateBlock) {
                if ($templateBlock->getType() !== BlockType::LAYOUT) {
                    $blocks[$templateBlock->getSortOrder()] = $this->createProductDescriptionBlockContentForm($templateBlock, $productTranslation, $locale);
                }
                $templateBlockChildren = $this->productDescriptionTemplateBlockRepository->findBy(['parent' => $templateBlock->getId()], ['sortOrder' => 'ASC']);
                foreach ($templateBlockChildren as $templateBlockChild) {
                    $blocks[$templateBlock->getSortOrder()]['templateBlockChildren'][$templateBlockChild->getSortOrder()] = $this->createProductDescriptionBlockContentForm($templateBlockChild, $productTranslation, $locale);
                }
            }
        }
        $productTranslation->setProductDescriptionTemplate($template);
        $this->entityManager->flush();

        $formHtml = $this->renderView('product/partials/_block_field.html.twig', [
            'blocks' => $blocks
        ]);

        return new JsonResponse(['success' => true, 'form' => $formHtml]);
    }

    #[Route('/admin/product-description-form/{id}/update', name: 'admin_product_description_form_update', methods: ['POST'])]
    public function update(Request $request, Product $product, ProductDescriptionBlockContentRepository $productDescriptionBlockContentRepository): JsonResponse
    {
        $description = json_decode($request->request->get('description'));

        
        if (isset($description)) {
            $this->productService->updateProductDescription($product, $description);
            return new JsonResponse(['status' => 'success', 'message' => 'Product description updated successfully!']);
        }


        return new JsonResponse(['status' => 'error', 'message' => 'Invalid data'], 400);
    }

    private function createProductDescriptionBlockContentForm(ProductDescriptionTemplateBlock $productDescriptionTemplateBlock, ProductTranslation $productTranslation, $locale) : FormView
    {
        $productDescriptionBlockContentChild = $this->productService->getProductDescriptionBlockContent($productDescriptionTemplateBlock, $productTranslation);

        $formProductDescriptionBlockContentChild = $this->createForm(ProductDescriptionBlockContentType::class, $productDescriptionBlockContentChild,  [
            'type' => $productDescriptionTemplateBlock->getType(),
            'template_block_id' => $productDescriptionTemplateBlock->getId(),
            'locale' => $locale
        ]);
        return $formProductDescriptionBlockContentChild->createView(); 
    }
}
