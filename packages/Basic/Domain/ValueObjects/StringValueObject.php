<?php

declare(strict_types=1);

namespace Basic\Domain\ValueObjects;

abstract class StringValueObject
{
    /**
     * @param string $value
     *
     * @return void
     */
    public function __construct(private string $value)
    {
    }

    /**
     * Get the value of a Value Object
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Determine if the value of Value Object is the same as the value of another value object
     *
     * @param StringValueObject $other
     *
     * @return bool
     */
    public function equals(StringValueObject $other): bool
    {
        return $this->value === $other->value;
    }
}
