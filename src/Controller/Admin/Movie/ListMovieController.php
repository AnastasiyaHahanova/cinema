<?php

declare(strict_types=1);

namespace App\Controller\Admin\Movie;

use App\Normalizer\MovieNormalizer;
use App\Repository\Interfaces\Movie\FindAllByInterface;
use Symfony\Component\Routing\Annotation\Route;

class ListMovieController
{
    public function __construct(
        private readonly FindAllByInterface $repository,
        private readonly MovieNormalizer $normalizer,
    )
    {
    }

    #[Route('/v1/movie/list', name: 'v1.movie.list')]
    public function list(): array
    {
        $result = [];
        foreach ($this->repository->findAllBy([]) as $movie) {
            $result[] = $this->normalizer->normalize($movie);
        }

        return $result;
    }
}