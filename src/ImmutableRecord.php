<?php

namespace Carlsson;

use Exception;

class ImmutableRecord {

    /**
     * The keys in this record.
     */
    protected $defaults = [];

    /**
     * The attriubutes of this instance.
     */
    private $attributes = [];

    protected function __construct(array $attributes)
    {
        foreach($this->defaults as $key => $defaultValue) {
            if (array_key_exists($key, $attributes)) {
                $this->attributes[$key] = $attributes[$key];
            } else {
                $this->attributes[$key] = $defaultValue;
            }
        }
    }

    /**
     * Get an attribute.
     *
     * @param string $key
     * @return mixed
     */
    final public function __get($key)
    {
        return $this->attributes[$key];
    }

    /**
     * Enforce immutability by throwing an exception.
     *
     * @param string $key
     * @param mixed $value
     * @throws Exception
     */
    final public function __set($key, $value)
    {
        throw new Exception(get_class($this) . " is immutable");
    }
}
