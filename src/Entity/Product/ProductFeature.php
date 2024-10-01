<?php

namespace App\Entity\Product;

use App\Repository\Product\ProductFeatureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'sylius_product_feature')]
#[ORM\Entity(repositoryClass: ProductFeatureRepository::class)]
class ProductFeature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'owner')]
    private ?ProductFeatureImage $image = null;

    #[ORM\ManyToOne(inversedBy: 'features', cascade: ['persist', 'remove'])]
    private ?ProductTranslation $productTranslation = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?ProductFeatureImage
    {
        return $this->image;
    }

    public function setImage(?ProductFeatureImage $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getProductTranslation(): ?ProductTranslation
    {
        return $this->productTranslation;
    }

    public function setProductTranslation(?ProductTranslation $productTranslation): static
    {
        $this->productTranslation = $productTranslation;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
