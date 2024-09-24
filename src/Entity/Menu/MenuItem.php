<?php

declare(strict_types=1);

namespace App\Entity\Menu;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Menu\MenuItemImage;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use MonsieurBiz\SyliusMenuPlugin\Entity\MenuInterface;
use MonsieurBiz\SyliusMenuPlugin\Entity\MenuItemInterface;
use MonsieurBiz\SyliusMenuPlugin\Entity\MenuItemTranslation;
use MonsieurBiz\SyliusMenuPlugin\Entity\MenuItemTranslationInterface;
use Sylius\Component\Core\Model\ImageAwareInterface;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;

#[ORM\Entity]
#[ORM\Table(name: 'monsieurbiz_menu_item')]
class MenuItem implements MenuItemInterface, ImageAwareInterface
{
    use TimestampableTrait;
    use TranslatableTrait {
        __construct as protected initializeTranslationsCollection;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected ?int $id = null;

    #[ORM\ManyToOne(targetEntity: MenuInterface::class, inversedBy: 'items')]
    #[ORM\JoinColumn(name: 'menu_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    protected ?MenuInterface $menu = null;

    /**
     * @var Collection<int, MenuItemInterface>|null
     */
    #[ORM\OneToMany(targetEntity: MenuItemInterface::class, mappedBy: 'parent', cascade: ['persist', 'remove'])]
    #[ORM\OrderBy(['position' => 'ASC'])]
    protected ?Collection $items = null;

    #[ORM\ManyToOne(targetEntity: MenuItemInterface::class, inversedBy: 'items')]
    #[ORM\JoinColumn(name: 'parent_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    protected ?MenuItemInterface $parent = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    protected ?int $position = null;

    #[ORM\Column(type: 'boolean')]
    protected bool $targetBlank = false;

    #[ORM\Column(type: 'boolean')]
    protected bool $noreferrer = false;

    #[ORM\Column(type: 'boolean')]
    protected bool $noopener = false;

    #[ORM\Column(type: 'boolean')]
    protected bool $nofollow = false;

    #[ORM\OneToOne(mappedBy: 'owner', cascade: ['persist', 'remove'])]
    private ?MenuItemImage $image = null;

    /**
     * MenuItem constructor.
     */
    public function __construct()
    {
        $this->initializeTranslationsCollection();
        $this->items = new ArrayCollection();
    }

    /**
     * @inheritdoc
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getMenu(): ?MenuInterface
    {
        return $this->menu;
    }

    /**
     * @inheritdoc
     */
    public function setMenu(?MenuInterface $menu): void
    {
        $this->menu = $menu;
        if (null !== $menu) {
            $menu->addItem($this);
        }
    }

    /**
     * @inheritdoc
     */
    public function getParent(): ?MenuItemInterface
    {
        return $this->parent;
    }

    /**
     * @inheritdoc
     */
    public function setParent(?MenuItemInterface $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @inheritdoc
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @inheritdoc
     */
    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }

    /**
     * @inheritdoc
     */
    public function getItems(): ?Collection
    {
        return $this->items;
    }

    /**
     * @inheritdoc
     */
    public function setItems(?Collection $items): void
    {
        $this->items = $items;
    }

    /**
     * @inheritdoc
     */
    public function hasItem(MenuItemInterface $item): bool
    {
        if (null === $this->items) {
            return false;
        }

        return $this->items->contains($item);
    }

    /**
     * @inheritdoc
     */
    public function addItem(MenuItemInterface $item): void
    {
        if (null !== $this->items && !$this->hasItem($item)) {
            $this->items->add($item);
        }
    }

    /**
     * @inheritdoc
     */
    public function removeItem(MenuItemInterface $item): void
    {
        if (null !== $this->items && $this->hasItem($item)) {
            $this->items->removeElement($item);
        }
    }

    public function isTargetBlank(): bool
    {
        return $this->targetBlank;
    }

    public function setTargetBlank(bool $targetBlank): void
    {
        $this->targetBlank = $targetBlank;
    }

    public function isNoreferrer(): bool
    {
        return $this->noreferrer;
    }

    public function setNoreferrer(bool $noreferrer): void
    {
        $this->noreferrer = $noreferrer;
    }

    public function isNoopener(): bool
    {
        return $this->noopener;
    }

    public function setNoopener(bool $noopener): void
    {
        $this->noopener = $noopener;
    }

    public function isNofollow(): bool
    {
        return $this->nofollow;
    }

    public function setNofollow(bool $nofollow): void
    {
        $this->nofollow = $nofollow;
    }

    /**
     * @inheritdoc
     */
    public function getLabel(): ?string
    {
        return $this->getTranslation()->getLabel();
    }

    /**
     * @inheritdoc
     */
    public function getUrl(): ?string
    {
        return $this->getTranslation()->getUrl();
    }

    /**
     * @inheritdoc
     */
    protected function createTranslation(): MenuItemTranslationInterface
    {
        return new MenuItemTranslation();
    }

    public function getImage(): ?MenuItemImage
    {
        return $this->image;
    }

    public function setImage(?ImageInterface $menuItemImage): void
    {
        $menuItemImage?->setOwner($this);

        $this->image = $menuItemImage;
    }
}

