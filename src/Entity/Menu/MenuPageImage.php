<?php

declare(strict_types=1);

namespace App\Entity\Menu;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Image;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Form\FormTypeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_menu_image')]
class MenuPageImage extends Image
{
    #[ORM\OneToOne(inversedBy: 'image', cascade: ['persist', 'remove'], targetEntity: MenuPage::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    protected $owner = null;
}
