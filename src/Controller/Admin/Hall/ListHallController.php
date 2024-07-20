<?php

declare(strict_types=1);

namespace App\Controller\Admin\Hall;

use App\Repository\Interfaces\Hall\FindAllByInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ListHallController
{
    public function __construct(
        private readonly FindAllByInterface $repository,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/halls', name: 'v1.halls.list', methods: Request::METHOD_GET)]
    public function list(): array
    {
        $halls = [];
        foreach ($this->repository->findAllBy([]) as $hall) {
            $halls[] = $this->normalizer->normalize($hall);
        }

        return $halls;
    }
}