<?php

declare(strict_types=1);

namespace App\Entity\Movie;

use App\Entity\Category\Category;
use App\Entity\Category\CategoryInterface;
use App\Repository\Movie\MovieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
class Movie implements MovieInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    //
    #[ORM\Column(length: 255)]
    private string $name = '';
    //
    #[ORM\Column(name: 'duration', type: Types::BIGINT)]
    private int $duration = 0;
    //
    #[ORM\Column(name: 'rating', type: Types::BIGINT)]
    private int $rating = 0;
    //
    #[ORM\ManyToOne(targetEntity: Category::class, fetch: 'EAGER')]
    #[ORM\JoinColumn(name: 'category_id')]
    private readonly CategoryInterface $category;

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

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    public function getCategory(): CategoryInterface
    {
        return $this->category;
    }

    public function setCategory(CategoryInterface $category): void
    {
        $this->category = $category;
    }
}
