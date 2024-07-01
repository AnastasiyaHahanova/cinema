<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Repository\Category\CategoryRepository;
use App\Repository\Interfaces\Category\CategoryRepositoryInterface;
use Doctrine\Persistence\ManagerRegistry;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(CategoryRepositoryInterface::class, CategoryRepository::class)
        ->args([
            service(ManagerRegistry::class)
        ]);
};
