<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 11:26
 */

namespace Metinet\Domain;


class EventCollection
{
    private $events = [];

    public function __construct(array $events = [])
    {
        foreach ($events as $event) {
            if (!$event instanceof Event) {

                throw new \LogicException('Invalid item provided, must be an instance of Event');
            }
        }


        $this->events = $events;
    }

    public function validEvent(Event $event)
    {
        $this->checkIfOccupied($event);
        $this->events[] = $event;
    }

    public function all(): array
    {
        return $this->events;
    }

    public function checkIfOccupied(Event $ev){
        $newEventDate = $ev->getDate()->getDateOfEventStart();
        $newEventTitle = $ev->getMeetingRoom()->getName();

        foreach ($this->events as $event) {
            $oldEventTitle = $event['meetingRoom']['name'];
            $oldEventDate = $event['date']['dateOfEventStart'];

            if($newEventDate == $oldEventDate){
                if($newEventTitle == $oldEventTitle){
                    throw new \LogicException('Meeting Room already occupied for this date');
                }
            }
        }
    }


}