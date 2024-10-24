<?php 

class TaskModel 
{
    use Model;
    protected $table = "task";

    public function getTaskDetail($status)
    {
        $query = "
            SELECT * 
            FROM $this->table
            WHERE status = '$status'
        ";

        return $this->execute($query);
    }
    
    public function addTask($data) {
        // Log the data in the console
        echo "<script>console.log('Task Data: " . json_encode($data) . "');</script>";
    
        // Extract data from the $data array
        $type = $data['task_type'];
        $description = $data['description'];
        $date_created = $data['created_at'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $estimatedTime = $data['estimated_time'];
    
        // Construct the SQL query, leaving task_id as NULL (auto-increment)
        $query = "
            INSERT INTO task (status, date_created, assignee_id, group_id, estimated_time, start_date, end_date, description)
            VALUES ('$type', '$date_created', 2, 1, '$estimatedTime', '$start_date', '$end_date', '$description')
        ";
    
        // Log the query to the console for debugging
        echo "<script>console.log('SQL Query: " . addslashes($query) . "');</script>";
    
        // Execute the query
        return $this->execute($query);
    }
    
}