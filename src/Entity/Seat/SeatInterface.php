<?php

declare(strict_types=1);

namespace App\Entity\Seat;

use App\Entity\Hall\HallInterface;
use App\Entity\Interfaces\DeleteInterface;

interface SeatInterface extends DeleteInterface
{
    public function getRow(): int;

    public function getSeat(): string;

    public function getHall(): HallInterface;
}