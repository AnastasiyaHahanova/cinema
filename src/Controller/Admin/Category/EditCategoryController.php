<?php

declare(strict_types=1);

namespace App\Controller\Admin\Category;

use App\Entity\Category\CategoryInterface;
use App\Form\Resolver\Category\CreateCategoryResolver;
use App\Form\Resolver\FormResolver;
use App\Form\Type\Category\CategoryType;
use App\Manager\Category\CategoryManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EditCategoryController extends AbstractController
{
    public function __construct(
        private readonly CategoryManagerInterface $categoryManager,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/categories', name: 'v1.categories.edit', methods: Request::METHOD_PUT)]
    public function create(
        #[FormResolver(
            CategoryType::class,
            CreateCategoryResolver::class
        )] CategoryInterface $category
    ): array
    {
        $category = $this->categoryManager->create($category);

        return new JsonResponse($this->normalizer->normalize($category));
    }
}