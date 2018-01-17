<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 13:59
 */

namespace Metinet\Domain;


interface Inscription
{
    public function addParticipantToEvent($participant);
}