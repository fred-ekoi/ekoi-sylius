<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240828134346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_category_outfit (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoryoutfit_product (categoryoutfit_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_C01289C0372C229E (categoryoutfit_id), INDEX IDX_C01289C04584665A (product_id), PRIMARY KEY(categoryoutfit_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_category_outfit_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D4C3C99C7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_category_outfit_translation (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, subtitle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categoryoutfit_product ADD CONSTRAINT FK_C01289C0372C229E FOREIGN KEY (categoryoutfit_id) REFERENCES sylius_category_outfit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoryoutfit_product ADD CONSTRAINT FK_C01289C04584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_category_outfit_image ADD CONSTRAINT FK_D4C3C99C7E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_category_outfit_translation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categoryoutfit_product DROP FOREIGN KEY FK_C01289C0372C229E');
        $this->addSql('ALTER TABLE categoryoutfit_product DROP FOREIGN KEY FK_C01289C04584665A');
        $this->addSql('ALTER TABLE sylius_category_outfit_image DROP FOREIGN KEY FK_D4C3C99C7E3C61F9');
        $this->addSql('DROP TABLE sylius_category_outfit');
        $this->addSql('DROP TABLE categoryoutfit_product');
        $this->addSql('DROP TABLE sylius_category_outfit_image');
        $this->addSql('DROP TABLE sylius_category_outfit_translation');
    }
}
