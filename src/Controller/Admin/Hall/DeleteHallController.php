<?php

declare(strict_types=1);

namespace App\Controller\Admin\Hall;

use App\Exception\Entity\NotFoundEntityException;
use App\Manager\Hall\HallManagerInterface;
use App\Repository\Interfaces\Hall\FindOneByIdInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DeleteHallController
{
    public function __construct(
        private readonly HallManagerInterface $manager,
        private readonly FindOneByIdInterface $repository,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/halls', name: 'v1.halls.delete', methods: Request::METHOD_DELETE)]
    public function delete(int $id): array
    {
        $hall = $this->repository->findOneById($id) ?? throw new NotFoundEntityException($id);
        $hall = current($this->manager->delete($hall));

        return $this->normalizer->normalize($hall);
    }
}