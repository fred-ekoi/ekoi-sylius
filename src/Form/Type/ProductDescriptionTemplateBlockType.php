<?php

namespace App\Form\Type;

use App\Entity\Product\Product;
use App\Entity\Product\ProductDescriptionTemplate;
use App\Entity\Product\ProductDescriptionTemplateBlock;
use App\Enum\BlockAlign;
use App\Enum\BlockType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductDescriptionTemplateBlockType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label' => 'app.ui.label.type',
                'choices' => array_combine(
                    array_map(fn(BlockType $type) => $type->label(), BlockType::cases()),
                    BlockType::cases()
                ),
                'placeholder' => 'app.ui.placeholder.type',
                'attr' => ['class' => 'product-description-template-block-type'],
            ])
            ->add('sortOrder', IntegerType::class, [
                'label' => 'app.ui.label.sort_order',
            ])
            ->add('alignment', ChoiceType::class, [
                'label' => 'app.ui.label.alignment',
                'choices' => array_combine(
                    array_map(fn(BlockAlign $align) => $align->label(), BlockAlign::cases()),
                    BlockAlign::cases()
                ),
                'placeholder' => 'app.ui.placeholder.alignment',
                'required' => false,
                'attr' => ['class' => 'product-description-template-block-alignment'],
            ]);
        if ($options['depth'] < 1) {
            $builder->add('children', CollectionType::class, [
                'entry_type' => self::class,
                'entry_options' => ['depth' => $options['depth'] + 1], // Pass the depth
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'required' => false,
                'attr' => ['class' => 'product-description-template-block-children'],
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductDescriptionTemplateBlock::class,
            'depth' => 0,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'product_description_template_block';
    }
}
