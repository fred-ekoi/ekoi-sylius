<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241010145758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_translation ADD productDescription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_translation ADD CONSTRAINT FK_105A908B546B26F FOREIGN KEY (productDescription_id) REFERENCES sylius_product_description (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_105A908B546B26F ON sylius_product_translation (productDescription_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product_translation DROP FOREIGN KEY FK_105A908B546B26F');
        $this->addSql('DROP INDEX UNIQ_105A908B546B26F ON sylius_product_translation');
        $this->addSql('ALTER TABLE sylius_product_translation DROP productDescription_id');
    }
}
