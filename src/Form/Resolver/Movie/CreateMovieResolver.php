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
        $movie = new Movie();
        $movie->setName($form->get('name')->getData());
        $movie->setDuration($form->get('duration')->getData());
        $movie->setRating($form->get('rating')->getData());
        $movie->setCategory();

        return $movie;
    }
}