<?php

declare(strict_types=1);

namespace App\Repository\Interfaces\Movie;

interface MovieRepositoryInterface extends FindOneByIdInterface,
                                           FindAllByInterface
{
}