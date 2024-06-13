<?php

declare(strict_types=1);

namespace App\Repository\Movie;

use App\Entity\Movie\Movie;
use App\Entity\Movie\MovieInterface;
use App\Repository\Interfaces\Movie\MovieRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Movie>
 *
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository implements MovieRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    public function findOneById(int $id): ?MovieInterface
    {
        return $this->find($id);
    }

    public function findAllBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null): array
    {
        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }
}
