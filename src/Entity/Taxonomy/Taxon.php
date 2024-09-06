<?php

declare(strict_types=1);

namespace App\Entity\Taxonomy;

use App\Entity\CategoryOutfit\CategoryOutfit;
use App\Entity\CategoryPromotion\CategoryPromotion;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ImageAwareInterface;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Model\Taxon as BaseTaxon;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Taxonomy\Model\TaxonTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_taxon")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_taxon')]
class Taxon extends BaseTaxon implements ImageAwareInterface, ResourceInterface
{
    /**
     * @var Collection<int, CategoryPromotion>
     */
    #[ORM\ManyToMany(targetEntity: CategoryPromotion::class, mappedBy: 'taxons')]
    private Collection $categoryPromotions;

    #[ORM\OneToOne(mappedBy: 'owner', cascade: ['persist', 'remove'])]
    private ?TaxonPageImage $image = null;

    #[ORM\ManyToOne(inversedBy: 'taxons')]
    private ?CategoryOutfit $categoryOutfit = null;

    public function __construct()
    {
        parent::__construct();
        $this->categoryPromotions = new ArrayCollection();
    }

    protected function createTranslation(): TaxonTranslationInterface
    {
        return new TaxonTranslation();
    }

    /**
     * @return Collection<int, CategoryPromotion>
     */
    public function getCategoryPromotions(): Collection
    {
        return $this->categoryPromotions;
    }

    public function addCategoryPromotion(CategoryPromotion $categoryPromotion): static
    {
        if (!$this->categoryPromotions->contains($categoryPromotion)) {
            $this->categoryPromotions->add($categoryPromotion);
            $categoryPromotion->addTaxon($this);
        }

        return $this;
    }

    public function removeCategoryPromotion(CategoryPromotion $categoryPromotion): static
    {
        if ($this->categoryPromotions->removeElement($categoryPromotion)) {
            $categoryPromotion->removeTaxon($this);
        }

        return $this;
    }

    public function getImage(): ?TaxonPageImage
    {
        return $this->image;
    }

    public function setImage(?ImageInterface $taxonPageImage): void
    {
        $taxonPageImage?->setOwner($this);

        $this->image = $taxonPageImage;
    }

    public function getCategoryOutfit(): ?CategoryOutfit
    {
        return $this->categoryOutfit;
    }

    public function setCategoryOutfit(?CategoryOutfit $categoryOutfit): static
    {
        $this->categoryOutfit = $categoryOutfit;

        return $this;
    }
}
