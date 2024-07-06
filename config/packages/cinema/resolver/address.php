<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Form\Resolver\Address\CreateAddressResolver;
use App\Repository\Interfaces\City\CityRepositoryInterface;
use App\Tags;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->tag(Tags::FORM_RESOLVER);

    $services->set(CreateAddressResolver::class)
        ->args([
           service(CityRepositoryInterface::class)
        ]);


};