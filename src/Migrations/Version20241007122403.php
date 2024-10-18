<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241007122403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_product_description (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, productDescriptionTemplate_id INT DEFAULT NULL, INDEX IDX_D888AC41F5DFBA91 (productDescriptionTemplate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_description_block_content (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, productDescription_id INT DEFAULT NULL, productDescriptionTemplateBlock_id INT NOT NULL, INDEX IDX_ADF95507B546B26F (productDescription_id), INDEX IDX_ADF95507C361AA95 (productDescriptionTemplateBlock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_description_template (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_description_template_block (id INT AUTO_INCREMENT NOT NULL, template_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, alignment VARCHAR(255) NOT NULL, sortOrder INT NOT NULL, INDEX IDX_DB8F0A885DA0FB8 (template_id), INDEX IDX_DB8F0A88727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_product_description ADD CONSTRAINT FK_D888AC41F5DFBA91 FOREIGN KEY (productDescriptionTemplate_id) REFERENCES sylius_product_description_template (id)');
        $this->addSql('ALTER TABLE sylius_product_description_block_content ADD CONSTRAINT FK_ADF95507B546B26F FOREIGN KEY (productDescription_id) REFERENCES sylius_product_description (id)');
        $this->addSql('ALTER TABLE sylius_product_description_block_content ADD CONSTRAINT FK_ADF95507C361AA95 FOREIGN KEY (productDescriptionTemplateBlock_id) REFERENCES sylius_product_description_template_block (id)');
        $this->addSql('ALTER TABLE sylius_product_description_template_block ADD CONSTRAINT FK_DB8F0A885DA0FB8 FOREIGN KEY (template_id) REFERENCES sylius_product_description_template (id)');
        $this->addSql('ALTER TABLE sylius_product_description_template_block ADD CONSTRAINT FK_DB8F0A88727ACA70 FOREIGN KEY (parent_id) REFERENCES sylius_product_description_template_block (id)');
        $this->addSql('ALTER TABLE ProductDescription DROP FOREIGN KEY FK_4612D892F5DFBA91');
        $this->addSql('ALTER TABLE ProductDescriptionBlockContent DROP FOREIGN KEY FK_227F5DE0B546B26F');
        $this->addSql('ALTER TABLE ProductDescriptionBlockContent DROP FOREIGN KEY FK_227F5DE0C361AA95');
        $this->addSql('ALTER TABLE ProductDescriptionTemplateBlock DROP FOREIGN KEY FK_32F0D6DC5DA0FB8');
        $this->addSql('ALTER TABLE ProductDescriptionTemplateBlock DROP FOREIGN KEY FK_32F0D6DC727ACA70');
        $this->addSql('DROP TABLE ProductDescription');
        $this->addSql('DROP TABLE ProductDescriptionBlockContent');
        $this->addSql('DROP TABLE ProductDescriptionTemplate');
        $this->addSql('DROP TABLE ProductDescriptionTemplateBlock');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ProductDescription (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, productDescriptionTemplate_id INT DEFAULT NULL, INDEX IDX_4612D892F5DFBA91 (productDescriptionTemplate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ProductDescriptionBlockContent (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, productDescription_id INT DEFAULT NULL, productDescriptionTemplateBlock_id INT NOT NULL, INDEX IDX_227F5DE0B546B26F (productDescription_id), INDEX IDX_227F5DE0C361AA95 (productDescriptionTemplateBlock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ProductDescriptionTemplate (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ProductDescriptionTemplateBlock (id INT AUTO_INCREMENT NOT NULL, template_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, alignment VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, sortOrder INT NOT NULL, INDEX IDX_32F0D6DC5DA0FB8 (template_id), INDEX IDX_32F0D6DC727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ProductDescription ADD CONSTRAINT FK_4612D892F5DFBA91 FOREIGN KEY (productDescriptionTemplate_id) REFERENCES ProductDescriptionTemplate (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ProductDescriptionBlockContent ADD CONSTRAINT FK_227F5DE0B546B26F FOREIGN KEY (productDescription_id) REFERENCES ProductDescription (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ProductDescriptionBlockContent ADD CONSTRAINT FK_227F5DE0C361AA95 FOREIGN KEY (productDescriptionTemplateBlock_id) REFERENCES ProductDescriptionTemplateBlock (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ProductDescriptionTemplateBlock ADD CONSTRAINT FK_32F0D6DC5DA0FB8 FOREIGN KEY (template_id) REFERENCES ProductDescriptionTemplate (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ProductDescriptionTemplateBlock ADD CONSTRAINT FK_32F0D6DC727ACA70 FOREIGN KEY (parent_id) REFERENCES ProductDescriptionTemplateBlock (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sylius_product_description DROP FOREIGN KEY FK_D888AC41F5DFBA91');
        $this->addSql('ALTER TABLE sylius_product_description_block_content DROP FOREIGN KEY FK_ADF95507B546B26F');
        $this->addSql('ALTER TABLE sylius_product_description_block_content DROP FOREIGN KEY FK_ADF95507C361AA95');
        $this->addSql('ALTER TABLE sylius_product_description_template_block DROP FOREIGN KEY FK_DB8F0A885DA0FB8');
        $this->addSql('ALTER TABLE sylius_product_description_template_block DROP FOREIGN KEY FK_DB8F0A88727ACA70');
        $this->addSql('DROP TABLE sylius_product_description');
        $this->addSql('DROP TABLE sylius_product_description_block_content');
        $this->addSql('DROP TABLE sylius_product_description_template');
        $this->addSql('DROP TABLE sylius_product_description_template_block');
    }
}
