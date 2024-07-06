<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Manager\Address\AddressManager;
use App\Manager\Address\AddressManagerInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services
        ->set(AddressManagerInterface::class, AddressManager::class)
        ->args([
           service('doctrine.orm.default_entity_manager')
        ]);

};