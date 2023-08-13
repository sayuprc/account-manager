<?php

declare(strict_types=1);

namespace User\Domain;

use Basic\Domain\ValueObjects\BoolValueObject;

class IsActive extends BoolValueObject
{
    /**
     * @param bool $value
     *
     * @return void
     */
    public function __construct(bool $value)
    {
        parent::__construct($value) ;
    }
}
