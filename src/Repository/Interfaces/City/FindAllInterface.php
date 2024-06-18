<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\City;

use App\Entity\Address\CityInterface;

interface FindAllInterface
{
    /**
     * @return CityInterface[]
     */
    public function findAll(): array;
}