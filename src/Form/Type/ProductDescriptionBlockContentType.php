<?php namespace App\Form\Type;

use App\Entity\Product\Product;
use App\Entity\Product\ProductDescriptionBlockContent;
use App\Entity\Product\ProductDescriptionTemplateBlock;
use App\Enum\BlockType;
use MonsieurBiz\SyliusMediaManagerPlugin\Form\Type\VideoType;
use MonsieurBiz\SyliusMediaManagerPlugin\Form\Type\ImageType;
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
        $type = $options['type']->value;
        $locale = $options['locale'];
        $templateBlockId = $options['template_block_id'];
        $fieldType = TextareaType::class;
        $aditionnalAttr = [];
        $productDescriptionBlockContent = $options['data']; 

        switch ($options['type']) {
            case BlockType::TEXT:
                $fieldType = TextareaType::class;
                break;
            case BlockType::TITLE:
            case BlockType::SHORT_TEXT:
                $fieldType = TextType::class;
                break;
            case BlockType::IMAGE:
                $fieldType = ImageType::class;
                $aditionnalAttr = ['accept' => 'image/*'];
                break;
            case BlockType::VIDEO:
                $fieldType = VideoType::class;
                $aditionnalAttr = ['accept' => 'video/*'];
                break;
            // Add more types as needed (e.g., video, layout, etc.)
            default:
                break;
        }
        $builder->add('translations__' . $locale . '__' . $type . '-' . $templateBlockId, $fieldType, [
            'label' => 'app.ui.label.' . $type,
            'required' => false,
            'attr' => ['data-template-block' => $templateBlockId],
            'mapped' => false,
            'data' => $productDescriptionBlockContent->getText(),
            'attr' => [
                'id' => $type . '-' . $locale . '-' . $templateBlockId,
                'class' => 'product_description_block_content_' . $locale,
                'data-type' => $type,
                'data-template-block' => $templateBlockId,
                ...$aditionnalAttr
            ]
        ]);
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
