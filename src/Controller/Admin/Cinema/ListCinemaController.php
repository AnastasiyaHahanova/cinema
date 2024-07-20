<?php

declare(strict_types=1);

namespace App\Controller\Admin\Cinema;

use App\Form\Request\CriteriaInterface;
use App\Form\Resolver\Cinema\ListCinemaResolver;
use App\Form\Resolver\FormResolver;
use App\Form\Type\Cinema\ListCinemaType;
use App\Repository\Interfaces\Cinema\FindAllByInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ListCinemaController
{
    public function __construct(
        private readonly FindAllByInterface $repository,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/cinemas', name: 'v1.cinemas.list', methods: Request::METHOD_GET)]
    public function list(
        #[FormResolver(
            ListCinemaType::class,
            ListCinemaResolver::class
        )] CriteriaInterface $request
    ): array
    {
        $cinemas = [];
        foreach (
            $this->repository->findAllBy(
                $request->getCriteria(),
                $request->getOrderBy(),
                $request->getLimit(),
                $request->getOffset()
            ) as $cinema
        ) {
            $cinemas[] = $this->normalizer->normalize($cinema);
        }

        return $cinemas;
    }
}