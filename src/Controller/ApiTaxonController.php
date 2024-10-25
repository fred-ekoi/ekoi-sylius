<?php 

namespace App\Controller;

use App\Service\LocaleService;
use App\Service\TaxonBuilderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiTaxonController extends AbstractController
{
    private $taxonBuilderService;
    private $localeService;

    public function __construct(LocaleService $localeService, TaxonBuilderService $taxonBuilderService)
    {
        $this->taxonBuilderService = $taxonBuilderService;
        $this->localeService = $localeService;
    }

    public function getTaxons(String $code, String $localeIso): JsonResponse
    {
        $taxonData = [];
        
        $locale = $this->localeService->getLocaleByCode($localeIso);
        if ($locale == null) return new JsonResponse(["error" => "No locale found"]);

        // Logique personnalisée pour sélectionner les données de taxons
        $taxonData = $this->taxonBuilderService->buildTaxon($code, $localeIso);     

        return new JsonResponse($taxonData);
    }
}


