<?php

declare(strict_types=1);

namespace App\Entity\Menu;

use App\Entity\Locale\Locale;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use MonsieurBiz\SyliusMenuPlugin\Entity\MenuInterface;
use MonsieurBiz\SyliusMenuPlugin\Entity\MenuItemInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\TimestampableTrait;

#[ORM\Entity]
#[ORM\Table(name: 'monsieurbiz_menu')]
class Menu implements MenuInterface
{
    use TimestampableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, unique: true, nullable: true)]
    protected ?string $code = null;

    /**
     * @var Collection<int, MenuItemInterface>|null
     */
    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: MenuItemInterface::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    protected ?Collection $items;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    protected ?bool $isSystem = false;

    #[ORM\ManyToOne(inversedBy: 'menus', cascade: ['persist', 'remove'])]
    private ?Locale $locale = null;

    /**
     * Menu constructor.
     */
    public function __construct()
    {
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
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @inheritdoc
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
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
    public function getFirstLevelItems(): array
    {
        $items = $this->getItems();
        if (null === $items) {
            return [];
        }
        $filteredItems = $items->filter(function (MenuItemInterface $item) {
            return !$item->getParent();
        })->toArray();

        uasort($filteredItems, function ($itemA, $itemB) {
            return $itemA->getPosition() <=> $itemB->getPosition();
        });

        return array_values($filteredItems);
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

    /**
     * @inheritdoc
     */
    public function isSystem(): ?bool
    {
        return $this->isSystem;
    }

    /**
     * @inheritdoc
     */
    public function setIsSystem(?bool $isSystem): void
    {
        $this->isSystem = $isSystem;
    }

    public function getLocale(): ?Locale
    {
        return $this->locale;
    }

    public function setLocale(?Locale $locale): static
    {
        $this->locale = $locale;

        return $this;
    }
}
