<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240903150349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_category_outfit (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoryoutfit_product (categoryoutfit_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_C01289C0372C229E (categoryoutfit_id), INDEX IDX_C01289C04584665A (product_id), PRIMARY KEY(categoryoutfit_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_category_outfit_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D4C3C99C7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_category_outfit_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_49CDADCC2C2AC5D3 (translatable_id), UNIQUE INDEX sylius_category_outfit_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_taxon_page_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_47C423697E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categoryoutfit_product ADD CONSTRAINT FK_C01289C0372C229E FOREIGN KEY (categoryoutfit_id) REFERENCES sylius_category_outfit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoryoutfit_product ADD CONSTRAINT FK_C01289C04584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_category_outfit_image ADD CONSTRAINT FK_D4C3C99C7E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_category_outfit_translation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_category_outfit_translation ADD CONSTRAINT FK_49CDADCC2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_category_outfit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_taxon_page_image ADD CONSTRAINT FK_47C423697E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_taxon ADD categoryOutfit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_taxon ADD CONSTRAINT FK_CFD811CAB5DDA03D FOREIGN KEY (categoryOutfit_id) REFERENCES sylius_category_outfit (id)');
        $this->addSql('CREATE INDEX IDX_CFD811CAB5DDA03D ON sylius_taxon (categoryOutfit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_taxon DROP FOREIGN KEY FK_CFD811CAB5DDA03D');
        $this->addSql('ALTER TABLE categoryoutfit_product DROP FOREIGN KEY FK_C01289C0372C229E');
        $this->addSql('ALTER TABLE categoryoutfit_product DROP FOREIGN KEY FK_C01289C04584665A');
        $this->addSql('ALTER TABLE sylius_category_outfit_image DROP FOREIGN KEY FK_D4C3C99C7E3C61F9');
        $this->addSql('ALTER TABLE sylius_category_outfit_translation DROP FOREIGN KEY FK_49CDADCC2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_taxon_page_image DROP FOREIGN KEY FK_47C423697E3C61F9');
        $this->addSql('DROP TABLE sylius_category_outfit');
        $this->addSql('DROP TABLE categoryoutfit_product');
        $this->addSql('DROP TABLE sylius_category_outfit_image');
        $this->addSql('DROP TABLE sylius_category_outfit_translation');
        $this->addSql('DROP TABLE sylius_taxon_page_image');
        $this->addSql('DROP INDEX IDX_CFD811CAB5DDA03D ON sylius_taxon');
        $this->addSql('ALTER TABLE sylius_taxon DROP categoryOutfit_id');
    }
}
