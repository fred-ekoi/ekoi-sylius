<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_product')]
class Product extends BaseProduct
{
    /**
     * @var Collection<int, ProductFeature>
     */
    #[ORM\ManyToMany(targetEntity: ProductFeature::class)]
    #[ORM\JoinTable(name: 'product_productfeature')]
    #[ORM\JoinColumn(name: 'product_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'productfeature_id', referencedColumnName: 'id')]
    private Collection $features;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $attributeImage = null;

    public function __construct()
    {
        parent::__construct();
        $this->features = new ArrayCollection();
    }

    protected function createTranslation(): ProductTranslationInterface
    {
        return new ProductTranslation();
    }

    /**
     * @return Collection<int, ProductFeature>
     */
    public function getFeatures(): Collection
    {
        return $this->features;
    }

    public function addFeature(ProductFeature $feature): static
    {
        if (!$this->features->contains($feature)) {
            $this->features->add($feature);
        }

        return $this;
    }

    public function removeFeature(ProductFeature $feature): static
    {
        $this->features->removeElement($feature);

        return $this;
    }

    public function getAttributeImage(): ?string
    {
        return $this->attributeImage;
    }

    public function setAttributeImage(?string $attributeImage): static
    {
        $this->attributeImage = $attributeImage;

        return $this;
    }
}
