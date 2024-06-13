<?php

declare(strict_types=1);

namespace App\Controller\Admin\Movie;

use App\Entity\Movie\MovieInterface;
use App\Form\Resolver\FormResolver;
use App\Form\Resolver\Movie\CreateMovieResolver;
use App\Form\Type\Movie\MovieType;
use App\Manager\Movie\MovieManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateMovieController
{
    public function __construct(
        private readonly NormalizerInterface $normalizer,
        private readonly MovieManagerInterface $manager
    )
    {
    }

    #[Route('/v1/movie/create', name: 'v1_create_movie', methods: Request::METHOD_POST)]
    public function create(
        #[FormResolver(
            MovieType::class,
            CreateMovieResolver::class
        )] MovieInterface $movie
    ): array
    {
        $movie = current($this->manager->create($movie));

        return $this->normalizer->normalize($movie);
    }
}