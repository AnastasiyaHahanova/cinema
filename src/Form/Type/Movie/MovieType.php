<?php

declare(strict_types=1);

namespace App\Form\Type\Movie;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints;

class MovieType extends AbstractType
{
    public function getBlockPrefix(): string
    {
        return '';
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->setMethod(Request::METHOD_POST);
        $builder
            ->add('name', TextType::class, [
                'required' => true,
            ]);
        $builder
            ->add('name', TextType::class, [
                'required' => true,
            ]);
        $builder
            ->add('rating', IntegerType::class, [
                'required' => true,
            ]);
        $builder
            ->add('duration', IntegerType::class, [
                'required' => true,
                'constraints'=>[
                    new Constraints\Required(),
                    new Constraints\NotBlank()
                ]
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