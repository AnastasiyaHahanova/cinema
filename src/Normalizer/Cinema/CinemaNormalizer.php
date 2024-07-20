<?php

declare(strict_types=1);

namespace App\Normalizer\Cinema;

use App\Entity\Category\CategoryInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @method array getSupportedTypes(?string $format)
 */
class CinemaNormalizer implements NormalizerInterface
{
    /**
     * @param CategoryInterface $object
     * @param string|null       $format
     * @param array             $context
     *
     * @return array
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): array
    {
        return [
            'id' => $object->getId(),
            'name' => $object->getName(),
            'is_deleted' => $object->isDeleted(),
        ];
    }

    public function supportsNormalization(mixed $data, ?string $format = null): bool
    {
        return $data instanceof CategoryInterface;
    }
}