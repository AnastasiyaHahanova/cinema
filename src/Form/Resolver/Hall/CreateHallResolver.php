<?php

declare(strict_types=1);

namespace App\Form\Resolver\Hall;

use App\Entity\Hall\Hall;
use App\Entity\Hall\HallInterface;
use App\Form\Resolver\FormResolverInterface;
use Symfony\Component\Form\FormInterface;

class CreateHallResolver implements FormResolverInterface
{
    public function resolve(FormInterface $form): HallInterface
    {
        $hall = new Hall();
        $hall->setName(ucfirst($form->get('name')->getData()));

        return $hall;
    }
}