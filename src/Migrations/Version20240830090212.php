<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240830090212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoryoutfit_taxon (categoryoutfit_id INT NOT NULL, taxon_id INT NOT NULL, INDEX IDX_2085C7C2372C229E (categoryoutfit_id), INDEX IDX_2085C7C2DE13F470 (taxon_id), PRIMARY KEY(categoryoutfit_id, taxon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoryoutfit_locale (categoryoutfit_id INT NOT NULL, locale_id INT NOT NULL, INDEX IDX_7595FD80372C229E (categoryoutfit_id), INDEX IDX_7595FD80E559DFD1 (locale_id), PRIMARY KEY(categoryoutfit_id, locale_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categoryoutfit_taxon ADD CONSTRAINT FK_2085C7C2372C229E FOREIGN KEY (categoryoutfit_id) REFERENCES sylius_category_outfit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoryoutfit_taxon ADD CONSTRAINT FK_2085C7C2DE13F470 FOREIGN KEY (taxon_id) REFERENCES sylius_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoryoutfit_locale ADD CONSTRAINT FK_7595FD80372C229E FOREIGN KEY (categoryoutfit_id) REFERENCES sylius_category_outfit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoryoutfit_locale ADD CONSTRAINT FK_7595FD80E559DFD1 FOREIGN KEY (locale_id) REFERENCES sylius_locale (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoryoutfit_product DROP FOREIGN KEY FK_C01289C0372C229E');
        $this->addSql('ALTER TABLE categoryoutfit_product DROP FOREIGN KEY FK_C01289C04584665A');
        $this->addSql('DROP TABLE categoryoutfit_product');
        $this->addSql('ALTER TABLE sylius_category_outfit ADD displayFrom DATE DEFAULT NULL, ADD displayTo DATE DEFAULT NULL, ADD position INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_category_outfit_translation DROP subtitle');
        $this->addSql('ALTER TABLE sylius_taxon DROP FOREIGN KEY FK_CFD811CAB5DDA03D');
        $this->addSql('DROP INDEX IDX_CFD811CAB5DDA03D ON sylius_taxon');
        $this->addSql('ALTER TABLE sylius_taxon DROP categoryOutfit_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoryoutfit_product (categoryoutfit_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_C01289C0372C229E (categoryoutfit_id), INDEX IDX_C01289C04584665A (product_id), PRIMARY KEY(categoryoutfit_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categoryoutfit_product ADD CONSTRAINT FK_C01289C0372C229E FOREIGN KEY (categoryoutfit_id) REFERENCES sylius_category_outfit (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoryoutfit_product ADD CONSTRAINT FK_C01289C04584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoryoutfit_taxon DROP FOREIGN KEY FK_2085C7C2372C229E');
        $this->addSql('ALTER TABLE categoryoutfit_taxon DROP FOREIGN KEY FK_2085C7C2DE13F470');
        $this->addSql('ALTER TABLE categoryoutfit_locale DROP FOREIGN KEY FK_7595FD80372C229E');
        $this->addSql('ALTER TABLE categoryoutfit_locale DROP FOREIGN KEY FK_7595FD80E559DFD1');
        $this->addSql('DROP TABLE categoryoutfit_taxon');
        $this->addSql('DROP TABLE categoryoutfit_locale');
        $this->addSql('ALTER TABLE sylius_category_outfit DROP displayFrom, DROP displayTo, DROP position');
        $this->addSql('ALTER TABLE sylius_category_outfit_translation ADD subtitle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sylius_taxon ADD categoryOutfit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_taxon ADD CONSTRAINT FK_CFD811CAB5DDA03D FOREIGN KEY (categoryOutfit_id) REFERENCES sylius_category_outfit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_CFD811CAB5DDA03D ON sylius_taxon (categoryOutfit_id)');
    }
}
