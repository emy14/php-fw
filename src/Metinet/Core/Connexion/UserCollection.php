<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 18/01/2018
 * Time: 09:34
 */

namespace Metinet\Core\Connexion;


class UserCollection
{
    private $users = [];

    public function __construct(array $users = [])
    {
        foreach ($users as $user) {
            if (!$user instanceof User) {

                throw new \LogicException('Invalid item provided, must be an instance of User');
            }
        }

        $this->users = $users;
    }

    public function add(User $user)
    {

        foreach ($this->all() as $oldUser) {
            if($oldUser->getEmail() == $user->getEmail()){
                throw InvalidUser::userAlreadyExist();

            }
        }

        $this->users[] = $user;
    }

    public function all(): array
    {
        return $this->users;
    }

    public function merge(userCollection $users): void
    {
        foreach ($users->all() as $user) {
            $this->users[] = $user;
        }
    }
}