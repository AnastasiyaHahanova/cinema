<?php

declare(strict_types=1);

namespace App\Entity\Address;

use App\Entity\Interfaces\DeleteInterface;

interface AddressInterface extends DeleteInterface
{
    public function getFlat(): string;

    public function setFlat(string $flat): void;

    public function getBuilding(): string;

    public function setBuilding(string $building): void;

    public function getStreetName(): string;

    public function setStreetName(string $streetName): void;

    public function getDescription(): string;

    public function setDescription(string $description): void;

    public function getCity(): CityInterface;

    public function setCity(CityInterface $city): void;
}