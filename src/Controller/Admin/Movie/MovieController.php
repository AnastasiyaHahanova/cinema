<?php

namespace App\Controller\Admin\Movie;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movie', name: 'movie.')]
class MovieController
{
    #[Route('/list', name: 'list')]
    public function list(): Response
    {
        return new JsonResponse();
    }

    #[Route('/create', name: 'create')]
    public function create(): Response
    {
        return new JsonResponse();
    }

    #[Route('/edit', name: 'edit')]
    public function edit(): Response
    {
        return new JsonResponse();
    }
}