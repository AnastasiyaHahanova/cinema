<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Address;

use App\Entity\Address\AddressInterface;

interface FindOneByIdInterface
{
    public function findOneById(int $id): ?AddressInterface;
}