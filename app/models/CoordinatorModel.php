<?php

class CoordinatorModel
{
    use Model;

    // Get All Student Details for Manage Students Page
    protected $table = "coordinator";
    public function getAllStudents()
    {
        $query = "
        SELECT * FROM student
        JOIN user ON student.user_id = user.user_id
        LEFT JOIN bracket ON student.bracket_id = bracket.bracket_id
        ";
        return $this->execute($query);
    }

    public function importStudents($data)
    {
        foreach ($data as $student) {
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
                $query = "
            INSERT INTO student (registration_number, index_number, year, course, bracket, group_id, user_id)
            VALUES (:registration_number, :index_number, :year, :course, :bracket, :group_id, :user_id)
            ON DUPLICATE KEY UPDATE year = :year, course = :course, bracket = :bracket, group_id = :group_id, user_id = :user_id
            ";
                // if the student already exists, we update the student details
                $queryData = [
                    'registration_number' => $student['registration_number'],
                    'index_number' => $student['index_number'],
                    'year' => $student['year'],
                    'course' => $student['course'],
                    'bracket_id' => null,
                    'group_id' => $student['group_id'],
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

    public function deleteUsersByRole($data)
    {
        $query = "
        DELETE FROM user
        WHERE role = :role
        ";
        return $this->execute($query, $data);
    }

    public function deleteUser($data)
    {
        $query = "
        DELETE FROM user
        WHERE user_id = :user_id
        ";
        return $this->execute($query, $data);
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
}