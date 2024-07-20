<?php

declare(strict_types=1);

namespace App\Manager\Hall;

use App\Entity\Hall\HallInterface;

interface HallManagerInterface
{
    /**
     * @param HallInterface[] $categories
     *
     * @return HallInterface[]
     */
    public function create(...$categories): array;

    /**
     * @param HallInterface[] $categories
     *
     * @return HallInterface[]
     */
    public function update(...$categories): array;

    /**
     * @param HallInterface[] $categories
     *
     * @return HallInterface[]
     */
    public function delete(...$categories): array;

    /**
     * @param HallInterface[] $categories
     *
     * @return HallInterface[]
     */
    public function remove(...$categories): array;
}