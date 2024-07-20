<?php

declare(strict_types=1);

namespace App\Controller\Admin\Hall;

use App\Entity\Hall\HallInterface;
use App\Form\Resolver\FormResolver;
use App\Form\Resolver\Hall\CreateHallResolver;
use App\Form\Type\Hall\HallType;
use App\Manager\Hall\HallManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateHallController
{
    public function __construct(
        private readonly HallManagerInterface $manager,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/halls', name: 'v1.halls.create', methods: Request::METHOD_POST)]
    public function create(
        #[FormResolver(
            HallType::class,
            CreateHallResolver::class
        )] HallInterface $hall
    ): array
    {
        $hall = current($this->manager->create($hall));

        return $this->normalizer->normalize($hall);
    }
}