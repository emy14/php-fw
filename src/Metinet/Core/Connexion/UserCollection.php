<?php
/**
 * Created by PhpStorm.
 * UserAccount: lp
 * Date: 18/01/2018
 * Time: 09:34
 */

namespace Metinet\Core\Connexion;


use Metinet\Domain\Event\Email;

class UserCollection
{
    private $users = [];

    public function __construct(array $users = [])
    {
        foreach ($users as $user) {
            if (!$user instanceof UserAccount) {

                throw new \LogicException('Invalid item provided, must be an instance of UserAccount');
            }
        }
        $this->users = $users;
        $this->getUsers();
    }

    public function add(UserAccount $user)
    {

        $this->findByLogin($user);
        $this->users[] = $user;
    }

    public function all(): array
    {
        return $this->users;
    }

    public function findByLogin(UserAccount $user){
        foreach ($this->all() as $oldUser) {
            if($oldUser->getEmail() == $user->getEmail()){
                throw InvalidUser::userAlreadyExist();

            }
        }
    }

    public function getUsers(){
        $user1 = new UserAccount(new Email("noemiemais@gmail.com"), new Password("password1D"));
        $this->add($user1);
        $user2 = new UserAccount(new Email("boisard@gmail.com"), new Password("password1D3"));
        $this->add($user2);
    }



}