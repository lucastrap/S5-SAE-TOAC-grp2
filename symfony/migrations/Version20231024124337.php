<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231024124337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course ADD specificites VARCHAR(255) NOT NULL, ADD cat_age VARCHAR(255) NOT NULL, ADD clot_inscr DATETIME NOT NULL, DROP specifications');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course ADD specifications VARCHAR(255) DEFAULT NULL, DROP specificites, DROP cat_age, DROP clot_inscr');
    }
}
