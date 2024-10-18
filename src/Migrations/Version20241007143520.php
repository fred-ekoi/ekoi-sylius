<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241007143520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_description_template_block DROP FOREIGN KEY FK_DB8F0A88C361AA95');
        $this->addSql('DROP INDEX IDX_DB8F0A88C361AA95 ON sylius_product_description_template_block');
        $this->addSql('ALTER TABLE sylius_product_description_template_block CHANGE productDescriptionTemplateBlock_id parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_description_template_block ADD CONSTRAINT FK_DB8F0A88727ACA70 FOREIGN KEY (parent_id) REFERENCES sylius_product_description_template_block (id)');
        $this->addSql('CREATE INDEX IDX_DB8F0A88727ACA70 ON sylius_product_description_template_block (parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_description_template_block DROP FOREIGN KEY FK_DB8F0A88727ACA70');
        $this->addSql('DROP INDEX IDX_DB8F0A88727ACA70 ON sylius_product_description_template_block');
        $this->addSql('ALTER TABLE sylius_product_description_template_block CHANGE parent_id productDescriptionTemplateBlock_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_description_template_block ADD CONSTRAINT FK_DB8F0A88C361AA95 FOREIGN KEY (productDescriptionTemplateBlock_id) REFERENCES sylius_product_description_template_block (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_DB8F0A88C361AA95 ON sylius_product_description_template_block (productDescriptionTemplateBlock_id)');
    }
}
