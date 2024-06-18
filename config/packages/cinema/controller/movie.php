<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Controller\Admin\Movie\CreateMovieController;
use App\Controller\Admin\Movie\EditMovieController;
use App\Controller\Admin\Movie\ListMovieController;
use App\Manager\Movie\MovieManagerInterface;
use App\Normalizer\Movie\MovieNormalizer;
use App\Repository\Interfaces\Movie\MovieRepositoryInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->tag('controller.service_arguments');

    $services
        ->set(CreateMovieController::class)
        ->args([
            service(MovieNormalizer::class),
            service(MovieManagerInterface::class)
        ]);

    $services->set(ListMovieController::class)
        ->args([
            service(MovieRepositoryInterface::class),
            service(MovieNormalizer::class)
        ]);

    $services->set(EditMovieController::class)
        ->args([
            service(MovieRepositoryInterface::class),
            service(MovieNormalizer::class)
        ]);
};