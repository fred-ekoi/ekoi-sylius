<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use Sylius\Component\Core\Model\ImageAwareInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Webmozart\Assert\Assert;

final class ImageUploadSubscriber implements EventSubscriberInterface
{
    public function __construct(private ImageUploaderInterface $uploader)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'app.category_promotion.pre_create' => 'uploadImageTranslations',
            'app.category_promotion.pre_update' => 'uploadImageTranslations',
            'app.category_outfit.pre_create' => 'uploadImageTranslations',
            'app.category_outfit.pre_update' => 'uploadImageTranslations',
            'app.menu_page.pre_create' => 'uploadImage',
            'app.menu_page.pre_update' => 'uploadImage',
            'sylius.taxon.pre_create' => 'uploadImage',
            'sylius.taxon.pre_update' => 'uploadImage',
            'monsieurbiz_menu.menu_item.pre_create' => 'uploadImage',
            'monsieurbiz_menu.menu_item.pre_update' => 'uploadImage',
        ];
    }

    public function uploadImageTranslations(GenericEvent $event): void
    {
        $subject = $event->getSubject();

        $subjectTranslations = $subject->getTranslations();
        foreach ($subjectTranslations as $key => $subjectTranslation) {
            Assert::isInstanceOf($subjectTranslation, ImageAwareInterface::class);

            $this->uploadSubjectImage($subjectTranslation);
        }
    }

    public function uploadImage(GenericEvent $event): void
    {
        $subject = $event->getSubject();

        // dd($subject);
        Assert::isInstanceOf($subject, ImageAwareInterface::class);

        $this->uploadSubjectImage($subject);
    }

    private function uploadSubjectImage(ImageAwareInterface $subject): void
    {
        $image = $subject->getImage();

        if (null === $image) {
            return;
        }

        if ($image->hasFile()) {
            $this->uploader->upload($image);
        }

        // Remove image if upload failed
        if (null === $image->getPath()) {
            $subject->setImage(null);
        }
    }
}
