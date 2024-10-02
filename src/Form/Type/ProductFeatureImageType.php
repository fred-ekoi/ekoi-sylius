<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Product\ProductFeatureImage;
use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use MonsieurBiz\SyliusMediaManagerPlugin\Form\Type\ImageType as MediaManagerImageType;

final class ProductFeatureImageType extends ImageType
{
    public function __construct()
    {
        parent::__construct(ProductFeatureImage::class, ['sylius']);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->remove('type')
            ->remove('file')
            ->add('path', MediaManagerImageType::class, [
                'label' => false,
                'required' => false,
                'label_format' => null,
                'attr' => ['accept' => 'image/*']

            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'product_feature_image';
    }
}
