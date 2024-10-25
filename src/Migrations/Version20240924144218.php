<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240924144218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monsieurbiz_menu ADD locale_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE monsieurbiz_menu ADD CONSTRAINT FK_10683CB8E559DFD1 FOREIGN KEY (locale_id) REFERENCES sylius_locale (id)');
        $this->addSql('CREATE INDEX IDX_10683CB8E559DFD1 ON monsieurbiz_menu (locale_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monsieurbiz_menu DROP FOREIGN KEY FK_10683CB8E559DFD1');
        $this->addSql('DROP INDEX IDX_10683CB8E559DFD1 ON monsieurbiz_menu');
        $this->addSql('ALTER TABLE monsieurbiz_menu DROP locale_id');
    }
}
