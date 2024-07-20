<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Repository\Cinema\CinemaRepository;
use App\Repository\Interfaces\Cinema\CinemaRepositoryInterface;
use Doctrine\Persistence\ManagerRegistry;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(CinemaRepositoryInterface::class, CinemaRepository::class)
        ->args([
            service(ManagerRegistry::class)
        ]);
};