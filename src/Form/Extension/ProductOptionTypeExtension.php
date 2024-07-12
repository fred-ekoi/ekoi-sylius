<?php

declare(strict_types=1);

namespace App\Form\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductOptionType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductOptionTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isColor', ChoiceType::class, [
                'required' => true,
                'label' => 'Est une couleur',
                'choices' => [
                    'Non' => false,
                    'Oui' => true,
                ],
            ]);
    }
    public static function getExtendedTypes(): iterable
    {
        return [ProductOptionType::class];
    }
}
