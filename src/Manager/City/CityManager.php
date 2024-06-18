<?php

declare(strict_types=1);

namespace App\Manager\City;

use Doctrine\ORM\EntityManagerInterface;

class CityManager implements CityManagerInterface
{
    public function __construct(private readonly EntityManagerInterface $manager)
    {
    }

    public function create(...$cities): array
    {
        foreach ($cities as $city) {
            $this->manager->persist($city);
        }
        $this->manager->flush();

        return $cities;
    }

    public function update(...$cities): array
    {
        $this->manager->flush();

        return $cities;
    }

    public function delete(...$cities): array
    {
        foreach ($cities as $city) {
            $city->setDeleted(true);
        }
        $this->manager->flush();

        return $cities;
    }
}