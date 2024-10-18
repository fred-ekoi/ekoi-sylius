<?php

namespace App\Form\Type;

use App\Entity\Product\Product;
use App\Entity\Product\ProductDescription;
use App\Entity\Product\ProductDescriptionTemplate;
use App\Entity\Product\ProductDescriptionTemplateBlock;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductDescriptionTemplateType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'app.ui.label.name',
            ])
            ->add('productDescriptionTemplateBlocks', CollectionType::class, [
                'label' => 'app.ui.label.blocks',
                'entry_type' => ProductDescriptionTemplateBlockType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'attr' => ['class' => 'sylius-product-description-template-block'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductDescriptionTemplate::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'product_description_template';
    }
}
