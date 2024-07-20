<?php

declare(strict_types=1);

namespace App\Form\Resolver\Cinema;

use App\Entity\Cinema\Cinema;
use App\Entity\Cinema\CinemaInterface;
use App\Form\Resolver\FormResolverInterface;
use App\Repository\Interfaces\Address\FindOneByIdInterface;
use Symfony\Component\Form\FormInterface;

class CreateCinemaResolver implements FormResolverInterface
{
    public function __construct(public readonly FindOneByIdInterface $repository)
    {
    }

    public function resolve(FormInterface $form): CinemaInterface
    {
        $cinema = new Cinema();
        $cinema->setName(ucfirst($form->get('name')->getData()));
        $cinema->setAddress($this->repository->findOneById($form->get('address_id')->getData()));

        return $cinema;
    }
}