<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241025134118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE monsieurbiz_menu_item_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_805600107E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_productfeature (product_id INT NOT NULL, productfeature_id INT NOT NULL, INDEX IDX_D7F1AD6D4584665A (product_id), INDEX IDX_D7F1AD6D43D8AFE9 (productfeature_id), PRIMARY KEY(product_id, productfeature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_description_block_content (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT DEFAULT NULL, type VARCHAR(255) NOT NULL, productTranslation_id INT DEFAULT NULL, productDescriptionTemplateBlock_id INT DEFAULT NULL, INDEX IDX_ADF9550724730F21 (productTranslation_id), INDEX IDX_ADF95507C361AA95 (productDescriptionTemplateBlock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_description_block_content_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, path VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_883D0FDE7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_description_template (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_description_template_block (id INT AUTO_INCREMENT NOT NULL, template_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, alignment VARCHAR(255) DEFAULT NULL, sortOrder INT NOT NULL, INDEX IDX_DB8F0A885DA0FB8 (template_id), INDEX IDX_DB8F0A88727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_feature (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_feature_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, path VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8F63E8097E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item_image ADD CONSTRAINT FK_805600107E3C61F9 FOREIGN KEY (owner_id) REFERENCES monsieurbiz_menu_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_productfeature ADD CONSTRAINT FK_D7F1AD6D4584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_productfeature ADD CONSTRAINT FK_D7F1AD6D43D8AFE9 FOREIGN KEY (productfeature_id) REFERENCES sylius_product_feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_description_block_content ADD CONSTRAINT FK_ADF9550724730F21 FOREIGN KEY (productTranslation_id) REFERENCES sylius_product_translation (id)');
        $this->addSql('ALTER TABLE sylius_product_description_block_content ADD CONSTRAINT FK_ADF95507C361AA95 FOREIGN KEY (productDescriptionTemplateBlock_id) REFERENCES sylius_product_description_template_block (id)');
        $this->addSql('ALTER TABLE sylius_product_description_block_content_image ADD CONSTRAINT FK_883D0FDE7E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_product_description_block_content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_description_template_block ADD CONSTRAINT FK_DB8F0A885DA0FB8 FOREIGN KEY (template_id) REFERENCES sylius_product_description_template (id)');
        $this->addSql('ALTER TABLE sylius_product_description_template_block ADD CONSTRAINT FK_DB8F0A88727ACA70 FOREIGN KEY (parent_id) REFERENCES sylius_product_description_template_block (id)');
        $this->addSql('ALTER TABLE sylius_product_feature_image ADD CONSTRAINT FK_8F63E8097E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_product_feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_menu DROP FOREIGN KEY FK_A60CDF1AB213FA4');
        $this->addSql('ALTER TABLE sylius_menu_image DROP FOREIGN KEY FK_71CEBFDC7E3C61F9');
        $this->addSql('ALTER TABLE sylius_menu_item DROP FOREIGN KEY FK_93953FBECCD7E912');
        $this->addSql('ALTER TABLE sylius_menu_item DROP FOREIGN KEY FK_E71E91E2DE13F470');
        $this->addSql('ALTER TABLE sylius_menu_item DROP FOREIGN KEY FK_E71E91E2E98FE523');
        $this->addSql('ALTER TABLE sylius_menu_page DROP FOREIGN KEY FK_EC0F02DC24611D81');
        $this->addSql('ALTER TABLE sylius_menu_page DROP FOREIGN KEY FK_EC0F02DCCCD7E912');
        $this->addSql('DROP TABLE sylius_menu');
        $this->addSql('DROP TABLE sylius_menu_image');
        $this->addSql('DROP TABLE sylius_menu_item');
        $this->addSql('DROP TABLE sylius_menu_page');
        $this->addSql('ALTER TABLE monsieurbiz_menu ADD locale_id INT DEFAULT NULL, ADD isSystem TINYINT(1) DEFAULT 0 NOT NULL, DROP created_at, DROP updated_at, DROP is_system');
        $this->addSql('ALTER TABLE monsieurbiz_menu ADD CONSTRAINT FK_10683CB8E559DFD1 FOREIGN KEY (locale_id) REFERENCES sylius_locale (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_10683CB877153098 ON monsieurbiz_menu (code)');
        $this->addSql('CREATE INDEX IDX_10683CB8E559DFD1 ON monsieurbiz_menu (locale_id)');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP FOREIGN KEY FK_D472D900727ACA70');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP FOREIGN KEY FK_D472D900CCD7E912');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP created_at, DROP updated_at, CHANGE position position INT DEFAULT NULL, CHANGE target_blank targetBlank TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD CONSTRAINT FK_D472D900727ACA70 FOREIGN KEY (parent_id) REFERENCES monsieurbiz_menu_item (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD CONSTRAINT FK_D472D900CCD7E912 FOREIGN KEY (menu_id) REFERENCES monsieurbiz_menu (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE sylius_product_translation ADD productDescriptionTemplate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_translation ADD CONSTRAINT FK_105A908F5DFBA91 FOREIGN KEY (productDescriptionTemplate_id) REFERENCES sylius_product_description_template (id)');
        $this->addSql('CREATE INDEX IDX_105A908F5DFBA91 ON sylius_product_translation (productDescriptionTemplate_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_translation DROP FOREIGN KEY FK_105A908F5DFBA91');
        $this->addSql('CREATE TABLE sylius_menu (id INT AUTO_INCREMENT NOT NULL, lang_id INT NOT NULL, UNIQUE INDEX UNIQ_A60CDF1AB213FA4 (lang_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sylius_menu_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, path VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_71CEBFDC7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sylius_menu_item (id INT AUTO_INCREMENT NOT NULL, menu_id INT DEFAULT NULL, taxon_id INT DEFAULT NULL, position INT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, url VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, menuPage_id INT DEFAULT NULL, INDEX IDX_E71E91E2CCD7E912 (menu_id), INDEX IDX_E71E91E2DE13F470 (taxon_id), INDEX IDX_E71E91E2E98FE523 (menuPage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sylius_menu_page (id INT AUTO_INCREMENT NOT NULL, menu_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, menuItemParent_id INT DEFAULT NULL, INDEX IDX_EC0F02DCCCD7E912 (menu_id), UNIQUE INDEX UNIQ_EC0F02DC24611D81 (menuItemParent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE sylius_menu ADD CONSTRAINT FK_A60CDF1AB213FA4 FOREIGN KEY (lang_id) REFERENCES sylius_locale (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sylius_menu_image ADD CONSTRAINT FK_71CEBFDC7E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_menu_page (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_menu_item ADD CONSTRAINT FK_93953FBECCD7E912 FOREIGN KEY (menu_id) REFERENCES sylius_menu (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sylius_menu_item ADD CONSTRAINT FK_E71E91E2DE13F470 FOREIGN KEY (taxon_id) REFERENCES sylius_taxon (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sylius_menu_item ADD CONSTRAINT FK_E71E91E2E98FE523 FOREIGN KEY (menuPage_id) REFERENCES sylius_menu_page (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sylius_menu_page ADD CONSTRAINT FK_EC0F02DC24611D81 FOREIGN KEY (menuItemParent_id) REFERENCES sylius_menu_item (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sylius_menu_page ADD CONSTRAINT FK_EC0F02DCCCD7E912 FOREIGN KEY (menu_id) REFERENCES sylius_menu (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item_image DROP FOREIGN KEY FK_805600107E3C61F9');
        $this->addSql('ALTER TABLE product_productfeature DROP FOREIGN KEY FK_D7F1AD6D4584665A');
        $this->addSql('ALTER TABLE product_productfeature DROP FOREIGN KEY FK_D7F1AD6D43D8AFE9');
        $this->addSql('ALTER TABLE sylius_product_description_block_content DROP FOREIGN KEY FK_ADF9550724730F21');
        $this->addSql('ALTER TABLE sylius_product_description_block_content DROP FOREIGN KEY FK_ADF95507C361AA95');
        $this->addSql('ALTER TABLE sylius_product_description_block_content_image DROP FOREIGN KEY FK_883D0FDE7E3C61F9');
        $this->addSql('ALTER TABLE sylius_product_description_template_block DROP FOREIGN KEY FK_DB8F0A885DA0FB8');
        $this->addSql('ALTER TABLE sylius_product_description_template_block DROP FOREIGN KEY FK_DB8F0A88727ACA70');
        $this->addSql('ALTER TABLE sylius_product_feature_image DROP FOREIGN KEY FK_8F63E8097E3C61F9');
        $this->addSql('DROP TABLE monsieurbiz_menu_item_image');
        $this->addSql('DROP TABLE product_productfeature');
        $this->addSql('DROP TABLE sylius_product_description_block_content');
        $this->addSql('DROP TABLE sylius_product_description_block_content_image');
        $this->addSql('DROP TABLE sylius_product_description_template');
        $this->addSql('DROP TABLE sylius_product_description_template_block');
        $this->addSql('DROP TABLE sylius_product_feature');
        $this->addSql('DROP TABLE sylius_product_feature_image');
        $this->addSql('ALTER TABLE monsieurbiz_menu DROP FOREIGN KEY FK_10683CB8E559DFD1');
        $this->addSql('DROP INDEX UNIQ_10683CB877153098 ON monsieurbiz_menu');
        $this->addSql('DROP INDEX IDX_10683CB8E559DFD1 ON monsieurbiz_menu');
        $this->addSql('ALTER TABLE monsieurbiz_menu ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD is_system TINYINT(1) DEFAULT NULL, DROP locale_id, DROP isSystem');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP FOREIGN KEY FK_D472D900CCD7E912');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item DROP FOREIGN KEY FK_D472D900727ACA70');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE position position INT NOT NULL, CHANGE targetBlank target_blank TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD CONSTRAINT FK_D472D900CCD7E912 FOREIGN KEY (menu_id) REFERENCES monsieurbiz_menu (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE monsieurbiz_menu_item ADD CONSTRAINT FK_D472D900727ACA70 FOREIGN KEY (parent_id) REFERENCES monsieurbiz_menu_item (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP INDEX IDX_105A908F5DFBA91 ON sylius_product_translation');
        $this->addSql('ALTER TABLE sylius_product_translation DROP productDescriptionTemplate_id');
    }
}
