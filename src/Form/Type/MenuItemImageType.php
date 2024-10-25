<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Menu\MenuItemImage;
// use Liip\ImagineBundle\Form\Type\ImageType
use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class MenuItemImageType extends ImageType
{
    public function __construct()
    {
        parent::__construct(MenuItemImage::class, ['sylius']);
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
        return 'taxon_page_image';
    }
}
