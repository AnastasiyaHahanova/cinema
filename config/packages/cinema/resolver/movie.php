<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Form\Resolver\Movie\CreateMovieResolver;
use App\Form\Resolver\Movie\ListMovieResolver;
use App\Tags;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->tag(Tags::FORM_RESOLVER);

    $services->set(CreateMovieResolver::class);

    $services->set(ListMovieResolver::class);
};