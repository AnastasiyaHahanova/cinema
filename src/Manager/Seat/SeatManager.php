<?php

declare(strict_types=1);

namespace App\Manager\Seat;

use Doctrine\ORM\EntityManagerInterface;

class SeatManager implements SeatManagerInterface
{
    public function __construct(private readonly EntityManagerInterface $manager)
    {
    }

    public function create(...$seats): array
    {
        foreach ($seats as $seat) {
            $this->manager->persist($seat);
        }
        $this->manager->flush();

        return $seats;
    }

    public function update(...$seats): array
    {
        $this->manager->flush();

        return $seats;
    }

    public function delete(...$seats): array
    {
        foreach ($seats as $seat) {
            $seat->setDeleted(true);
        }

        $this->manager->flush();

        return $seats;
    }

    public function remove(...$seats): array
    {
        foreach ($seats as $seat) {
            $this->manager->remove($seat);
        }
        $this->manager->flush();

        return $seats;
    }
}