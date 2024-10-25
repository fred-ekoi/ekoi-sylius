<?php

namespace App\Form\Extension;

use App\Entity\Menu\MenuItem;
use App\Form\Type\MenuItemImageType;
use MonsieurBiz\SyliusMenuPlugin\Form\Type\MenuItemType as BaseMenuItemType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuItemType extends AbstractTypeExtension
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image', MenuItemImageType::class, [
                'label' => 'app.ui.label.image',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MenuItem::class,
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [BaseMenuItemType::class];
    }
}
