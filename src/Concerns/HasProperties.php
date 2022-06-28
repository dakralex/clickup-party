<?php

namespace Dakralex\ClickUpParty\Concerns;

use Dakralex\ClickUpParty\Support\Str;
use Illuminate\Support\Carbon;

trait HasProperties
{
    /**
     * The properties as a hashmap.
     *
     * @var array
     */
    protected array $properties = [];

    /**
     * The properties' casts as a hashmap.
     *
     * @var array
     */
    protected array $casts = [];

    /**
     * Get a property.
     *
     * @param string $key
     * @return mixed|null
     */
    public function getProperty(string $key)
    {
        // If the value has been set in the properties array, then get it from
        // there or else set the value to null.
        $value = $this->properties[$key] ?? null;

        // If there is a get mutator for the property, we will call it.
        if ($this->hasGetMutator($key)) {
            return $this->{'get' . Str::ucfirst($key)}($value);
        }

        // Convert the property to its appropriate cast type, if there is any.
        if ($this->hasCast($key)) {
            return $this->castProperty($key, $value);
        }

        return $value;
    }

    /**
     * Set a property.
     *
     * @param string $key
     * @param mixed $value
     * @return self
     */
    public function setProperty(string $key, $value): self
    {
        if ($this->hasSetMutator($key)) {
            $method = 'set' . Str::ucfirst($key);

            return $this->{$method}($value);
        }

        $this->properties[$key] = $value;

        return $this;
    }

    /**
     * Return the property according to its appropriate cast.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    protected function castProperty(string $key, $value)
    {
        switch ($this->getCastType($key)) {
            case 'int':
                return intval($value);
            case 'float':
                return floatval($value);
            case 'string':
                return strval($value);
            case 'bool':
                return boolval($value);
            case 'json':
            case 'array':
                return json_decode($value);
            case 'object':
                return json_decode($value, true);
            case 'unix':
                return Carbon::createFromTimestamp($value);
            case 'unix_ms':
                return Carbon::createFromTimestampMs($value);
            default:
                return $value;
        }
    }

    /**
     * Return the type of cast for a property.
     *
     * @param string $key
     * @return string
     */
    protected function getCastType(string $key): string
    {
        return trim(strtolower($this->casts[$key]));
    }

    /**
     * Return the properties as array, with checks for mutation and casting.
     *
     * @return array
     */
    public function getPropertiesAsArray(): array
    {
        $attributes = [];

        foreach ($this->properties as $key) {
            $attributes[$key] = $this->getProperty($key);
        }

        return $attributes;
    }

    /**
     * Check whether property has a get mutator.
     *
     * @param string $key
     * @return bool
     */
    protected function hasGetMutator(string $key): bool
    {
        return method_exists($this, 'get' . Str::ucfirst($key));
    }

    /**
     * Check whether property has a set mutator.
     *
     * @param string $key
     * @return bool
     */
    protected function hasSetMutator(string $key): bool
    {
        return method_exists($this, 'set' . Str::ucfirst($key));
    }

    /**
     * Check whether property has a cast type.
     *
     * @param string $key
     * @return bool
     */
    protected function hasCast(string $key): bool
    {
        return array_key_exists($key, $this->casts);
    }
}