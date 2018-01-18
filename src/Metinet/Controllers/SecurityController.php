<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 18/01/2018
 * Time: 14:25
 */

namespace Metinet\Controllers;


use Metinet\Core\Connexion\Password;
use Metinet\Core\Connexion\Session;
use Metinet\Core\Connexion\UserAccount;
use Metinet\Core\Connexion\UserCollection;
use Metinet\Core\Connexion\UserConnexion;
use Metinet\Core\Http\Request;
use Metinet\Core\Http\Response;
use Metinet\Domain\Event\Email;

class SecurityController
{
    public function connexion(Request $request): Response
    {
        $users = new UserCollection();

        $user1 = new UserAccount(new Email("noemiemais@gmail.com"), new Password("password1D"));
        $user2 = new UserAccount(new Email("boisard@gmail.com"), new Password("password1D3"));


        $users->add($user1);
        $users->add($user2);

        $connexion = new UserConnexion(new Email("noemiemais@gmail.com"), "password1D");
        $session = new Session($connexion);
        $session->connect($users);

        return new Response(sprintf('<p>Connexion successful %s</p>', $request->getQuery()->get('name', $_SESSION['email'])));
    }
}