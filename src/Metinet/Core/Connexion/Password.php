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

        $this->check8Characters($password);
        $this->check1Lowercase($password);
        $this->check1Number($password);
        $this->check1Uppercase($password);

        $this->password = hash($password);
    }

    public function __toString()
    {
        return $this->password;
    }


    public function check8Characters($password){
        if(strlen($password) < 8) {
            throw InvalidPassword::mustHave8Characters();

        }
    }

    public function check1Lowercase($password){
        $lowercase = preg_match('@[a-z]@', $password);
        if(!$lowercase){
            throw InvalidPassword::mustHave1Lowercase();

        }
    }

    public function check1Number($password){
        $number    = preg_match('@[0-9]@', $password);
        if(!$number){
            throw InvalidPassword::mustHave1Number();

        }
    }

    public function check1Uppercase($password){
        $uppercase = preg_match('@[A-Z]@', $password);
        if(!$uppercase){
            throw InvalidPassword::mustHave1Uppercase();
        }
    }

    public function hash(string $password){
        $password = password_hash($password, PASSWORD_BCRYPT);
        return $password;

    }


}