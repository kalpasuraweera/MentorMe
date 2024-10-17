<?php

class SupervisorModel
{
    use Model;
    protected $table = "supervisor";

    public function getAvailableSupervisors()
    {
        $query = "
            SELECT supervisor.*, user.full_name, user.email
            FROM $this->table
            JOIN user ON supervisor.user_id = user.user_id
            WHERE supervisor.current_projects != supervisor.expected_projects
        ";

        //     $query = "
        //     SELECT 
        //         supervisor.*, 
        //         user.full_name, 
        //         user.email,
        //         SUM(CASE WHEN supervisor_request.status = 'pending' THEN 1 ELSE 0 END) AS pending_count,
        //         SUM(CASE WHEN supervisor_request.status = 'approved' THEN 1 ELSE 0 END) AS approved_count,
        //         SUM(CASE WHEN supervisor_request.status = 'rejected' THEN 1 ELSE 0 END) AS rejected_count
        //     FROM $this->table
        //     JOIN user ON supervisor.user_id = user.user_id
        //     LEFT JOIN supervisor_request ON supervisor.user_id = supervisor_request.supervisor_id
        //     WHERE supervisor.current_projects != supervisor.expected_projects
        //     GROUP BY supervisor.user_id, user.full_name, user.email
        // ";
        return $this->execute($query);
    }

    public function sendSupervisionRequest($data)
    {
        $query = "
        INSERT INTO supervisor_request (group_id, supervisor_id, project_title, idea, reason, date, status)
        VALUES (:group_id, :supervisor_id, :project_title, :idea, :reason, :date, :status)
    ";
        return $this->execute($query, $data);
    }
}