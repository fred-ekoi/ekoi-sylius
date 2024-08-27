<?php

declare(strict_types=1);

namespace App\Entity\Taxonomy;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Image;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_taxon_page_image")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_taxon_page_image')]
class TaxonPageImage extends Image
{
    #[ORM\OneToOne(inversedBy: 'image', cascade: ['persist', 'remove'], targetEntity: Taxon::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    protected $owner = null;

    public function getTaxon(): ?Taxon
    {
        return $this->owner;
    }

    public function setTaxon(?Taxon $taxon)
    {
        $this->owner = $taxon;
    }
}
