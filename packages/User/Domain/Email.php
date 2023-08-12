<?php

declare(strict_types=1);

namespace User\Domain;

use Basic\Domain\ValueObjects\StringValueObject;
use InvalidArgumentException;
use LengthException;

class Email extends StringValueObject
{
    /**
     * @var int MAX_LENGTH
     */
    private const MAX_LENGTH = 256;

    /**
     * @param string $value
     *
     * @throws InvalidArgumentException|LengthException
     *
     * @return void
     */
    public function __construct(string $value)
    {
        $trimmedValue = trim($value);
        
        if (! filter_var($trimmedValue, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email format is incorrect');
        }

        $length = mb_strlen($trimmedValue);

        if (self::MAX_LENGTH < $length) {
            throw new LengthException(sprintf('Email must be %d characters or less', self::MAX_LENGTH));
        }

        parent::__construct($trimmedValue);
    }
}
