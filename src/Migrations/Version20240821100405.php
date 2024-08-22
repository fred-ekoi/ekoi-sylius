<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240821100405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorypromotion_taxon (categorypromotion_id INT NOT NULL, taxon_id INT NOT NULL, INDEX IDX_6084944FABB0101 (categorypromotion_id), INDEX IDX_6084944DE13F470 (taxon_id), PRIMARY KEY(categorypromotion_id, taxon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorypromotion_locale (categorypromotion_id INT NOT NULL, locale_id INT NOT NULL, INDEX IDX_7168561BFABB0101 (categorypromotion_id), INDEX IDX_7168561BE559DFD1 (locale_id), PRIMARY KEY(categorypromotion_id, locale_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorypromotion_taxon ADD CONSTRAINT FK_6084944FABB0101 FOREIGN KEY (categorypromotion_id) REFERENCES sylius_category_promotion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorypromotion_taxon ADD CONSTRAINT FK_6084944DE13F470 FOREIGN KEY (taxon_id) REFERENCES sylius_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorypromotion_locale ADD CONSTRAINT FK_7168561BFABB0101 FOREIGN KEY (categorypromotion_id) REFERENCES sylius_category_promotion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorypromotion_locale ADD CONSTRAINT FK_7168561BE559DFD1 FOREIGN KEY (locale_id) REFERENCES sylius_locale (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_category_promotion DROP test');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorypromotion_taxon DROP FOREIGN KEY FK_6084944FABB0101');
        $this->addSql('ALTER TABLE categorypromotion_taxon DROP FOREIGN KEY FK_6084944DE13F470');
        $this->addSql('ALTER TABLE categorypromotion_locale DROP FOREIGN KEY FK_7168561BFABB0101');
        $this->addSql('ALTER TABLE categorypromotion_locale DROP FOREIGN KEY FK_7168561BE559DFD1');
        $this->addSql('DROP TABLE categorypromotion_taxon');
        $this->addSql('DROP TABLE categorypromotion_locale');
        $this->addSql('ALTER TABLE sylius_category_promotion ADD test INT NOT NULL');
    }
}
