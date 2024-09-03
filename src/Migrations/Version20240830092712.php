<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240830092712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_category_outfit DROP FOREIGN KEY FK_17594D44B7AADFED');
        $this->addSql('DROP INDEX IDX_17594D44B7AADFED ON sylius_category_outfit');
        $this->addSql('ALTER TABLE sylius_category_outfit DROP taxons_id');
        $this->addSql('ALTER TABLE sylius_taxon ADD categoryOutfit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_taxon ADD CONSTRAINT FK_CFD811CAB5DDA03D FOREIGN KEY (categoryOutfit_id) REFERENCES sylius_category_outfit (id)');
        $this->addSql('CREATE INDEX IDX_CFD811CAB5DDA03D ON sylius_taxon (categoryOutfit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_category_outfit ADD taxons_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_category_outfit ADD CONSTRAINT FK_17594D44B7AADFED FOREIGN KEY (taxons_id) REFERENCES sylius_taxon (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_17594D44B7AADFED ON sylius_category_outfit (taxons_id)');
        $this->addSql('ALTER TABLE sylius_taxon DROP FOREIGN KEY FK_CFD811CAB5DDA03D');
        $this->addSql('DROP INDEX IDX_CFD811CAB5DDA03D ON sylius_taxon');
        $this->addSql('ALTER TABLE sylius_taxon DROP categoryOutfit_id');
    }
}
