<?php

namespace App\Form\Type;

use App\Entity\Product\ProductFeature;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductFeatureType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image', ProductFeatureImageType::class, [
                'label' => false,
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => ProductFeatureTranslationType::class,
                'label' => 'sylius.form.shipping_method.images',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductFeature::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'product_feature';
    }
}
