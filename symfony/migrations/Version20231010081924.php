<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231010081924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('TRUNCATE TABLE course');
        $this->addSql('CREATE TABLE course_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course ADD course_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB96628AD36 FOREIGN KEY (course_category_id) REFERENCES course_category (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB96628AD36 ON course (course_category_id)');
        $this->addSql('INSERT INTO course_category(name) VALUES (\'TRIATHLON\')');
        $this->addSql('INSERT INTO course_category(name) VALUES (\'AQUATHLON\')');
        $this->addSql('INSERT INTO course_category(name) VALUES (\'SWIMRUN\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB96628AD36');
        $this->addSql('DROP TABLE course_category');
        $this->addSql('DROP INDEX IDX_169E6FB96628AD36 ON course');
        $this->addSql('ALTER TABLE course DROP course_category_id');
    }
}
