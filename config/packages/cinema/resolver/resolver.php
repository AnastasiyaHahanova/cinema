<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Tags;
use App\Form\Resolver\FormValueResolver;
use Symfony\Component\Form\FormFactoryInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->defaults()->tag(Tags::FORM_RESOLVER);

    $services->set(FormValueResolver::class)
        ->args([
            service(FormFactoryInterface::class),
            tagged_iterator(tag: 'custom.form.resolver', indexAttribute: 'name'),
        ])
        ->tag('controller.argument_value_resolver');
};