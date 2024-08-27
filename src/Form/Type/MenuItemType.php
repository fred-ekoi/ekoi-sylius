<?php

namespace App\Form\Type;

use App\Entity\Menu\Menu;
use App\Entity\Menu\MenuItem;
use App\Entity\Menu\MenuPage;
use App\Entity\Taxonomy\Taxon;
use App\Repository\Menu\MenuRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('position', IntegerType::class, [
                'label' => 'app.ui.Position',
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'app.ui.Type',
                'choices' => MenuItem::getTypes(),
            ])
            ->add('url', TextType::class, [
                'label' => 'app.ui.URL',
                'required' => false,
            ])
            ->add('taxon', EntityType::class, [
                'class' => Taxon::class,
                'label' => 'app.ui.Taxon',
                'required' => false,
                'choice_label' => function (Taxon $taxon) {
                    return $taxon->getSlug();
                }
            ])
            ->add('title', TextType::class, [
                'label' => 'app.ui.Title'
            ])
            ->add('menu', EntityType::class, [
                'class' => Menu::class,
                'choice_label' => function (Menu $menu) {
                    return $menu->getLang()->getName();
                },
                'choice_value' => 'id',
                'query_builder' => function (MenuRepository $menuRepository): QueryBuilder {
                    return $menuRepository->createQueryBuilder('m')
                        ->join('App\Entity\Locale\Locale', 'l', 'WITH', 'm.lang = l.id');
                },
            ])
            ->add('menuPage', EntityType::class, [
                'class' => MenuPage::class,
                'choice_label' => function (MenuPage $menuPage) {
                    return $menuPage->getTitle();
                },
                'choice_attr' => function (MenuPage $menuPage) {
                    if(null === $menuPage->getMenu()) {
                        return [];
                    }
                    return ['data-menu' => $menuPage->getMenu()->getId()];
                },
            ])
            ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MenuItem::class,
        ]);
    }
}
