<?php

declare(strict_types=1);

namespace App\Entity\Movie;

use App\Entity\Category\CategoryInterface;

interface MovieInterface
{
    public function getName(): string;

    public function getDuration(): int;

    public function getRating(): int;

    public function getCategory(): CategoryInterface;
}