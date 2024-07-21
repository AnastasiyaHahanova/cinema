<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Controller\Admin\City\ListCityController;
use App\Normalizer\City\CityNormalizer;
use App\Repository\Interfaces\City\CityRepositoryInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->tag('controller.service_arguments');

    $services
        ->set(ListCityController::class)
        ->args([
            service(CityRepositoryInterface::class),
            service(CityNormalizer::class),
        ]);
};