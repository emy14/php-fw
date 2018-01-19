<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 18/01/2018
 * Time: 17:27
 */

namespace Metinet\Core\Connexion;


class ValidationPassword
{

    private $password;

    /**
     * ValidationPassword constructor.
     * @param $password
     */
    public function __construct($password)
    {
        $this->password = $password;
    }


    public function checkAll(){
        try {
        $this->check1Uppercase();
        $this->check1Number();
        $this->check1Lowercase();
        $this->check8Characters();
        } catch (InvalidPassword $e) {
            return new Response($this->render(
                'register.html.php',
                ['reasonPassword' => $e->getMessage() ?? '',
                    'reasonEmail' => '',
                    'reasonPhoneNumber' => '',
                    'email' => $email ?? '',
                    'password' => $password ?? '',
                    'firstname' => $firstname ?? '',
                    'lastname' => $lastname ?? '',
                    'phone' => $phone ?? '' ]
            ), 403);
        }

    }

    public function check8Characters(){
        if(strlen($this->password) < 8) {
            throw InvalidPassword::mustHave8Characters();

        }
    }

    public function check1Lowercase(){
        $lowercase = preg_match('@[a-z]@', $this->password);
        if(!$lowercase){
            throw InvalidPassword::mustHave1Lowercase();

        }
    }

    public function check1Number(){
        $number    = preg_match('@[0-9]@', $this->password);
        if(!$number){
            throw InvalidPassword::mustHave1Number();

        }
    }

    public function check1Uppercase(){
        $uppercase = preg_match('@[A-Z]@', $this->password);
        if(!$uppercase){
            throw InvalidPassword::mustHave1Uppercase();
        }
    }
}