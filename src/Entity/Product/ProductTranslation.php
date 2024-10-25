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

    #[ORM\ManyToOne]
    private ?ProductDescriptionTemplate $productDescriptionTemplate = null;

    /**
     * @var Collection<int, ProductDescriptionBlockContent>
     */
    #[ORM\OneToMany(mappedBy: 'productTranslation', cascade: ['persist', 'remove'], targetEntity: ProductDescriptionBlockContent::class)]
    private Collection $productDescriptionBlockContents;

    public function __construct()
    {
        $this->productDescriptionBlockContents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductDescriptionTemplate(): ?ProductDescriptionTemplate
    {
        return $this->productDescriptionTemplate;
    }

    public function setProductDescriptionTemplate(?ProductDescriptionTemplate $productDescriptionTemplate): static
    {
        $this->productDescriptionTemplate = $productDescriptionTemplate;

        return $this;
    }

    /**
     * @return Collection<int, ProductDescriptionBlockContent>
     */
    public function getProductDescriptionBlockContents(): Collection
    {
        return $this->productDescriptionBlockContents;
    }

    public function addProductDescriptionBlockContent(ProductDescriptionBlockContent $productDescriptionBlockContent): static
    {
        if (!$this->productDescriptionBlockContents->contains($productDescriptionBlockContent)) {
            $this->productDescriptionBlockContents->add($productDescriptionBlockContent);
            $productDescriptionBlockContent->setProductTranslation($this);
        }

        return $this;
    }

    public function removeProductDescriptionBlockContent(ProductDescriptionBlockContent $productDescriptionBlockContent): static
    {
        if ($this->productDescriptionBlockContents->removeElement($productDescriptionBlockContent)) {
            // set the owning side to null (unless already changed)
            if ($productDescriptionBlockContent->getProductTranslation() === $this) {
                $productDescriptionBlockContent->setProductTranslation(null);
            }
        }

        return $this;
    }
}
