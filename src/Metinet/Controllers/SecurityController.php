<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Controllers;

use Metinet\Core\Connexion\InvalidPassword;
use Metinet\Core\Connexion\Password;
use Metinet\Core\Connexion\UserAccount;
use Metinet\Core\Connexion\UserCollection;
use Metinet\Core\Connexion\ValidationPassword;
use Metinet\Core\Http\Request;
use Metinet\Core\Http\Response;
use Metinet\Core\Security\AuthenticationFailed;
use Metinet\Domain\Conferences\Email;
use Metinet\Domain\Conferences\PhoneNumber;

class SecurityController extends Controller
{
    public function login(Request $request): Response
    {
        if ($this->getAuthenticationContext()->isAccountLoggedIn()) {
            return new Response('Already logged-in !!');
        }

        if ($request->isPost()) {
            $email = $request->getRequest()->get('email');
            $password = $request->getRequest()->get('password');

            try {
                $this->controllerDependencies->getAccountAuthenticator()
                    ->authenticate(new Email($email), $password);
            } catch (AuthenticationFailed $e) {

                return new Response($this->render(
                    'loginFailed.html.php',
                    ['reason' => $e->getMessage()]
                ), 403);
            }

            return new Response($this->render(
                'successfulLogin.html.php',
                ['email' => $this->getAuthenticationContext()->getAccount()->getEmail()]
            ));

        }

        return new Response($this->render('login.html.php', [
            'email' => $email ?? '',
            'password' => $password ?? ''
        ]));
    }

    public function logout(Request $request): Response
    {
        $this->getAuthenticationContext()->logout();

        return new Response('', 303, ['Location' => '/login']);
    }

    public function register(Request $request): Response
    {

        if ($this->getAuthenticationContext()->isAccountLoggedIn()) {
            return new Response('Already logged-in !!');
        }

        if ($request->isPost()) {

            $email = $request->getRequest()->get('email');
            $password = $request->getRequest()->get('password');
            $firstname = $request->getRequest()->get('firstname');
            $lastname= $request->getRequest()->get('lastname');
            $phone = $request->getRequest()->get('phone');

            $password = new Password($password);

            try {

            $validator = new ValidationPassword($password);
            $validator->checkAll();

            $user = new UserAccount(new Email($email), new Password($password), $lastname, $firstname, new PhoneNumber($phone));
            $users = new UserCollection();
            $users->add($user);

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


            return new Response($this->render(
            'successfullRegister.html.php',
                ['email' => $email]
            ));
        }

        return new Response($this->render('register.html.php', [
            'email' => $email ?? '',
            'password' => $password ?? '',
            'firstname' => $firstname ?? '',
            'lastname' => $lastname ?? '',
            'phone' => $phone ?? '',

        ]));

    }

}