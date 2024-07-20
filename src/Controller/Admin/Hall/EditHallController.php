<?php

declare(strict_types=1);

namespace App\Controller\Admin\Hall;

use App\Entity\Hall\HallInterface;
use App\Form\Resolver\FormResolver;
use App\Form\Resolver\Hall\EditHallResolver;
use App\Form\Type\Hall\HallType;
use App\Manager\Hall\HallManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EditHallController
{
    public function __construct(
        private readonly HallManagerInterface $manager,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/halls', name: 'v1.halls.edit', methods: Request::METHOD_PUT)]
    public function edit(
        #[FormResolver(
            HallType::class,
            EditHallResolver::class
        )] HallInterface $hall
    ): array
    {
        $hall = current($this->manager->update($hall));

        return $this->normalizer->normalize($hall);
    }
}