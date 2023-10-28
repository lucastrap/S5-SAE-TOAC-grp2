<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231025084156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course ADD individuel INT NOT NULL, ADD relais INT NOT NULL, ADD duo INT NOT NULL, ADD detail_non_l VARCHAR(255) NOT NULL, ADD detail_non_lr VARCHAR(255) NOT NULL, ADD detail_non_ld VARCHAR(255) NOT NULL, CHANGE hoaires2 horaires2 VARCHAR(500) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP individuel, DROP relais, DROP duo, DROP detail_non_l, DROP detail_non_lr, DROP detail_non_ld, CHANGE horaires2 hoaires2 VARCHAR(500) NOT NULL');
    }
}
