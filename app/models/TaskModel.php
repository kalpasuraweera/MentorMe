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

    public function updateTask($taskData)
    {
        // Extract data from the $taskData array
        $task_type = $taskData['task_type'];
        $description = $taskData['description'];
        $start_date = $taskData['start_date'];
        $end_date = $taskData['end_date'];
        $estimated_time = $taskData['estimated_time'];
        $task_id = $taskData['task_id'];

        // Construct the SQL query to update the task
        $sql = "
            UPDATE $this->table 
            SET status = '$task_type', 
                description = '$description', 
                start_date = '$start_date', 
                end_date = '$end_date', 
                estimated_time = '$estimated_time'
            WHERE task_id = '$task_id'
        ";

        // Execute the query
        return $this->execute($sql);
    }

    public function updateTodoTask($data){
        $task_id = $data['task_id'];
        $description = $data['description'];
        $estimated_time = $data['estimated_time'];

        $query = "
            UPDATE $this->table 
            SET status = 'TO_DO',
                description = '$description',
                estimated_time = '$estimated_time'
            WHERE task_id = '$task_id'
        ";

        return $this->execute($query);
    }
    
    public function updateInProgressTask($data) {
        $task_id = $data['task_id'];
        $start_date = $data['start_date'];
        $description = $data['description'];

        $query = "
            UPDATE $this->table
            SET status = 'IN_PROGRESS',
                start_date = '$start_date',
                description = '$description'
            WHERE task_id = '$task_id'   
        ";

        return $this->execute($query);
    }
    
    public function updatePendingTask($data) {
        $task_id = $data['task_id'];
        $description = $data['description'];

        $query = "
            UPDATE $this->table 
            SET status = 'PENDING',
                description = '$description'
            WHERE task_id = '$task_id'
        ";

        return $this->execute($query);
    }

    public function updateCompletedTask($data) {
        $task_id = $data['task_id'];
        $end_date = $data['end_date'];
        $description = $data['description'];

        $query = "
            UPDATE $this->table
            SET status = 'COMPLETED',
                end_date = '$end_date',
                description = '$description'
            WHERE task_id = '$task_id'   
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