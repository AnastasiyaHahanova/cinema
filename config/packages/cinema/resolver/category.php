<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Tags;
use App\Form\Resolver\Category\CreateCategoryResolver;
use App\Form\Resolver\Category\EditCategoryResolver;
use App\Repository\Interfaces\Category\CategoryRepositoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->tag(Tags::FORM_RESOLVER);

    $services->set(CreateCategoryResolver::class);

    $services->set(EditCategoryResolver::class)
        ->args([
            service(RequestStack::class),
            service(CategoryRepositoryInterface::class)
        ]);
};