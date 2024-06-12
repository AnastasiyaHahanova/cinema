<?php

declare(strict_types=1);

namespace App\Controller\Admin\Movie;

use App\Entity\Movie\Movie;
use App\Entity\Movie\MovieInterface;
use App\Form\Resolver\FormResolver;
use App\Form\Type\Movie\MovieType;
use App\Normalizer\MovieNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/v1/movie/', name: 'movie.')]
class MovieController
{
    public function __construct(private readonly MovieNormalizer $normalizer)
    {
    }

    #[Route('/list', name: 'list')]
    public function list(): Response
    {
        return new JsonResponse();
    }

    #[Route('create', name: 'v1_create_movie', methods: ['POST'])]
    public function create(
        Request $request,
        #[FormResolver(
            MovieType::class,
            ''
        )] MovieInterface $movie
    ): MovieInterface
    {


        return $this->normalizer->normalize($movie);
    }

    #[Route('/edit', name: 'edit')]
    public function edit(): Response
    {
        return new JsonResponse();
    }
}