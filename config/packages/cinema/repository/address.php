<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Repository\Address\AddressRepository;
use App\Repository\Interfaces\Address\AddressRepositoryInterface;
use Doctrine\Persistence\ManagerRegistry;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(AddressRepositoryInterface::class, AddressRepository::class)
        ->args([
            service(ManagerRegistry::class)
        ]);
};