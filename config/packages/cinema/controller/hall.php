<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Controller\Admin\Hall\CreateHallController;
use App\Controller\Admin\Hall\DeleteHallController;
use App\Controller\Admin\Hall\EditHallController;
use App\Controller\Admin\Hall\ListHallController;
use App\Manager\Hall\HallManagerInterface;
use App\Normalizer\Hall\HallNormalizer;
use App\Repository\Interfaces\Hall\HallRepositoryInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->tag('controller.service_arguments');

    $services
        ->set(CreateHallController::class)
        ->args([
            service(HallManagerInterface::class),
            service(HallNormalizer::class),
        ]);

    $services->set(DeleteHallController::class)
        ->args([
            service(HallManagerInterface::class),
            service(HallRepositoryInterface::class),
            service(HallNormalizer::class),
        ]);

    $services->set(EditHallController::class)
        ->args([
            service(HallManagerInterface::class),
            service(HallNormalizer::class)
        ]);

    $services->set(ListHallController::class)
        ->args([
            service(HallRepositoryInterface::class),
            service(HallNormalizer::class),
        ]);
};