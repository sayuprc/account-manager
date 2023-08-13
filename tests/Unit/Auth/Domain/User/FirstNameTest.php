<?php

declare(strict_types=1);

namespace Tests\Unit\Auth\Domain\User;

use Auth\Domain\User\FirstName;
use LengthException;
use PHPUnit\Framework\TestCase;

class FirstNameTest extends TestCase
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
        new FirstName('first');
    }

    /**
     * Testing for incorrect min length
     *
     * @return void
     */
    public function testIncorrectMinLength(): void
    {
        $this->expectException(LengthException::class);

        new FirstName('');
    }

    /**
     * Testing for incorrect max length
     *
     * @return void
     */
    public function testIncorrectMaxLength(): void
    {
        $this->expectException(LengthException::class);

        new FirstName(str_repeat('x', 33));
    }
}
