<?php

declare(strict_types=1);

namespace Auth\Domain\User;

use Basic\Domain\ValueObjects\StringValueObject;
use InvalidArgumentException;

class Email extends StringValueObject
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
        
        if (! filter_var($trimmedValue, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE)) {
            throw new InvalidArgumentException('Email format is incorrect');
        }

        parent::__construct($trimmedValue);
    }
}
