<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 11:14
 */

namespace Metinet\Domain;


use Metinet\Domain\Event\Exception\InvalidEvent;
use Metinet\Domain\Event\Exception\InvalidInscriptionEvent;
use Metinet\Domain\Event\Paiement;

class Event
{

    private $title;
    private $objectif;
    private $date;
    private $meetingRoom;
    private $nb_max;
    private $private;
    private $participants = [];

    /**
     * Event constructor.
     * @param $title
     * @param $objectif
     * @param $horaire
     * @param $salle
     * @param $nb_max
     */
    public function __construct(string $title, string $objectif,DateOfEvent $date, MeetingRoom $meetingRoom, int $nb_max, bool $private, ?Paiement $price)
    {
        $this->title = $title;
        $this->objectif = $objectif;
        $this->date = $date;


        $this->meetingRoom = $meetingRoom;
        $this->nb_max = $nb_max;

        if($private && $price != null){
            throw InvalidEvent::mustHaveNoPaiement();

        }

        if(!$private && $price == null){
            throw InvalidEvent::mustHavePaiement();

        }

        $this->private = $private;
        $this->price = $price;
    }


    public function inscriptionToEvent(Participant $participant)
    {
        if(!$this->eventComplete()) {
            //if events private
            if ($this->private) {
                    if($participant->isInterneStudent()){
                    $this->participants[] = $participant;
                }
                else{
                    throw InvalidInscriptionEvent::mustBeAnInternalStudentInPrivateEvent();
                    }
            } //not private
            else {
                    $this->participants[] = $participant;
            }
        }
        else{
            throw InvalidInscriptionEvent::eventMustNotBeFull();

        }
    }

    public function eventComplete(){
        if($this->participants.lenght() >= $this->nb_max) {
            return true;
        }

        return false;
    }

    /**
     * @return Paiement|null
     */
    public function getPrice(): ?Paiement
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return DateOfEvent
     */
    public function getDate(): DateOfEvent
    {
        return $this->date;
    }

    /**
     * @return MeetingRoom
     */
    public function getMeetingRoom(): MeetingRoom
    {
        return $this->meetingRoom;
    }





}