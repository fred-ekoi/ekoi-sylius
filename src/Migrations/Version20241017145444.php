<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017145444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_translation ADD productDescriptionTemplate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_translation ADD CONSTRAINT FK_105A908F5DFBA91 FOREIGN KEY (productDescriptionTemplate_id) REFERENCES sylius_product_description_template (id)');
        $this->addSql('CREATE INDEX IDX_105A908F5DFBA91 ON sylius_product_translation (productDescriptionTemplate_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_translation DROP FOREIGN KEY FK_105A908F5DFBA91');
        $this->addSql('DROP INDEX IDX_105A908F5DFBA91 ON sylius_product_translation');
    }
}
