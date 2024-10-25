<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241001151715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_feature ADD imageUrl VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_feature_image DROP FOREIGN KEY FK_8F63E8097E3C61F9');
        $this->addSql('ALTER TABLE sylius_product_feature_image ADD CONSTRAINT FK_8F63E8097E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_product_feature (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_feature DROP imageUrl');
        $this->addSql('ALTER TABLE sylius_product_feature_image DROP FOREIGN KEY FK_8F63E8097E3C61F9');
        $this->addSql('ALTER TABLE sylius_product_feature_image ADD CONSTRAINT FK_8F63E8097E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_product_feature (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
