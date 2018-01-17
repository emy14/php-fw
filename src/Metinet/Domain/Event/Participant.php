<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 13:59
 */

namespace Metinet\Domain;


class Participant
{

    private $firstname;
    private $lastname;
    private $mail;
    private $phone;
    private $student;
    private $payed;

    /**
     * Participant constructor.
     * @param $firstname
     * @param $lastname
     * @param $mail
     * @param $phone
     * @param $interne
     * @param $payed
     */
    public function __construct($firstname, $lastname, $mail, $phone, $student)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->mail = $mail;
        $this->phone = $phone;
        $this->student = $student;
    }

    /**
     * @return mixed
     */
    public function getStudent()
    {
        return $this->student;
    }



    public function isPaying(){
        if(!$this->student && !$this->payed){
            $this->payed = true;
        }
        else {
            throw new \LogicException('no need to pay');
        }
    }

}