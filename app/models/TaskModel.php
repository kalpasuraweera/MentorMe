<?php 

class TaskModel 
{
    use Model;
    protected $table = "task";

    //get task according to status
    public function getTaskDetail($data)
    {
        $status = $data['status'];
        $userID = $data['user_id'];
        $query = "
            SELECT * 
            FROM $this->table
            WHERE status = '$status' AND assignee_id = $userID


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
    
    public function addTask($data) {
        // Log the data in the console
        //echo "<script>console.log('Task Data: " . json_encode($data) . "');</script>";
    
        // Extract data from the $data array
        $userID = $data['user_id'];
        $groupID = $data['group_id'];
        $status = $data['status'];
        $description = $data['description'];
        $date_created = $data['created_at'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $estimatedTime = $data['estimated_time'];
    
        // Construct the SQL query, leaving task_id as NULL (auto-increment)
        $query = "
            INSERT INTO task (status, date_created, assignee_id, group_id, estimated_time, start_date, end_date, description)
            VALUES ('$status', '$date_created', $userID, $groupID, '$estimatedTime', '$start_date', '$end_date', '$description')
    
        ";
    
        // Log the query to the console for debugging
        //echo "<script>console.log('SQL Query: " . addslashes($query) . "');</script>";
    
        // Execute the query
        return $this->execute($query);
    }

    public function updateTask($taskData) {
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
    

    public function deleteTask($taskID) {
        //echo '<script>console.log("We are goingto delte ' . $taskID . '");</script>';
        $query = "
            DELETE 
            FROM $this->table WHERE task_id = $taskID;";
        
            return $this->execute($query);
    }
    
}