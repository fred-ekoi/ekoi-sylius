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

use App\Form\Type\ProductFeatureType;
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\RichEditorType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductTranslationType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductTranslationTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->remove('description')
            ->add('description', RichEditorType::class, [
                'required' => false,
                'label' => 'sylius.form.product.description',
                'locale' => $builder->getName(),
                'tags' => ['-noseeme'],
            ])
            ->add('features', CollectionType::class, [
                'label' => 'app.ui.label.features',
                'entry_type' => ProductFeatureType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'attr' => ['class' => 'sylius-product-features'],
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductTranslationType::class];
    }
}