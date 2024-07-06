<?php

declare(strict_types=1);

namespace App\Controller\Admin\Category;

use App\Repository\Interfaces\Category\FindAllByInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ListCategoryController
{
    public function __construct(
        private readonly FindAllByInterface $repository,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/categories', name: 'v1.categories.list', methods: Request::METHOD_GET)]
    public function list(): array
    {
        $categories = [];
        foreach ($this->repository->findAllBy([]) as $category) {
            $categories[] = $this->normalizer->normalize($category);
        }

        return $categories;
    }
}