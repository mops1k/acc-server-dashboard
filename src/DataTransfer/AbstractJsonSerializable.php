<?php
declare(strict_types=1);

namespace App\DataTransfer;

/**
 * Class AbstractJsonSerializable
 */
abstract class AbstractJsonSerializable implements \JsonSerializable
{
    /**
     * AbstractJsonSerializable constructor.
     *
     * @param string|array $data
     */
    public function __construct($data)
    {
        if (!is_array($data)) {
            $data = \json_decode($data, true);
        }

        if (null === $data) {
            return;
        }

        foreach ($data as $name => $value) {
            if (!\property_exists($this, $name)) {
                continue;
            }

            if (is_array($value)) {
                $this->{'set'.ucfirst($name)}($value);
                continue;
            }

            $this->$name = $value;
        }
    }

    /**
     * @inheritDoc
     *
     * @throws \ReflectionException
     */
    public function jsonSerialize()
    {
        $reflectionClass = new \ReflectionClass($this);
        $result          = [];

        foreach ($reflectionClass->getProperties(\ReflectionProperty::IS_PROTECTED) as $property) {
            $name          = $property->getName();
            if (null !== $this->{$name}) {
                $result[$name] = $this->{'get'.ucfirst($name)}();
            }
        }

        return $result;
    }
}
