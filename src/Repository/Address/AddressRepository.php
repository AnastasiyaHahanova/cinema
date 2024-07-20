<?php

declare(strict_types=1);

namespace App\Repository\Address;

use App\Entity\Address\Address;
use App\Entity\Address\AddressInterface;
use App\Repository\Interfaces\Address\AddressRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AddressRepository extends ServiceEntityRepository implements AddressRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Address::class);
    }

    public function findAllBy(array $criteria, array $orderBy = null, $limit = null, $offset = null): array
    {
        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function findOneById(int $id): ?AddressInterface
    {
        return $this->find($id);
    }
}