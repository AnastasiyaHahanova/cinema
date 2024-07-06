<?php

declare(strict_types=1);

namespace App\Controller\Admin\Category;

use App\Exception\Entity\NotFoundEntityException;
use App\Manager\Category\CategoryManagerInterface;
use App\Repository\Interfaces\Category\FindOneByIdInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DeleteCategoryController
{
    public function __construct(
        private readonly FindOneByIdInterface $repository,
        private readonly CategoryManagerInterface $categoryManager,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/categories/{id}', name: 'v1.categories.delete', methods: Request::METHOD_DELETE)]
    public function delete(int $id): array
    {
        $category = $this->repository->findOneById($id) ?? throw new NotFoundEntityException($id);
        $this->categoryManager->delete($category);

        return $this->normalizer->normalize($category);
    }
}