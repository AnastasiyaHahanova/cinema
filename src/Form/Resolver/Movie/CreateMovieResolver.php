<?php

declare(strict_types=1);

namespace App\Form\Resolver\Movie;

use App\Entity\Movie\Movie;
use App\Entity\Movie\MovieInterface;
use App\Form\Resolver\FormResolverInterface;
use Symfony\Component\Form\FormInterface;

class CreateMovieResolver implements FormResolverInterface
{
    public function resolve(FormInterface $form): MovieInterface
    {
        return new Movie();
    }
}