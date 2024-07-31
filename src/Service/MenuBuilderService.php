<?php

namespace App\Service;

use App\Entity\MenuItem;
use App\Repository\MenuItemRepository;
use App\Repository\MenuPageRepository;
use App\Repository\MenuRepository;
use Sylius\Bundle\TaxonomyBundle\Doctrine\ORM\TaxonRepository;
use Sylius\Component\Taxonomy\Repository\TaxonRepositoryInterface;

class MenuBuilderService
{
    private $menuItemRepository;
    private $menuPageRepository;
    private $menuRepository;
    private $taxonRepository;

    public function __construct(MenuItemRepository $menuItemRepository, MenuPageRepository $menuPageRepository, MenuRepository $menuRepository, TaxonRepository $taxonRepository)
    {
        $this->menuItemRepository = $menuItemRepository;
        $this->menuPageRepository = $menuPageRepository;
        $this->menuRepository = $menuRepository;
        $this->taxonRepository = $taxonRepository;
    }

    public function buildMenu($pageId, $locale)
    {
        $page = $this->menuPageRepository->find($pageId);
        $pageItems = $page->getMenuItems();
        $pageData = [
            "title" => $page->getTitle(),
        ];
        $itemsData = [];

        foreach ($pageItems as $item) {
            $pageWithItemParent = $this->menuPageRepository->findOneBy(['menuItemParent' => $item->getId()]);
            $itemData = [
                "title" => $item->getTitle(),
            ];

            if ("category" === $item->getType()) {
                $taxonUrl = $this->generateTaxonUrl($item->getTaxon()->getId(), $locale);
                $itemData["link"] = $taxonUrl;

            } else {
                $itemData["link"] = $item->getUrl();
            }

            if (null !== $pageWithItemParent) {
                $itemData["page"] = $this->buildMenu($pageWithItemParent->getId(), $locale);
            }

            $itemsData[] = $itemData;
        }

        $pageData["items"] = $itemsData;

        return $pageData;
    }

    private function generateTaxonUrl($taxonId, $locale)
    {
        $taxon = $this->taxonRepository->findOneBy(['id'=>$taxonId]);
        return $taxon->getTranslation($locale)->getSlug();
    }
}