<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;


use App\Command\City\UpdateCityCommand;
use App\Manager\City\CityManagerInterface;
use App\Repository\Interfaces\City\CityRepositoryInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->tag('console.command');

    $services->set(UpdateCityCommand::class)
        ->args([
            service(CityManagerInterface::class),
            service(CityRepositoryInterface::class)
        ]);
};