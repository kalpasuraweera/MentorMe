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
            WHERE group_id = :group_id AND status IN ('PENDING', 'ACCEPTED')
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
        INSERT INTO supervisor_request (group_id, supervisor_id, project_title, idea, reason, created_at, status)
        VALUES (:group_id, :supervisor_id, :project_title, :idea, :reason, :created_at, :status)
        ";
        return $this->execute($query, $data);
    }

    // Get All Supervisor Requests for Supervisor Dashboard
    public function getSupervisorRequests($data)
    {
        $query = "
        SELECT * FROM supervisor_request
        WHERE supervisor_id = :supervisor_id
        ORDER BY created_at DESC
        ";
        return $this->execute($query, $data);
    }

    // Get All Meeting Requests for Supervisor Dashboard
    public function getMeetingRequests($data)
    {
        $query = "
        SELECT * FROM meeting_request
        WHERE supervisor_id = :supervisor_id
        ORDER BY created_at DESC
        ";
        return $this->execute($query, $data);
    }

    // Accept Supervision Request
    public function acceptSupervisionRequest($data)
    {
        // Update Request Status
        $query = "
        UPDATE supervisor_request
        SET status = 'ACCEPTED'
        WHERE request_id = :request_id
        ";
        $this->execute($query, ['request_id' => $data['request_id']]);

        // Update Supervisor's Current Projects
        $query = "
        UPDATE supervisor
        SET current_projects = current_projects + 1
        WHERE user_id = :supervisor_id
        ";
        $this->execute($query, ['supervisor_id' => $data['supervisor_id']]);

        // Update Group's Supervisor
        $query = "
        UPDATE `group`
        SET supervisor_id = :supervisor_id
        WHERE group_id = :group_id
        ";
        return $this->execute($query, ['supervisor_id' => $data['supervisor_id'], 'group_id' => $data['group_id']]);
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

    // Accept Meeting Request
    public function acceptMeetingRequest($data)
    {
        $query = "
        UPDATE meeting_request
        SET status = 'ACCEPTED', meeting_time = :meeting_time
        WHERE request_id = :request_id
        ";
        return $this->execute($query, $data);
    }

    // create meeting event
    public function createMeetingEvent($data)
    {
        $query = "
        INSERT INTO `event` (start_time, end_time,title, description, creator_id, scope)
        VALUES (:start_time, :end_time, :title, :description, :creator_id, :scope)
        ";
        return $this->execute($query, $data);
    }

    // Reject Meeting Request
    public function rejectMeetingRequest($data)
    {
        $query = "
        UPDATE meeting_request
        SET status = 'REJECTED'
        WHERE request_id = :request_id
        ";
        return $this->execute($query, $data);
    }

    public function getSupervisorData($data)
    {
        $query = "
            SELECT * FROM supervisor
            JOIN user ON supervisor.user_id = user.user_id
            WHERE supervisor.user_id = :user_id
        ";
        return $this->execute($query, $data);
    }
    public function updateSupervisorAccount($data)
    {
        $query = "
            UPDATE supervisor
            SET expected_projects = :expected_projects, description = :description
            WHERE user_id = :user_id
        ";
        $queryData = [
            'expected_projects' => $data['expected_projects'],
            'description' => $data['description'],
            'user_id' => $data['user_id']
        ];
        $this->execute($query, $queryData);

        $query = "
            UPDATE user
            SET full_name = :full_name, last_update = :last_update
            WHERE user_id = :user_id
        ";
        $queryData = [
            'full_name' => $data['full_name'],
            'last_update' => date('Y-m-d H:i:s'),
            'user_id' => $data['user_id']
        ];
        return $this->execute($query, $queryData);
    }

    public function getBiweeklyReports($data)
    {
        $query = "
            SELECT bi_weekly_report.*, `group`.project_name
            FROM bi_weekly_report
            JOIN `group` ON bi_weekly_report.group_id = `group`.group_id
            WHERE `group`.supervisor_id = :supervisor_id
        ";
        return $this->execute($query, $data);
    }

    public function approveBiWeeklyReport($data)
    {
        $query = "
            UPDATE bi_weekly_report
            SET status = 'ACCEPTED'
            WHERE report_id = :report_id
        ";
        return $this->execute($query, $data);
    }

    public function rejectBiWeeklyReport($data)
    {
        $query = "
            UPDATE bi_weekly_report
            SET status = 'REJECTED', reject_reason = :reject_reason
            WHERE report_id = :report_id
        ";
        return $this->execute($query, $data);
    }
}