<?php

namespace Dakralex\ClickUpParty\Data;

use ArrayAccess;
use Dakralex\ClickUpParty\Concerns\HasProperties;
use JsonException;
use JsonSerializable;

abstract class Model implements ArrayAccess, JsonSerializable
{
    use HasProperties;

    protected string $entityIdentifier = 'model';

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
        return $this->getProperty($key);
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
        $this->setProperty($key, $value);
    }

    /**
     * Check whether property is set.
     *
     * @param string $key
     * @return bool
     */
    public function __isset(string $key): bool
    {
        return isset($this->properties[$key]);
    }

    /**
     * Unset a property.
     *
     * @param string $key
     * @return void
     */
    public function __unset(string $key)
    {
        unset($this->properties[$key]);
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