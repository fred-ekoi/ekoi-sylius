<?php

namespace App\Entity\Product;

use App\Enum\BlockAlign;
use App\Enum\BlockType;
use App\Repository\Product\ProductDescriptionBlockContentRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductDescriptionBlockContentRepository::class)]
#[ORM\Table(name: 'sylius_product_description_block_content')]
class ProductDescriptionBlockContent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'productDescriptionBlockContents')]
    private ?ProductTranslation $productTranslation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $text = null;

    #[ORM\OneToOne(mappedBy: 'owner', cascade: ['persist', 'remove'])]
    private ?ProductDescriptionBlockContentImage $image = null;

    #[ORM\Column(enumType: BlockType::class)]
    private ?BlockType $type = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?ProductDescriptionTemplateBlock $productDescriptionTemplateBlock = null;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getProductDescriptionBlockContentImage(): ?ProductDescriptionBlockContentImage
    {
        return $this->image;
    }

    public function setProductDescriptionBlockContentImage(?ProductDescriptionBlockContentImage $image): static
    {
        $image->setOwner($this);
        $this->image = $image;

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

    public function getProductDescriptionTemplateBlock(): ?ProductDescriptionTemplateBlock
    {
        return $this->productDescriptionTemplateBlock;
    }

    public function setProductDescriptionTemplateBlock(?ProductDescriptionTemplateBlock $productDescriptionTemplateBlock): static
    {
        $this->productDescriptionTemplateBlock = $productDescriptionTemplateBlock;

        return $this;
    }
}
