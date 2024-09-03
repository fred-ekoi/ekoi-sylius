<?php

namespace App\Form\Type;

use App\Entity\CategoryOutfit\CategoryOutfitTranslation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryOutfitTranslationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'app.ui.title',
            ])
            ->add('description', TextType::class, [
                'label' => 'app.ui.description',
            ])
            ->add('image', CategoryOutfitImageType::class, [
                'label' => 'app.ui.Image',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CategoryOutfitTranslation::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'category_outfit_translation';
    }
}
