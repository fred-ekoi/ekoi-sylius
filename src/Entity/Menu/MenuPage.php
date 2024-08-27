<?php

namespace App\Entity\Menu;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Menu\MenuPageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ImageAwareInterface;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

#[ORM\Entity(repositoryClass: MenuPageRepository::class)]
#[ORM\Table(name: 'sylius_menu_page')]
#[ApiResource]
class MenuPage implements ImageAwareInterface, ResourceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'menuPages')]
    private ?Menu $menu = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?MenuItem $menuItemParent = null;

    #[ORM\OneToOne(mappedBy: 'owner', cascade: ['persist', 'remove'])]
    private ?MenuPageImage $image = null;

    /**
     * @var Collection<int, MenuItem>
     */
    #[ORM\OneToMany(mappedBy: 'menuPage', targetEntity: MenuItem::class)]
    private Collection $menuItems;

    public function __construct()
    {
        $this->menuItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getMenuItemParent(): ?MenuItem
    {
        return $this->menuItemParent;
    }

    public function setMenuItemParent(?MenuItem $menuItemParent): static
    {
        $this->menuItemParent = $menuItemParent;

        return $this;
    }

    /**
     * @return Collection<int, MenuItem>
     */
    public function getMenuItems(): Collection
    {
        return $this->menuItems;
    }

    public function addMenuItem(MenuItem $menuItem): static
    {
        if (!$this->menuItems->contains($menuItem)) {
            $this->menuItems->add($menuItem);
            $menuItem->setMenuPage($this);
        }

        return $this;
    }

    public function removeMenuItem(MenuItem $menuItem): static
    {
        if ($this->menuItems->removeElement($menuItem)) {
            // set the owning side to null (unless already changed)
            if ($menuItem->getMenuPage() === $this) {
                $menuItem->setMenuPage(null);
            }
        }

        return $this;
    }

    public function getImage(): ?MenuPageImage
    {
        return $this->image;
    }

    public function setImage(?ImageInterface $menuPageImage): void
    {
        $menuPageImage?->setOwner($this);

        $this->image = $menuPageImage;
    }
}
