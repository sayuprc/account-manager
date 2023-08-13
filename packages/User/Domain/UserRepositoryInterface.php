<?php

declare(strict_types=1);

namespace User\Domain;

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
