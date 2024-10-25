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
            ->addChild('catalog-productFeature', ['route' => 'app_admin_product_feature_index'])
            ->setLabel('app.ui.product_features')
            ->setLabelAttribute('icon', 'cube')
        ;

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


        $catalog
            ->addChild('catalog-productDescriptionTemplate', ['route' => 'app_admin_product_description_template_index'])
            ->setLabel('app.ui.product_description_templates_menu')
            ->setLabelAttribute('icon', 'paste')
        ;

        $catalog->reorderChildren([
            'taxons',
            'products',
            'inventory',
            'attributes',
            'catalog-productFeature',
            'options',
            'association_types',
            'catalog-categoryOutfit',
            'catalog-categoryPromotion',
            'catalog-productDescriptionTemplate',
        ]);
        
        $configuration = $menu->getChild('configuration');

        $configuration
            ->addChild('configuration-translationOverride' , ['route' => 'app_admin_translation_override_dictionary_index'])
            ->setLabel('app.ui.translation_override_dictionaries')
            ->setLabelAttribute('icon', 'list');
    }

    /**
     * Add a custom menu item to the product form menu.
     *
     * @param MenuBuilderEvent $event
     */
    public function addAdminProductMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();
        // Add a custom menu item (e.g., Product Features tab)
        $menu->addChild('product_features')
        ->setLabel('app.ui.product_features') // Translation key for the label
        ->setAttribute('template', '@SyliusAdmin/Product/Tab/_features.html.twig'); // Add a template to the menu item
        // dd($menu);
        $menu->reorderChildren([
            'details',
            'taxonomy',
            'attributes',
            'product_features',
            'associations',
            'media',
            'inventory',
        ]);
    }

}
