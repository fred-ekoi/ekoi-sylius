<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241027160752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_feature_translation ADD translatable_id INT NOT NULL, ADD locale VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sylius_product_feature_translation ADD CONSTRAINT FK_D545F4DC2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_product_feature (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_D545F4DC2C2AC5D3 ON sylius_product_feature_translation (translatable_id)');
        $this->addSql('CREATE UNIQUE INDEX sylius_product_feature_translation_uniq_trans ON sylius_product_feature_translation (translatable_id, locale)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_feature_translation DROP FOREIGN KEY FK_D545F4DC2C2AC5D3');
        $this->addSql('DROP INDEX IDX_D545F4DC2C2AC5D3 ON sylius_product_feature_translation');
        $this->addSql('DROP INDEX sylius_product_feature_translation_uniq_trans ON sylius_product_feature_translation');
        $this->addSql('ALTER TABLE sylius_product_feature_translation DROP translatable_id, DROP locale');
    }
}
