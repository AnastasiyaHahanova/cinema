<?php

declare(strict_types=1);

namespace App\Message\Ticket;

use App\Entity\Seat\SeatInterface;

class ReserveSeatMessage
{
    public function __construct(private readonly SeatInterface $seat)
    {
    }

    public function getSeat(): SeatInterface
    {
        return $this->seat;
    }
}