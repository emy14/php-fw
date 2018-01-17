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
    private $priceByPers;

    /**
     * MeetingRoom constructor.
     * @param $name
     * @param $nbMaxPerson
     * @param $address
     */
    public function __construct($name, $nbMaxPerson, $address, $priceByPers)
    {
        $this->name = $name;
        $this->nbMaxPerson = $nbMaxPerson;
        $this->address = $address;
        $this->priceBypers = $priceByPers;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPriceByPers()
    {
        return $this->priceByPers;
    }

    /**
     * @param mixed $priceBypers
     */
    public function setPriceBypers($priceBypers): void
    {
        $this->priceBypers = $priceBypers;
    }



}