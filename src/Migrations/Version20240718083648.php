<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240718083648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_menu_item CHANGE name title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sylius_menu_item RENAME INDEX idx_93953fbeccd7e912 TO IDX_E71E91E2CCD7E912');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_menu_item CHANGE title name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sylius_menu_item RENAME INDEX idx_e71e91e2ccd7e912 TO IDX_93953FBECCD7E912');
    }
}
