<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\Locale\Locale;
use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
#[ORM\Table(name: 'sylius_menu')]
#[ApiResource]

class Menu implements ResourceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Locale $lang = null;

    /**
     * @var Collection<int, MenuItem>
     */
    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: MenuItem::class)]
    private Collection $menuItems;

    /**
     * @var Collection<int, MenuPage>
     */
    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: MenuPage::class)]
    private Collection $menuPages;

    public function __construct()
    {
        $this->menuItems = new ArrayCollection();
        $this->menuPages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLang(): ?Locale
    {
        return $this->lang;
    }

    public function setLang(Locale $lang): static
    {
        $this->lang = $lang;

        return $this;
    }
    
    public function getLangName(): ?string
    {
        return $this->lang ? $this->lang->getName() : null;
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
            $menuItem->setMenu($this);
        }

        return $this;
    }

    public function removeMenuItem(MenuItem $menuItem): static
    {
        if ($this->menuItems->removeElement($menuItem)) {
            // set the owning side to null (unless already changed)
            if ($menuItem->getMenu() === $this) {
                $menuItem->setMenu(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MenuPage>
     */
    public function getMenuPages(): Collection
    {
        return $this->menuPages;
    }

    public function addMenuPage(MenuPage $menuPage): static
    {
        if (!$this->menuPages->contains($menuPage)) {
            $this->menuPages->add($menuPage);
            $menuPage->setMenu($this);
        }

        return $this;
    }

    public function removeMenuPage(MenuPage $menuPage): static
    {
        if ($this->menuPages->removeElement($menuPage)) {
            // set the owning side to null (unless already changed)
            if ($menuPage->getMenu() === $this) {
                $menuPage->setMenu(null);
            }
        }

        return $this;
    }
}
