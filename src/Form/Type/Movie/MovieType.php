<?php

declare(strict_types=1);

namespace App\Form\Type\Movie;

use App\Validator\Category\ExistCategory;
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
                'empty_data' => 0,
            ]);
        $builder
            ->add('duration', IntegerType::class, [
                'constraints' => [
                    new Constraints\Required(),
                    new Constraints\NotBlank(),
                ],
            ]);
        $builder
            ->add('category_id', IntegerType::class, [
                'constraints' => [
                    new Constraints\Required(),
                    new Constraints\NotBlank(),
                    new ExistCategory()
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