<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240829121341 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_category_outfit_translation ADD translatable_id INT NOT NULL, ADD locale VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sylius_category_outfit_translation ADD CONSTRAINT FK_49CDADCC2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_category_outfit (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_49CDADCC2C2AC5D3 ON sylius_category_outfit_translation (translatable_id)');
        $this->addSql('CREATE UNIQUE INDEX sylius_category_outfit_translation_uniq_trans ON sylius_category_outfit_translation (translatable_id, locale)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_category_outfit_translation DROP FOREIGN KEY FK_49CDADCC2C2AC5D3');
        $this->addSql('DROP INDEX IDX_49CDADCC2C2AC5D3 ON sylius_category_outfit_translation');
        $this->addSql('DROP INDEX sylius_category_outfit_translation_uniq_trans ON sylius_category_outfit_translation');
        $this->addSql('ALTER TABLE sylius_category_outfit_translation DROP translatable_id, DROP locale');
    }
}
