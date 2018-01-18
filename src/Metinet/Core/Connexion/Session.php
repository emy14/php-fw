<?php
/**
 * Created by PhpStorm.
 * UserAccount: lp
 * Date: 18/01/2018
 * Time: 09:30
 */

namespace Metinet\Core\Connexion;



class Session
{

    public function start(): void
    {
        session_start();
    }

    public function connect(UserCollection $users, UserConnexion $userConnexion) : void{

        foreach ($users->all() as $user) {
            if($user->getEmail() == $userConnexion->getEmail()){
                if (password_verify ($userConnexion->getPassword(), $user->getPassword() )){
                    $_SESSION['email'] = $userConnexion->getEmail() ;
                    return;
                }
                else{
                    throw InvalidUser::mustBeValidPassword();

                };
            }
        }
        throw InvalidUser::mustBeValidEmail();
    }

    public function logout(){
        unset($_SESSION['email']);
    }


}