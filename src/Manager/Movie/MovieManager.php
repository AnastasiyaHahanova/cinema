<?php

declare(strict_types=1);

namespace App\Manager\Movie;

use App\Entity\Movie\MovieInterface;
use Doctrine\ORM\EntityManagerInterface;

class MovieManager implements MovieManagerInterface
{
    public function __construct(private readonly EntityManagerInterface $manager)
    {
    }

    /**
     * @param MovieInterface[] $movies
     *
     * @return MovieInterface[]
     */
    public function create(...$movies): array
    {
        foreach ($movies as $movie) {
            $this->manager->persist($movie);
        }
        $this->manager->flush();

        return $movies;
    }

    /**
     * @param MovieInterface[] $movies
     *
     * @return MovieInterface[]
     */
    public function update(...$movies): array
    {
        $this->manager->flush();

        return $movies;
    }

    /**
     * @param MovieInterface[] $movies
     *
     * @return MovieInterface[]
     */
    public function remove(...$movies): array
    {
        foreach ($movies as $movie) {
            $this->manager->remove($movie);
        }
        $this->manager->flush();

        return $movies;
    }
}