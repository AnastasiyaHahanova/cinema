<?php

declare(strict_types=1);

use App\Entity\Category\Category;
use App\Entity\Category\CategoryInterface;
use App\Entity\Movie\Movie;
use App\Entity\Movie\MovieInterface;
use Symfony\Config\DoctrineConfig;

// @formatter:off
return static function (DoctrineConfig $doctrineConfig): void {
    $doctrineConfig->orm()->resolveTargetEntity(CategoryInterface::class, Category::class);
    $doctrineConfig->orm()->resolveTargetEntity(MovieInterface::class, Movie::class);
};
 