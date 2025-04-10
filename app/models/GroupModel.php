<?php

class GroupModel
{
    use Model;
    protected $table = "group";

    // TODO: We have to exclude the brackets that are already assigned to a group
    public function getBrackets($data)
    {
        $query = "
            SELECT * FROM bracket
            WHERE bracket = :bracket AND group_id IS NULL
        ";
        return $this->execute($query, $data);
    }

    // TODO: We have to exclude the students that are already assigned to a group
    public function getBracketStudents($data)
    {
        $query = "
            SELECT * FROM user
            JOIN student ON user.user_id = student.user_id
            WHERE bracket_id = :red_bracket_id OR bracket_id = :blue_bracket_id
        ";
        return $this->execute($query, $data);
    }

    public function createGroup($data)
    {
        // Create a group
        $query = "
            INSERT INTO `group` (project_name, project_description, year, leader_id, course)
            VALUES (:project_name, :project_description, :year, :leader_id, :course)
            ON DUPLICATE KEY UPDATE project_name = :project_name, project_description = :project_description, year = :year, leader_id = :leader_id, course = :course
        ";
        $queryData = [
            'project_name' => $data['project_name'],
            'project_description' => $data['project_description'],
            'year' => date('Y'), // Current year
            'leader_id' => $data['leader_id'],
            'course' => 'Computer Science' // TODO: We have to get the course from the leader
        ];
        $this->execute($query, $queryData);
        $groupId = $this->getLastInsertedId();

        // Assign the group to the brackets
        $query = "
            UPDATE bracket
            SET group_id = :group_id
            WHERE bracket_id = :red_bracket_id OR bracket_id = :blue_bracket_id
        ";
        $queryData = [
            'group_id' => $groupId,
            'red_bracket_id' => $data['red_bracket_id'],
            'blue_bracket_id' => $data['blue_bracket_id']
        ];
        $this->execute($query, $queryData);

        // Assign group_id to students
        $query = "
            UPDATE student
            SET group_id = :group_id
            WHERE bracket_id = :red_bracket_id OR bracket_id = :blue_bracket_id
        ";
        $this->execute($query, $queryData);

        // Update user role to STUDENT_LEADER
        $query = "
            UPDATE user
            SET role = 'STUDENT_LEADER'
            WHERE user_id = :leader_id
        ";
        $this->execute($query, ['leader_id' => $data['leader_id']]);
        return true;
    }

    public function getSupervisorGroups($data)
    {
        $query = "
            SELECT * FROM `group`
            WHERE supervisor_id = :supervisor_id OR co_supervisor_id = :supervisor_id
        ";
        return $this->execute($query, $data);
    }

    function getSupervisorGroupTasks($data)
    {
        $query = "
            SELECT task.*,`group`.*,user.full_name AS assignee_name, user.profile_picture FROM `task`
            LEFT JOIN `group` ON task.group_id = group.group_id
            LEFT JOIN user ON user.user_id = task.assignee_id
            WHERE group.supervisor_id = :supervisor_id OR group.co_supervisor_id = :supervisor_id
        ";
        return $this->execute($query, $data);
    }

    function getSupervisorGroupMembers($data)
    {
        $query = "
            SELECT user.*,count(task.task_id) FROM `user`
            INNER JOIN `group` ON user.group_id = group.group_id
            LEFT JOIN user ON user.user_id = task.assignee_id
            WHERE group.supervisor_id = :supervisor_id OR group.co_supervisor_id = :supervisor_id
        ";
        return $this->execute($query, $data);
    }

    public function getExaminerGroups($data)
    {
        $query = "
            SELECT * FROM `examiner_group`
            LEFT JOIN `group` ON examiner_group.group_id = group.group_id
            WHERE examiner_id = :examiner_id
        ";
        return $this->execute($query, $data);
    }

    function getExaminerGroupTasks($data)
    {
        $query = "
            SELECT task.*,`group`.*,user.full_name AS assignee_name, user.profile_picture FROM `task`
            LEFT JOIN `group` ON task.group_id = group.group_id
            LEFT JOIN user ON user.user_id = task.assignee_id
            WHERE group.group_id IN (SELECT group_id FROM examiner_group WHERE examiner_id = :examiner_id)
        ";
        return $this->execute($query, $data);
    }

    public function getGroup($data)
    {
        $query = "
            SELECT * FROM `group`
            LEFT JOIN `user` ON group.leader_id = user.user_id
            WHERE group_id = :group_id
        ";
        return $this->execute($query, $data);
    }

    public function getLastTaskNumber($data)
    {
        $query = "
            SELECT MAX(task_number) as task_number FROM task
            WHERE group_id = :group_id
        ";

        $result = $this->execute($query, $data);

        // If there are no tasks, return 0
        if (empty($result)) {
            return [['task_number' => 0]];
        } else {
            return $result;
        }
    }
}