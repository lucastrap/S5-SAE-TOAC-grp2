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

        // admin:TOAC*MUST_CHANGE!
        $this->addSql("TRUNCATE TABLE user");
        $this->addSql("INSERT INTO user (username, roles, password, email) VALUES ('admin', '[\"ROLE_ADMIN\"]', '\$2y\$13\$k0jLr6CY7ecDY.bhrX9qJuwBbuPum9533LpcHGr99TwhycGr3MFXi', 'admin@toac-triathlon.com')");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
