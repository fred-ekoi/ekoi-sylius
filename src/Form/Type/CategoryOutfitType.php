<?php

namespace App\Form\Type;

use App\Entity\CategoryOutfit\CategoryOutfit;
use App\Entity\Product\Product;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryOutfitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('products', EntityType::class, [
                'class' => Product::class,
                'label' => 'app.ui.label.products',
                'choice_label' => 'id',
                'multiple' => true,
                'choice_label' => function (Product $product) {
                    return $product->getName();
                },
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => CategoryOutfitTranslationType::class,
                'label' => 'sylius.form.shipping_method.images',
            ]);;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_category_outfit';
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CategoryOutfit::class,
        ]);
    }
}
