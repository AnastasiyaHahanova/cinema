<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Manager\Seat\SeatManager;
use App\Manager\Seat\SeatManagerInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services
        ->set(SeatManagerInterface::class, SeatManager::class)
        ->args([
           service('doctrine.orm.default_entity_manager')
        ]);

};