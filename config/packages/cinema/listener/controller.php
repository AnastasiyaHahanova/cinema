<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Listener\ResponseListener;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services
        ->set(ResponseListener::class)
        ->tag('kernel.event_listener', ['event' => 'kernel.view']);
};