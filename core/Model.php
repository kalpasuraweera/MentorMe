<?php

trait Model
{
    /* 
    For where clause we can pass an array like this for equal condition:
    $data = [
        "id" => 1,
        "name" => "John"
    ];
    For not equal condition we can pass an array like this:
    $data = [
        "id" => ["not" => 1],
        "name" => "John"
    ];
    We check inequality with is_array() function.
    */
    public function insert($data)
    {
    }
    public function findAll($columns = ["*"])
    {
    }
    public function findMany($where, $columns = ["*"])
    {
    }
    public function findOne($where, $columns = ["*"])
    {
    }
    public function update($data, $where)
    {
    }
    public function delete($where)
    {
    }

}