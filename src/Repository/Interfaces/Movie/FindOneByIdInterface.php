<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Movie;

use App\Entity\Movie\MovieInterface;

interface FindOneByIdInterface
{
    public function findOneById(int $id): ?MovieInterface;
}