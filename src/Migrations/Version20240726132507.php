<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240726132507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_menu_item ADD taxon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_menu_item ADD CONSTRAINT FK_E71E91E2DE13F470 FOREIGN KEY (taxon_id) REFERENCES sylius_taxon (id)');
        $this->addSql('CREATE INDEX IDX_E71E91E2DE13F470 ON sylius_menu_item (taxon_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_menu_item DROP FOREIGN KEY FK_E71E91E2DE13F470');
        $this->addSql('DROP INDEX IDX_E71E91E2DE13F470 ON sylius_menu_item');
        $this->addSql('ALTER TABLE sylius_menu_item DROP taxon_id');
    }
}
