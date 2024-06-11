<?php

declare(strict_types=1);

use Symfony\Config\DoctrineConfig;

use function Symfony\Component\DependencyInjection\Loader\Configurator\env;

// @formatter:off
return static function (DoctrineConfig $doctrineConfig): void {
    $doctrineConfig->dbal()
        ->defaultConnection('default')
        ->connection('default')
            ->url(env('DATABASE_URL'))
            ->charset('utf8')
            ->serverVersion('13.5');
};
