<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 15:25
 */

namespace Metinet\Domain\Event;


use Metinet\Domain\Event\Exception\InvalidEmail;

class Email
{

    private $email;

    /**
     * Email constructor.
     * @param $email
     */
    public function __construct($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw InvalidEmail::mustBeValidEmail();

        }

        $this->email = $email;
    }


}