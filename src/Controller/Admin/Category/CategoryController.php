<?php

namespace App\Controller\Admin\Category;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category', name: 'category.')]
class CategoryController extends AbstractController
{
    #[Route('/list', name: 'list')]
    public function list(): Response
    {
        return new JsonResponse();
    }

    #[Route('/create', name: 'create', methods: ['POST'])]
    public function create(EntityManagerInterface $manager): Response
    {

        return $this->render('',[]);
    }

    #[Route('/edit', name: 'edit')]
    public function edit(): Response
    {
        return new JsonResponse();
    }
}