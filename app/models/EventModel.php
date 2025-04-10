<?php

class EventModel
{
    use Model;
    protected $table = "event";

    public function getUserEvents($data)
    {
        // get events with scope  GLOBAL
        // if user supervisor we have to get event scope SUPERVISORS
        // if user coordinator we have to get event scope COORDINATORS
        // if user student we have to get event scope STUDENTS
        // if user SUPERVISOR_EXAMINER we have to get event scope SUPERVISORS AND EXAMINERS
        // if user EXAMINER we have to get event scope EXAMINERS
        // get events by scope USER_ID
        // get events that user is assigned a group related their scope is GROUP_ID

        $events = [];
        $now = date('Y-m-d H:i:s');

        $query = "
        SELECT * 
        FROM `event`
        WHERE scope = 'GLOBAL' AND start_time >= '$now'
    ";
        $events = array_merge($events, $this->execute($query));

        if (strpos($data['role'], 'SUPERVISOR') !== false) {
            $query = "
            SELECT * 
            FROM `event`
            WHERE scope = 'SUPERVISORS' AND start_time >= '$now'
        ";
            $events = array_merge($events, $this->execute($query));

            foreach ($data['groups'] as $group) {
                $query = "
                SELECT * 
                FROM `event`
                WHERE scope = :group_scope AND start_time >= '$now'
            ";
                $events = array_merge($events, $this->execute($query, ['group_scope' => 'GROUP_' . $group['group_id']]));
            }
        }

        if (strpos($data['role'], 'COORDINATOR') !== false) {
            $query = "
            SELECT * 
            FROM `event`
            WHERE (scope = 'COORDINATORS' OR scope = 'SUPERVISORS' OR scope = 'STUDENTS' OR scope = 'EXAMINERS') AND start_time >= '$now'
        ";
            $events = array_merge($events, $this->execute($query));
        }

        if (strpos($data['role'], 'STUDENT') !== false) {
            $query = "
            SELECT * 
            FROM `event`
            WHERE scope = 'STUDENTS' AND start_time >= '$now'
        ";
            $events = array_merge($events, $this->execute($query));

            $query = "
            SELECT * 
            FROM `event`
            WHERE scope = :group_scope AND start_time >= '$now'
        ";

            $events = array_merge($events, $this->execute($query, ['group_scope' => 'GROUP_' . $data['group_id']]));
        }

        if (strpos($data['role'], 'EXAMINER') !== false) {
            $query = "
            SELECT * 
            FROM `event`
            WHERE scope = 'EXAMINERS' AND start_time >= '$now'
        ";
            $events = array_merge($events, $this->execute($query));
        }

        $query = "
        SELECT * 
        FROM `event`
        WHERE scope = :user_scope AND start_time >= '$now'
    ";
        $events = array_merge($events, $this->execute($query, ['user_scope' => 'USER_' . $data['user_id']]));


        // Sort events by start_time
        usort($events, function ($a, $b) {
            return strtotime($a['start_time']) - strtotime($b['start_time']);
        });
        return $events;
    }

    public function createEvent($data)
    {
        $query = "
        INSERT INTO event (title, description, start_time, end_time, scope, creator_id)
        VALUES (:title, :description, :start_time, :end_time, :scope, :creator_id)
    ";
        return $this->execute($query, $data);
    }

    public function updateEvent($data) 
    {
        $query = "
            UPDATE event
            SET
                title = :title,
                description = :description,
                start_time = :start_time,
                end_time = :end_time,
                scope = :scope,
                creator_id = :creator_id
            WHERE event_id = :event_id        
        ";
        return $this->execute($query, $data);
    }

    public function deleteEvent($data) 
    {
        $query = "
            DELETE FROM event
            WHERE event_id =:event_id
        ";
     
        return $this->execute($query, $data);
    }
}