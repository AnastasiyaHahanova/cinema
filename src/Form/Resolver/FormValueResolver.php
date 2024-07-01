<?php

declare(strict_types=1);

namespace App\Form\Resolver;

use App\Exception\Form\Resolver\FormResolverNotFoundException;
use App\Exception\Form\Type\FormErrorsException;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Traversable;

class FormValueResolver implements ValueResolverInterface
{
    /**
     * @var array<string|class-string, FormResolverInterface> $converters
     */
    private readonly array $resolvers;

    /**
     * @param FormFactoryInterface                                    $factory
     * @param Traversable<string|class-string, FormResolverInterface> $resolvers
     */
    public function __construct(
        private readonly FormFactoryInterface $factory,
        Traversable $resolvers,
    )
    {
        $this->resolvers = iterator_to_array($resolvers);
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        /**
         * @var FormResolver[] $attributes
         */
        $attributes = $argument->getAttributesOfType(FormResolver::class, ArgumentMetadata::IS_INSTANCEOF);

        if (empty($attributes)) {
            return [];
        }

        foreach ($attributes as $attribute) {
            $resolver = $this->resolvers[$attribute->getResolver()]
                ?? throw new FormResolverNotFoundException($attribute->getResolver());

            $form = $this->factory
                ->create(type: $attribute->getType(), options: $attribute->getOptions())
                ->handleRequest($request);

            $content = [];
            if (!empty($request->getContent())) {
                $content = $request->toArray();
            }

            $query = $request->query->all();
            $data = array_merge($content, $query);
            $form->submit($data);
            if (!$form->isValid()) {
                $errors = [];
                foreach ($form->getErrors(true) as $error) {
                    $errors[$error->getOrigin()->getName()] = $error->getMessage();
                }
                throw new FormErrorsException($errors);
            }

            yield $resolver->resolve($form);
        }
    }
}