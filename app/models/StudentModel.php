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
        LEFT JOIN user ON supervisor_request.supervisor_id = user.user_id
        WHERE group_id = :group_id ORDER BY created_at DESC
        ";
        return $this->execute($query, $data);
    }

    // Get All meeting Requests for Leader Dashboard
    public function getMeetingRequests($data)
    {
        $query = "
        SELECT * FROM meeting_request
        WHERE group_id = :group_id 
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

    public function deleteMeetingRequest($data) 
    {
        $query = "
            DELETE FROM meeting_request 
            WHERE request_id = :request_id
        ";

        return $this->execute($query, $data);
    }

    // get student details by user_id
    public function getStudentData($userID)
    {
        $query = "
        SELECT * FROM student
        JOIN user ON student.user_id = user.user_id
        WHERE student.user_id = $userID
        ";

        return $this->execute($query);
    }

    public function getGroupMembers($groupID)
    {
        $query = "
            SELECT student.user_id, user.full_name
            FROM student
            JOIN user ON user.user_id = student.user_id
            WHERE group_id = $groupID
        ";

        return $this->execute($query);
    }

    public function getGroupMembersDetail($groupID)
    {
        $query = "
            SELECT *
            FROM student
            JOIN user ON user.user_id = student.user_id
            WHERE group_id = $groupID
        ";

        return $this->execute($query);
    }

    public function addCodeCheck($data)
    {
        $query = "
            UPDATE student
            SET gitlink = :gitlink, assumption = :assumption
            WHERE user_id = :id
        ";
    
        return $this->execute($query, $data);
    }

    public function getCodeCheckDetail($data)
    {
        $query = "
            SELECT gitlink, assumption
            FROM student
            WHERE user_id = :id
        ";

        return $this->execute($query, $data);
    }

    // public function testInput($data)
    // {
    //     $query = "
    //         INSERT INTO test(testtext,testemail)
    //         VALUES(:name, :email)

    //     ";

    //     return $this->execute($query, $data);
    // }

    // public function getTestData()
    // {   
    //     $query = "
    //         SELECT *
    //         FROM test
    //     ";

    //     return $this->execute($query);
    // }
    
}