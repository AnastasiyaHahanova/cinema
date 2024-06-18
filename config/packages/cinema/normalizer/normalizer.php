<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Normalizer\Category\CategoryNormalizer;
use App\Normalizer\Movie\MovieNormalizer;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->tag('serializer.normalizer');

    $services->set(MovieNormalizer::class)
        ->args([
            service(CategoryNormalizer::class),
        ]);

    $services->set(CategoryNormalizer::class);
};