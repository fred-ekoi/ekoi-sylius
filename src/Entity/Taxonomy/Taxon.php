<?php

declare(strict_types=1);

namespace App\Entity\Taxonomy;

use App\Entity\CategoryPromotion\CategoryPromotion;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Model\Taxon as BaseTaxon;
use Sylius\Component\Taxonomy\Model\TaxonTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_taxon")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_taxon')]
class Taxon extends BaseTaxon
{
    /**
     * @var Collection<int, CategoryPromotion>
     */
    #[ORM\ManyToMany(targetEntity: CategoryPromotion::class, mappedBy: 'taxons')]
    private Collection $categoryPromotions;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\OneToOne(mappedBy: 'owner', cascade: ['persist', 'remove'])]
    private ?TaxonPageImage $image = null;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

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
}
