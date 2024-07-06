<?php

declare(strict_types=1);

namespace App\Form\Resolver\Movie;

use App\Entity\Movie\Movie;
use App\Entity\Movie\MovieInterface;
use App\Form\Resolver\FormResolverInterface;
use App\Repository\Interfaces\Category\FindOneByIdInterface;
use Symfony\Component\Form\FormInterface;

class CreateMovieResolver implements FormResolverInterface
{
    public function __construct(public readonly FindOneByIdInterface $repository)
    {
    }

    public function resolve(FormInterface $form): MovieInterface
    {
        $movie = new Movie();
        $movie->setName(ucfirst($form->get('name')->getData()));
        $movie->setDuration($form->get('duration')->getData());
        $movie->setRating($form->get('rating')->getData());
        $movie->setCategory($this->repository->findOneById($form->get('category_id')->getData()));

        return $movie;
    }
}