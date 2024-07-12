<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Product\Model\ProductOption as BaseProductOption;
use Sylius\Component\Product\Model\ProductOptionInterface;
use Sylius\Component\Product\Model\ProductOptionTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product_option")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_product_option')]
class ProductOption extends BaseProductOption implements ProductOptionInterface
{

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private $isColor;

    /**
     * Get the value of isColor
     */
    public function isColor()
    {
        return $this->isColor;
    }

    /**
     * Set the value of isColor
     */
    public function setIsColor($isColor): void
    {
        $this->isColor = $isColor;
    }

    protected function createTranslation(): ProductOptionTranslationInterface
    {
        return new ProductOptionTranslation();
    }
}
