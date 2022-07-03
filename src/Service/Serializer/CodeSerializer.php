<?php

namespace App\Service\Serializer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;


final class CodeSerializer
{
    const IGNORED_ATTRIBUTES = [
        'DEFAULT' => [
            'active'
        ],
    ];


    /**
     * @throws ExceptionInterface
     */
    public function normalizeArray($objects, ?string $purpose = 'DEFAULT', ?string $format = null): ?array
    {
        $normalizedList = [];
        foreach ($objects as $object) {
            $normalizedList[] = $this->normalize($object, $purpose, $format);
        }

        return $normalizedList;
    }


    /**
     * @throws ExceptionInterface
     */
    public function normalize($object, ?string $purpose = 'DEFAULT', ?string $format = null)
    {
        $serializer = new Serializer([new ObjectNormalizer()]);

        return $serializer->normalize($object, $format, [
            AbstractNormalizer::IGNORED_ATTRIBUTES => self::IGNORED_ATTRIBUTES[$purpose],
            AbstractNormalizer::CALLBACKS => $this->getCallbacksByPurpose($purpose),
        ]);
    }

    protected function getCallbacksByPurpose(?string $purpose = 'DEFAULT'): array
    {
        $callbacks = [
            'DEFAULT' => [
                'datetime' => function ($datetime) {
                    return $datetime instanceof \DateTime ? $datetime->format("d.m.Y") : null;
                },

                'prices' => function ($prices) {
                    $result_array = [];
                    foreach ($prices as $item) {
                        $datetime = $item->getDatetime();
                        $result_array[] = [
                            'price' => $item->getPrice(),
                            'datetime' => $datetime instanceof \DateTime ? $datetime->format("d.m.Y") : null
                        ];
                    }
                    return $result_array;
                }
            ],
        ];

        return $callbacks[$purpose];
    }

}