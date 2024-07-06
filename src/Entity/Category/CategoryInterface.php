<?php

declare(strict_types=1);

namespace App\Entity\Category;

use App\Entity\Interfaces\DeleteInterface;

interface CategoryInterface extends DeleteInterface
{
    public function getName(): string;
}