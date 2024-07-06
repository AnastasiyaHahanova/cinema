<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Manager\Movie\MovieManager;
use App\Manager\Movie\MovieManagerInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services
        ->set(MovieManagerInterface::class, MovieManager::class)
        ->args([
           service('doctrine.orm.default_entity_manager')
        ]);

};