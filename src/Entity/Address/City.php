<?php

declare(strict_types=1);

namespace App\Entity\Address;

use App\Repository\Address\CityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CityRepository::class)]
class City implements CityInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    //
    #[ORM\Column(length: 255)]
    private string $name = '';
    //
    #[ORM\Column(length: 255)]
    private string $regionName = '';

    //
    #[ORM\Column(length: 255)]
    private string $countryName = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getRegionName(): string
    {
        return $this->regionName;
    }

    public function setRegionName(string $regionName): void
    {
        $this->regionName = $regionName;
    }

    public function getCountryName(): string
    {
        return $this->countryName;
    }

    public function setCountryName(string $countryName): void
    {
        $this->countryName = $countryName;
    }
}
