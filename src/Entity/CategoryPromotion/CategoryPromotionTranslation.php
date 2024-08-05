<?php

namespace App\Entity\CategoryPromotion;

use App\Repository\CategoryPromotion\CategoryPromotionTranslationRepository;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\AbstractTranslation;
use Sylius\Component\Resource\Model\ResourceInterface;

#[ORM\Entity(repositoryClass: CategoryPromotionTranslationRepository::class)]
#[ORM\Table(name: 'sylius_category_promotion_translation')]
class CategoryPromotionTranslation extends AbstractTranslation implements ResourceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?CategoryPromotionImage $image = null;

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

    public function getImage(): ?CategoryPromotionImage
    {
        return $this->image;
    }

    public function setImage(?CategoryPromotionImage $image): static
    {
        $this->image = $image;

        return $this;
    }
}
