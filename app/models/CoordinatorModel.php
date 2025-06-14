<?php

class CoordinatorModel
{
    use Model;

    // Get All Student Details for Manage Students Page
    protected $table = "coordinator";
    public function getAllStudents()
    {
        $query = "
        SELECT student.*, user.*, bracket.bracket, bracket.bracket_id, 
           `group`.group_id
    FROM student
    JOIN user ON student.user_id = user.user_id
    LEFT JOIN bracket ON student.bracket_id = bracket.bracket_id
    LEFT JOIN `group` ON student.group_id = `group`.group_id
    ";

        return $this->execute($query);
    }

    public function importStudents($data)
    {
        // Create brackets
        // length of data array / 4 = number of brackets
        // rest students will be assigned to first brackets

        $maxBrackets = floor(count($data) / 4);
        $blueBrackets = [];
        $redBrackets = [];

        for ($i = 0; $i < $maxBrackets * 2; $i++) {
            if ($i < $maxBrackets) {
                $query = "
                INSERT INTO bracket (bracket)
                VALUES (:bracket)
                ";
                $queryData = [
                    'bracket' => 'Blue'
                ];
                $this->execute($query, $queryData);
                // Add the last inserted bracket id to the blueBrackets array
                $blueBrackets[] = $this->getLastInsertedId();
            } elseif ($i < $maxBrackets * 2) {
                $query = "
                INSERT INTO bracket (bracket)
                VALUES (:bracket)
                ";
                $queryData = [
                    'bracket' => 'Red'
                ];
                $this->execute($query, $queryData);
                // Add the last inserted bracket id to the redBrackets array
                $redBrackets[] = $this->getLastInsertedId();
            }
        }


        foreach ($data as $index => $student) {
            try {
                // We use transactions to ensure that if one query fails, the other queries will not be executed
                $this->beginTransaction();
                $query = "
            INSERT INTO user (full_name, email, password, role)
            VALUES (:full_name, :email, :password, :role)
            ON DUPLICATE KEY UPDATE full_name = :full_name, email = :email, password = :password, role = :role
            ";
                // if the user already exists, we update the user details
                $queryData = [
                    'full_name' => $student['full_name'],
                    'email' => $student['email'],
                    'password' => password_hash($student['index_number'], PASSWORD_DEFAULT),
                    'role' => 'STUDENT'
                ];
                $this->execute($query, $queryData);
                // get the last inserted user id
                $student['user_id'] = $this->getLastInsertedId();
                if ($index < $maxBrackets || $index >= $maxBrackets * 4) {
                    $student['bracket_id'] = $blueBrackets[$index % $maxBrackets];
                } elseif ($index < $maxBrackets * 2) {
                    $student['bracket_id'] = $blueBrackets[$maxBrackets - $index % $maxBrackets - 1];
                } elseif ($index < $maxBrackets * 3) {
                    $student['bracket_id'] = $redBrackets[$index % $maxBrackets];
                } elseif ($index < $maxBrackets * 4) {
                    $student['bracket_id'] = $redBrackets[$maxBrackets - $index % $maxBrackets - 1];
                }

                $query = "
            INSERT INTO student (registration_number, index_number, year, course, bracket_id, group_id, user_id)
            VALUES (:registration_number, :index_number, :year, :course, :bracket_id, :group_id, :user_id)
            ON DUPLICATE KEY UPDATE year = :year, course = :course, bracket_id = :bracket_id, group_id = :group_id, user_id = :user_id
            ";
                // if the student already exists, we update the student details
                $queryData = [
                    'registration_number' => $student['registration_number'],
                    'index_number' => $student['index_number'],
                    'year' => $student['year'],
                    'course' => $student['course'],
                    'bracket_id' => $student['bracket_id'],
                    'group_id' => null,
                    'user_id' => $student['user_id']
                ];
                $this->execute($query, $queryData);
                $this->commit();
            } catch (\Throwable $th) {
                // if an error occurs, we rollback the transaction
                $this->rollBack();
            }
        }
        return true;
    }

    public function getStudentByIndexNumber($indexNumber)
    {
        $query = "
        SELECT * FROM student
        JOIN user ON student.user_id = user.user_id
        LEFT JOIN bracket ON student.bracket_id = bracket.bracket_id
        WHERE student.index_number = :index_number
        ";
        $params = [':index_number' => $indexNumber];
        return $this->execute($query, $params);
    }

    public function getStudentByBracket($bracket)
    {
        $query = "
        SELECT * FROM student
        JOIN user ON student.user_id = user.user_id
        LEFT JOIN bracket ON student.bracket_id = bracket.bracket_id
        WHERE bracket.bracket = :bracket
        ";
        $params = [':bracket' => $bracket];
        return $this->execute($query, $params);
    }

    public function getAllCourses()
    {
        $query = "
        SELECT DISTINCT course FROM student
        ";
        return $this->execute($query);
    }

    public function deleteStudent($data)
    {
        $query = "
        DELETE FROM student
        WHERE user_id = :user_id
        ";
        return $this->execute($query, $data);
    }

    public function deleteAllStudents()
    {
        $query = "
        DELETE FROM user
        WHERE role = 'STUDENT' OR role = 'STUDENT_LEADER'
        ";
        $this->execute($query);

        // Also delete all brackets when deleting all students
        $query = "
        DELETE FROM bracket
        ";
        return $this->execute($query);
    }

    public function updateStudent($data)
    {
        $queryData = [
            'user_id' => $data['user_id'],
            'index_number' => $data['index_number'],
            'year' => $data['year'],
            'course' => $data['course'],
            'group_id' => $data['group_id']
        ];
        $query = "
        UPDATE student
        SET index_number = :index_number, year = :year, course = :course, group_id = :group_id
        WHERE user_id = :user_id
        ";
        $this->execute($query, $queryData);

        $query = "
        UPDATE user
        SET full_name = :full_name, email = :email
        WHERE user_id = :user_id
        ";
        $queryData = [
            'user_id' => $data['user_id'],
            'full_name' => $data['full_name'],
            'email' => $data['email']
        ];
        return $this->execute($query, $queryData);
    }


    public function getAllSupervisors()
    {
        $query = "
        SELECT 
          supervisor.*,
          user.full_name,
          user.email,
        GROUP_CONCAT(DISTINCT main_groups.group_id) AS supervising_groups,
        GROUP_CONCAT(DISTINCT co_groups.group_id) AS co_supervising_groups,          supervisor.expected_projects
        FROM supervisor

        JOIN user ON supervisor.user_id = user.user_id
        LEFT JOIN `group` AS main_groups ON supervisor.user_id = main_groups.supervisor_id
        LEFT JOIN `group` AS co_groups ON supervisor.user_id = co_groups.co_supervisor_id
        WHERE is_co_supervisor = FALSE
        GROUP BY supervisor.user_id
        ";
        return $this->execute($query);
    }

    public function getSupervisorByEmailId($email_id)
    {
        $query = "
       
        
         SELECT 
          supervisor.*,
          user.full_name,
          user.email,
        GROUP_CONCAT(DISTINCT main_groups.group_id) AS supervising_groups,
        GROUP_CONCAT(DISTINCT co_groups.group_id) AS co_supervising_groups,          supervisor.expected_projects
        FROM supervisor

        JOIN user ON supervisor.user_id = user.user_id
        LEFT JOIN `group` AS main_groups ON supervisor.user_id = main_groups.supervisor_id
        LEFT JOIN `group` AS co_groups ON supervisor.user_id = co_groups.co_supervisor_id
        WHERE is_co_supervisor = FALSE
        GROUP BY supervisor.user_id
        HAVING email_id = :email_id


        ";
        $params = [':email_id' => $email_id];
        return $this->execute($query, $params);
    }

    public function getSupervisorByProjectComparison($projectComparison)
    {
        $query = "
        SELECT 
          supervisor.*,
          user.full_name,
          user.email,
        GROUP_CONCAT(DISTINCT main_groups.group_id) AS supervising_groups
        FROM supervisor

        JOIN user ON supervisor.user_id = user.user_id
        LEFT JOIN `group` AS main_groups ON supervisor.user_id = main_groups.supervisor_id

        ";

        if ($projectComparison === 'greater') {
            $query .= "WHERE supervisor.expected_projects > supervisor.current_projects";
        } else if ($projectComparison === 'equal') {
            $query .= " WHERE supervisor.expected_projects = supervisor.current_projects";
        }
        $query .= " GROUP BY supervisor.user_id";
        return $this->execute($query);
    }



    public function importSupervisors($data)
    {
        foreach ($data as $email_id => $supervisor) {
            try {
                $this->beginTransaction();
                $query = "
                INSERT INTO user (full_name, email, password, role)
                VALUES (:full_name, :email, :password, :role)
                ON DUPLICATE KEY UPDATE full_name = :full_name, email = :email, password = :password, role = :role
                ";

                $queryData = [
                    'full_name' => $supervisor['full_name'],
                    'email' => $supervisor['email'],
                    'password' => password_hash($supervisor['email_id'], PASSWORD_DEFAULT),
                    'role' => 'SUPERVISOR'
                ];

                $this->execute($query, $queryData);
                $supervisor['user_id'] = $this->getLastInsertedId();


                $query = "
                INSERT INTO supervisor (email_id, description, expected_projects, user_id,is_co_supervisor)
                VALUES (:email_id, :description, :expected_projects, :user_id,FALSE)
                ON DUPLICATE KEY UPDATE description = :description, expected_projects = :expected_projects, is_co_supervisor = FALSE, user_id = :user_id
                ";
                // if the supervisor already exists, we update the supervisor details
                $queryData = [
                    'email_id' => $supervisor['email_id'],
                    'description' => $supervisor['description'],
                    'expected_projects' => $supervisor['expected_projects'],
                    'user_id' => $supervisor['user_id']
                ];

                $this->execute($query, $queryData);
                $this->commit();
            } catch (\Throwable $th) {
                // if an error occurs, we rollback the transaction
                $this->rollBack();
            }
        }
        return true;
    }
    public function deleteSupervisor($data)
    {
        // Remove supervisor from all groups
        $query = "
        UPDATE `group`
        SET supervisor_id = NULL
        WHERE supervisor_id = :user_id
        ";
        $this->execute($query, $data);

        // Delete from user table
        $query = "
        DELETE FROM user
        WHERE user_id = :user_id
        ";
        return $this->execute($query, $data);
    }
    public function deleteAllSupervisors()
    {
        $query = "
        DELETE FROM user
        WHERE user_id IN (
            SELECT supervisor.user_id 
            FROM supervisor
            WHERE supervisor.is_co_supervisor = FALSE
        )
        ";
        return $this->execute($query);
    }

    public function updateSupervisor($data)
    {
        $queryData = [
            'user_id' => $data['user_id'],
            'email_id' => $data['email_id'],
            'description' => $data['description'],
            'expected_projects' => $data['expected_projects'],
            'current_projects' => $data['current_projects']
        ];

        $query = "
        UPDATE supervisor
        SET email_id = :email_id, description = :description, expected_projects = :expected_projects, current_projects = :current_projects
        WHERE user_id = :user_id
        ";

        $this->execute($query, $queryData);

        $query = "
        UPDATE user
        SET email = :email, full_name = :full_name
        WHERE user_id = :user_id
        ";
        $queryData = [
            'user_id' => $data['user_id'],
            'email' => $data['email'],
            'full_name' => $data['full_name']
        ];
        return $this->execute($query, $queryData);

    }



    public function getAllCoSupervisors()
    {
        $query = "
        SELECT 
        supervisor.*,
        user.full_name,
        user.email,
        GROUP_CONCAT(`group`.group_id) AS co_supervising_groups
        FROM supervisor
        JOIN user ON supervisor.user_id = user.user_id
        LEFT JOIN `group` ON `group`.co_supervisor_id = supervisor.user_id
        WHERE is_co_supervisor = TRUE
        GROUP BY supervisor.user_id
    ";
        return $this->execute($query);
    }

    public function getCoSupervisorByEmailId($email_id)
    {
        $query = "
                SELECT 
                supervisor.*,
                user.full_name,
                user.email,
                GROUP_CONCAT(`group`.group_id) AS co_supervising_groups
                FROM supervisor
                JOIN user ON supervisor.user_id = user.user_id
                LEFT JOIN `group` ON `group`.co_supervisor_id = supervisor.user_id
                WHERE is_co_supervisor = TRUE
                GROUP BY supervisor.user_id
                HAVING email_id = :email_id
            ";
        $params = [':email_id' => $email_id];
        return $this->execute($query, $params);
    }

    public function importCoSupervisors($data)
    {
        foreach ($data as $index => $supervisor) {
            try {
                $this->beginTransaction();
                $query = "
                INSERT INTO user (full_name, email, password, role)
                VALUES (:full_name, :email, :password, :role)
                ON DUPLICATE KEY UPDATE full_name = :full_name, email = :email, password = :password, role = :role
                ";

                $queryData = [
                    'full_name' => $supervisor['full_name'],
                    'email' => $supervisor['email'],
                    'password' => password_hash($supervisor['email_id'], PASSWORD_DEFAULT),
                    'role' => 'SUPERVISOR'
                ];

                $this->execute($query, $queryData);
                $supervisor['user_id'] = $this->getLastInsertedId();


                $query = "
                INSERT INTO supervisor (email_id, user_id, is_co_supervisor)
                VALUES (:email_id, :user_id, TRUE)
                ON DUPLICATE KEY UPDATE is_co_supervisor = TRUE, user_id = :user_id
                ";

                // if the supervisor already exists, we update the supervisor details
                $queryData = [
                    'email_id' => $supervisor['email_id'],
                    'user_id' => $supervisor['user_id']
                ];

                $this->execute($query, $queryData);

                // Add co supervisor to relevant groups
                $groups = explode(",", $supervisor['groups']);
                foreach ($groups as $group) {
                    $query = "
                        UPDATE `group`
                        SET co_supervisor_id = :co_supervisor_id
                        WHERE group_id = :group_id
                    ";
                    $queryData = [
                        'co_supervisor_id' => $supervisor['user_id'],
                        'group_id' => $group
                    ];
                    $this->execute($query, $queryData);
                }

                $this->commit();
            } catch (\Throwable $th) {
                // if an error occurs, we rollback the transaction
                $this->rollBack();
            }
        }
        return true;
    }

    public function updateCoSupervisor($data)
    {
        $queryData = [
            'user_id' => $data['user_id'],
            'email_id' => $data['email_id'],
        ];

        $query = "
        UPDATE supervisor
        SET email_id = :email_id
        WHERE user_id = :user_id
        ";

        $this->execute($query, $queryData);

        $query = "
        UPDATE user
        SET email = :email, full_name = :full_name
        WHERE user_id = :user_id
        ";
        $queryData = [
            'user_id' => $data['user_id'],
            'email' => $data['email'],
            'full_name' => $data['full_name']
        ];
        return $this->execute($query, $queryData);

    }

    public function deleteCoSupervisor($data)
    {
        // Remove co-supervisor from all groups
        $query = "
        UPDATE `group`
        SET co_supervisor_id = NULL
        WHERE co_supervisor_id = :user_id
        ";
        $this->execute($query, $data);

        // Delete from user table
        $query = "
        DELETE FROM user
        WHERE user_id = :user_id
        ";
        return $this->execute($query, $data);
    }


    public function deleteAllCoSupervisors()
    {
        $query = "
        DELETE FROM user
        WHERE user_id IN (
            SELECT supervisor.user_id 
            FROM supervisor
            WHERE supervisor.is_co_supervisor = TRUE
        )
        ";
        return $this->execute($query);
    }




    public function getAllExaminers()
    {
        $query = "
        SELECT examiner.*,
          user.full_name,
          user.email
        FROM examiner
        JOIN user ON examiner.user_id = user.user_id
                GROUP BY examiner.user_id

        ";
        return $this->execute($query);
    }

    public function getExaminerByEmailId($email_id)
    {
        $query = "
         SELECT examiner.*,
          user.full_name,
          user.email
        FROM examiner
        JOIN user ON examiner.user_id = user.user_id
                GROUP BY examiner.user_id
        HAVING email_id = :email_id
        ";
        $params = [':email_id' => $email_id];
        return $this->execute($query, $params);
    }

    public function getExaminerByPanelNumber($panel_number)
    {
        $query = "
        SELECT examiner.*,
          user.full_name,
          user.email
        FROM examiner
        JOIN user ON examiner.user_id = user.user_id
        WHERE panel_number = :panel_number
        GROUP BY examiner.user_id
        ";
        $params = [':panel_number' => $panel_number];
        return $this->execute($query, $params);
    }

    public function getExaminerPanels(){
        $query = "
        SELECT DISTINCT panel_number
        FROM examiner
        WHERE panel_number IS NOT NULL
        ORDER BY panel_number ASC
        ";
        return $this->execute($query);
    }


    public function importExaminers($data)
    {
        foreach ($data as $email_id => $examiner) {
            try {
                $this->beginTransaction();
                $query = "
                INSERT INTO user (full_name, email, password, role)
                VALUES (:full_name, :email, :password, :role)
                ON DUPLICATE KEY UPDATE full_name = :full_name, email = :email, password = :password, role = :role
                ";

                $queryData = [
                    'full_name' => $examiner['full_name'],
                    'email' => $examiner['email'],
                    'password' => password_hash($examiner['email_id'], PASSWORD_DEFAULT),
                    'role' => 'SUPERVISOR_EXAMINER'
                ];

                $this->execute($query, $queryData);
                $examiner['user_id'] = $this->getLastInsertedId();


                $query = "
                INSERT INTO examiner (email_id,  user_id, panel_number)
                VALUES (:email_id, :user_id, :panel_number)
                ON DUPLICATE KEY UPDATE user_id = :user_id, email_id = :email_id, panel_number = :panel_number
                ";

                // if the examiner already exists, we update the examiner details
                $queryData = [
                    'email_id' => $examiner['email_id'],
                    'user_id' => $examiner['user_id'],
                    'panel_number' => $examiner['panel_number']
                ];

                $this->execute($query, $queryData);

                // Add examiner to relevant groups
                $groups = explode(",", $examiner['groups']);
                foreach ($groups as $group) {
                    $query = "
                        INSERT INTO examiner_group (examiner_id, group_id,panel_number)
                        VALUES (:examiner_id, :group_id,:panel_number)
                        ON DUPLICATE KEY UPDATE examiner_id = :examiner_id, group_id = :group_id, panel_number = :panel_number
                    ";
                    $queryData = [
                        'examiner_id' => $examiner['user_id'],
                        'group_id' => $group,
                        'panel_number' => $examiner['panel_number']
                    ];
                    $this->execute($query, $queryData);
                }
                $this->commit();
            } catch (\Throwable $th) {
                // if an error occurs, we rollback the transaction
                $this->rollBack();
            }
        }
        return true;
    }

    public function deleteAllExaminers()
    {
        // First update users that are in supervisor table to have 'SUPERVISOR' role
        $query = "
        UPDATE user
        SET role = 'SUPERVISOR'
        WHERE user_id IN (
            SELECT supervisor.user_id FROM supervisor
        ) AND role = 'SUPERVISOR_EXAMINER'
        ";
        $this->execute($query);

        // Delete all examiners
        $query = "
        DELETE FROM examiner
        ";
        $this->execute($query);

        // Delete any remaining users with supervisor_examiner role
        $query = "
        DELETE FROM user
        WHERE role = 'SUPERVISOR_EXAMINER'
        ";
        return $this->execute($query);
    }

    public function deleteExaminer($data)
    {

        // Update user role if they are also a supervisor
        $query = "
        UPDATE user 
        SET role = 'SUPERVISOR'
        WHERE user_id = :user_id 
            AND user_id IN (SELECT user_id FROM supervisor)
        ";
        $this->execute($query, $data);

        // Delete from examiner table
        $query = "
        DELETE FROM examiner
        WHERE user_id = :user_id
        ";
        $this->execute($query, $data);

        // Finally delete from user table if they are not a supervisor
        $query = "
        DELETE FROM user
        WHERE user_id = :user_id
            AND user_id NOT IN (SELECT user_id FROM supervisor)
        ";
        return $this->execute($query, $data);
    }

    public function updateExaminer($data)
    {
        $queryData = [
            'user_id' => $data['user_id'],
            'email_id' => $data['email_id'],
            'panel_number' => $data['panel_number'],
            'description' => $data['description']
        ];

        $query = "
        UPDATE examiner
        SET email_id = :email_id, panel_number = :panel_number,description = :description
        WHERE user_id = :user_id
        ";

        $this->execute($query, $queryData);

        $query = "
        UPDATE user
        SET email = :email, full_name = :full_name
        WHERE user_id = :user_id
        ";
        $queryData = [
            'user_id' => $data['user_id'],
            'email' => $data['email'],
            'full_name' => $data['full_name']
        ];
        return $this->execute($query, $queryData);

    }


    public function getAllGroups()
    {
        $query = "
            SELECT 
                `group`.*,
                supervisor.full_name AS supervisor_full_name,
                leader.full_name AS leader_full_name,
                co_supervisor.full_name AS co_supervisor_full_name
            FROM `group`
            LEFT JOIN user AS supervisor ON `group`.supervisor_id = supervisor.user_id
            LEFT JOIN user AS leader ON `group`.leader_id = leader.user_id
            LEFT JOIN user AS co_supervisor ON `group`.co_supervisor_id = co_supervisor.user_id
        ";
        return $this->execute($query);
    }

    public function getGroupByGroupId($group_id)
    {
        $query = "
         SELECT 
                `group`.*,
                supervisor.full_name AS supervisor_full_name,
                leader.full_name AS leader_full_name,
                co_supervisor.full_name AS co_supervisor_full_name
            FROM `group`
            LEFT JOIN user AS supervisor ON `group`.supervisor_id = supervisor.user_id
            LEFT JOIN user AS leader ON `group`.leader_id = leader.user_id
            LEFT JOIN user AS co_supervisor ON `group`.co_supervisor_id = co_supervisor.user_id
            WHERE `group`.group_id = :group_id
        ";
        $params = [':group_id' => $group_id];
        return $this->execute($query, $params);
    }

    public function updateGroup($data)
    {
        // Begin transaction for consistency
        $this->beginTransaction();

        try {
            // Get old supervisor values for comparison
            $query = "SELECT supervisor_id, co_supervisor_id FROM `group` WHERE group_id = :group_id";
            $oldValues = $this->execute($query, ['group_id' => $data['group_id']])[0];

            // Update group
            $query = "
            UPDATE `group`
            SET supervisor_id = :supervisor_id, co_supervisor_id = :co_supervisor_id
            WHERE group_id = :group_id
            ";
            $queryData = [
                'supervisor_id' => $data['supervisor_id'],
                'co_supervisor_id' => $data['co_supervisor_id'],
                'group_id' => $data['group_id']
            ];
            $this->execute($query, $queryData);

            // Update old supervisor's count if changed
            if (!empty($oldValues['supervisor_id']) && $oldValues['supervisor_id'] != $data['supervisor_id']) {
                $this->decrementSupervisorProjectCount($oldValues['supervisor_id']);
            }

            // Update new supervisor's count if assigned
            if (!empty($data['supervisor_id']) && $oldValues['supervisor_id'] != $data['supervisor_id']) {
                $this->incrementSupervisorProjectCount($data['supervisor_id']);
            }

            // Similar logic for co-supervisor if needed

            $this->commit();
            return true;
        } catch (\Exception $e) {
            $this->rollBack();
            return false;
        }
    }

    // Helper methods
    private function incrementSupervisorProjectCount($supervisor_id)
    {
        $query = "
            UPDATE supervisor 
            SET current_projects = current_projects + 1
            WHERE user_id = :supervisor_id
        ";
        return $this->execute($query, ['supervisor_id' => $supervisor_id]);
    }

    private function decrementSupervisorProjectCount($supervisor_id)
    {
        $query = "
            UPDATE supervisor 
            SET current_projects = GREATEST(0, current_projects - 1)
            WHERE user_id = :supervisor_id
        ";
        return $this->execute($query, ['supervisor_id' => $supervisor_id]);
    }
    public function deleteGroup($data)
    {
        $query = "
        DELETE FROM `group`
        WHERE group_id = :group_id
        ";
        return $this->execute($query, ['group_id' => $data['group_id']]);
    }

    public function deleteAllGroups()
    {
        $query = "
        DELETE FROM `group`
        ";
        return $this->execute($query);
    }

    // Fetching Dashboard Data
    public function getDashboardData()
    {
        $query = "
        SELECT 
            (SELECT COUNT(*) FROM student) AS total_students,
            (SELECT COUNT(*) FROM supervisor WHERE is_co_supervisor = FALSE) AS total_supervisors,
            (SELECT COUNT(*) FROM `group`) AS total_groups
        ";
        return $this->execute($query);
    }

    public function getAllGroupTasks()
    {
        $query = "
            SELECT task.*, user.full_name AS assignee_name
            FROM task
            JOIN user ON user.user_id = task.assignee_id
        ";
        return $this->execute($query);
    }

    // Start and End value tongle in code check
    public function getCodeCheckDetail()
    {
        $query = "
            SELECT * 
            FROM codecheck
        ";

        return $this->execute($query);
    }

    public function startCodeCheck()
    {
        $query = "
            UPDATE codecheck
            SET status = 1
            WHERE startid = 1;
        ";
        return $this->execute($query);
    }

    public function startCodeCheckDeadline($data)
    {
        $query = "
            UPDATE codecheck
            SET status = 1, deadline = :deadline
            WHERE startid = 1;
        ";
        return $this->execute($query, $data);
    }

    public function endCodeCheck()
    {
        $query = "
            UPDATE codecheck
            SET status = 0
            WHERE startid = 1;
        ";
        return $this->execute($query);
    }

    public function checkCodeCheckStatus()
    {
        $query = "
            SELECT *
            FROM codecheck
            WHERE startid = 1;
        ";


        return $this->execute($query);
    }

    public function getdeadline()
    {
        $query = "
            SELECT deadline 
            FROM codecheck
            WHERE startid = 1;
        ";

        return $this->execute($query);
    }


    public function deleteUser($data)
    {
        // There is a issue when we delete a student, the bracket is not deleted...
        $query = "
        DELETE FROM user
        WHERE user_id = :user_id
        ";
        return $this->execute($query, $data);
    }


}

