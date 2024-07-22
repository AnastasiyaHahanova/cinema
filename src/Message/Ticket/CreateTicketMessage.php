<?php

declare(strict_types=1);

namespace App\Message\Ticket;

use App\Entity\Movie\MovieInterface;
use App\Entity\Seat\SeatInterface;

class CreateTicketMessage
{
    public function __construct(
        private readonly MovieInterface $movie,
        private readonly SeatInterface $seat
    )
    {
    }

    public function getMovie(): MovieInterface
    {
        return $this->movie;
    }

    public function getSeat(): SeatInterface
    {
        return $this->seat;
    }

    public function getDateTime()
    {

    }
}