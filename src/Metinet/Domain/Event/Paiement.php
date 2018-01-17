<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 15:53
 */

namespace Metinet\Domain\Event;


class Paiement
{
    private $price;
    private $unit;

    /**
     * Paiement constructor.
     * @param $cost
     * @param $unity
     */
    public function __construct($price, $unit)
    {
        $this->price = $price;
        $this->unit = $unit;
    }





}