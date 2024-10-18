<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017074542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_description_block_content ADD productDescriptionTemplateBlock_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_description_block_content ADD CONSTRAINT FK_ADF95507C361AA95 FOREIGN KEY (productDescriptionTemplateBlock_id) REFERENCES sylius_product_description_template_block (id)');
        $this->addSql('CREATE INDEX IDX_ADF95507C361AA95 ON sylius_product_description_block_content (productDescriptionTemplateBlock_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_description_block_content DROP FOREIGN KEY FK_ADF95507C361AA95');
        $this->addSql('DROP INDEX IDX_ADF95507C361AA95 ON sylius_product_description_block_content');
        $this->addSql('ALTER TABLE sylius_product_description_block_content DROP productDescriptionTemplateBlock_id');
    }
}
