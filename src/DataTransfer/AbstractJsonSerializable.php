<?php
declare(strict_types=1);

namespace App\DataTransfer;

/**
 * Class AbstractJsonSerializable
 */
class AbstractJsonSerializable implements \JsonSerializable
{
    /**
     * AbstractJsonSerializable constructor.
     *
     * @param string $data
     */
    public function __construct(string $data)
    {
        $data = \json_decode($data, true);
        if (null === $data) {
            return;
        }

        foreach ($data as $name => $value) {
            if (!\property_exists($this, $name)) {
                continue;
            }

            $this->{$name} = $value;
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
            $result[$name] = $this->{$name};
        }

        return $result;
    }
}
