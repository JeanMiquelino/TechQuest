<?php


namespace Gamify\Exceptions;

use Exception;

final class CannotCreateUser extends Exception
{
    public static function duplicateEmailAddress(string $emailAddress): self
    {
        return new CannotCreateUser("The email address [$emailAddress] already exists.");
    }

    public static function duplicateUsername(string $username): self
    {
        return new CannotCreateUser("The username [$username] already exists.");
    }
}
