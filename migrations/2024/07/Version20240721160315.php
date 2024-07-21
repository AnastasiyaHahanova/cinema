<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240721160315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE Seat_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE Seat (id INT NOT NULL, hall_id INT DEFAULT NULL, seat VARCHAR(255) NOT NULL, row BIGINT NOT NULL, is_deleted BOOLEAN DEFAULT false NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9D6E995852AFCFD6 ON Seat (hall_id)');
        $this->addSql('ALTER TABLE Seat ADD CONSTRAINT FK_9D6E995852AFCFD6 FOREIGN KEY (hall_id) REFERENCES Hall (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE Seat_id_seq CASCADE');
        $this->addSql('ALTER TABLE Seat DROP CONSTRAINT FK_9D6E995852AFCFD6');
        $this->addSql('DROP TABLE Seat');
    }
}
