<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Repository\Interfaces\Movie\MovieRepositoryInterface;
use App\Repository\Movie\MovieRepository;
use Doctrine\Persistence\ManagerRegistry;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(MovieRepositoryInterface::class, MovieRepository::class)
        ->args([
            service(ManagerRegistry::class)
        ]);
};