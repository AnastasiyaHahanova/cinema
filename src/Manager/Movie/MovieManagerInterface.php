<?php

declare(strict_types=1);

namespace App\Manager\Movie;

use App\Entity\Movie\MovieInterface;

interface MovieManagerInterface
{
    /**
     * @param MovieInterface[] $movies
     *
     * @return MovieInterface[]
     */
    public function create(...$movies): array;

    /**
     * @param MovieInterface[] $movies
     *
     * @return MovieInterface[]
     */
    public function update(...$movies): array;

    /**
     * @param MovieInterface[] $movies
     *
     * @return MovieInterface[]
     */
    public function remove(...$movies): array;
}