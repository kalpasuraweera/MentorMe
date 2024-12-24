<?php

class TaskModel
{
    use Model;
    protected $table = "task";


    // Get last two week completed tasks
    public function getCompletedTasks($data)
    {
        $groupID = $data['group_id'];
        $date = $data['date'];
        $query = "
            SELECT * 
            FROM task
            WHERE group_id = $groupID AND status = 'COMPLETED' AND end_time >= '$date'
        ";
        return $this->execute($query);
    }

    // Get TO_Do Tasks
    public function getToDoTasks($data)
    {
        $groupID = $data['group_id'];
        $query = "
            SELECT * 
            FROM task
            WHERE group_id = $groupID AND status = 'TO_DO'
        ";
        return $this->execute($query);
    }

    //get task according to status
    public function getTaskDetail($data)
    {
        $status = $data['status'];
        $groupID = $data['group_id'];
        $query = "
            SELECT * 
            FROM $this->table
            JOIN user ON user.user_id = $this->table.assignee_id
            WHERE status = '$status' AND group_id = $groupID
        ";

        return $this->execute($query);
    }

    //get task according to taskId
    public function findTaskDetail($taskId)
    {
        $query = "
            SELECT *
            FROM task
            JOIN user ON user.user_id = task.assignee_id
            WHERE task_id = $taskId
        ";

        return $this->execute($query);
    }

    public function addTask($data)
    {
        $query = "
            INSERT INTO task (group_id, assignee_id, title, description, estimated_time, deadline, status, task_number, create_time)
            VALUES (:group_id, :assignee_id, :title, :description, :estimated_time, :deadline, :status, :task_number, :create_time)
        ";

        return $this->execute($query, $data);
    }

    public function startTask($data)
    {
        $query = "
            UPDATE task
            SET status = 'IN_PROGRESS', start_time = NOW()
            WHERE task_id = :task_id
        ";
        return $this->execute($query, $data);
    }

    public function completeTask($data)
    {
        $query = "
            UPDATE task
            SET status = 'IN_REVIEW', end_time = NOW()
            WHERE task_id = :task_id
        ";
        return $this->execute($query, $data);
    }

    public function approveTask($data)
    {
        $query = "
            UPDATE task
            SET status = 'COMPLETED', review_time = NOW()
            WHERE task_id = :task_id
        ";
        return $this->execute($query, $data);
    }

    public function rejectTask($data)
    {
        $query = "
            UPDATE task
            SET status = 'IN_PROGRESS'
            WHERE task_id = :task_id
        ";
        return $this->execute($query, $data);
    }

    public function updateTaskType($data)
    {
        $taskID = $data['task_id'];
        $status = $data['task_type'];

        $query = "
            UPDATE $this->table 
            SET status = '$status'
            WHERE task_id = $taskID
        ";

        // echo "<script>console.log('SQL Query: " . addslashes($query) . "');</script>";
        return $this->execute($query);
    }

    public function updateTaskDetail($data)
    {
        $taskID = $data['task_id'];
        $description = $data['task_description'];
        $pr = $data['task_pr'];

        $query = "
            UPDATE $this->table
            SET description = '$description' , git_link = '$pr'
            WHERE task_id = $taskID
        ";

        return $this->execute($query);
    }

    public function deleteTask($taskID)
    {
        //echo '<script>console.log("We are goingto delte ' . $taskID . '");</script>';
        $query = "
            DELETE 
            FROM $this->table WHERE task_id = $taskID;";

        return $this->execute($query);
    }



}