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

    private $dateOfEventStart;
    private $dateOfEventEnd;

    public function __construct($dateOfEventStart, $dateOfEventEnd)
    {

        $dateStart = \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $dateOfEventStart);
        if ($dateStart > new \DateTimeImmutable('now')) {

            throw InvalidDateOfEvent::mustNotBeInThePast();
        }

        $dateEnd = \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $dateOfEventEnd);
        if ($dateEnd > new \DateTimeImmutable('now')) {

            throw InvalidDateOfEvent::mustNotBeInThePast();
        }

        if($dateEnd > $dateStart){
            throw InvalidDateOfEvent::mustNotEndBeforeItsStart();
        }
        $this->dateOfEventStart = $dateStart;
        $this->dateOfEventEnd = $dateEnd;

    }

    /**
     * @return bool|\DateTimeImmutable
     */
    public function getDateOfEventStart()
    {
        return $this->dateOfEventStart;
    }

    /**
     * @return bool|\DateTimeImmutable
     */
    public function getDateOfEventEnd()
    {
        return $this->dateOfEventEnd;
    }



}