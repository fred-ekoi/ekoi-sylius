<?php

namespace App\Entity\Product;

use App\Repository\Product\ProductDescriptionTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

#[ORM\Entity(repositoryClass: ProductDescriptionTemplateRepository::class)]
#[ORM\Table(name: 'sylius_product_description_template')]
class ProductDescriptionTemplate implements ResourceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, ProductDescriptionTemplateBlock>
     */
    #[ORM\OneToMany(mappedBy: 'template', cascade: ['all'], orphanRemoval: true, targetEntity: ProductDescriptionTemplateBlock::class)]
    private Collection $productDescriptionTemplateBlocks;

    public function __construct()
    {
        $this->productDescriptionTemplateBlocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, ProductDescriptionTemplateBlock>
     */
    public function getProductDescriptionTemplateBlocks(): Collection
    {
        return $this->productDescriptionTemplateBlocks;
    }

    public function addProductDescriptionTemplateBlock(ProductDescriptionTemplateBlock $productDescriptionTemplateBlock): static
    {
        if (!$this->productDescriptionTemplateBlocks->contains($productDescriptionTemplateBlock)) {
            $this->productDescriptionTemplateBlocks->add($productDescriptionTemplateBlock);
            $productDescriptionTemplateBlock->setTemplate($this);
        }

        return $this;
    }

    public function removeProductDescriptionTemplateBlock(ProductDescriptionTemplateBlock $productDescriptionTemplateBlock): static
    {
        if ($this->productDescriptionTemplateBlocks->removeElement($productDescriptionTemplateBlock)) {
            // set the owning side to null (unless already changed)
            if ($productDescriptionTemplateBlock->getTemplate() === $this) {
                $productDescriptionTemplateBlock->setTemplate(null);
            }
        }

        return $this;
    }
}
