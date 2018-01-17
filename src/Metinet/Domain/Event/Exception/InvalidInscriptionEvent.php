<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 15:42
 */

namespace Metinet\Domain\Event\Exception;


class InvalidInscriptionEvent  extends \Exception
{
    public static function eventMustNotBeFull(): self
    {
        return new self('Event is Full');
    }

    public static function mustBeAStudentInPrivateEvent(): self
    {
        return new self('must be a student in private event');
    }
}