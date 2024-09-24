<?php

declare(strict_types=1);

namespace App\Entity\Menu;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Image;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_taxon_image")
 */
#[ORM\Entity]
#[ORM\Table(name: 'monsieurbiz_menu_item_image')]
class MenuItemImage extends Image
{
    #[ORM\OneToOne(inversedBy: 'image', cascade: ['persist', 'remove'], targetEntity: MenuItem::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    protected $owner = null;
}
