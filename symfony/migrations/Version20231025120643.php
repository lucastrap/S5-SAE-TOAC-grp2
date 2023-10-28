<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231025120643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course CHANGE relais relais INT DEFAULT NULL, CHANGE duo duo INT DEFAULT NULL, CHANGE detail_non_l detail_non_l VARCHAR(255) DEFAULT NULL, CHANGE detail_non_lr detail_non_lr VARCHAR(255) DEFAULT NULL, CHANGE detail_non_ld detail_non_ld VARCHAR(255) DEFAULT NULL, CHANGE map_race2 map_race2 VARCHAR(999) DEFAULT NULL, CHANGE map_race3 map_race3 VARCHAR(999) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course CHANGE relais relais INT NOT NULL, CHANGE duo duo INT NOT NULL, CHANGE detail_non_l detail_non_l VARCHAR(255) NOT NULL, CHANGE detail_non_lr detail_non_lr VARCHAR(255) NOT NULL, CHANGE detail_non_ld detail_non_ld VARCHAR(255) NOT NULL, CHANGE map_race2 map_race2 VARCHAR(999) NOT NULL, CHANGE map_race3 map_race3 VARCHAR(999) NOT NULL');
    }
}
