<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Form\Resolver\FormValueResolver;
use App\Form\Resolver\Movie\CreateMovieResolver;
use Symfony\Component\Form\FormFactoryInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->tag('custom.form.resolver');

    $services->set(FormValueResolver::class)
        ->args([
            service(FormFactoryInterface::class),
            tagged_iterator(tag: 'custom.form.resolver', indexAttribute: 'name'),
        ])
        ->tag('controller.argument_value_resolver');

    $services->set(CreateMovieResolver::class);
};