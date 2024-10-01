<?php
namespace App\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        // $newSubmenu = $menu
        //     ->addChild('menuGroup')
        //     ->setLabel('app.ui.menu')
        // ;

        // $newSubmenu
        //     ->addChild('menuGroup-menu', ['route' => 'app_admin_menu_index'])
        //     ->setLabel('app.ui.menus')
        //     ->setLabelAttribute('icon', 'list')
        // ;

        // $newSubmenu
        //     ->addChild('menuGroup-menuPage', ['route' => 'app_admin_menu_page_index'])
        //     ->setLabel('app.ui.menu_pages')
        //     ->setLabelAttribute('icon', 'columns')
        // ;

        // $newSubmenu
        //     ->addChild('menuGroup-menuItem', ['route' => 'app_admin_menu_item_index'])
        //     ->setLabel('app.ui.menu_items')
        //     ->setLabelAttribute('icon', 'th list')
        // ;

        $catalog = $menu->getChild('catalog');

        $catalog
            ->addChild('catalog-categoryOutfit', ['route' => 'app_admin_category_outfit_index'])
            ->setLabel('app.ui.category_outfits')
            ->setLabelAttribute('icon', 'pencil alternate')
        ;

        $catalog
            ->addChild('catalog-categoryPromotion', ['route' => 'app_admin_category_promotion_index'])
            ->setLabel('app.ui.category_promotions')
            ->setLabelAttribute('icon', 'tags')
        ;

        $configuration = $menu->getChild('configuration');

        $configuration
            ->addChild('configuration-translationOverride')
            ->setLabel('app.ui.translation_override_dictionary')
            ->setLabelAttribute('icon', 'list');
    }

}
