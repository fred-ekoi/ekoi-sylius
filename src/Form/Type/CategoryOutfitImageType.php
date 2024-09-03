<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\CategoryOutfit\CategoryOutfitImage;
use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

final class CategoryOutfitImageType extends ImageType
{
    public function __construct()
    {
        parent::__construct(CategoryOutfitImage::class, ['sylius']);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder->remove('type')
            ->add('file', FileType::class, [
                'label' => false,
                'required' => false,
                'label_format' => null,
                'attr' => ['accept' => 'image/*']

            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'category_outfit_image';
    }
}
