<?php

declare(strict_types=1);

namespace App\Normalizer\Address;

use App\Entity\Address\AddressInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AddressNormalizer implements NormalizerInterface
{
    public function __construct(private readonly NormalizerInterface $cityNormalizer)
    {
    }

    /**
     * @param AddressInterface $object
     * @param string|null      $format
     * @param array            $context
     *
     * @return array
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): array
    {
        return [
            'id' => $object->getId(),
            'flat' => $object->getFlat(),
            'building' => $object->getBuilding(),
            'street' => $object->getStreetName(),
            'city' => $this->cityNormalizer->normalize($object->getCity()),
            'description' => $object->getDescription(),
            'is_deleted' => $object->isDeleted(),
        ];
    }

    public function supportsNormalization(mixed $data, ?string $format = null): bool
    {
        return $data instanceof AddressInterface;
    }
}