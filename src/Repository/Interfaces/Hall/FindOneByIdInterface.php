<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Hall;

use App\Entity\Hall\HallInterface;

interface FindOneByIdInterface
{
    public function findOneById(int $id): ?HallInterface;
}