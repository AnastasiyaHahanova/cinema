<?php

declare(strict_types=1);

namespace App\Normalizer\City;

use App\Entity\Address\CityInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CityNormalizer implements NormalizerInterface
{
    /**
     * @param CityInterface $object
     * @param string|null   $format
     * @param array         $context
     *
     * @return array
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): array
    {
        return [
            'name' => $object->getName(),
            'city_code' => $object->getCityCode(),
            'regione' => $object->getRegionName(),
            'country' => $object->getCountryName(),
        ];
    }

    public function supportsNormalization(mixed $data, ?string $format = null): bool
    {
        return $data instanceof CityInterface;
    }
}