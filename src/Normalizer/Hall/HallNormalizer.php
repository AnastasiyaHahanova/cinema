<?php

declare(strict_types=1);

namespace App\Normalizer\Hall;

use App\Entity\Movie\MovieInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @method array getSupportedTypes(?string $format)
 */
class HallNormalizer implements NormalizerInterface
{
    /**
     * @param MovieInterface $object
     * @param string|null    $format
     * @param array          $context
     *
     * @return array
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): array
    {
        return [
            'id' => $object->getId(),
            'name' => $object->getName(),
        ];
    }

    public function supportsNormalization(mixed $data, ?string $format = null): bool
    {
        return $data instanceof MovieInterface;
    }
}