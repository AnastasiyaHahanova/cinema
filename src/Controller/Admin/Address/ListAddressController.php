<?php

declare(strict_types=1);

namespace App\Controller\Admin\Address;

use App\Repository\Interfaces\Address\FindAllByInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ListAddressController
{
    public function __construct(
        private readonly FindAllByInterface $repository,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/address', name: 'v1.address.list', methods: Request::METHOD_GET)]
    public function create(): array
    {
        $addresses = [];
        foreach ($this->repository->findAllBy([]) as $address) {
            $addresses[] = $this->normalizer->normalize($address);
        }

        return $addresses;
    }
}