<?php

namespace App\Form\Type;

use App\Entity\CategoryPromotion\CategoryPromotionImage;
use App\Entity\CategoryPromotion\CategoryPromotionTranslation;
use App\Entity\Locale\Locale;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryPromotionTranslationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('image', CategoryPromotionImageType::class, [
                'label' => 'sylius.form.shipping_method.images',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CategoryPromotionTranslation::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'category_promotion_translation';
    }
}
