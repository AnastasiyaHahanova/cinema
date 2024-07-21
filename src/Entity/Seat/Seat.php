<?php

declare(strict_types=1);

namespace App\Entity\Seat;

use App\Entity\Hall\Hall;
use App\Entity\Hall\HallInterface;
use App\Repository\Seat\SeatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeatRepository::class)]
class Seat implements SeatInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    //
    #[ORM\Column(length: 255)]
    private string $seat = '';
    //
    #[ORM\Column(name: 'row', type: Types::BIGINT)]
    private int $row;
    //
    #[ORM\ManyToOne(targetEntity: Hall::class)]
    #[ORM\JoinColumn(name: 'hall_id')]
    private HallInterface $hall;
    //
    #[ORM\Column(name: 'is_deleted', type: Types::BOOLEAN, options: ['default' => false])]
    private bool $isDeleted = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeat(): string
    {
        return $this->seat;
    }

    public function setSeat(string $seat): static
    {
        $this->seat = $seat;

        return $this;
    }

    public function getRow(): int
    {
        return $this->row;
    }

    public function setRow(int $row): void
    {
        $this->row = $row;
    }

    public function getHall(): HallInterface
    {
        return $this->hall;
    }

    public function setHall(HallInterface $hall): void
    {
        $this->hall = $hall;
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
