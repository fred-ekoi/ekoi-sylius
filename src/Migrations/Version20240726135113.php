<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240726135113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_menu_item ADD menuPage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_menu_item ADD CONSTRAINT FK_E71E91E2E98FE523 FOREIGN KEY (menuPage_id) REFERENCES sylius_menu_page (id)');
        $this->addSql('CREATE INDEX IDX_E71E91E2E98FE523 ON sylius_menu_item (menuPage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_menu_item DROP FOREIGN KEY FK_E71E91E2E98FE523');
        $this->addSql('DROP INDEX IDX_E71E91E2E98FE523 ON sylius_menu_item');
        $this->addSql('ALTER TABLE sylius_menu_item DROP menuPage_id');
    }
}
