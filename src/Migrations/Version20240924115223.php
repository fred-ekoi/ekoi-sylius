<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240924115223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sylius_menu_item');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP FOREIGN KEY FK_D472D900727ACA70');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP FOREIGN KEY FK_D472D900CCD7E912');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP created_at, DROP updated_at, CHANGE position position INT DEFAULT NULL, CHANGE target_blank targetBlank TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD CONSTRAINT FK_D472D900727ACA70 FOREIGN KEY (parent_id) REFERENCES monsieurbiz_menu_item (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD CONSTRAINT FK_D472D900CCD7E912 FOREIGN KEY (menu_id) REFERENCES monsieurbiz_menu (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_menu_item (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', position INT NOT NULL, target_blank TINYINT(1) NOT NULL, noreferrer TINYINT(1) NOT NULL, noopener TINYINT(1) NOT NULL, nofollow TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP FOREIGN KEY FK_D472D900CCD7E912');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP FOREIGN KEY FK_D472D900727ACA70');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE position position INT NOT NULL, CHANGE targetBlank target_blank TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD CONSTRAINT FK_D472D900CCD7E912 FOREIGN KEY (menu_id) REFERENCES monsieurbiz_menu (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD CONSTRAINT FK_D472D900727ACA70 FOREIGN KEY (parent_id) REFERENCES monsieurbiz_menu_item (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
