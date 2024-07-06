<?php

declare(strict_types=1);

namespace App\Controller\Admin\Movie;

use App\Repository\Interfaces\Movie\FindOneByIdInterface;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/v1/movies/{id}', name: 'v1.movies.edit', methods: Request::METHOD_PUT)]
    public function edit(int $id): array
    {
        $movie = $this->movieRepository->findOneById($id);

        return $this->normalizer->normalize($movie);
    }
}