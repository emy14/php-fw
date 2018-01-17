<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 11:14
 */

namespace Metinet\Domain;


class Event
{

    private $title;
    private $objectif;
    private $date;
    private $dateOfEndEvent;
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
    public function __construct(string $title, string $objectif,DateOfEvent $date, DateOfEvent $dateOfEndEvent, MeetingRoom $meetingRoom, int $nb_max, bool $private)
    {
        $this->title = $title;
        $this->objectif = $objectif;
        $this->date = $date;
        $this->dateOfEndEvent = $dateOfEndEvent;
        $this->meetingRoom = $meetingRoom;
        $this->nb_max = $nb_max;
        $this->private = $private;
    }

    public function getPrice(){
        return $this->meetingRoom->getPriceBypers();
    }


    public function inscriptionToEvent(Participant $participant)
    {
        if($this->eventComplete()) {
            //if events private
            if ($this->private) {
                    if($participant->getStudent()){
                    $this->participants[] = $participant;
                }
                else{
                    throw new \LogicException('Must be student');
                }
            } //not private
            else {
                    $this->participants[] = $participant;
            }
        }
        else{
            throw new \LogicException('Sorry this event is complete');
        }
    }

    public function eventComplete(){
        if($this->participants.lenght() >= $this->nb_max) {
            return false;
        }

        return true;
    }
}