<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Tags;
use App\Repository\Interfaces\City\CityRepositoryInterface;
use App\Validator\City\ExistCityConstraintValidator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->tag(Tags::CONSTRAINT_VALIDATOR);

    $services->set(ExistCityConstraintValidator::class)
        ->args([
            service(CityRepositoryInterface::class),
        ]);
};