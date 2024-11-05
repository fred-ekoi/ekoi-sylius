<?php

declare(strict_types=1);

namespace App\Form\Extension;

use App\Entity\Product\Product;
use App\Entity\Product\ProductFeature;
use MonsieurBiz\SyliusMediaManagerPlugin\Form\Type\ImageType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('features', EntityType::class, [
                'class' => ProductFeature::class,
                'label' => 'app.ui.label.product_features',
                'choice_label' => 'id',
                'multiple' => true,
                'choice_label' => function (ProductFeature $productFeature) {
                    return $productFeature->getTitle();
                },
            ])
            ->add('attributeImage', ImageType::class, [
                'label' => 'app.ui.label.image',
                'required' => false,
            ]);
    }
    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
