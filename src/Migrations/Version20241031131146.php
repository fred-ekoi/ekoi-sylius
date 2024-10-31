<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241031131146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_productfeature DROP FOREIGN KEY FK_D7F1AD6D43D8AFE9');
        $this->addSql('ALTER TABLE product_productfeature DROP FOREIGN KEY FK_D7F1AD6D4584665A');
        $this->addSql('ALTER TABLE product_productfeature ADD CONSTRAINT FK_D7F1AD6D43D8AFE9 FOREIGN KEY (productfeature_id) REFERENCES sylius_product_feature (id)');
        $this->addSql('ALTER TABLE product_productfeature ADD CONSTRAINT FK_D7F1AD6D4584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id)');
        $this->addSql('ALTER TABLE sylius_product_attribute ADD image VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_productfeature DROP FOREIGN KEY FK_D7F1AD6D4584665A');
        $this->addSql('ALTER TABLE product_productfeature DROP FOREIGN KEY FK_D7F1AD6D43D8AFE9');
        $this->addSql('ALTER TABLE product_productfeature ADD CONSTRAINT FK_D7F1AD6D4584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_productfeature ADD CONSTRAINT FK_D7F1AD6D43D8AFE9 FOREIGN KEY (productfeature_id) REFERENCES sylius_product_feature (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_attribute DROP image');
    }
}
