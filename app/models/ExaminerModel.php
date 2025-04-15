<?php

class ExaminerModel
{
    use Model;
    protected $table = "examinor";

    public function getExaminerData ($data)
    {
        $query ="
        SELECT * FROM examiner
        JOIN user ON examiner.user_id=user.user_id
        WHERE examiner.user_id = :user_id
        ";

        return $this->execute($query, $data);
    }



    public function updateExaminer($data)
    {
        $query ="
        UPDATE examiner
        SET description = :description
        WHERE user_id = :user_id
         ";


        $queryData = [
            'description' => $data['description'],
            'user_id' => $data ['user_id']
        ];

        $this->execute($query, $queryData);

        $query = "
        UPDATE user
        SET full_name = :full_name, last_update = :last_update
        WHERE user_id = :user_id";

        $queryData = [
            'full_name' =>$data['full_name'],
            'last_update'  => $data['last_update'],
            'user_id' => $data ['user_id']
        ];

        return $this->execute($query, $queryData);
        
        
        
    }
}