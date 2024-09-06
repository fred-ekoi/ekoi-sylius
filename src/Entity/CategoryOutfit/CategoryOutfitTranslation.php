<?php

namespace App\Entity\CategoryOutfit;

use App\Repository\CategoryOutfit\CategoryOutfitTranslationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ImageAwareInterface;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Resource\Model\AbstractTranslation;
use Sylius\Component\Resource\Model\ResourceInterface;

#[ORM\Entity(repositoryClass: CategoryOutfitTranslationRepository::class)]
#[ORM\Table(name: 'sylius_category_outfit_translation')]
class CategoryOutfitTranslation extends AbstractTranslation implements ImageAwareInterface, ResourceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'owner', cascade: ['persist', 'remove'])]
    private ?CategoryOutfitImage $image = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImage(): ?CategoryOutfitImage
    {
        return $this->image;
    }

    public function setImage(?ImageInterface $categoryOutfitImage): void
    {
        $categoryOutfitImage?->setOwner($this);

        $this->image = $categoryOutfitImage;
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
