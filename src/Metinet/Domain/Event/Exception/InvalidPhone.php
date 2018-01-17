<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 15:44
 */

namespace Metinet\Domain\Event\Exception;


class InvalidPhone extends \Exception
{
    public static function mustBeValidPhone(): self
    {
        return new self('Must be valid french phone number');
    }
}