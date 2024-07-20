<?php

declare(strict_types=1);

namespace App\Form\Resolver\Hall;

use App\Entity\Hall\HallInterface;
use App\Form\Resolver\FormResolverInterface;
use App\Repository\Interfaces\Hall\FindOneByIdInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class EditHallResolver implements FormResolverInterface
{
    public function __construct(
        private readonly RequestStack $requestStack,
        private readonly FindOneByIdInterface $repository
    )
    {
    }
    public function resolve(FormInterface $form): HallInterface
    {
        $id = $this->requestStack->getCurrentRequest()->attributes->getInt('id');
        $hall = $this->repository->findOneById($id);
        $hall->setName(ucfirst($form->get('name')->getData()));

        return $hall;
    }
}