<?php

declare(strict_types=1);

namespace App\Controller\Admin\Cinema;

use App\Entity\Cinema\CinemaInterface;
use App\Form\Resolver\Category\EditCategoryResolver;
use App\Form\Resolver\FormResolver;
use App\Form\Type\Category\CategoryType;
use App\Manager\Cinema\CinemaManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EditCinemaController
{
    public function __construct(
        private readonly CinemaManagerInterface $manager,
        private readonly NormalizerInterface $normalizer
    )
    {
    }

    #[Route('/v1/categories/{id}', name: 'v1.categories.edit', methods: Request::METHOD_PUT)]
    public function edit(
        #[FormResolver(
            CategoryType::class,
            EditCategoryResolver::class
        )] CinemaInterface $cinema
    ): array
    {
        $cinema = current($this->manager->create($cinema));

        return $this->normalizer->normalize($cinema);
    }
}