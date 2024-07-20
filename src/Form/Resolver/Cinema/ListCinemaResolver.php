<?php

declare(strict_types=1);

namespace App\Form\Resolver\Cinema;

use App\Form\Request\CriteriaInterface;
use App\Form\Request\CriteriaRequest;
use App\Form\Resolver\FormResolverInterface;
use Symfony\Component\Form\FormInterface;

class ListCinemaResolver implements FormResolverInterface
{
    public function resolve(FormInterface $form): CriteriaInterface
    {
        $criteria = [];
        if ($form->get('name')->getData()) {
            $criteria['name'] = $form->get('name')->getData();
        }

        return new CriteriaRequest(
            $criteria,
            [],
            $form->get('limit')->getData(),
            $form->get('offset')->getData()
        );
    }
}