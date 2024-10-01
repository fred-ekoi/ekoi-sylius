<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ProductTranslation as BaseProductTranslation;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product_translation")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_product_translation')]
class ProductTranslation extends BaseProductTranslation
{
    /**
     * @var Collection<int, ProductFeature>
     */
    #[ORM\OneToMany(mappedBy: 'productTranslation', cascade: ['persist', 'remove'], targetEntity: ProductFeature::class)]
    private Collection $features;

    public function __construct()
    {
        $this->features = new ArrayCollection();
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
            $feature->setProductTranslation($this);
        }

        return $this;
    }

    public function removeFeature(ProductFeature $feature): static
    {
        if ($this->features->removeElement($feature)) {
            // set the owning side to null (unless already changed)
            if ($feature->getProductTranslation() === $this) {
                $feature->setProductTranslation(null);
            }
        }

        return $this;
    }
}
