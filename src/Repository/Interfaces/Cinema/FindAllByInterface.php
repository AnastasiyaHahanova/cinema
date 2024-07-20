<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Cinema;


use App\Entity\Cinema\CinemaInterface;

interface FindAllByInterface
{
    /**
     * @return CinemaInterface[]
     */
    public function findAllBy(array $criteria, array $orderBy = null, $limit = null, $offset = null): array;
}