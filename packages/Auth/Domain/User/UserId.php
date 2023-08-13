<?php

declare(strict_types=1);

namespace Auth\Domain\User;

use Basic\Domain\ValueObjects\StringValueObject;
use InvalidArgumentException;

class UserId extends StringValueObject
{
    /**
     * @param string $value
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public function __construct(string $value)
    {
        $trimmedValue = trim($value);

        if (! preg_match('/[\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12}/', $trimmedValue)) {
            throw new InvalidArgumentException('UserId format is incorrect');
        }

        parent::__construct($trimmedValue);
    }
}
