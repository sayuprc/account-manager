<?php

declare(strict_types=1);

namespace User\Domain;

use Basic\Domain\ValueObjects\StringValueObject;
use LengthException;

class UserId extends StringValueObject
{
    /**
     * @var int LENGTH
     */
    private const LENGTH = 36;

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

        if (mb_strlen($trimmedValue) !== self::LENGTH) {
            throw new LengthException(sprintf('UserId must be %d characters', self::LENGTH));
        }

        parent::__construct($trimmedValue);
    }
}
