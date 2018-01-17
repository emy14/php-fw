<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 15:26
 */

namespace Metinet\Domain\Event;


use Metinet\Domain\Event\Exception\InvalidPhone;

class Phone
{
    private $phone;

    /**
     * Phone constructor.
     * @param $phone
     */
    public function __construct($phone)
    {

        $phone = preg_replace("/[^0-9]/", '', $phone);

        if(strlen($phone) != 10 ) {
            throw InvalidPhone::mustBeValidPhone();
        }
        $this->phone = $phone;
    }


}