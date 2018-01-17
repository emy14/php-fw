<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 11:50
 */

namespace Metinet\Domain;


class MeetingRoom
{

    private $name;
    private $nbMaxPerson;
    private $address;

    /**
     * MeetingRoom constructor.
     * @param $name
     * @param $nbMaxPerson
     * @param $address
     */
    public function __construct($name, $nbMaxPerson, $address)
    {
        $this->name = $name;
        $this->nbMaxPerson = $nbMaxPerson;
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }



}