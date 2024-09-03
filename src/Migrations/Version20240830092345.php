<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240830092345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categoryoutfit_taxon DROP FOREIGN KEY FK_2085C7C2372C229E');
        $this->addSql('ALTER TABLE categoryoutfit_taxon DROP FOREIGN KEY FK_2085C7C2DE13F470');
        $this->addSql('DROP TABLE categoryoutfit_taxon');
        $this->addSql('ALTER TABLE sylius_category_outfit ADD taxons_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_category_outfit ADD CONSTRAINT FK_17594D44B7AADFED FOREIGN KEY (taxons_id) REFERENCES sylius_taxon (id)');
        $this->addSql('CREATE INDEX IDX_17594D44B7AADFED ON sylius_category_outfit (taxons_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoryoutfit_taxon (categoryoutfit_id INT NOT NULL, taxon_id INT NOT NULL, INDEX IDX_2085C7C2372C229E (categoryoutfit_id), INDEX IDX_2085C7C2DE13F470 (taxon_id), PRIMARY KEY(categoryoutfit_id, taxon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categoryoutfit_taxon ADD CONSTRAINT FK_2085C7C2372C229E FOREIGN KEY (categoryoutfit_id) REFERENCES sylius_category_outfit (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoryoutfit_taxon ADD CONSTRAINT FK_2085C7C2DE13F470 FOREIGN KEY (taxon_id) REFERENCES sylius_taxon (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_category_outfit DROP FOREIGN KEY FK_17594D44B7AADFED');
        $this->addSql('DROP INDEX IDX_17594D44B7AADFED ON sylius_category_outfit');
        $this->addSql('ALTER TABLE sylius_category_outfit DROP taxons_id');
    }
}
