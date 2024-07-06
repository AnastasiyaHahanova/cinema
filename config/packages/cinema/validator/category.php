<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Tags;
use App\Repository\Interfaces\Category\CategoryRepositoryInterface;
use App\Validator\Category\ExistCategoryConstraintValidator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->tag(Tags::CONSTRAINT_VALIDATOR);

    $services->set(ExistCategoryConstraintValidator::class)
        ->args([
            service(CategoryRepositoryInterface::class),
        ]);
};