<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240924143535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monsieurbiz_menu ADD isSystem TINYINT(1) DEFAULT 0 NOT NULL, DROP created_at, DROP updated_at, DROP is_system');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_10683CB877153098 ON monsieurbiz_menu (code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_10683CB877153098 ON monsieurbiz_menu');
        $this->addSql('ALTER TABLE monsieurbiz_menu ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD is_system TINYINT(1) DEFAULT NULL, DROP isSystem');
    }
}
