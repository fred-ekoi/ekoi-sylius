<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Product\Model\ProductOptionValue as BaseProductOptionValue;
use Sylius\Component\Product\Model\ProductOptionValueInterface;
use Sylius\Component\Product\Model\ProductOptionValueTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product_option_value")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_product_option_value')]
class ProductOptionValue extends BaseProductOptionValue implements ProductOptionValueInterface
{
    #[ORM\Column(name: 'color', type: 'string', nullable: true)]
    private $color;

    /**
     * Get the value of color
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * Set the value of color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }

    protected function createTranslation(): ProductOptionValueTranslationInterface
    {
        return new ProductOptionValueTranslation();
    }
}
