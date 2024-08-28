<?php 

namespace App\Controller;

use App\Service\LocaleService;
use App\Service\TaxonBuilderService;
use Sylius\Bundle\TaxonomyBundle\Doctrine\ORM\TaxonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiTaxonController extends AbstractController
{

    private $localeService;
    private $taxonRepository;
    private $taxonBuilderService;

    public function __construct(LocaleService $localeService, TaxonRepository $taxonRepository, TaxonBuilderService $taxonBuilderService)
    {
        $this->localeService = $localeService;
        $this->taxonRepository = $taxonRepository;
        $this->taxonBuilderService = $taxonBuilderService;
    }

    public function getTaxons(String $code, String $localeIso, TaxonRepository $taxonRepository): JsonResponse
    {
        // Logique personnalisée pour sélectionner les données de taxons
        $taxonData = $this->taxonBuilderService->buildTaxon($code, $localeIso);     

        return new JsonResponse($taxonData);
    }
}


