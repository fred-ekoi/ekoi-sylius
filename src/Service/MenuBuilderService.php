<?php

namespace App\Service;

use MonsieurBiz\SyliusMenuPlugin\Repository\MenuRepository;
use Sylius\Bundle\TaxonomyBundle\Doctrine\ORM\TaxonRepository;

class MenuBuilderService
{
    private $taxonRepository;
    private $menuRepository;

    public function __construct(TaxonRepository $taxonRepository, MenuRepository $menuRepository)
    {
        $this->taxonRepository = $taxonRepository;
        $this->menuRepository = $menuRepository;
    }

    public function buildMenu($localeIso)
    {
        $menu = $this->menuRepository->findOneBy(['code' => $localeIso]);

        if ($menu == null) return ["error" => "No menu found"];
        
        $menuItems = $menu->getItems();
        $menuData = [
            "code" => $menu->getCode(),
        ];

        $menuItemDataArray = [];
        foreach ($menuItems as $menuItem) {
            $menuItemTranslations = $menuItem->getTranslation($localeIso);
            $menuItemData = [
                "title" => $menuItemTranslations->getLabel(),
                "url" => $menuItemTranslations->getUrl(),
                "parent_id" => $menuItem->getParent() == null ? null : $menuItem->getParent()->getId(),
            ];
            // if ($menuItem->getParent() == null) {
                $menuItemDataArray[$menuItem->getId()] = $menuItemData;
            // } else {
            //     $this->addChildToParent($menuItemDataArray, $menuItem->getParent()->getId(), $menuItemData);
            // }
        }

        $menuData["items"] = $this->buildTree($menuItemDataArray);

        return $menuData;
    }

    function buildTree(array &$items, $parentId = null) {
        $branch = [];
    
        foreach ($items as $key => &$item) {
            // If the item's parent_id matches the current parentId, it's a child
            if ($item['parent_id'] == $parentId) {
                // Recursively find children of the current item
                $children = $this->buildTree($items, $key);
                // If children are found, add them under 'children'
                if ($children) {
                    $item['children'] = $children;
                }
                // Add the current item to the branch
                $branch[] = $item;
            }
        }
    
        return $branch;
    }
}