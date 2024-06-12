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

    $doctrineConfig->orm()
        ->entityManager('default')
        ->connection('default')
        ->mapping('App')
        ->isBundle(false)
        ->dir('%kernel.project_dir%/src/Entity')
        ->prefix('App\Entity')
        ->alias('App');


//
//    $doctrineConfig->orm()
//        ->autoGenerateProxyClasses(true)
//        ->entityManager('default')
//        ->namingStrategy('doctrine.orm.naming_strategy.underscore_number_aware')
//        ->autoMapping(true)
//        ->classMetadataFactoryName(ClassMetadataFactory::class);



};
