<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241001103100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sylius_translation_override_dictionary (id INT AUTO_INCREMENT NOT NULL, keyText VARCHAR(255) NOT NULL, valueText VARCHAR(255) NOT NULL, keyLocale_id INT NOT NULL, valueLocale_id INT NOT NULL, INDEX IDX_4D39DF6C886BD39D (keyLocale_id), INDEX IDX_4D39DF6C431DB3F (valueLocale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_translation_override_dictionary ADD CONSTRAINT FK_4D39DF6C886BD39D FOREIGN KEY (keyLocale_id) REFERENCES sylius_locale (id)');
        $this->addSql('ALTER TABLE sylius_translation_override_dictionary ADD CONSTRAINT FK_4D39DF6C431DB3F FOREIGN KEY (valueLocale_id) REFERENCES sylius_locale (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_translation_override_dictionary DROP FOREIGN KEY FK_4D39DF6C886BD39D');
        $this->addSql('ALTER TABLE sylius_translation_override_dictionary DROP FOREIGN KEY FK_4D39DF6C431DB3F');
        $this->addSql('DROP TABLE sylius_translation_override_dictionary');
    }
}
