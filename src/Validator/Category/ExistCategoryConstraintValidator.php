<?php

declare(strict_types=1);

namespace App\Validator\Category;

use App\Repository\Interfaces\Category\FindOneByIdInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ExistCategoryConstraintValidator extends ConstraintValidator
{
    public function __construct(public readonly FindOneByIdInterface $repository)
    {
    }

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof ExistCategoryConstraint) {
            throw new UnexpectedTypeException($constraint, ExistCategoryConstraint::class);
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