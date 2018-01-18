<?php
/**
 * Created by PhpStorm.
 * UserAccount: lp
 * Date: 18/01/2018
 * Time: 10:21
 */

namespace Metinet\Core\Connexion;


class InvalidPassword  extends \Exception
{
    public static function mustHave8Characters(): self
    {
        return new self('Password must have minimum 8 caracters');
    }

    public static function mustHave1Number(): self
    {
        return new self('Password must have minmum 1 number');
    }

    public static function mustHave1Uppercase(): self
    {
        return new self('Password must have minmum 1 uppercase');
    }

    public static function mustHave1Lowercase(): self
    {
        return new self('Password must have minmum 1 lowercase');
    }
}
