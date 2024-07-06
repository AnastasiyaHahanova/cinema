<?php

declare(strict_types=1);

namespace App\Manager\Category;

use App\Entity\Category\CategoryInterface;

interface CategoryManagerInterface
{
    /**
     * @param CategoryInterface[] $categories
     *
     * @return CategoryInterface[]
     */
    public function create(...$categories): array;

    /**
     * @param CategoryInterface[] $categories
     *
     * @return CategoryInterface[]
     */
    public function update(...$categories): array;

    /**
     * @param CategoryInterface[] $categories
     *
     * @return CategoryInterface[]
     */
    public function delete(...$categories): array;

    /**
     * @param CategoryInterface[] $categories
     *
     * @return CategoryInterface[]
     */
    public function remove(...$categories): array;
}