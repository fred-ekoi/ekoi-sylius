<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240920130930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE monsieurbiz_menu (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', code VARCHAR(255) DEFAULT NULL, is_system TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monsieurbiz_menu_item (id INT AUTO_INCREMENT NOT NULL, menu_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', position INT NOT NULL, target_blank TINYINT(1) NOT NULL, noreferrer TINYINT(1) NOT NULL, noopener TINYINT(1) NOT NULL, nofollow TINYINT(1) NOT NULL, INDEX IDX_D472D900CCD7E912 (menu_id), INDEX IDX_D472D900727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monsieurbiz_menu_item_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, locale VARCHAR(10) NOT NULL, url VARCHAR(255) DEFAULT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_2591643F2C2AC5D3 (translatable_id), UNIQUE INDEX monsieurbiz_menu_item_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD CONSTRAINT FK_D472D900CCD7E912 FOREIGN KEY (menu_id) REFERENCES monsieurbiz_menu (id)');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD CONSTRAINT FK_D472D900727ACA70 FOREIGN KEY (parent_id) REFERENCES monsieurbiz_menu_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item_translation ADD CONSTRAINT FK_2591643F2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES monsieurbiz_menu_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_menu_item_image DROP FOREIGN KEY FK_E484BA637E3C61F9');
        $this->addSql('DROP TABLE sylius_menu');
        $this->addSql('DROP TABLE sylius_menu_item');
        $this->addSql('DROP TABLE sylius_menu_item_image');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_menu (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sylius_menu_item (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sylius_menu_item_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, path VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_E484BA637E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE sylius_menu_item_image ADD CONSTRAINT FK_E484BA637E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_menu_item (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP FOREIGN KEY FK_D472D900CCD7E912');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP FOREIGN KEY FK_D472D900727ACA70');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item_translation DROP FOREIGN KEY FK_2591643F2C2AC5D3');
        $this->addSql('DROP TABLE monsieurbiz_menu');
        $this->addSql('DROP TABLE monsieurbiz_menu_item');
        $this->addSql('DROP TABLE monsieurbiz_menu_item_translation');
    }
}
