<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 17/01/2018
 * Time: 11:53
 */

namespace Metinet\Domain;


class MeetingRoomCollection
{

    private $meetingrooms = [];

    public function __construct(array $meetingrooms = [])
    {
        foreach ($meetingrooms as $meetingroom) {
            if (!$meetingroom instanceof MeetingRoom) {

                throw new \LogicException('Invalid item provided, must be an instance of MeetingRoom');
            }
        }
        $this->meetingrooms = $meetingrooms;
    }

    public function add(MeetingRoom $meetingroom)
    {

        foreach ($this->meetingrooms as $rooms) {
            if ($rooms['name'] == $meetingroom->getName()) {

                throw new \LogicException('Room already exist');
            }
        }
        $this->meetingrooms[] = $meetingroom;
    }

    public function all(): array
    {
        return $this->meetingrooms;
    }

    public function find(string $name)
    {
        foreach ($this->meetingrooms as $rooms) {
            if ($rooms['name'] == $name) {
                return true;
            }
        }

        return false;
    }

    public function getMeetingRoom(string $name): MeetingRoom
    {
        foreach ($this->meetingrooms as $room) {
            if ($room['name'] == $name) {
                return $room;
            }
        }

        throw new \LogicException("Room doesn't exist");

    }

}