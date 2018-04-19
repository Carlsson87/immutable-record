<?php

use PHPUnit\Framework\TestCase;
use Carlsson\ImmutableRecord;

class Person extends ImmutableRecord {
    
    protected $defaults = [
        "firstname" => "Jess",
        "lastname" => "Bow"
    ];

    public static function fromArray(array $attributes)
    {
        return new static($attributes);
    }
}

class ImmutableRecordTest extends TestCase {

    /**
     * @test
     */
    public function canBeConstructed()
    {
        $person = Person::fromArray([
            "firstname" => "John",
            "lastname" => "Doe"
        ]);

        $this->assertEquals("John", $person->firstname);
        $this->assertEquals("Doe", $person->lastname);
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function cantBeMutated()
    {
        $person = Person::fromArray([
            "firstname" => "John",
            "lastname" => "Doe"
        ]);

        $person->firstname = "Jane";
    }

    /**
     * @test
     */
    public function hasDefaultValues()
    {
        $person = Person::fromArray([]);
        $this->assertEquals("Jess", $person->firstname);
        $this->assertEquals("Bow", $person->lastname);
    }
}
