<?php

namespace App\Entity\Product;

use App\Enum\BlockAlign;
use App\Enum\BlockType;
use App\Repository\Product\ProductDescriptionTemplateBlockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductDescriptionTemplateBlockRepository::class)]
#[ORM\Table(name: 'sylius_product_description_template_block')]
class ProductDescriptionTemplateBlock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'productDescriptionTemplateBlocks')]
    private ?ProductDescriptionTemplate $template = null;

    #[ORM\Column(enumType: BlockType::class)]
    private ?BlockType $type = null;

    #[ORM\Column(nullable:true, enumType: BlockAlign::class)]
    private ?BlockAlign $alignment = null;

    #[ORM\Column]
    private ?int $sortOrder = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    private ?self $parent = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(mappedBy: 'parent', cascade: ['persist', 'remove'], targetEntity: self::class)]
    private Collection $children;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemplate(): ?ProductDescriptionTemplate
    {
        return $this->template;
    }

    public function setTemplate(?ProductDescriptionTemplate $template): static
    {
        $this->template = $template;

        return $this;
    }

    public function getType(): ?BlockType
    {
        return $this->type;
    }

    public function setType(BlockType $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getAlignment(): ?BlockAlign
    {
        return $this->alignment;
    }

    public function setAlignment(?BlockAlign $alignment): static
    {
        $this->alignment = $alignment;

        return $this;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    /**
     * @return Collection<int, self>
     */
    public function hasChildren(): bool
    {
        return !!$this->children;
    }

    public function addChild(self $child): static
    {
        if (!$this->children->contains($child)) {
            $this->children->add($child);
            $child->setParent($this);
        }

        return $this;
    }

    public function removeChild(self $child): static
    {
        if ($this->children->removeElement($child)) {
            // set the owning side to null (unless already changed)
            if ($child->getParent() === $this) {
                $child->setParent(null);
            }
        }

        return $this;
    }
}
