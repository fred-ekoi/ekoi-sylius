<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240725110528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_menu_page (id INT AUTO_INCREMENT NOT NULL, menu_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, menuItemParent_id INT DEFAULT NULL, INDEX IDX_EC0F02DCCCD7E912 (menu_id), UNIQUE INDEX UNIQ_EC0F02DC24611D81 (menuItemParent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_menu_page ADD CONSTRAINT FK_EC0F02DCCCD7E912 FOREIGN KEY (menu_id) REFERENCES sylius_menu (id)');
        $this->addSql('ALTER TABLE sylius_menu_page ADD CONSTRAINT FK_EC0F02DC24611D81 FOREIGN KEY (menuItemParent_id) REFERENCES sylius_menu_item (id)');
        $this->addSql('ALTER TABLE MenuPage DROP FOREIGN KEY FK_9884AC8024611D81');
        $this->addSql('ALTER TABLE MenuPage DROP FOREIGN KEY FK_9884AC80CCD7E912');
        $this->addSql('DROP TABLE MenuPage');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE MenuPage (id INT AUTO_INCREMENT NOT NULL, menu_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, menuItemParent_id INT DEFAULT NULL, INDEX IDX_9884AC80CCD7E912 (menu_id), UNIQUE INDEX UNIQ_9884AC8024611D81 (menuItemParent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE MenuPage ADD CONSTRAINT FK_9884AC8024611D81 FOREIGN KEY (menuItemParent_id) REFERENCES sylius_menu_item (id)');
        $this->addSql('ALTER TABLE MenuPage ADD CONSTRAINT FK_9884AC80CCD7E912 FOREIGN KEY (menu_id) REFERENCES sylius_menu (id)');
        $this->addSql('ALTER TABLE sylius_menu_page DROP FOREIGN KEY FK_EC0F02DCCCD7E912');
        $this->addSql('ALTER TABLE sylius_menu_page DROP FOREIGN KEY FK_EC0F02DC24611D81');
        $this->addSql('DROP TABLE sylius_menu_page');
    }
}
