<?php 
namespace App\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('menuGroup')
            ->setLabel('app.ui.Menu')
        ;

        $newSubmenu
            ->addChild('menuGroup-menu', ['route' => 'app_admin_menu_index'])
            ->setLabel('app.ui.Front sites menus')
        ;

        $newSubmenu
            ->addChild('menuGroup-menuPage', ['route' => 'app_admin_menu_page_index'])
            ->setLabel('app.ui.Front sites menu pages')
        ;
        
        $newSubmenu
            ->addChild('menuGroup-menuItem', ['route' => 'app_admin_menu_item_index'])
            ->setLabel('app.ui.Front sites menus items')
        ;
    }

}