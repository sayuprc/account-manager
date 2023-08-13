<?php

declare(strict_types=1);

namespace Auth\Domain\User;

use Basic\Domain\ValueObjects\BoolValueObject;

class IsAdmin extends BoolValueObject
{
    /**
     * @param bool $value
     *
     * @return void
     */
    public function __construct(bool $value)
    {
        parent::__construct($value);
    }
}
