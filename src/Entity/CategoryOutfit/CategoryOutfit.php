<?php

namespace App\Entity\CategoryOutfit;

use App\Entity\Product\Product;
use App\Entity\Taxonomy\Taxon;
use App\Repository\CategoryOutfit\CategoryOutfitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

#[ORM\Entity(repositoryClass: CategoryOutfitRepository::class)]
#[ORM\Table(name: 'sylius_category_outfit')]
class CategoryOutfit implements ResourceInterface, TranslatableInterface
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
    #[ORM\OneToMany(mappedBy: 'categoryOutfit', targetEntity: Taxon::class, cascade: ['all'])]
    private Collection $taxons;

    /**
     * @var Collection<int, Product>
     */
    #[ORM\ManyToMany(targetEntity: Product::class)]
    private Collection $products;

    public function __construct()
    {
        $this->initializeTranslationsCollection();

        $this->taxons = new ArrayCollection();
        $this->products = new ArrayCollection();
        
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    protected function createTranslation():TranslationInterface
    {
        return new CategoryOutfitTranslation();
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

    public function getDescription(): ?string
    {
        return $this->getTranslation()->getDescription();
    }

    public function setDescription($description): static
    {
        $this->getTranslation()->setDescription($description);

        return $this;
    }

    public function getCategoryOutfitImage()
    {
        return $this->getTranslation()->getCategoryOutfitImage();
    }

    public function setCategoryOutfitImage($categoryOutfitImage): static
    {
        $this->getTranslation()->setCategoryOutfitImage($categoryOutfitImage);

        return $this;
    }

    /**
     * @return Collection<int, Taxon>
     */
    public function getTaxons(): Collection
    {
        return $this->taxons;
    }

    /**
     * @return Collection<int, Taxon>
     */
    public function setTaxons($taxons): static
    {
        dd($taxons);
        return $this->taxons;
    }

    public function addTaxon(Taxon $taxon): static
    {
        if (!$this->taxons->contains($taxon)) {
            $this->taxons->add($taxon);
            $taxon->setCategoryOutfit($this);
        }

        return $this;
    }

    public function removeTaxon(Taxon $taxon): static
    {
        if ($this->taxons->removeElement($taxon)) {
            // set the owning side to null (unless already changed)
            if ($taxon->getCategoryOutfit() === $this) {
                $taxon->setCategoryOutfit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        $this->products->removeElement($product);

        return $this;
    }
}
