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

        $this->check($password);
        $this->password = hash($password);
    }

    public function __toString()
    {
        return $this->password;
    }

    public function check(string $password){
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if(strlen($password) < 8) {
            throw InvalidPassword::mustHave8Characters();

        }
        else if(!$lowercase){
            throw InvalidPassword::mustHave1Lowercase();

        }
        else if(!$number){
            throw InvalidPassword::mustHave1Number();

        }
        else if(!$uppercase){
            throw InvalidPassword::mustHave1Uppercase();
        }

    }

    public function hash(string $password){
        $password = password_hash($password, PASSWORD_BCRYPT);
        return $password;

    }


}