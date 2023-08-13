<?php

declare(strict_types=1);

namespace Tests\Unit\Auth\Domain\User;

use Auth\Domain\User\Email;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
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
        new Email('example@example.com');
    }

    /**
     * Testing for incorrect formatting
     *
     * @return void
     */
    public function testIncorrectFormat(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Email('xxxxxxx');
    }
}
