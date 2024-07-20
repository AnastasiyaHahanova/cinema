<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Manager\Cinema\CinemaManager;
use App\Manager\Cinema\CinemaManagerInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services
        ->set(CinemaManagerInterface::class, CinemaManager::class)
        ->args([
           service('doctrine.orm.default_entity_manager')
        ]);
};