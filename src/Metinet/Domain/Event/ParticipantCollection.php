<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 13:52
 */

namespace Metinet\Domain;


class ParticipantCollection
{
    private $participants = [];

    public function __construct(array $participants = [])
    {
        foreach ($participants as $participant) {
            if (!$participant instanceof participant) {

                throw new \LogicException('Invalid item provided, must be an instance of Participant');
            }
        }

        $this->participants = $participants;
    }

    public function add(participant $participant)
    {
        $this->participants[] = $participant;
    }

    public function all(): array
    {
        return $this->participants;
    }
}