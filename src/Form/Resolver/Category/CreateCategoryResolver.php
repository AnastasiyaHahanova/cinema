<?php

declare(strict_types=1);

namespace App\Form\Resolver\Category;

use App\Entity\Category\Category;
use App\Entity\Category\CategoryInterface;
use App\Form\Resolver\FormResolverInterface;
use Symfony\Component\Form\FormInterface;

class CreateCategoryResolver implements FormResolverInterface
{
    public function resolve(FormInterface $form): CategoryInterface
    {
        $category = new Category();
        $category->setName(ucfirst($form->get('name')->getData()));

        return $category;
    }
}