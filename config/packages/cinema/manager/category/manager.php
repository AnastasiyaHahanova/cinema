<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Manager\Category\CategoryManager;
use App\Manager\Category\CategoryManagerInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services
        ->set(CategoryManagerInterface::class, CategoryManager::class)
        ->args([
            service('doctrine.orm.default_entity_manager'),
        ]);
};