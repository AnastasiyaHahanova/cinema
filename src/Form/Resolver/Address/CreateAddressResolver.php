<?php

declare(strict_types=1);

namespace App\Form\Resolver\Address;

use App\Entity\Address\Address;
use App\Entity\Address\AddressInterface;
use App\Form\Resolver\FormResolverInterface;
use App\Repository\Interfaces\City\FindOneByIdInterface;
use Symfony\Component\Form\FormInterface;

class CreateAddressResolver implements FormResolverInterface
{
    public function __construct(private readonly FindOneByIdInterface $repository)
    {
    }

    public function resolve(FormInterface $form): AddressInterface
    {
        $address = new Address();
        $city = $this->repository->findOneById($form->get('city_id')->getData());
        $address->setFlat($form->get('flat')->getData());
        $address->setBuilding($form->get('building')->getData());
        $address->setStreetName($form->get('street_name')->getData());
        $address->setCity($city);
        $address->setDescription($form->get('description')->getData());

        return $address;
    }
}