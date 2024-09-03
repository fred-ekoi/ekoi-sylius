<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240829115821 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoryoutfit_locale (categoryoutfit_id INT NOT NULL, locale_id INT NOT NULL, INDEX IDX_7595FD80372C229E (categoryoutfit_id), INDEX IDX_7595FD80E559DFD1 (locale_id), PRIMARY KEY(categoryoutfit_id, locale_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categoryoutfit_locale ADD CONSTRAINT FK_7595FD80372C229E FOREIGN KEY (categoryoutfit_id) REFERENCES sylius_category_outfit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoryoutfit_locale ADD CONSTRAINT FK_7595FD80E559DFD1 FOREIGN KEY (locale_id) REFERENCES sylius_locale (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categoryoutfit_locale DROP FOREIGN KEY FK_7595FD80372C229E');
        $this->addSql('ALTER TABLE categoryoutfit_locale DROP FOREIGN KEY FK_7595FD80E559DFD1');
        $this->addSql('DROP TABLE categoryoutfit_locale');
    }
}
