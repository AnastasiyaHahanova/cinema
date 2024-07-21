<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240706193731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cinema ALTER is_deleted SET DEFAULT false');
        $this->addSql('ALTER TABLE movie ALTER duration SET DEFAULT 0');
        $this->addSql('ALTER TABLE movie ALTER rating SET DEFAULT 0');
        $this->addSql('ALTER TABLE movie ALTER is_deleted SET DEFAULT false');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE Movie ALTER duration DROP DEFAULT');
        $this->addSql('ALTER TABLE Movie ALTER rating DROP DEFAULT');
        $this->addSql('ALTER TABLE Movie ALTER is_deleted DROP DEFAULT');
        $this->addSql('ALTER TABLE Cinema ALTER is_deleted DROP DEFAULT');
    }
}
