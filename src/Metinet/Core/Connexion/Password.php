<?php
/**
 * Created by PhpStorm.
 * UserAccount: lp
 * Date: 18/01/2018
 * Time: 10:21
 */

namespace Metinet\Core\Connexion;


class Password
{
    private $password;


    public function __construct(string $password)
    {
        $this->password = $password;
    }


    public function hash() : string{
        $password = password_hash($this->password, PASSWORD_BCRYPT);
        return $password;

    }

    public function __toString()
    {
        return $this->password;
    }



}