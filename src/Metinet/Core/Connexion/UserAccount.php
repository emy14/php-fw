<?php
/**
 * Created by PhpStorm.
 * UserAccount: lp
 * Date: 18/01/2018
 * Time: 09:34
 */

namespace Metinet\Core\Connexion;



use Metinet\Domain\Conferences\Email;
use Metinet\Domain\Conferences\PhoneNumber;

class UserAccount
{
    private $lastname;
    private $firstname;
    private $email;
    private $password;
    private $phone;


    public function __construct(Email $email, Password $password, string $lastname, string $firstname, PhoneNumber $phone)
    {
        $this->email = $email;
        $this->password = $password;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->phone = $phone;
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