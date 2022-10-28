<?php

namespace Hwale;

class User
{
    public $name;
    public $age;
    // Always be the same no matter what, unlike name and age.
    public static $minPassLength = 6;

    public static function validatePass($pass)
    {
        // Use 'self::$property' instead of '$this->property'.
        if (strlen($pass) >= self::$minPassLength) {
            return true;
        } else {
            return false;
        }
    }
}

$password = 'hello';

// Use 'ClassName::stacticFunction()'
if (User::validatePass($password)) {
    echo 'Password valid';
} else {
    echo 'Password NOT valid';
}
