<?php

declare(strict_types=1);

namespace Tests\Unit\User\Domain;

use PHPUnit\Framework\TestCase;
use User\Domain\Email;
use User\Domain\FirstName;
use User\Domain\HashedPassword;
use User\Domain\IsActive;
use User\Domain\IsAdmin;
use User\Domain\LastName;
use User\Domain\User;
use User\Domain\UserId;

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
