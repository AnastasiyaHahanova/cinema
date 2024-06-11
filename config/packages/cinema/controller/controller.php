<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Controller\Admin\Movie\MovieController;
use App\Normalizer\MovieNormalizer;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->tag('controller.service_arguments');

    $services
        ->set(MovieController::class)
        ->args([
            service(MovieNormalizer::class),
        ])->tag('controller.service_arguments');

};