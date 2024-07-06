<?php

declare(strict_types=1);

namespace App\Validator\Category;

use Symfony\Component\Validator\Constraint;

class ExistCategory extends Constraint
{
    public string $message = 'Category with id "{{ id }}" does not exist.';
    public string $mode = 'strict';

    public function __construct(?string $mode = null, ?string $message = null, ?array $groups = null, $payload = null)
    {
        parent::__construct([], $groups, $payload);

        $this->mode = $mode ?? $this->mode;
        $this->message = $message ?? $this->message;
    }
}