<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Cinema;

use App\Entity\Cinema\CinemaInterface;

interface FindOneByIdInterface
{
    public function findOneById(int $id): ?CinemaInterface;
}