<?php

declare(strict_types=1);

namespace App\Form\Resolver;

use Attribute;
use Symfony\Component\Form\FormTypeInterface;

#[Attribute(Attribute::TARGET_PARAMETER)]
class FormResolver
{
    /**
     * @param class-string<FormTypeInterface>                     $type
     * @param class-string<FormResolverInterface>|string $resolver
     */
    public function __construct(
        private readonly string $type,
        private readonly string $resolver,
        private readonly array $options = []
    ) {
    }

    /**
     * @return class-string<FormTypeInterface>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return class-string<FormResolverInterface>|string
     */
    public function getResolver(): string
    {
        return $this->resolver;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}