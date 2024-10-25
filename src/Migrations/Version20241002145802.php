<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241002145802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_productfeature (product_id INT NOT NULL, productfeature_id INT NOT NULL, INDEX IDX_D7F1AD6D4584665A (product_id), INDEX IDX_D7F1AD6D43D8AFE9 (productfeature_id), PRIMARY KEY(product_id, productfeature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_productfeature ADD CONSTRAINT FK_D7F1AD6D4584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_productfeature ADD CONSTRAINT FK_D7F1AD6D43D8AFE9 FOREIGN KEY (productfeature_id) REFERENCES sylius_product_feature (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_productfeature DROP FOREIGN KEY FK_D7F1AD6D4584665A');
        $this->addSql('ALTER TABLE product_productfeature DROP FOREIGN KEY FK_D7F1AD6D43D8AFE9');
        $this->addSql('DROP TABLE product_productfeature');
    }
}
