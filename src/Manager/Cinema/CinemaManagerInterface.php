<?php

declare(strict_types=1);

namespace App\Manager\Cinema;


use App\Entity\Cinema\CinemaInterface;

interface CinemaManagerInterface
{
    /**
     * @param CinemaInterface[] $categories
     *
     * @return CinemaInterface[]
     */
    public function create(...$categories): array;

    /**
     * @param CinemaInterface[] $categories
     *
     * @return CinemaInterface[]
     */
    public function update(...$categories): array;

    /**
     * @param CinemaInterface[] $categories
     *
     * @return CinemaInterface[]
     */
    public function delete(...$categories): array;

    /**
     * @param CinemaInterface[] $categories
     *
     * @return CinemaInterface[]
     */
    public function remove(...$categories): array;
}