<?php

declare(strict_types=1);

namespace App\Repository\Cinema;

use App\Entity\Cinema\Cinema;
use App\Entity\Cinema\CinemaInterface;
use App\Repository\Interfaces\Cinema\CinemaRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cinema>
 *
 * @method Cinema|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cinema|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cinema[]    findAll()
 * @method Cinema[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CinemaRepository extends ServiceEntityRepository implements CinemaRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cinema::class);
    }

    public function findAllBy(array $criteria, array $orderBy = null, $limit = null, $offset = null) : array
    {
        return $this->findBy(
            $criteria,
            $orderBy,
            $limit,
            $offset
        );
    }

    public function findOneById(int $id): ?CinemaInterface
    {
        return $this->find($id);
    }
}
