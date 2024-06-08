<?php

declare(strict_types=1);

namespace App\Controller\Admin\Movie;

use App\Entity\Movie;
use App\Form\Movie\MovieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/v1/movie/', name: 'movie.')]
class MovieController extends AbstractController
{
    #[Route('/list', name: 'list')]
    public function list(): Response
    {
        return new JsonResponse();
    }

    #[Route('create', name: 'v1_create_movie', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $manager): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieType::class, $movie);
        $form->submit($request->toArray());
        $manager->persist($movie);
        $manager->flush();

        return new JsonResponse();
    }

    #[Route('/edit', name: 'edit')]
    public function edit(): Response
    {
        return new JsonResponse();
    }
}