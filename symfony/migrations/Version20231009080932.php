<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231009080932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        // admin:sacToacChangeThis
        $this->addSql("INSERT INTO user (username, roles, password, email) VALUES ('admin', '[\"ROLE_ADMIN\"]', '\$2y\$13\$sUaQUG01FaOjsCuti2xZ9.3ZIL28PErpJ0OxrX6tzaX.f1oLGIkGK', 'admin@toac-triathlon.com')");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
