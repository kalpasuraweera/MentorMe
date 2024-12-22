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
            WHERE group_id = $groupID AND status = 'COMPLETED' AND end_date >= '$date'
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
            FROM $this->table
            WHERE task_id = $taskId
        ";

        return $this->execute($query);
    }

    public function addTask($data)
    {
        // Log the data in the console
        //echo "<script>console.log('Task Data: " . json_encode($data) . "');</script>";

        // Extract data from the $data array
        $userID = $data['user_id'];
        $groupID = $data['group_id'];
        $status = $data['status'];
        $assignee_id = $data['assignee_id'];
        $description = $data['description'];
        $date_created = $data['created_date'];
        $estimatedTime = $data['estimated_time'];
        $task_number = $data['task_number'];

        // Construct the SQL query, leaving task_id as NULL (auto-increment)
        $query = "
            INSERT INTO task (status, date_created, assignee_id, group_id, estimated_time,   description, task_number)
            VALUES ('$status', '$date_created', $assignee_id, $groupID, '$estimatedTime',  '$description', '$task_number')
    
        ";

        // Log the query to the console for debugging
        //echo "<script>console.log('SQL Query: " . addslashes($query) . "');</script>";

        // Execute the query
        return $this->execute($query);
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
            SET description = '$description' , GIT_PR = '$pr'
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