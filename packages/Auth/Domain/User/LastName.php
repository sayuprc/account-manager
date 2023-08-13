<?php

declare(strict_types=1);

namespace Auth\Domain\User;

use Basic\Domain\ValueObjects\StringValueObject;
use LengthException;

class LastName extends StringValueObject
{
    /**
     * @var int MIN_LENGTH
     */
    private const MIN_LENGTH = 1;

    /**
     * @var int MAX_LENGTH
     */
    private const MAX_LENGTH = 32;

    /**
     * @param string $value
     *
     * @throws LengthException
     *
     * @return void
     */
    public function __construct(string $value)
    {
        $trimmedValue = trim($value);

        $length = mb_strlen($trimmedValue);

        if ($length < self::MIN_LENGTH || self::MAX_LENGTH < $length) {
            throw new LengthException(sprintf('LastName must be between %d and %d characters', self::MIN_LENGTH, self::MAX_LENGTH));
        }

        parent::__construct($trimmedValue);
    }
}
