<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241001090730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_feature DROP FOREIGN KEY FK_E4BD7FE83DA5256D');
        $this->addSql('DROP INDEX UNIQ_E4BD7FE83DA5256D ON sylius_product_feature');
        $this->addSql('ALTER TABLE sylius_product_feature DROP image_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_feature ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_feature ADD CONSTRAINT FK_E4BD7FE83DA5256D FOREIGN KEY (image_id) REFERENCES sylius_product_feature_image (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E4BD7FE83DA5256D ON sylius_product_feature (image_id)');
    }
}
