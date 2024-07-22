<?php

declare(strict_types=1);

namespace App\Manager\Seat;

use App\Entity\Seat\SeatInterface;

interface SeatManagerInterface
{
    /**
     * @param SeatInterface[] $seats
     *
     * @return SeatInterface[]
     */
    public function create(...$seats): array;

    /**
     * @param SeatInterface[] $seats
     *
     * @return SeatInterface[]
     */
    public function update(...$seats): array;

    /**
     * @param SeatInterface[] $seats
     *
     * @return SeatInterface[]
     */
    public function delete(...$seats): array;

    /**
     * @param SeatInterface[] $seats
     *
     * @return SeatInterface[]
     */
    public function remove(...$seats): array;
}