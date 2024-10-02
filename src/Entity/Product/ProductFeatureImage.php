<?php

namespace App\Entity\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Image;
use Sylius\Component\Core\Model\ImageInterface;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_product_feature_image')]
class ProductFeatureImage implements ImageInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'image', cascade: ['persist', 'remove'], targetEntity: ProductFeature::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private $owner = null;

    #[ORM\Column(length: 255, nullable: true)]
    private $path = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    private ?\SplFileInfo $file = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): void
    {
        $this->path = $path;
    }

    public function getProductFeatures(): ?ProductFeature
    {
        return $this->owner;
    }

    public function setProductFeature(?ProductFeature $productFeature)
    {
        $this->owner = $productFeature;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getFile(): ?\SplFileInfo
    {
        return $this->file;
    }

    public function setFile(?\SplFileInfo $file): void
    {
        $this->file = $file;
    }

    public function hasFile(): bool
    {
        return null !== $this->file;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner): void
    {
        $this->owner = $owner;
    }
}
