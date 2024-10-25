<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017073952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_description_block_content DROP FOREIGN KEY FK_ADF95507727ACA70');
        $this->addSql('DROP INDEX IDX_ADF95507727ACA70 ON sylius_product_description_block_content');
        $this->addSql('ALTER TABLE sylius_product_description_block_content DROP parent_id, DROP sortOrder, DROP alignment');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_description_block_content ADD parent_id INT DEFAULT NULL, ADD sortOrder INT NOT NULL, ADD alignment VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_description_block_content ADD CONSTRAINT FK_ADF95507727ACA70 FOREIGN KEY (parent_id) REFERENCES sylius_product_description_block_content (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_ADF95507727ACA70 ON sylius_product_description_block_content (parent_id)');
    }
}
