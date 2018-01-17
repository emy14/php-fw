<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 11:14
 */

namespace Metinet\Domain;


class Event implements Inscription
{

    private $title;
    private $objectif;
    private $date;
    private $meetingRoom;
    private $nb_max;
    private $private;
    private $participants;

    /**
     * Event constructor.
     * @param $title
     * @param $objectif
     * @param $horaire
     * @param $salle
     * @param $nb_max
     */
    public function __construct(string $title, string $objectif,DateOfEvent $date, MeetingRoom $meetingRoom, int $nb_max, bool $private)
    {
        $this->title = $title;
        $this->objectif = $objectif;
        $this->date = $date;
        $this->meetingRoom = $meetingRoom;
        $this->nb_max = $nb_max;
        $this->private = $private;
    }

    public function getPrice(){
        return $this->meetingRoom->getPriceBypers();
    }


    public function addParticipantToEvent($student)
    {
        //if events private
        if($this->private){
            if (!$student instanceof Candidate) {
                throw new \LogicException('External Students not authorisez to this event');
            }

            if ($student instanceof Candidate) {
                $participant = new Participant($student->getFirstName(), $student->getLastName());
               $this->participants = new ParticipantCollection($participant);

            }
        }
        //not private
        else{
            if ($student instanceof Candidate || $student instanceof ExternalStudent) {
                $participant = new Participant($student->getFirstName(), $student->getLastName());
                $this->participants = new ParticipantCollection($participant);
            }
            else{
                throw new \LogicException('Must create an account');
            }
        }
    }
}