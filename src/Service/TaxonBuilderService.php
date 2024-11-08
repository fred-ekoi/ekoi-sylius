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

        if ($taxon == null) return ["error" => "No taxon found"];

        $taxonTranslation = $taxon->getTranslation($locale);
        // dd($taxonTranslation);
        $taxonData = [
            "title" => $taxonTranslation->getName(),
            "slug" => $taxonTranslation->getSlug(),
            "description" => $taxonTranslation->getDescription(),
            "image" => null,
            "categoryOutfit" => null,
            "categoryPromotions" => null       ];

        $taxonImage = $taxon->getImage();
        if (null !== $taxonImage) {
            $taxonData["image"] = $taxonImage->getPath();
        }

        $taxonCategoryOutfits = $taxon->getCategoryOutfit();

        if($taxonCategoryOutfits) {
            $taxonData["categoryOutfit"] = [
                "title" => $taxonCategoryOutfits->getTitle(),
                "description" => $taxonCategoryOutfits->getDescription(),
                "image" => $taxonCategoryOutfits->getTranslation($locale)->getImage()?->getPath(),
            ];
            foreach ($taxonCategoryOutfits->getProducts() as $product) {

                $taxonData["categoryOutfit"]["products"][] = [
                    "code" => $product->getCode(),
                    "name" => $product->getTranslation($locale)->getName(),
                    "price" => $product->getVariants()->first()->getChannelPricings()->first()->getPrice(),
                    "originalPrice" => $product->getVariants()->first()->getChannelPricings()->first()->getOriginalPrice() ?? $product->getVariants()->first()->getChannelPricings()->first()->getPrice(),
                    "image" => $product->getImages()?->first()?->getPath(),
                ];
            }
        }

        $taxonCategoryPromotions = $taxon->getCategoryPromotions();
        foreach ($taxonCategoryPromotions as $taxonCategoryPromotion) {
            $taxonData["categoryPromotions"][] = [
                "title" => $taxonCategoryPromotion->getTranslation($locale)->getTitle(),
                "image" => null,
            ];
            $taxonCategoryPromotionImage = $taxonCategoryPromotion->getTranslation($locale)->getImage();
            if (null !== $taxonCategoryPromotionImage) {
                $taxonData["categoryPromotions"]["image"] = $taxonCategoryPromotionImage->getPath();
            }
        }
        // dd($taxonData);

        return $taxonData;
    }
}