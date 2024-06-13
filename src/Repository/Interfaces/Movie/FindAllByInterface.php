<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Movie;

use App\Entity\Movie\MovieInterface;

interface FindAllByInterface
{
    /**
     * @return MovieInterface[]
     */
    public function findAllBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null): array;
}