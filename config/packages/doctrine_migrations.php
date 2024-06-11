<?php

declare(strict_types=1);

use Symfony\Config\DoctrineMigrationsConfig;
use function Symfony\Component\DependencyInjection\Loader\Configurator\param;

return static function (DoctrineMigrationsConfig $doctrineMigrationsConfig): void {
    $doctrineMigrationsConfig
        ->migrationsPath('DoctrineMigrations', '%kernel.project_dir%/migrations')
        ->enableProfiler(param('kernel.debug'))
        ->organizeMigrations('BY_YEAR_AND_MONTH');

    $doctrineMigrationsConfig->storage()->tableStorage()->tableName('migrations');
};