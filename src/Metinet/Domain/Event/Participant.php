<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 13:59
 */

namespace Metinet\Domain;


use Metinet\Domain\Event\Email;
use Metinet\Domain\Event\Phone;

class Participant
{

    private $firstname;
    private $lastname;
    private $mail;
    private $phone;
    private $interneStudent;
    private $paid;

    /**
     * Participant constructor.
     * @param $firstname
     * @param $lastname
     * @param $mail
     * @param $phone
     * @param $interne
     * @param $payed
     */
    public function __construct(string $firstname, string $lastname, Email $mail,Phone $phone, bool $interneStudent)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->mail = $mail;
        $this->phone = $phone;
        $this->interneStudent = $interneStudent;
    }

    /**
     * @return bool
     */
    public function isInterneStudent(): bool
    {
        return $this->interneStudent;
    }




    public function paid(){

        if(!$this->interneStudent && !$this->paid){
            $this->paid = true;
        }
        else {
            throw new \LogicException('no need to pay');
        }
    }



}