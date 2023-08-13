<?php

declare(strict_types=1);

namespace Tests\Unit\Auth\Domain\User;

use Auth\Domain\User\UserId;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class UserIdTest extends TestCase
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
        new UserId(sprintf('%1$s-%2$s-%2$s-%2$s-%3$s', str_repeat('a', 8), str_repeat('b', 4), str_repeat('c', 13)));
    }

    /**
     * Testing for incorrect formatting
     *
     * @return void
     */
    public function testIncorrectFormat(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new UserId('');
    }
}
