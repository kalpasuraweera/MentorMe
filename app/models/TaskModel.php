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
}