<?php

declare(strict_types=1);

namespace App\Entity\Cinema;

use App\Entity\Address\Address;
use App\Entity\Address\AddressInterface;
use App\Repository\Cinema\CinemaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CinemaRepository::class)]
class Cinema implements CinemaInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    //
    #[ORM\Column(length:  255)]
    private string $name = '';
    //
    #[ORM\ManyToOne(targetEntity: Address::class)]
    #[ORM\JoinColumn(name: 'address_id')]
    private AddressInterface $address;
    //
    #[ORM\Column(name: 'is_deleted', type: Types::BOOLEAN, options: ['default' => false])]
    private bool $isDeleted = false;

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

    public function getAddress(): AddressInterface
    {
        return $this->address;
    }

    public function setAddress(AddressInterface $address): void
    {
        $this->address = $address;
    }

    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function setDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }
}
