<?php namespace App\Form\Type;

use App\Entity\Product\Product;
use App\Entity\Product\ProductDescriptionBlockContent;
use App\Entity\Product\ProductDescriptionTemplateBlock;
use App\Enum\BlockType;
use MonsieurBiz\SyliusMediaManagerPlugin\Form\Type\VideoType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductDescriptionBlockContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['type'] == null) return;

        $productDescriptionBlockContent = $options['data']; 

        switch ($options['type']) {
            case BlockType::TEXT:
                $builder->add('text-' . $options['locale'] . '-' . $options['template_block_id'], TextareaType::class, [
                    'label' => 'app.ui.label.text',
                    'required' => false,
                    'attr' => ['data-template-block' => $options['template_block_id']],
                    'mapped' => false,
                    'data' => $productDescriptionBlockContent->getText(),
                    'attr' => [
                        'class' => 'product_description_block_content_' . $options['locale'],
                        'data-type' => 'text',
                        'data-template-block' => $options['template_block_id']
                    ]
                ]);
                break;
            // TODO use directly ImageType from MonsieurBiz\SyliusMediaManagerPlugin\Form\Type 
            case BlockType::IMAGE:
                $builder->add('image-' . $options['locale'] . '-' . $options['template_block_id'], ProductDescriptionBlockContentImageType::class, [
                    'label' => 'app.ui.label.image',
                    'required' => false,
                    'attr' => ['data-template-block' => $options['template_block_id']],
                    'mapped' => false,
                    'data' => $productDescriptionBlockContent->getProductDescriptionBlockContentImage(),
                    'attr' => [
                        'class' => 'product_description_block_content_' . $options['locale'],
                        'data-type' => 'image',
                        'data-template-block' => $options['template_block_id']
                    ]
                ]);
                break;
            case BlockType::VIDEO:
                $builder->add('video-' . $options['locale'] . '-' . $options['template_block_id'], VideoType::class, [
                    'label' => 'app.ui.label.video',
                    'required' => false,
                    'attr' => ['data-template-block' => $options['template_block_id']],
                    'mapped' => false,
                    'data' => $productDescriptionBlockContent->getText(),
                    'attr' => [
                        'class' => 'product_description_block_content_' . $options['locale'],
                        'data-type' => 'video',
                        'data-template-block' => $options['template_block_id']
                    ]
                ]);
                break;
            // Add more types as needed (e.g., video, layout, etc.)
            default:
                break;
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProductDescriptionBlockContent::class,
            'type' => null,
            'template_block_id' => null,
            'locale' => null, // The selected template will be passed here
            'template_repository' => null, // Pass productDescriptionTemplateBlock type dynamically
        ]);
    }
}
