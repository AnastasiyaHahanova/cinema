<?php

declare(strict_types=1);

namespace App\Controller\Admin\Category;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CreateCategoryController extends AbstractController
{
    public function __construct()
    {
    }

    #[Route('/v1/categories', name: 'v1.categories.create')]
    public function create(): array
    {
        return new JsonResponse();
    }
}