<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240829133448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_category_outfit DROP FOREIGN KEY FK_17594D44DE13F470');
        $this->addSql('DROP INDEX IDX_17594D44DE13F470 ON sylius_category_outfit');
        $this->addSql('ALTER TABLE sylius_category_outfit DROP taxon_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_category_outfit ADD taxon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_category_outfit ADD CONSTRAINT FK_17594D44DE13F470 FOREIGN KEY (taxon_id) REFERENCES sylius_taxon (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_17594D44DE13F470 ON sylius_category_outfit (taxon_id)');
    }
}
