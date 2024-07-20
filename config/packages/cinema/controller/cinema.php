<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Controller\Admin\Cinema\CreateCinemaController;
use App\Controller\Admin\Cinema\DeleteCinemaController;
use App\Controller\Admin\Cinema\EditCinemaController;
use App\Controller\Admin\Cinema\ListCinemaController;
use App\Manager\Cinema\CinemaManagerInterface;
use App\Normalizer\Cinema\CinemaNormalizer;
use App\Repository\Interfaces\Cinema\CinemaRepositoryInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->tag('controller.service_arguments');

    $services
        ->set(CreateCinemaController::class)
        ->args([
            service(CinemaManagerInterface::class),
            service(CinemaNormalizer::class),
        ]);

    $services->set(ListCinemaController::class)
        ->args([
            service(CinemaRepositoryInterface::class),
            service(CinemaNormalizer::class),
        ]);

    $services->set(EditCinemaController::class)
        ->args([
            service(CinemaRepositoryInterface::class),
            service(CinemaNormalizer::class)
        ]);

    $services->set(DeleteCinemaController::class)
        ->args([
            service(CinemaRepositoryInterface::class),
            service(CinemaManagerInterface::class),
            service(CinemaNormalizer::class)
        ]);
};