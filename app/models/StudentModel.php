<?php

class StudentModel
{
    use Model;
    protected $table = "student";

    // Get All Group Requests for Leader Dashboard
    public function getGroupRequests($data)
    {
        $query = "
        SELECT * FROM supervisor_request
        WHERE group_id = :group_id ORDER BY date DESC
        ";
        //TODO: Later we have to get meeting requests also
        return $this->execute($query, $data);
    }

    // Update a Request
    public function updateGroupRequest($data)
    {
        $query = "
        UPDATE supervisor_request
        SET project_title = :project_title, idea = :idea, reason = :reason
        WHERE request_id = :request_id
        ";
        return $this->execute($query, $data);
    }

    // Delete a Request
    public function deleteGroupRequest($data)
    {
        $query = "
        DELETE FROM supervisor_request
        WHERE request_id = :request_id
        ";
        return $this->execute($query, $data);
    }
}