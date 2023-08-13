<?php

declare(strict_types=1);

namespace Auth\Domain\User;

interface UserRepositoryInterface
{
    /**
     * Save the user
     *
     * @param User $user
     *
     * @return void
     */
    public function store(User $user): void;
}
