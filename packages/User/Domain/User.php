<?php

declare(strict_types=1);

namespace User\Domain;

class User
{
    /**
     * @param UserId         $userId
     * @param LastName       $lastName
     * @param FirstName      $firstName
     * @param Email          $email
     * @param IsActive       $isActive
     * @param IsAdmin        $isAdmin
     * @param HashedPassword $hashedPassword
     *
     * @return void
     */
    public function __construct(
        private UserId $userId,
        private LastName $lastName,
        private FirstName $firstName,
        private Email $email,
        private IsActive $isActive,
        private IsAdmin $isAdmin,
        private HashedPassword $hashedPassword
    ) {
    }

    /**
     * Get the ValueObject of UserId
     *
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->userId;
    }

    /**
     * Get the ValueObject of LastName
     *
     * @return LastName
     */
    public function getLastName(): LastName
    {
        return $this->lastName;
    }

    /**
     * Get the ValueObject of FirstName
     *
     * @return FirstName
     */
    public function getFirstName(): FirstName
    {
        return $this->firstName;
    }

    /**
     * Get the user's full name
     *
     * @return string
     */
    public function getFullName(): string
    {
        return $this->lastName->getValue() . ' ' . $this->firstName->getValue();
    }

    /**
     * Get the ValueObject of Email
     *
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * Get the ValueObject of HashedPassword
     *
     * @return HashedPassword
     */
    public function getHashedPassword(): HashedPassword
    {
        return $this->hashedPassword;
    }

    /**
     * Get the ValueObject of IsActive
     *
     * @return IsActive
     */
    public function getIsActive(): IsActive
    {
        return $this->isActive;
    }

    /**
     * Get the ValueObject of IsAdmin
     *
     * @return IsAdmin
     */
    public function getIsAdmin(): IsAdmin
    {
        return $this->isAdmin;
    }

    /**
     * Determine if the user is active
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive->getValue() === true;
    }

    /**
     * Determine if the user's role is admin
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin->getValue() === true;
    }
}
