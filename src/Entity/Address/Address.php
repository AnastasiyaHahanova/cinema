<?php

declare(strict_types=1);

namespace App\Entity\Address;

use App\Repository\Address\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address implements AddressInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    //
    #[ORM\Column(length: 255)]
    private string $flat = '';
    //
    #[ORM\Column(length: 255)]
    private string $building = '';
    //
    #[ORM\Column(length: 255)]
    private string $streetName = '';
    //
    #[ORM\ManyToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(name: 'city_id')]
    private CityInterface $city;
    //
    #[ORM\Column(length: 255)]
    private string $description = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getFlat(): string
    {
        return $this->flat;
    }

    public function setFlat(string $flat): void
    {
        $this->flat = $flat;
    }

    public function getBuilding(): string
    {
        return $this->building;
    }

    public function setBuilding(string $building): void
    {
        $this->building = $building;
    }

    public function getStreetName(): string
    {
        return $this->streetName;
    }

    public function setStreetName(string $streetName): void
    {
        $this->streetName = $streetName;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCity(): CityInterface
    {
        return $this->city;
    }

    public function setCity(CityInterface $city): void
    {
        $this->city = $city;
    }
}