<?php

declare(strict_types=1);

namespace App\Controller\Admin\Category;

use App\Entity\Category\CategoryInterface;
use App\Form\Resolver\Category\CreateCategoryResolver;
use App\Form\Resolver\FormResolver;
use App\Form\Type\Category\CategoryType;
use App\Manager\Category\CategoryManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateCategoryController
{
    public function __construct(
        private readonly CategoryManagerInterface $categoryManager,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/categories', name: 'v1.categories.create', methods: Request::METHOD_POST)]
    public function create(
        #[FormResolver(
            CategoryType::class,
            CreateCategoryResolver::class
        )] CategoryInterface $category
    ): array
    {
        $category = current($this->categoryManager->create($category));

        return $this->normalizer->normalize($category);
    }
}