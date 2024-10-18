<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241015084806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_product_description_block_content_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, path VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_883D0FDE7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_product_description_block_content_image ADD CONSTRAINT FK_883D0FDE7E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_product_description_block_content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_description_block_content DROP image');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_description_block_content_image DROP FOREIGN KEY FK_883D0FDE7E3C61F9');
        $this->addSql('DROP TABLE sylius_product_description_block_content_image');
        $this->addSql('ALTER TABLE sylius_product_description_block_content ADD image VARCHAR(255) DEFAULT NULL');
    }
}
