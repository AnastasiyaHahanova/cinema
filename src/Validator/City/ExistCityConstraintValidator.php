<?php

declare(strict_types=1);

namespace App\Validator\City;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use App\Repository\Interfaces\City\FindOneByIdInterface;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ExistCityConstraintValidator extends ConstraintValidator
{
    public function __construct(public readonly FindOneByIdInterface $repository)
    {
    }

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof ExistCityConstraint) {
            throw new UnexpectedTypeException($constraint, ExistCityConstraint::class);
        }

        if (empty($value)) {
            return;
        }

        if (empty($this->repository->findOneById($value))) {
            $this->context
                ->buildViolation($constraint->message)
                ->setParameter('{{ id }}', (string)$value)
                ->addViolation();
        }
    }
}