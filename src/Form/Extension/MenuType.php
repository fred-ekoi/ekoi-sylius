<?php

namespace App\Form\Extension;

use App\Entity\Locale\Locale;
use App\Entity\Menu\Menu;
use MonsieurBiz\SyliusMenuPlugin\Form\Type\MenuType as BaseMenuType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractTypeExtension
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('locale', EntityType::class, [
                'class' => Locale::class,
                'choice_label' => 'id',
                'choice_label' => function (Locale $locale) {
                    return $locale->getName();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [BaseMenuType::class];
    }
}
