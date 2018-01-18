<?php
/**
 * Created by PhpStorm.
 * UserAccount: lp
 * Date: 18/01/2018
 * Time: 09:30
 */

namespace Metinet\Core\Connexion;


use Metinet\Domain\Event\Email;

class Session
{
    private $userConnexion;

    public function __construct(UserConnexion $userConnexion)
    {
        $this->userConnexion = $userConnexion;
    }

    public function connect(UserCollection $users) : void{

        foreach ($users->all() as $user) {
            if($user->getEmail() == $this->userConnexion->getEmail()){
                if (password_verify ($this->userConnexion->getPassword(), $user->getPassword() )){
                    $_SESSION['email'] = $this->userConnexion->getEmail() ;
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