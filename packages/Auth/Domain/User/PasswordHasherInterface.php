<?php

declare(strict_types=1);

namespace Auth\Domain\User;

interface PasswordHasherInterface
{
    /**
     * Verify hashed and plaintext passwords
     *
     * @param string         $password
     * @param HashedPassword $hashedPassword
     *
     * @return bool
     */
    public function verify(string $password, HashedPassword $hashedPassword): bool;

    /**
     * Verify hashed and plaintext passwords held by users
     *
     * @param string $password
     * @param User   $user
     *
     * @return bool
     */
    public function verifyByUser(string $password, User $user): bool;

    /**
     * Make a hashed passwords
     *
     * @param string $password
     *
     * @return HashedPassword
     */
    public function make(string $password): HashedPassword;
}
