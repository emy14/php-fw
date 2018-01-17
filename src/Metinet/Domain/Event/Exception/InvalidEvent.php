<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 16:08
 */

namespace Metinet\Domain\Event\Exception;


class InvalidEvent  extends \Exception
{
    public static function mustHaveNoPaiement(): self
    {
        return new self('No paiement for privates events');
    }

    public static function mustHavePaiement(): self
    {
        return new self('Paiement for public events open to externals students');
    }
}