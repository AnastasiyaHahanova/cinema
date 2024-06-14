<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240614150722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie ADD category_id INT DEFAULT 1');
        $this->addSql('ALTER TABLE movie ADD duration BIGINT DEFAULT 0');
        $this->addSql('ALTER TABLE movie ADD rating BIGINT DEFAULT 0');
        $this->addSql(
            'ALTER TABLE movie ADD CONSTRAINT FK_DC9FDD6B12469DE2 FOREIGN KEY (category_id) REFERENCES Category (id) NOT DEFERRABLE INITIALLY IMMEDIATE'
        );
        $this->addSql('CREATE INDEX IDX_DC9FDD6B12469DE2 ON movie (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE Movie DROP CONSTRAINT FK_DC9FDD6B12469DE2');
        $this->addSql('DROP INDEX IDX_DC9FDD6B12469DE2');
        $this->addSql('ALTER TABLE Movie DROP category_id');
        $this->addSql('ALTER TABLE Movie DROP duration');
        $this->addSql('ALTER TABLE Movie DROP rating');
    }
}
