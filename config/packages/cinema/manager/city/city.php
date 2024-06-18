<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Manager\City\CityManager;
use App\Manager\City\CityManagerInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services
        ->set(CityManagerInterface::class, CityManager::class)
        ->args([
            service('doctrine.orm.default_entity_manager'),
        ]);
};