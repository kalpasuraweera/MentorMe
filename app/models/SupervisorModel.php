<?php

class SupervisorModel
{
    use Model;
    protected $table = "supervisor";

    // Get Available Supervisors
    public function getAvailableSupervisors($groupId)
    {

        $query = "
            SELECT * FROM supervisor_request
            WHERE group_id = :group_id AND status = 'pending'
        ";
        $pendingRequests = $this->execute($query, ['group_id' => $groupId]);
        if (!empty($pendingRequests)) {
            return [];
        }

        $query = "
            SELECT supervisor.*, user.full_name, user.email
            FROM $this->table
            JOIN user ON supervisor.user_id = user.user_id
            WHERE supervisor.current_projects != supervisor.expected_projects
        ";
        return $this->execute($query);
    }

    // Send Supervision Request
    public function sendSupervisionRequest($data)
    {
        $query = "
        INSERT INTO supervisor_request (group_id, supervisor_id, project_title, idea, reason, date, status)
        VALUES (:group_id, :supervisor_id, :project_title, :idea, :reason, :date, :status)
        ";
        return $this->execute($query, $data);
    }

    // Get All Supervisor Requests for Supervisor Dashboard
    public function getSupervisorRequests($data)
    {
        $query = "
        SELECT * FROM supervisor_request
        WHERE supervisor_id = :supervisor_id AND status = 'PENDING' 
        ORDER BY date DESC
        ";
        //TODO: We have to get meeting requests also here
        return $this->execute($query, $data);
    }

    // Accept Supervision Request
    public function acceptSupervisionRequest($data)
    {
        $query = "
        UPDATE supervisor_request
        SET status = 'ACCEPTED'
        WHERE request_id = :request_id
        ";
        return $this->execute($query, $data);
    }

    // Reject Supervision Request
    public function rejectSupervisionRequest($data)
    {
        $query = "
        UPDATE supervisor_request
        SET status = 'REJECTED'
        WHERE request_id = :request_id
        ";
        return $this->execute($query, $data);
    }
}