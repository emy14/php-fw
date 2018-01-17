<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 15:40
 */

namespace Metinet\Domain\Event\Exception;


class InvalidEmail extends \Exception
{
    public static function mustBeValidEmail(): self
{
    return new self('Not a Valid Email');
}

}