<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Form\Resolver\Cinema\CreateCinemaResolver;
use App\Form\Resolver\Cinema\ListCinemaResolver;
use App\Repository\Interfaces\Address\AddressRepositoryInterface;
use App\Tags;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->tag(Tags::FORM_RESOLVER);

    $services->set(CreateCinemaResolver::class)
        ->args([
           service(AddressRepositoryInterface::class)
        ]);

    $services->set(ListCinemaResolver::class);
};