<?php

declare(strict_types=1);

namespace App\Controller\Admin\City;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use App\Repository\Interfaces\City\FindAllInterface;

class ListCityController
{
    public function __construct(
        private readonly FindAllInterface $repository,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/cities', name: 'v1.cities.list', methods: Request::METHOD_GET)]
    public function list(): array
    {
        $cities = [];
        foreach ($this->repository->findAll() as $city) {
            $cities[] = $this->normalizer->normalize($city);
        }

        return $cities;
    }
}