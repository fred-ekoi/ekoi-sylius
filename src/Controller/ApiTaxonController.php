<?php 

namespace App\Controller;

use App\Service\TaxonBuilderService;
use Sylius\Bundle\TaxonomyBundle\Doctrine\ORM\TaxonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiTaxonController extends AbstractController
{

    private $taxonRepository;
    private $taxonBuilderService;

    public function __construct(TaxonRepository $taxonRepository, TaxonBuilderService $taxonBuilderService)
    {
        $this->taxonRepository = $taxonRepository;
        $this->taxonBuilderService = $taxonBuilderService;
    }

    public function getTaxons(String $code, String $localeIso, TaxonRepository $taxonRepository): JsonResponse
    {
        $taxonData = [];
        
        // Logique personnalisée pour sélectionner les données de taxons
        $taxonData = $this->taxonBuilderService->buildTaxon($code, $localeIso);     

        return new JsonResponse($taxonData);
    }
}


