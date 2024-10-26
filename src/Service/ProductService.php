<?php

namespace App\Service;

use App\Entity\Locale\Locale;
use App\Entity\Product\Product;
use App\Entity\Product\ProductDescriptionBlockContent;
use App\Entity\Product\ProductDescriptionBlockContentImage;
use App\Entity\Product\ProductDescriptionTemplateBlock;
use App\Entity\Product\ProductTranslation;
use App\Enum\BlockType;
use App\Form\Type\ProductDescriptionBlockContentType;
use App\Repository\Product\ProductDescriptionBlockContentRepository;
use Doctrine\ORM\EntityManagerInterface;
use stdClass;

class ProductService 
{
    private $entityManager;
    private $productDescriptionBlockContentRepository;

    public function __construct(ProductDescriptionBlockContentRepository $productDescriptionBlockContentRepository, EntityManagerInterface $entityManager)
    {
        $this->productDescriptionBlockContentRepository = $productDescriptionBlockContentRepository;
        $this->entityManager = $entityManager;
    }

    public function getProductDescriptionBlocks(Product $product, Locale $locale) : array
    {   
        $productTranslation = $product->getTranslation($locale->getCode());
        if ($productTranslation) {
            $productDescriptionTemplate = $productTranslation->getProductDescriptionTemplate();
            // if ($productDescriptionTemplate) {
                $blocks = [];
                foreach ($productDescriptionTemplate->getProductDescriptionTemplateBlocks() as $productDescriptionTemplateBlock) {
                    $blocks[$productDescriptionTemplateBlock->getSortOrder()] = [
                        // 'text' => $productDescriptionBlockContent->getText(),
                        'type' => $productDescriptionTemplateBlock->getType(),
                        'alignment' => $productDescriptionTemplateBlock->getAlignment(),
                        // 'image' => $productDescriptionBlockContent->getType() === BlockType::IMAGE ? $productDescriptionBlockContent->getProductDescriptionBlockContentImage()->getPath() : null,
                    ];
                    foreach ($productDescriptionTemplateBlock->getChildren() as $child) {
                        $blocks[$productDescriptionTemplateBlock->getSortOrder()]['children'][$child->getSortOrder()] = [
                            // 'text' => $productDescriptionBlockContent->getText(),
                            'type' => $child->getType(),
                            'alignment' => $child->getAlignment(),
                            // 'image' => $productDescriptionBlockContent->getType() === BlockType::IMAGE ? $productDescriptionBlockContent->getProductDescriptionBlockContentImage()->getPath() : null,
                        ];
                    }
                }
            // }
        }

        return $blocks ?? [];
    }

    public function getProductDescriptionBlockContent(ProductDescriptionTemplateBlock $productDescriptionTemplateBlock, ProductTranslation $productTranslation) : ProductDescriptionBlockContent
    {
        $productDescriptionBlockContent = $this->productDescriptionBlockContentRepository->findOneBy(['productTranslation' => $productTranslation->getId(), 'type' => $productDescriptionTemplateBlock->getType(), 'productDescriptionTemplateBlock' => null], ['id' => 'ASC']);
        if ($productTranslation->getProductDescriptionBlockContents()->isEmpty() || !$productDescriptionBlockContent) {
            return $this->createProductDescriptionBlockContent($productDescriptionTemplateBlock, $productTranslation);
        }
        $productDescriptionBlockContent->setProductDescriptionTemplateBlock($productDescriptionTemplateBlock);
        $this->entityManager->persist($productDescriptionBlockContent);
        $this->entityManager->flush();
        return $productDescriptionBlockContent;
    }

    public function createProductDescriptionBlockContent(ProductDescriptionTemplateBlock $templateBlock, ProductTranslation $productTranslation) : ProductDescriptionBlockContent
    {
        $productDescriptionBlockContent = new ProductDescriptionBlockContent();
        $productDescriptionBlockContent->setType($templateBlock->getType());
        $productDescriptionBlockContent->setProductDescriptionTemplateBlock($templateBlock);
        $productTranslation->addProductDescriptionBlockContent($productDescriptionBlockContent);

        return $productDescriptionBlockContent;
    }

    public function updateProductDescription(Product $product, stdClass $description) : ProductDescriptionBlockContent
    {
        foreach ($description as $locale => $blocks) {
            $productTranslation = $product->getTranslation($locale);
            foreach ($blocks as $templateBlockId =>$content) {
                $productDescriptionBlockContent = $this->productDescriptionBlockContentRepository->findOneBy(['productDescriptionTemplateBlock' => $templateBlockId, 'productTranslation' => $productTranslation]);

                switch ($productDescriptionBlockContent->getType()) {
                    case BlockType::TEXT:
                        $productDescriptionBlockContent->setText($content);
                        break;
                    case BlockType::IMAGE:
                        $productDescriptionBlockContentImage = $productDescriptionBlockContent->getProductDescriptionBlockContentImage();
                        if (!$productDescriptionBlockContentImage) {
                            $productDescriptionBlockContentImage = new ProductDescriptionBlockContentImage();
                            $productDescriptionBlockContent->setProductDescriptionBlockContentImage($productDescriptionBlockContentImage);
                        }
                        $productDescriptionBlockContentImage->setPath($content);
                        break;
                }
                
                $this->entityManager->persist($productDescriptionBlockContent);
            }
        }

        $this->entityManager->flush();
        return $productDescriptionBlockContent;
    }
}
