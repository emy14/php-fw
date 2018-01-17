<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 11:48
 */

namespace Metinet\Domain;


class InvalidDateOfEvent extends \Exception
{
    public static function mustNotBeInThePast(): self
    {
        return new self('Date Of Event cannot be in the past');
    }
}
