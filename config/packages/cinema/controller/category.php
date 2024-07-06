<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Controller\Admin\Category\CreateCategoryController;
use App\Manager\Category\CategoryManagerInterface;
use App\Normalizer\Category\CategoryNormalizer;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->tag('controller.service_arguments');

    $services
        ->set(CreateCategoryController::class)
        ->args([
            service(CategoryManagerInterface::class),
            service(CategoryNormalizer::class)
        ]);
};