<?php

declare(strict_types=1);

namespace App\Controller\Admin\Movie;

use App\Exception\Entity\NotFoundEntityException;
use App\Manager\Movie\MovieManagerInterface;
use App\Repository\Interfaces\Movie\FindOneByIdInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DeleteMovieController
{
    public function __construct(
        private readonly FindOneByIdInterface $repository,
        private readonly MovieManagerInterface $manager,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/movies/{id}', name: 'v1.movies.delete', methods: Request::METHOD_DELETE)]
    public function delete(int $id): Response
    {
        $movie = $this->repository->findOneById($id) ?? throw new NotFoundEntityException($id);
        $this->manager->delete($movie);

        return $this->normalizer->normalize($movie);
    }
}