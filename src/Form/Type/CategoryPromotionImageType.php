<?php

namespace App\Form\Type;

use App\Entity\CategoryPromotion\CategoryPromotionImage;
use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryPromotionImageType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('file', FileType::class, [
                'label' => 'sylius.form.image.file',
            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_category_promotion_image';
    }
}
