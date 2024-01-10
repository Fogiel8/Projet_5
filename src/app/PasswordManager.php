<?php

namespace App;

abstract class PasswordManager
{

    public static function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
