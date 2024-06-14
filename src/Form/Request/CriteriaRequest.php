<?php

declare(strict_types=1);

namespace App\Form\Request;

class CriteriaRequest implements CriteriaInterface
{
    public function __construct(
        private readonly array $criteria,
        private readonly array $orderBy,
        private readonly int $limit,
        private readonly int $offset
    )
    {
    }

    public function getCriteria(): array
    {
        return $this->criteria;
    }

    public function getOrderBy(): array
    {
        return $this->orderBy;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }
}