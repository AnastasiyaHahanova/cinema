<?php

declare(strict_types=1);

namespace App\Form\Type\Hall;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListHallType extends AbstractType
{
    public function getBlockPrefix(): string
    {
        return '';
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'required' => true,
                ]
            );

        $builder->add(
            'limit',
            TextType::class,
            [
                'required' => false,
                'empty_data' => 100,
            ]
        );

        $builder->add(
            'offset',
            TextType::class,
            [
                'required' => false,
                'empty_data' => 0,
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
            'allow_extra_fields' => true,
        ]);
    }
}