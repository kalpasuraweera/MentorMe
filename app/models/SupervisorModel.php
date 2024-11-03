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
}