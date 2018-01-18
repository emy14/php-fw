<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 18/01/2018
 * Time: 09:34
 */

namespace Metinet\Core\Connexion;


use Metinet\Domain\Event\Email;

class User
{
    private $email;
    private $password;

    public function __construct(Email $email, Password $password)
    {
        $this->email = $email;
        $this->password = $password;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function getPassword()
    {
        return  $this->password;

    }
}