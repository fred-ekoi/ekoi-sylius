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

    public function buildTaxon($code, $locale)
    {
        $taxon = $this->taxonRepository->findOneBy(['code' => $code]);
        // dd($taxon);

        $taxonTranslation = $taxon->getTranslation($locale);
        // dd($taxonTranslation);
        $taxonData = [
            "title" => $taxonTranslation->getName(),
            "slug" => $taxonTranslation->getSlug(),
            "description" => $taxonTranslation->getDescription(),
            "image" => null,
        ];

        $pageImage = $taxon->getImage();
        if (null !== $pageImage) {
            $taxonData["image"] = $pageImage->getPath();
        }

        $taxonCategoryOutfits = $taxon->getCategoryOutfit();

        if($taxonCategoryOutfits) {
            $taxonData["categoryOutfit"] = [
                "title" => $taxonCategoryOutfits->getTitle(),
                "description" => $taxonCategoryOutfits->getDescription(),
            ];
            foreach ($taxonCategoryOutfits->getProducts() as $product) {
                $taxonData["categoryOutfit"]["products"][] = $product->getCode();
            }
        }

        return $taxonData;
    }
}