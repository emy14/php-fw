<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 13:59
 */

namespace Metinet\Domain;


class Participant
{

    private $firstname;
    private $lastname;

    /**
     * Participant constructor.
     * @param $firstname
     * @param $lastname
     */
    public function __construct($firstname, $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

}