<?php

namespace App\Entity\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Image;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_product_feature_image')]
class ProductFeatureImage extends Image
{

    #[ORM\OneToOne(inversedBy: 'image', cascade: ['persist', 'remove'], targetEntity: ProductFeature::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    protected $owner = null;

    public function getProductFeatures(): ?ProductFeature
    {
        return $this->owner;
    }

    public function setProductFeature(?ProductFeature $productFeature)
    {
        $this->owner = $productFeature;
    }
}
