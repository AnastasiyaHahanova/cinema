<?php

declare(strict_types=1);

namespace App\Controller\Admin\Address;

use App\Entity\Address\AddressInterface;
use App\Form\Resolver\Address\CreateAddressResolver;
use App\Form\Resolver\FormResolver;
use App\Form\Type\Address\AddressType;
use App\Manager\Address\AddressManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateAddressController
{
    public function __construct(
        private readonly AddressManagerInterface $manager,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/address', name: 'v1.address.create', methods: Request::METHOD_POST)]
    public function create(
        #[FormResolver(
            AddressType::class,
            CreateAddressResolver::class
        )] AddressInterface $address
    ): array
    {
        $address = current($this->manager->create($address));

        return $this->normalizer->normalize($address);
    }
}