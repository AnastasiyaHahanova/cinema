<?php

declare(strict_types=1);

namespace App\Form\Resolver\Category;

use App\Entity\Category\CategoryInterface;
use App\Form\Resolver\FormResolverInterface;
use App\Repository\Interfaces\Category\FindOneByIdInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class EditCategoryResolver implements FormResolverInterface
{
    public function __construct(
        private readonly RequestStack $requestStack,
        private readonly FindOneByIdInterface $repository
    )
    {
    }

    public function resolve(FormInterface $form): CategoryInterface
    {
        $id = $this->requestStack->getCurrentRequest()->attributes->getInt('id');
        $category = $this->repository->findOneById($id);
        $category->setName(ucfirst($form->get('name')->getData()));

        return $category;
    }
}