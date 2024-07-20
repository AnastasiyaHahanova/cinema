<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Repository\Interfaces\Hall\HallRepositoryInterface;
use App\Repository\Hall\HallRepository;
use Doctrine\Persistence\ManagerRegistry;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(HallRepositoryInterface::class, HallRepository::class)
        ->args([
            service(ManagerRegistry::class)
        ]);
};