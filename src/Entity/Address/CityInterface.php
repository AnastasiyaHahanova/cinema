<?php

declare(strict_types=1);

namespace App\Entity\Address;

interface CityInterface
{
    public function getName(): string;

    public function getRegionName(): string;

    public function getCountryName(): string;

    public function getCityCode(): string;

    public function setCityCode(string $cityCode): void;
}