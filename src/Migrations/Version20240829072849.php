<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240829072849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoryoutfit_taxon (categoryoutfit_id INT NOT NULL, taxon_id INT NOT NULL, INDEX IDX_2085C7C2372C229E (categoryoutfit_id), INDEX IDX_2085C7C2DE13F470 (taxon_id), PRIMARY KEY(categoryoutfit_id, taxon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categoryoutfit_taxon ADD CONSTRAINT FK_2085C7C2372C229E FOREIGN KEY (categoryoutfit_id) REFERENCES sylius_category_outfit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoryoutfit_taxon ADD CONSTRAINT FK_2085C7C2DE13F470 FOREIGN KEY (taxon_id) REFERENCES sylius_taxon (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categoryoutfit_taxon DROP FOREIGN KEY FK_2085C7C2372C229E');
        $this->addSql('ALTER TABLE categoryoutfit_taxon DROP FOREIGN KEY FK_2085C7C2DE13F470');
        $this->addSql('DROP TABLE categoryoutfit_taxon');
    }
}
