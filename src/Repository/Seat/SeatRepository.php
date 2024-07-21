<?php

declare(strict_types=1);

namespace App\Repository\Seat;

use App\Entity\Seat\Seat;
use App\Repository\Interfaces\Seat\SeatRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SeatRepository extends ServiceEntityRepository implements SeatRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Seat::class);
    }
}