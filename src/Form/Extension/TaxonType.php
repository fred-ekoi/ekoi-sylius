<?php

namespace App\Form\Extension;

use App\Entity\CategoryOutfit\CategoryOutfit;
use App\Entity\Taxonomy\Taxon;
use App\Form\Type\TaxonPageImageType;
use Sylius\Bundle\TaxonomyBundle\Form\Type\TaxonType as BaseTaxonType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaxonType extends AbstractTypeExtension
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image', TaxonPageImageType::class, [
                'label' => 'app.ui.label.image',
                'required' => false,
            ])
            ->add('categoryOutfit', EntityType::class, [
                'class' => CategoryOutfit::class,
                'choice_label' => 'title', // Adjust based on what you want to display
                'placeholder' => 'Choose a Category Outfit',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Taxon::class,
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [BaseTaxonType::class];
    }
}
