<?php

declare(strict_types=1);

namespace App\Repository\City;

use App\Entity\Address\City;
use App\Entity\Address\CityInterface;
use App\Repository\Interfaces\City\CityRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CityRepository extends ServiceEntityRepository implements CityRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, City::class);
    }

    /**
     * @return CityInterface[]
     */
    public function findAll(): array
    {
        $result = [];

        foreach ($this->findAll() as $city) {
            $result[$city->getCityCode()] = $city;
        }

        return $result;
    }

    public function findOneById(int $id): ?CityInterface
    {
        return $this->find($id);
    }
}