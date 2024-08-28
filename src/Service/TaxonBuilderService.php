<?php

namespace App\Service;

use App\Entity\Taxonomy\Taxon;
use App\Entity\Taxonomy\TaxonTranslation;
use App\Repository\Menu\MenuRepository;
use Sylius\Bundle\TaxonomyBundle\Doctrine\ORM\TaxonRepository;
use Sylius\Component\Taxonomy\Repository\TaxonRepositoryInterface;

class TaxonBuilderService
{
    private $menuItemRepository;
    private $menuPageRepository;
    private $menuRepository;
    private $taxonRepository;

    public function __construct(TaxonRepository $taxonRepository)
    {
        $this->taxonRepository = $taxonRepository;
    }

    public function buildTaxon($slug, $locale)
    {
        $taxon = $this->taxonRepository->findOneBySlug($slug, $locale);
        // dd($taxon);

        $taxonTranslation = $taxon->getTranslation($locale);
        $taxonData = [
            "title" => $taxonTranslation->getName(),
            "slug" => $taxonTranslation->getSlug(),
            "description" => $taxonTranslation->getDescription(),
            "image" => $taxon->getImage()->getPath(),
        ];

        return $taxonData;
    }
}