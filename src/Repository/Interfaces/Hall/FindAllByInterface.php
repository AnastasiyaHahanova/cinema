<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Hall;

use App\Entity\Hall\HallInterface;

interface FindAllByInterface
{
    /**
     * @return HallInterface[]
     */
    public function findAllBy(array $criteria, array $orderBy = null, $limit = null, $offset = null): array;
}