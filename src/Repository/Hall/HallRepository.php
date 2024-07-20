<?php

declare(strict_types=1);

namespace App\Repository\Hall;

use App\Entity\Hall\Hall;
use App\Entity\Hall\HallInterface;
use App\Repository\Interfaces\Hall\HallRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class HallRepository extends ServiceEntityRepository implements HallRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hall::class);
    }

    public function findAllBy(array $criteria, array $orderBy = null, $limit = null, $offset = null): array
    {
        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function findOneById(int $id): ?HallInterface
    {
        return $this->find($id);
    }
}