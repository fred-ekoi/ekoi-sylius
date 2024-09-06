<?php

declare(strict_types=1);

namespace App\Entity\CategoryOutfit;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Image;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_category_outfit_image')]
class CategoryOutfitImage extends Image
{
    #[ORM\OneToOne(inversedBy: 'image', cascade: ['persist', 'remove'], targetEntity: CategoryOutfitTranslation::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    protected $owner = null;

    public function getCategoryOutfitTranslation(): ?CategoryOutfitTranslation
    {
        return $this->owner;
    }

    public function setCategoryOutfitTranslation(?CategoryOutfitTranslation $categoryOutfitTranslation)
    {
        $this->owner = $categoryOutfitTranslation;
    }
}
