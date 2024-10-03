<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241001082536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_product_feature (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, productTranslation_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_E4BD7FE83DA5256D (image_id), INDEX IDX_E4BD7FE824730F21 (productTranslation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_feature_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8F63E8097E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_product_feature ADD CONSTRAINT FK_E4BD7FE83DA5256D FOREIGN KEY (image_id) REFERENCES sylius_product_feature_image (id)');
        $this->addSql('ALTER TABLE sylius_product_feature ADD CONSTRAINT FK_E4BD7FE824730F21 FOREIGN KEY (productTranslation_id) REFERENCES sylius_product_translation (id)');
        $this->addSql('ALTER TABLE sylius_product_feature_image ADD CONSTRAINT FK_8F63E8097E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_product_feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP label, DROP url');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_feature DROP FOREIGN KEY FK_E4BD7FE83DA5256D');
        $this->addSql('ALTER TABLE sylius_product_feature DROP FOREIGN KEY FK_E4BD7FE824730F21');
        $this->addSql('ALTER TABLE sylius_product_feature_image DROP FOREIGN KEY FK_8F63E8097E3C61F9');
        $this->addSql('DROP TABLE sylius_product_feature');
        $this->addSql('DROP TABLE sylius_product_feature_image');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD label VARCHAR(255) NOT NULL, ADD url VARCHAR(255) DEFAULT NULL');
    }
}
