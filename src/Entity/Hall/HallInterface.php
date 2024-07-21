<?php

declare(strict_types=1);

namespace App\Entity\Hall;

use App\Entity\Interfaces\DeleteInterface;

interface HallInterface extends DeleteInterface
{
    public function getName(): string;
}