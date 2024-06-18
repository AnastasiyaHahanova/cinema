<?php

declare(strict_types=1);

namespace App\Controller\Admin\Movie;

use App\Form\Request\CriteriaInterface;
use App\Form\Resolver\FormResolver;
use App\Form\Resolver\Movie\ListMovieResolver;
use App\Form\Type\Movie\ListMovieType;
use App\Normalizer\Movie\MovieNormalizer;
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
    public function list(
        #[FormResolver(
            ListMovieType::class,
            ListMovieResolver::class
        )] CriteriaInterface $request
    ): array
    {
        $movies = $this->repository->findAllBy(
            $request->getCriteria(),
            $request->getOrderBy(),
            $request->getLimit(),
            $request->getOffset()
        );

        $result = [];
        foreach ($movies as $movie) {
            $result[] = $this->normalizer->normalize($movie);
        }

        return $result;
    }
}