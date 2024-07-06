<?php

declare(strict_types=1);

namespace App\Manager\Address;

use App\Entity\Address\AddressInterface;

interface AddressManagerInterface
{
    /**
     * @param AddressInterface[] $categories
     *
     * @return AddressInterface[]
     */
    public function create(...$categories): array;

    /**
     * @param AddressInterface[] $categories
     *
     * @return AddressInterface[]
     */
    public function update(...$categories): array;

    /**
     * @param AddressInterface[] $categories
     *
     * @return AddressInterface[]
     */
    public function delete(...$categories): array;

    /**
     * @param AddressInterface[] $categories
     *
     * @return AddressInterface[]
     */
    public function remove(...$categories): array;
}