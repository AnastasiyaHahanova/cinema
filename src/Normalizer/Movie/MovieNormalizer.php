<?php

declare(strict_types=1);

namespace App\Normalizer\Movie;

use App\Entity\Movie\MovieInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @method array getSupportedTypes(?string $format)
 */
class MovieNormalizer implements NormalizerInterface
{
    public function __construct(
        private readonly NormalizerInterface $categoryNormalizer
    )
    {
    }

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
            'duration' => $object->getDuration(),
            'rating' => $object->getRating(),
            'category' => $this->categoryNormalizer->normalize($object->getCategory()),
        ];
    }

    public function supportsNormalization(mixed $data, ?string $format = null): bool
    {
        return $data instanceof MovieInterface;
    }
}