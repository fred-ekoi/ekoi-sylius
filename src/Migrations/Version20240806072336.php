<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240806072336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_category_promotion_image ADD owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_category_promotion_image ADD CONSTRAINT FK_1CFA75C87E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_category_promotion_translation (id) ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1CFA75C87E3C61F9 ON sylius_category_promotion_image (owner_id)');
        $this->addSql('ALTER TABLE sylius_category_promotion_translation DROP FOREIGN KEY FK_197A72EB3DA5256D');
        $this->addSql('ALTER TABLE sylius_category_promotion_translation DROP FOREIGN KEY FK_197A72EBE559DFD1');
        $this->addSql('DROP INDEX IDX_197A72EBE559DFD1 ON sylius_category_promotion_translation');
        $this->addSql('DROP INDEX UNIQ_197A72EB3DA5256D ON sylius_category_promotion_translation');
        $this->addSql('ALTER TABLE sylius_category_promotion_translation ADD locale VARCHAR(255) NOT NULL, DROP image_id, CHANGE locale_id translatable_id INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_category_promotion_translation ADD CONSTRAINT FK_197A72EB2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_category_promotion (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_197A72EB2C2AC5D3 ON sylius_category_promotion_translation (translatable_id)');
        $this->addSql('CREATE UNIQUE INDEX sylius_category_promotion_translation_uniq_trans ON sylius_category_promotion_translation (translatable_id, locale)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_category_promotion_image DROP FOREIGN KEY FK_1CFA75C87E3C61F9');
        $this->addSql('DROP INDEX UNIQ_1CFA75C87E3C61F9 ON sylius_category_promotion_image');
        $this->addSql('ALTER TABLE sylius_category_promotion_image DROP owner_id');
        $this->addSql('ALTER TABLE sylius_category_promotion_translation DROP FOREIGN KEY FK_197A72EB2C2AC5D3');
        $this->addSql('DROP INDEX IDX_197A72EB2C2AC5D3 ON sylius_category_promotion_translation');
        $this->addSql('DROP INDEX sylius_category_promotion_translation_uniq_trans ON sylius_category_promotion_translation');
        $this->addSql('ALTER TABLE sylius_category_promotion_translation ADD image_id INT DEFAULT NULL, DROP locale, CHANGE translatable_id locale_id INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_category_promotion_translation ADD CONSTRAINT FK_197A72EB3DA5256D FOREIGN KEY (image_id) REFERENCES sylius_category_promotion_image (id)');
        $this->addSql('ALTER TABLE sylius_category_promotion_translation ADD CONSTRAINT FK_197A72EBE559DFD1 FOREIGN KEY (locale_id) REFERENCES sylius_locale (id)');
        $this->addSql('CREATE INDEX IDX_197A72EBE559DFD1 ON sylius_category_promotion_translation (locale_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_197A72EB3DA5256D ON sylius_category_promotion_translation (image_id)');
    }
}
