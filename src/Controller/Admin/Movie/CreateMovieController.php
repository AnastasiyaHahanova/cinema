<?php

declare(strict_types=1);

namespace App\Controller\Admin\Movie;

use App\Entity\Movie\MovieInterface;
use App\Form\Resolver\FormResolver;
use App\Form\Resolver\Movie\CreateMovieResolver;
use App\Form\Type\Movie\MovieType;
use App\Manager\Movie\MovieManagerInterface;
use App\Normalizer\MovieNormalizer;
use Symfony\Component\Routing\Annotation\Route;

class CreateMovieController
{
    public function __construct(
        private readonly MovieNormalizer $normalizer,
        private readonly MovieManagerInterface $manager
    )
    {
    }

    #[Route('/v1/movie/create', name: 'v1_create_movie', methods: ['POST'])]
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