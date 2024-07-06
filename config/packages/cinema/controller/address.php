<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Controller\Admin\Address\CreateAddressController;
use App\Controller\Admin\Address\ListAddressController;
use App\Manager\Address\AddressManagerInterface;
use App\Normalizer\Address\AddressNormalizer;
use App\Repository\Interfaces\Address\AddressRepositoryInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->tag('controller.service_arguments');

    $services
        ->set(CreateAddressController::class)
        ->args([
            service(AddressManagerInterface::class),
            service(AddressNormalizer::class),
        ]);

    $services->set(ListAddressController::class)
        ->args([
            service(AddressRepositoryInterface::class),
            service(AddressNormalizer::class),
        ]);
};