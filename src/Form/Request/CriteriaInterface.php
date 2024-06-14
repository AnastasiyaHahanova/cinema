<?php

declare(strict_types=1);

namespace App\Form\Request;

interface CriteriaInterface
{
    public function getCriteria(): array;

    public function getOrderBy(): array;

    public function getLimit(): int;

    public function getOffset(): int;
}