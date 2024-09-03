<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240829135610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_taxon ADD categoryOutfit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_taxon ADD CONSTRAINT FK_CFD811CAB5DDA03D FOREIGN KEY (categoryOutfit_id) REFERENCES sylius_category_outfit (id)');
        $this->addSql('CREATE INDEX IDX_CFD811CAB5DDA03D ON sylius_taxon (categoryOutfit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_taxon DROP FOREIGN KEY FK_CFD811CAB5DDA03D');
        $this->addSql('DROP INDEX IDX_CFD811CAB5DDA03D ON sylius_taxon');
        $this->addSql('ALTER TABLE sylius_taxon DROP categoryOutfit_id');
    }
}
