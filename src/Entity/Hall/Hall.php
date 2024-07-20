<?php

declare(strict_types=1);

namespace App\Entity\Hall;

use App\Repository\Hall\HallRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HallRepository::class)]
class Hall implements HallInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    //
    #[ORM\Column(length:  255)]
    private string $name = '';
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

    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function setDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }
}
