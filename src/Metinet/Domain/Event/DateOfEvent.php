<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 11:38
 */

namespace Metinet\Domain;


class DateOfEvent
{

    private $dateOfEvent;


    public function __construct($dateOfEvent)
    {

        $dateEvent = \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $dateOfEvent);
        if ($dateEvent > new \DateTimeImmutable('now')) {

            throw InvalidDateOfEvent::mustNotBeInThePast();
        }

        $this->dateOfEvent = $dateEvent;
    }

}