<?php

/*
 * This file is part of Monsieur Biz' Rich Editor plugin for Sylius.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Form\Extension;

use App\Entity\Product\ProductDescriptionTemplate;
use App\Form\Type\ProductDescriptionBlockContentType;
use App\Form\Type\ProductDescriptionType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductTranslationType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductTranslationTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->remove('description')
            ->add('productDescriptionTemplate', EntityType::class, [
                'class' => ProductDescriptionTemplate::class,
                'placeholder' => 'Select a template',
                'choice_label' => 'name',
                'attr' => ['class' => 'product-description-template-select'],
            ])
            ->add('productDescriptionBlockContents', CollectionType::class, [
                'entry_type' => ProductDescriptionBlockContentType::class, // The form type for block contents
                'label' => 'Blocks',
                'allow_add' => false,  // Allows dynamic addition of blocks
                'allow_delete' => false,
                'mapped' => false,
                'attr' => ['class' => 'product-description-content-collection'],
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductTranslationType::class];
    }
}