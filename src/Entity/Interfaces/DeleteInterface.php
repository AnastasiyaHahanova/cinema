<?php

declare(strict_types=1);

namespace App\Entity\Interfaces;

interface DeleteInterface
{
    public function isDeleted(): bool;

    public function setDeleted(bool $isDeleted): void;
}