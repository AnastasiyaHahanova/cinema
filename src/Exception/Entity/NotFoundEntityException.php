<?php

declare(strict_types=1);

namespace App\Exception\Entity;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NotFoundEntityException extends NotFoundHttpException
{
    public function __construct(
        int $id,
        ?\Throwable $previous = null,
        int $code = 0,
        array $headers = []
    )
    {
        $message = sprintf('Entity with id %s does not exist.', $id);

        parent::__construct($message, $previous, $code, $headers);
    }
}