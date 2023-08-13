<?php

declare(strict_types=1);

namespace Tests\Unit\User\Domain;

use LengthException;
use PHPUnit\Framework\TestCase;
use User\Domain\LastName;

class LastNameTest extends TestCase
{
    /**
     * Testing for create instance from normal value
     *
     * @doesNotPerformAssertions
     *
     * @return void
     */
    public function testNormal(): void
    {
        new LastName('last');
    }

    /**
     * Testing for incorrect min length
     *
     * @return void
     */
    public function testIncorrectMinLength(): void
    {
        $this->expectException(LengthException::class);

        new LastName('');
    }

    /**
     * Testing for incorrect max length
     *
     * @return void
     */
    public function testIncorrectMaxLength(): void
    {
        $this->expectException(LengthException::class);

        new LastName(str_repeat('x', 33));
    }
}
