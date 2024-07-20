<?php

declare(strict_types=1);

namespace App\Controller\Admin\Cinema;

use App\Entity\Cinema\CinemaInterface;
use App\Form\Resolver\Cinema\CreateCinemaResolver;
use App\Form\Resolver\FormResolver;
use App\Form\Type\Cinema\CinemaType;
use App\Manager\Cinema\CinemaManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateCinemaController
{
    public function __construct(
        private readonly CinemaManagerInterface $manager,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/cinemas', name: 'v1.cinemas.create', methods: Request::METHOD_POST)]
    public function create(
        #[FormResolver(
            CinemaType::class,
            CreateCinemaResolver::class
        )] CinemaInterface $cinema
    ): array
    {
        $cinema = current($this->manager->create($cinema));

        return $this->normalizer->normalize($cinema);
    }
}