<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Controller\Admin\Address\CreateAddressController;
use App\Controller\Admin\Category\DeleteCategoryController;
use App\Controller\Admin\Category\EditCategoryController;
use App\Controller\Admin\Category\ListCategoryController;
use App\Manager\Address\AddressManagerInterface;
use App\Manager\Category\CategoryManagerInterface;
use App\Normalizer\Address\AddressNormalizer;
use App\Normalizer\Category\CategoryNormalizer;
use App\Repository\Interfaces\Category\CategoryRepositoryInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->tag('controller.service_arguments');

    $services
        ->set(CreateAddressController::class)
        ->args([
            service(AddressManagerInterface::class),
            service(AddressNormalizer::class),
        ]);

    $services->set(ListCategoryController::class)
        ->args([
            service(CategoryRepositoryInterface::class),
            service(CategoryNormalizer::class),
        ]);

    $services->set(EditCategoryController::class)
        ->args([
            service(CategoryManagerInterface::class),
            service(CategoryNormalizer::class),
        ]);

    $services->set(DeleteCategoryController::class)
        ->args([
            service(CategoryRepositoryInterface::class),
            service(CategoryManagerInterface::class),
            service(CategoryNormalizer::class)
        ]);
};