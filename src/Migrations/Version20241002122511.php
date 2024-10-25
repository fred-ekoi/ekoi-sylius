<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241002122511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_feature DROP FOREIGN KEY FK_E4BD7FE824730F21');
        $this->addSql('DROP INDEX IDX_E4BD7FE824730F21 ON sylius_product_feature');
        $this->addSql('ALTER TABLE sylius_product_feature DROP productTranslation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_feature ADD productTranslation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_feature ADD CONSTRAINT FK_E4BD7FE824730F21 FOREIGN KEY (productTranslation_id) REFERENCES sylius_product_translation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E4BD7FE824730F21 ON sylius_product_feature (productTranslation_id)');
    }
}
