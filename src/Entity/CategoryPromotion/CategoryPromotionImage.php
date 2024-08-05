<?php

declare(strict_types=1);

namespace App\Entity\CategoryPromotion;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Image;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Form\FormTypeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_category_promotion_image')]
class CategoryPromotionImage extends Image implements CategoryPromotionImageInterface
{
}
