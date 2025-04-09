<?php

class User
{
    use Model;
    protected $table = "user";

    public function updateStudentProfile($data)
    {

        $query = "
        UPDATE user
        SET full_name = :full_name, 
            email = :email 
        WHERE user_id = :user_id";

        return $this->execute($query, $data);
    }

}

