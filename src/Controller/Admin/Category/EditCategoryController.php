<?php

declare(strict_types=1);

namespace App\Controller\Admin\Category;

use App\Entity\Category\CategoryInterface;
use App\Form\Resolver\Category\EditCategoryResolver;
use App\Form\Resolver\FormResolver;
use App\Form\Type\Category\CategoryType;
use App\Manager\Category\CategoryManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EditCategoryController
{
    public function __construct(
        private readonly CategoryManagerInterface $categoryManager,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/categories/{id}', name: 'v1.categories.edit', methods: Request::METHOD_PUT)]
    public function edit(
        #[FormResolver(
            CategoryType::class,
            EditCategoryResolver::class
        )] CategoryInterface $category
    ): array
    {
        $category = current($this->categoryManager->create($category));

        return $this->normalizer->normalize($category);
    }
}