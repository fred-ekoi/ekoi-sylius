<?php

declare(strict_types=1);

namespace App\Entity\CategoryPromotion;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Image;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Form\FormTypeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_category_promotion_image')]
class CategoryPromotionImage extends Image
{
    #[ORM\OneToOne(inversedBy: 'image', cascade: ['persist', 'remove'], targetEntity: CategoryPromotionTranslation::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    protected $owner = null;

    public function getCategoryPromotionTranslation(): ?CategoryPromotionTranslation
    {
        return $this->owner;
    }

    public function setCategoryPromotionTranslation(?CategoryPromotionTranslation $categoryPromotionTranslation)
    {
        $this->owner = $categoryPromotionTranslation;
    }
}
