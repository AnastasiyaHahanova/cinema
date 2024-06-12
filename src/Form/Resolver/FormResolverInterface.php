<?php

declare(strict_types=1);

namespace App\Form\Resolver;

use Symfony\Component\Form\FormInterface;

interface FormResolverInterface
{
    public function resolve(FormInterface $form): mixed;
}