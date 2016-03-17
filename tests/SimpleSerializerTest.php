<?php

namespace Simgroep\BroadwaySimpleSerializer\Tests;

use Simgroep\BroadwaySimpleSerializer\SimpleSerializer;

class SimpleSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_serializes_object_into_valid_array()
    {
        $serializer = new SimpleSerializer();

        $subject = new Car('bmw', 'black');

        $this->assertSame([
            'payload' => [
                'brand' => 'bmw',
                'color' => 'black'
            ],
            'class' => 'Simgroep\BroadwaySimpleSerializer\Tests\Car'
        ], $serializer->serialize($subject));
    }

    /**
     * @test
     */
    public function it_deserializes_array_into_valid_object()
    {
        $serializer = new SimpleSerializer();

        $subject = new Car('bmw', 'black');

        $this->assertEquals($subject, $serializer->deserialize([
            'payload' => [
                'brand' => 'bmw',
                'color' => 'black'
            ],
            'class' => 'Simgroep\BroadwaySimpleSerializer\Tests\Car'
        ]));
    }
}

class Car {

    private $brand;
    private $color;

    public function __construct($brand, $color)
    {
        $this->brand = $brand;
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }
}
