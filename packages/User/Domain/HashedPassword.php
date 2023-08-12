<?php

declare(strict_types=1);

namespace User\Domain;

use Basic\Domain\ValueObjects\StringValueObject;

class HashedPassword extends StringValueObject
{
    /**
     * @param string $value
     *
     * @return void
     */
    public function __construct(string $value)
    {
        parent::__construct($value);
    }
}
