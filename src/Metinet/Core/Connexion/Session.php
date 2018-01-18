<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 18/01/2018
 * Time: 09:30
 */

namespace Metinet\Core\Connexion;


use Metinet\Domain\Event\Email;

class Session
{
    private $email;
    private $password;

    public function __construct(Email $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function connect(UserCollection $users) : void{

        foreach ($users->all() as $user) {
            if($user->getEmail() == $this->email){
                if (password_verify ($this->password, $user->getPassword() )){
                    return;
                }
                else{
                    throw InvalidUser::mustBeValidPassword();

                };
            }
        }
        throw InvalidUser::mustBeValidEmail();
    }


}