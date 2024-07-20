<?php

declare(strict_types=1);

namespace App\Controller\Admin\Cinema;

use App\Exception\Entity\NotFoundEntityException;
use App\Manager\Cinema\CinemaManagerInterface;
use App\Repository\Interfaces\Cinema\FindOneByIdInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DeleteCinemaController
{
    public function __construct(
        private readonly FindOneByIdInterface $repository,
        private readonly CinemaManagerInterface $categoryManager,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/cinemas/{id}', name: 'v1.cinemas.delete', methods: Request::METHOD_DELETE)]
    public function delete(int $id): array
    {
        $cinema = $this->repository->findOneById($id) ?? throw new NotFoundEntityException($id);
        $this->categoryManager->delete($cinema);

        return $this->normalizer->normalize($cinema);
    }
}