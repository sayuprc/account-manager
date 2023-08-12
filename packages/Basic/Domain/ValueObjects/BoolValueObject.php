<?php

declare(strict_types=1);

namespace Basic\Domain\ValueObjects;

abstract class BoolValueObject
{
    /**
     * @param bool $value
     *
     * @return void
     */
    public function __construct(protected bool $value)
    {
    }

    /**
     * @return bool
     */
    public function getValue(): bool
    {
        return $this->value;
    }

    /**
     * @param BoolValueObject $other
     *
     * @return bool
     */
    public function equals(BoolValueObject $other): bool
    {
        return $this->value === $other->value;
    }
}
