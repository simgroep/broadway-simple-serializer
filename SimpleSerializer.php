<?php

namespace Simgroep\BroadwaySimpleSerializer;

use Broadway\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class SimpleSerializer implements SerializerInterface
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer([
            new ObjectNormalizer()
        ], []);
    }

    public function serialize($object)
    {
        return [
            'payload' => $this->serializer->normalize($object),
            'class'   => get_class($object)
        ];
    }

    public function deserialize(array $serializedObject)
    {
        return $this->serializer->denormalize(
            $serializedObject['payload'],
            $serializedObject['class']
        );
    }
}
