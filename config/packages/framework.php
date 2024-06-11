<?php

declare(strict_types=1);

use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Config\FrameworkConfig;
use function Symfony\Component\DependencyInjection\Loader\Configurator\env;

return static function (FrameworkConfig $frameworkConfig): void {
    $frameworkConfig
        ->secret(env('APP_SECRET'))
        ->httpMethodOverride(false);

    $frameworkConfig->session()
        ->handlerId(null)
        ->cookieSecure('auto')
        ->cookieSamesite('lax')
        ->storageFactoryId('session.storage.factory.native');

    $frameworkConfig->phpErrors()->log();

    $frameworkConfig->serializer()->nameConverter('serializer.name_converter.camel_case_to_snake_case');
    $frameworkConfig->serializer()->defaultContext(DateTimeNormalizer::FORMAT_KEY , 'Y-m-d H:i:s.U');
};