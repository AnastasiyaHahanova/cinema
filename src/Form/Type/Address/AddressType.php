<?php

declare(strict_types=1);

namespace App\Form\Type\Address;

use App\Validator\City\ExistCityConstraint;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints;

class AddressType extends AbstractType
{
    public function getBlockPrefix(): string
    {
        return '';
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->setMethod(Request::METHOD_POST);

        $builder
            ->add('flat', TextType::class, [
                'required' => false,
            ]);

        $builder
            ->add('description', TextType::class, [
                'required' => false,
            ]);

        $builder
            ->add('building', TextType::class, [
                'required' => true,
                'constraints'=>[
                    new Constraints\Required(),
                    new Constraints\NotBlank(),
                ]
            ]);
        $builder
            ->add('street_name', TextType::class, [
                'required' => true,
                'constraints'=>[
                    new Constraints\Required(),
                    new Constraints\NotBlank(),
                ]
            ]);
        $builder
            ->add('city_id', IntegerType::class, [
                'constraints' => [
                    new Constraints\Required(),
                    new Constraints\NotBlank(),
                    new ExistCityConstraint()
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
            'allow_extra_fields' => true,
        ]);
    }
}