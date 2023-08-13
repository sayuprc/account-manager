<?php

declare(strict_types=1);

namespace Tests\Unit\Auth\Domain\User;

use Auth\Domain\User\Email;
use Auth\Domain\User\FirstName;
use Auth\Domain\User\HashedPassword;
use Auth\Domain\User\IsActive;
use Auth\Domain\User\IsAdmin;
use Auth\Domain\User\LastName;
use Auth\Domain\User\User;
use Auth\Domain\User\UserId;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * Testing for getFullName method
     *
     * @return void
     */
    public function testGetFullName(): void
    {
        $user = $this->createInstance(lastName: 'User', firstName: 'Name');

        $this->assertSame('User Name', $user->getFullName());
    }

    /**
     * Testing for isActive method
     *
     * @return void
     */
    public function testIsActive(): void
    {
        $user = $this->createInstance(isActive: true);

        $this->assertTrue($user->isActive());
    }

    /**
     * Testing for isAdmin method
     *
     * @return void
     */
    public function testIsAdmin(): void
    {
        $user = $this->createInstance(isAdmin: true);

        $this->assertTrue($user->isAdmin());
    }

    /**
     * Create User class instance
     *
     * @param string $lastName
     * @param string $firstName
     * @param bool   $isActive
     * @param bool   $isAdmin
     *
     * @return User
     */
    public function createInstance(
        string $lastName = 'Alice',
        string $firstName = 'Bob',
        bool $isActive = true,
        bool $isAdmin = true
    ): User {
        return new User(
            new UserId(
                sprintf(
                    '%1$s-%2$s-%2$s-%2$s-%3$s',
                    str_repeat('a', 8),
                    str_repeat('a', 4),
                    str_repeat('a', 12),
                )
            ),
            new LastName($lastName),
            new FirstName($firstName),
            new Email('example@example.com'),
            new IsActive($isActive),
            new IsAdmin($isAdmin),
            new HashedPassword('')
        );
    }
}
