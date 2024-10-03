<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241001095234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_feature_image DROP FOREIGN KEY FK_8F63E8097E3C61F9');
        $this->addSql('DROP INDEX UNIQ_8F63E8097E3C61F9 ON sylius_product_feature_image');
        $this->addSql('ALTER TABLE sylius_product_feature_image DROP owner_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_feature_image ADD owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_product_feature_image ADD CONSTRAINT FK_8F63E8097E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_product_feature (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F63E8097E3C61F9 ON sylius_product_feature_image (owner_id)');
    }
}
