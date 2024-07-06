<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240706131631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE category ADD is_deleted BOOLEAN NOT NULL DEFAULT FALSE');
        $this->addSql('ALTER TABLE cinema ADD is_deleted BOOLEAN NOT NULL DEFAULT FALSE');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE Cinema DROP is_deleted');
        $this->addSql('ALTER TABLE Category DROP is_deleted');
    }
}
