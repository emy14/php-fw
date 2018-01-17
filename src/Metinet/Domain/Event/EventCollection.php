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

    public function add(event $event)
    {
        $this->events[] = $event;
    }

    public function all(): array
    {
        return $this->events;
    }

}