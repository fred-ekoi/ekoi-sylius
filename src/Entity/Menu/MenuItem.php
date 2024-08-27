<?php

namespace App\Entity\Menu;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\Taxonomy\Taxon;
use App\Repository\Menu\MenuItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

#[ORM\Entity(repositoryClass: MenuItemRepository::class)]
#[ORM\Table(name: 'sylius_menu_item')]
#[ApiResource]
class MenuItem implements ResourceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\ManyToOne(inversedBy: 'menuItems')]
    private ?Menu $menu = null;

    #[ORM\Column(nullable: true)]
    private ?string $url = null;

    #[ORM\ManyToOne]
    private ?Taxon $taxon = null;

    #[ORM\ManyToOne(inversedBy: 'menuItems')]
    private ?MenuPage $menuPage = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): static
    {
        $this->menu = $menu;

        return $this;
    }

    static function getTypes(): array
    {
        return [
            'Link' => 'link',
            'Category'=>'category',
        ];
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getTaxon(): ?Taxon
    {
        return $this->taxon;
    }

    public function setTaxon(?Taxon $taxon): static
    {
        $this->taxon = $taxon;

        return $this;
    }

    public function getMenuPage(): ?MenuPage
    {
        return $this->menuPage;
    }

    public function setMenuPage(?MenuPage $menuPage): static
    {
        $this->menuPage = $menuPage;

        return $this;
    }
}
