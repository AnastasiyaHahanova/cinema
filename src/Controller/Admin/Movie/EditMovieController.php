<?php

declare(strict_types=1);

namespace App\Controller\Admin\Movie;

use App\Repository\Interfaces\Movie\FindOneByIdInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EditMovieController
{
    public function __construct(
        private readonly FindOneByIdInterface $movieRepository,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/movie/edit', name: 'v1.movie.edit', methods: Request::METHOD_PUT)]
    public function edit(int $id): Response
    {
        $movie = $this->movieRepository->findOneById($id);

        return $this->normalizer->normalize($movie);
    }
}