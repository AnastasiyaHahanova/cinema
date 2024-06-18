<?php

declare(strict_types=1);

namespace App\Manager\City;

interface CityManagerInterface
{
    public function create(... $cities): array;

    public function update(... $cities): array;

    public function delete(... $cities): array;
}