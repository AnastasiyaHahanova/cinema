<?php

declare(strict_types=1);

namespace App\Controller\Admin\Movie;

use App\Manager\Movie\MovieManagerInterface;
use App\Repository\Interfaces\Movie\FindOneByIdInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteMovieController
{
    public function __construct(
        private readonly FindOneByIdInterface $repository,
        private readonly MovieManagerInterface $manager
    )
    {
    }

    #[Route('/v1/movies/{id}', name: 'v1.movies.delete', methods: Request::METHOD_DELETE)]
    public function delete(int $id): Response
    {
        $movie = $this->repository->findOneById($id);
        $this->manager->remove($movie);

        return new JsonResponse();
    }
}