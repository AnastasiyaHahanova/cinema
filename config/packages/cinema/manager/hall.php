<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Manager\Hall\HallManager;
use App\Manager\Hall\HallManagerInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services
        ->set(HallManagerInterface::class, HallManager::class)
        ->args([
           service('doctrine.orm.default_entity_manager')
        ]);

};