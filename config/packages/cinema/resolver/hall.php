<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Form\Resolver\Hall\CreateHallResolver;
use App\Form\Resolver\Hall\EditHallResolver;
use App\Repository\Interfaces\Hall\HallRepositoryInterface;
use App\Tags;
use Symfony\Component\HttpFoundation\RequestStack;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->tag(Tags::FORM_RESOLVER);

    $services->set(CreateHallResolver::class);

    $services->set(EditHallResolver::class)
        ->args([
            service(RequestStack::class),
            service(HallRepositoryInterface::class)
        ]);
};