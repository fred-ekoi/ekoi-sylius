<?php

namespace App\Entity\CategoryPromotion;

use App\Entity\Locale\Locale;
use App\Entity\Taxonomy\Taxon;
use App\Repository\CategoryPromotion\CategoryPromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

#[ORM\Entity(repositoryClass: CategoryPromotionRepository::class)]
#[ORM\Table(name: 'sylius_category_promotion')]
class CategoryPromotion implements ResourceInterface, TranslatableInterface
{

    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Taxon>
     */
    #[ORM\ManyToMany(targetEntity: Taxon::class, inversedBy: 'categoryPromotions')]
    private Collection $taxons;

    /**
     * @var Collection<int, Locale>
     */
    #[ORM\ManyToMany(targetEntity: Locale::class)]
    private Collection $locales;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $displayFrom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $displayTo = null;

    #[ORM\Column]
    private ?int $position = null;

    public function __construct()
    {
        $this->initializeTranslationsCollection();

        $this->taxons = new ArrayCollection();
        $this->locales = new ArrayCollection();
        
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Taxon>
     */
    public function getTaxons(): Collection
    {
        return $this->taxons;
    }

    public function addTaxon(Taxon $taxon): static
    {
        if (!$this->taxons->contains($taxon)) {
            $this->taxons->add($taxon);
        }

        return $this;
    }

    public function removeTaxon(Taxon $taxon): static
    {
        $this->taxons->removeElement($taxon);

        return $this;
    }

    /**
     * @return Collection<int, Locale>
     */
    public function getLocales(): Collection
    {
        return $this->locales;
    }

    public function addLocale(Locale $locale): static
    {
        if (!$this->locales->contains($locale)) {
            $this->locales->add($locale);
        }

        return $this;
    }

    public function removeLocale(Locale $locale): static
    {
        $this->locales->removeElement($locale);

        return $this;
    }

    public function getDisplayFrom(): ?\DateTimeInterface
    {
        return $this->displayFrom;
    }

    public function setDisplayFrom(?\DateTimeInterface $displayFrom): static
    {
        $this->displayFrom = $displayFrom;

        return $this;
    }

    public function getDisplayTo(): ?\DateTimeInterface
    {
        return $this->displayTo;
    }

    public function setDisplayTo(?\DateTimeInterface $displayTo): static
    {
        $this->displayTo = $displayTo;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function createTranslation():TranslationInterface
    {
        return new CategoryPromotionTranslation();
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

    public function getImage()
    {
        return $this->getTranslation()->getImage();
    }

    public function setImage($image): static
    {
        $this->getTranslation()->setImage($image);

        return $this;
    }
}
