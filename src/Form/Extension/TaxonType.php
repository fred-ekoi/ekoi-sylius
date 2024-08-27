<?php

namespace App\Form\Extension;

use App\Entity\CategoryPromotion\CategoryPromotionImage;
use App\Entity\Locale\Locale;
use App\Entity\Taxonomy\Taxon;
use App\Form\Type\TaxonPageImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaxonType extends AbstractTypeExtension
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image', TaxonPageImageType::class, [
                'label' => 'app.ui.Image',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Taxon::class, // TaxonType::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'taxon';
    }
    public static function getExtendedTypes(): iterable
    {
        return [TaxonType::class];
    }
}
