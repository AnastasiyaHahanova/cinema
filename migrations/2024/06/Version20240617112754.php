<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240617112754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE Address_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE Cinema_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE City_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE Address (id INT NOT NULL, city_id INT DEFAULT NULL, flat VARCHAR(255) NOT NULL, building VARCHAR(255) NOT NULL, streetName VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C2F3561D8BAC62AF ON Address (city_id)');
        $this->addSql('CREATE TABLE Cinema (id INT NOT NULL, address_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D32F0182F5B7AF75 ON Cinema (address_id)');
        $this->addSql('CREATE TABLE City (id INT NOT NULL, name VARCHAR(255) NOT NULL, regionName VARCHAR(255) NOT NULL, countryName VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE Address ADD CONSTRAINT FK_C2F3561D8BAC62AF FOREIGN KEY (city_id) REFERENCES City (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE Cinema ADD CONSTRAINT FK_D32F0182F5B7AF75 FOREIGN KEY (address_id) REFERENCES Address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE Address_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE Cinema_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE City_id_seq CASCADE');
        $this->addSql('ALTER TABLE Address DROP CONSTRAINT FK_C2F3561D8BAC62AF');
        $this->addSql('ALTER TABLE Cinema DROP CONSTRAINT FK_D32F0182F5B7AF75');
        $this->addSql('DROP TABLE Address');
        $this->addSql('DROP TABLE Cinema');
        $this->addSql('DROP TABLE City');
    }
}
