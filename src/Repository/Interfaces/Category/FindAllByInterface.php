<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Category;

use App\Entity\Category\CategoryInterface;

interface FindAllByInterface
{
    /**
     * @return CategoryInterface[]
     */
    public function findAllBy(array $criteria, array $orderBy = null, $limit = null, $offset = null): array;
}