<?php

declare(strict_types=1);

namespace App\Exception\Form\Type;

use RuntimeException;
use Throwable;

class FormErrorsException extends RuntimeException
{
    private array $errors;

    public function __construct(array $errors, int $code = 0, ?Throwable $previous = null)
    {
        $this->errors = $errors;
        $message = json_encode($errors);
        parent::__construct($message, $code, $previous);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}