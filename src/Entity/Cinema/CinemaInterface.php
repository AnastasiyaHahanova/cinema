<?php

declare(strict_types=1);

namespace App\Entity\Cinema;

use App\Entity\Interfaces\DeleteInterface;

interface CinemaInterface extends DeleteInterface
{
    public function getName(): string;
}