<?php

namespace Dakralex\ClickupParty\Data;

use ArrayAccess;
use Dakralex\ClickupParty\Concerns\HasProperties;
use JsonException;
use JsonSerializable;

abstract class Model implements ArrayAccess, JsonSerializable
{
    use HasProperties;

    public string $entityIdentifier = 'model';

    public bool $existsRemotely = false;

    public function __construct($properties = [], $existsRemotely = false)
    {
        $this->fill($properties);
        $this->existsRemotely = $existsRemotely;
    }

    /**
     * Fill the properties in bulk.
     *
     * @param array $properties
     * @return $this
     */
    public function fill(array $properties = []): self
    {
        foreach ($properties as $key => $value) {
            $this->setProperty($key, $value);
        }

        return $this;
    }

    /**
     * Dynamically get property.
     *
     * @param string $key
     * @return mixed|null
     */
    public function __get(string $key)
    {
        return $this->offsetGet($key);
    }

    /**
     * Dynamically set property.
     *
     * @param string $key
     * @param $value
     * @return void
     */
    public function __set(string $key, $value)
    {
        $this->offsetSet($key, $value);
    }

    /**
     * Check whether property is set.
     *
     * @param string $key
     * @return bool
     */
    public function __isset(string $key): bool
    {
        return $this->offsetExists($key);
    }

    /**
     * Unset a property.
     *
     * @param string $key
     * @return void
     */
    public function __unset(string $key)
    {
        $this->offsetUnset($key);
    }

    /**
     * Check whether offset exists in instance.
     *
     * @param $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return !is_null($this->getProperty($offset));
    }

    /**
     * Return the value of an offset.
     *
     * @param $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->getProperty($offset);
    }

    /**
     * Set the value of an offset.
     *
     * @param $offset
     * @param $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->setProperty($offset, $value);
    }

    /**
     * Unset the value of an offset.
     *
     * @param $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->properties[$offset]);
    }

    /**
     * Convert the instance to an array.
     * @return array
     */
    public function toArray(): array
    {
        return $this->getPropertiesAsArray();
    }

    /**
     * Convert the instance to a JSON serializable.
     *
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the instance to a JSON.
     *
     * @param int $flags
     * @return false|string
     *
     * @throws JsonException
     */
    public function toJson(int $flags = 0)
    {
        $json = json_encode($this->jsonSerialize(), $flags);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new JsonException($this, json_last_error_msg());
        }

        return $json;
    }

    /**
     * Convert the instance to a string.
     *
     * @return false|string
     *
     * @throws JsonException
     */
    public function __toString()
    {
        return $this->toJson();
    }
}