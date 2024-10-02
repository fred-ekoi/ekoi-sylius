<?php

namespace App\Form\Type;

use App\Entity\Product\ProductFeature;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            ->add('title', TextType::class, [
            'label' => 'app.ui.label.title',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'app.ui.label.description',
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
