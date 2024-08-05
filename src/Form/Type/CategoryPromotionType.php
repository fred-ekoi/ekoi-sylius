<?php

namespace App\Form\Type;

use App\Entity\CategoryPromotion\CategoryPromotion;
use App\Entity\Locale\Locale;
use App\Entity\Taxonomy\Taxon;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryPromotionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('displayFrom', null, [
                'widget' => 'single_text',
            ])
            ->add('displayTo', null, [
                'widget' => 'single_text',
            ])
            ->add('position')
            ->add('taxons', EntityType::class, [
                'class' => Taxon::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('locales', EntityType::class, [
                'class' => Locale::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => CategoryPromotionTranslationType::class,
                'label' => 'sylius.form.shipping_method.images',
            ]);
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_category_promotion';
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CategoryPromotion::class,
        ]);
    }
}
