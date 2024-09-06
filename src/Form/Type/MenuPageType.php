<?php

namespace App\Form\Type;

use App\Entity\Menu\Menu;
use App\Entity\Menu\MenuItem;
use App\Entity\Menu\MenuPage;
use App\Form\Type\MenuPageImageType;
use App\Repository\Menu\MenuRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuPageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'app.ui.label.title',
            ])
            ->add('menu', EntityType::class, [
                'class' => Menu::class,
                'choice_label' => function (Menu $menu) {
                    return $menu->getLang()->getName();
                },
                'query_builder' => function (MenuRepository $menuRepository): QueryBuilder {
                    return $menuRepository->createQueryBuilder('m')
                        ->join('App\Entity\Locale\Locale', 'l', 'WITH', 'm.lang = l.id');
                },
                'label' => 'app.ui.menu',
            ])
            ->add('menuItemParent', EntityType::class, [
                'class' => MenuItem::class,
                'choice_label' => function (MenuItem $menuItem) {
                    return $menuItem->getTitle();
                },
                'choice_attr' => function (MenuItem $menuItem) {
                    if(null === $menuItem->getMenu()) {
                        return [];
                    }
                    return ['data-menu' => $menuItem->getMenu()->getId()];
                },
                'label' => 'app.ui.menu_item_parent',
                'placeholder' => 'app.ui.no_menu_item_parent',
                'required' => false,
            ])
            ->add('image', MenuPageImageType::class, [
                'label' => 'app.ui.label.image',
                'required' => false,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MenuPage::class,
        ]);
    }
}