<?php

declare(strict_types=1);

namespace App\Manager\Address;

use App\Entity\Address\AddressInterface;
use Doctrine\ORM\EntityManagerInterface;

class AddressManager implements AddressManagerInterface
{
    public function __construct(private readonly EntityManagerInterface $manager)
    {
    }

    /**
     * @param AddressInterface[] $categories
     *
     * @return AddressInterface[]
     */
    public function create(...$categories): array
    {
        foreach ($categories as $category) {
            $this->manager->persist($category);
        }
        $this->manager->flush();

        return $categories;
    }

    /**
     * @param AddressInterface[] $categories
     *
     * @return AddressInterface[]
     */
    public function update(...$categories): array
    {
        $this->manager->flush();

        return $categories;
    }

    /**
     * @param AddressInterface[] $categories
     *
     * @return AddressInterface[]
     */
    public function delete(...$categories): array
    {
        foreach ($categories as $category)
        {
            $category->setDeleted(true);
        }
        $this->manager->flush();

        return $categories;
    }

    /**
     * @param AddressInterface[] $categories
     *
     * @return AddressInterface[]
     */
    public function remove(...$categories): array
    {
        foreach ($categories as $category) {
            $this->manager->remove($category);
        }
        $this->manager->flush();

        return $categories;
    }
}