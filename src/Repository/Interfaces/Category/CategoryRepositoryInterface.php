<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Category;

interface CategoryRepositoryInterface extends FindOneByIdInterface,
                                              FindAllByInterface
{
}