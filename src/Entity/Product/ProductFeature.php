<?php

namespace App\Entity\Product;

use App\Entity\Product\ProductFeatureTranslation;
use App\Repository\Product\ProductFeatureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

#[ORM\Table(name: 'sylius_product_feature')]
#[ORM\Entity(repositoryClass: ProductFeatureRepository::class)]
class ProductFeature implements ResourceInterface, TranslatableInterface
{

    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'owner', cascade: ['persist', 'remove'])]
    private ?ProductFeatureImage $image = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    public function __construct()
    {
        $this->initializeTranslationsCollection();
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?ProductFeatureImage
    {
        return $this->image;
    }

    public function setImage(?ProductFeatureImage $image): void
    {
        $image?->setOwner($this);
        $this->image = $image;
    }

    /**
     * {@inheritdoc}
     */
    protected function createTranslation():TranslationInterface
    {
        return new ProductFeatureTranslation();
    }

    public function getTitle(): ?string
    {
        return $this->getTranslation()->getTitle();
    }

    public function setTitle($title): static
    {
        $this->getTranslation()->setTitle($title);

        return $this;
    }

    public function getDescription()
    {
        return $this->getTranslation()->getDescription();
    }

    public function setDescription(string $description): static
    {
        $this->getTranslation()->setDescription($description);

        return $this;
    }
}
