<?php 

namespace App\Controller;

use App\Entity\Product\Product;
use App\Service\LocaleService;
use App\Service\ProductService;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiProductController extends AbstractController
{

    private $localeService;
    private $productService;
    private $productRepository;

    public function __construct(LocaleService $localeService, ProductService $productService, ProductRepository $productRepository) {
        $this->localeService = $localeService;
        $this->productService = $productService;
        $this->productRepository = $productRepository;
    }

    public function getProductDescription(int $productId, String $localeIso): JsonResponse
    {
        $product = $this->productRepository->find($productId);

        if (!$product) {
            throw new JsonResponse("Product not found");
        }

        // Logique personnalisée pour récupérer les données de menu
        $productDescriptionBlocks = [];

        $locale = $this->localeService->getLocaleByCode($localeIso);
        if ($locale == null) return new JsonResponse(["error" => "No locale found"]);
        
        $productDescriptionBlocks = $this->productService->getProductDescriptionBlocks($product, $locale);        

        return new JsonResponse($productDescriptionBlocks);
    }
}


