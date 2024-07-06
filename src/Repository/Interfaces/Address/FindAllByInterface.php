<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Address;

use App\Entity\Address\AddressInterface;

interface FindAllByInterface
{
    /**
     * @return AddressInterface[]
     */
    public function findAllBy(array $criteria, array $orderBy = null, $limit = null, $offset = null): array;
}