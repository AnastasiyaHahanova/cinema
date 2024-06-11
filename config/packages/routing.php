<?php

declare(strict_types=1);

use Symfony\Config\FrameworkConfig;

return static function (FrameworkConfig $frameworkConfig): void {
    $frameworkConfig->router()
        ->utf8(true)
        ->defaultUri('http://localhost');
};