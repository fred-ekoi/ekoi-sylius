<?php

namespace App\Form\Type;

use App\Entity\Locale\Locale;
use App\Entity\Translation\TranslationOverrideDictionary;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TranslationOverrideDictionaryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('keyText', null, [
                'label' => 'app.ui.label.key_text',
            ])
            ->add('keyLocale', EntityType::class, [
                'class' => Locale::class,
                'choice_label' => 'code',
                'label' => 'app.ui.label.key_locale',
            ])
            ->add('valueText', null, [
                'label' => 'app.ui.label.value_text',
            ])
            ->add('valueLocale', EntityType::class, [
                'class' => Locale::class,
                'choice_label' => 'code',
                'label' => 'app.ui.label.value_locale',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TranslationOverrideDictionary::class,
        ]);
    }
}
