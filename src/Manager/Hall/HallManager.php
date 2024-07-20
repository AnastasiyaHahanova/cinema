<?php

declare(strict_types=1);

namespace App\Manager\Hall;

use App\Entity\Hall\HallInterface;
use Doctrine\ORM\EntityManagerInterface;

class HallManager implements HallManagerInterface
{
    public function __construct(private readonly EntityManagerInterface $manager)
    {
    }

    /**
     * @param HallInterface[] $halls
     *
     * @return HallInterface[]
     */
    public function create(...$halls): array
    {
        foreach ($halls as $hall) {
            $this->manager->persist($hall);
        }
        $this->manager->flush();

        return $halls;
    }

    /**
     * @param HallInterface[] $halls
     *
     * @return HallInterface[]
     */
    public function update(...$halls): array
    {
        $this->manager->flush();

        return $halls;
    }

    /**
     * @param HallInterface[] $halls
     *
     * @return HallInterface[]
     */
    public function delete(...$halls): array
    {
        foreach ($halls as $hall) {
            $hall->setDeleted(true);
        }
        $this->manager->flush();

        return $halls;
    }

    /**
     * @param HallInterface[] $halls
     *
     * @return HallInterface[]
     */
    public function remove(...$halls): array
    {
        foreach ($halls as $hall) {
           $this->manager->remove($hall);
        }
        $this->manager->flush();

        return $halls;
    }
}