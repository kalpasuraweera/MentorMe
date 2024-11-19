<?php

class StudentModel
{
    use Model;
    protected $table = "student";

    // Get All supervision Requests for Leader Dashboard
    public function getSupervisionRequests($data)
    {
        $query = "
        SELECT * FROM supervisor_request
        WHERE group_id = :group_id ORDER BY created_at DESC
        ";
        return $this->execute($query, $data);
    }

    // Get All meeting Requests for Leader Dashboard
    public function getMeetingRequests($data)
    {
        $query = "
        SELECT * FROM meeting_request
        WHERE group_id = :group_id AND status = 'PENDING' 
        ORDER BY created_at DESC
        ";
        return $this->execute($query, $data);
    }

    // Update a Request
    public function updateSupervisionRequest($data)
    {
        $query = "
        UPDATE supervisor_request
        SET project_title = :project_title, idea = :idea, reason = :reason
        WHERE request_id = :request_id
        ";
        return $this->execute($query, $data);
    }

    // Delete a Request
    public function deleteSupervisionRequest($data)
    {
        $query = "
        DELETE FROM supervisor_request
        WHERE request_id = :request_id
        ";
        return $this->execute($query, $data);
    }

    // Send Meeting Request
    public function sendMeetingRequest($data)
    {
        $query = "
        INSERT INTO meeting_request (group_id, supervisor_id, title, done, reason, created_at, status)
        VALUES (:group_id, :supervisor_id, :title, :done, :reason, :created_at, :status)
        ";
        return $this->execute($query, $data);
    }

    // get student details by user_id
    public function getStudentData($userID)
    {
        $query = "
        SELECT * FROM $this->table
        WHERE user_id = $userID
        ";

        return $this->execute($query);
    }
}