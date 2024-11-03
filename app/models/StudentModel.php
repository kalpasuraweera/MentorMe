<?php

class StudentModel
{
    use Model;
    protected $table = "student";

    // Get All Group Requests for Leader Dashboard
    public function getGroupRequests($data)
    {
        $query = "
        SELECT * FROM supervisor_request
        WHERE group_id = :group_id ORDER BY date DESC
        ";
        //TODO: Later we have to get meeting requests also
        return $this->execute($query, $data);
    }
}