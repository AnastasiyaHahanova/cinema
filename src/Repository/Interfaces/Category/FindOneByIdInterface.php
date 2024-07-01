<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Category;

use App\Entity\Category\CategoryInterface;

interface FindOneByIdInterface
{
    public function findOneById(int $id): ?CategoryInterface;
}