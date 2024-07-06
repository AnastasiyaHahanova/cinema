<?php

declare(strict_types=1);

namespace App\Manager\Category;

use App\Entity\Category\CategoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class CategoryManager implements CategoryManagerInterface
{
    public function __construct(private readonly EntityManagerInterface $manager)
    {
    }

    /**
     * @param CategoryInterface[] $categories
     *
     * @return CategoryInterface[]
     */
    public function create(...$categories): array
    {
        foreach ($categories as $category) {
            $this->manager->persist($category);
        }
        $this->manager->flush();

        return $categories;
    }

    /**
     * @param CategoryInterface[] $categories
     *
     * @return CategoryInterface[]
     */
    public function update(...$categories): array
    {
        $this->manager->flush();

        return $categories;
    }

    /**
     * @param CategoryInterface[] $categories
     *
     * @return CategoryInterface[]
     */
    public function delete(...$categories): array
    {
        foreach ($categories as $category)
        {
            $category->setDeleted(true);
        }
        $this->manager->flush();

        return $categories;
    }

    /**
     * @param CategoryInterface[] $categories
     *
     * @return CategoryInterface[]
     */
    public function remove(...$categories): array
    {
        foreach ($categories as $category) {
            $this->manager->remove($category);
        }
        $this->manager->flush();

        return $categories;
    }
}