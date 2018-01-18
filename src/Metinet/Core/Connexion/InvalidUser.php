<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 18/01/2018
 * Time: 09:48
 */

namespace Metinet\Core\Connexion;


class InvalidUser  extends \Exception
{
    public static function mustBeValidEmail(): self
    {
        return new self('User not Found : not a Valid Email');
    }

    public static function mustBeValidPassword(): self
    {
        return new self('Password is incorrect');
    }

    public static function userAlreadyExist(): self
    {
        return new self('User with this e-mail already exists');
    }
}