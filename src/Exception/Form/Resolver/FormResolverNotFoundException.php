<?php

declare(strict_types=1);

namespace App\Exception\Form\Resolver;

use RuntimeException;
use Throwable;

class FormResolverNotFoundException extends RuntimeException
{
    public function __construct(string $resolverClass = '', int $code = 0, ?Throwable $previous = null)
    {
        $message = sprintf('Unable to find form resolver %s', $resolverClass);
        parent::__construct($message, $code, $previous);
    }
}