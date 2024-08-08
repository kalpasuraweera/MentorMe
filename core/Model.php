<?php

trait Model
{
    use Database;
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
        $columns = array_keys($data);
        $column_string = implode(",", $columns);
        $query = "INSERT INTO $this->table ($column_string) VALUES (";
        foreach ($columns as $column) {
            $query .= ":$column,";
        }
        $query = trim($query, ",");
        $query .= ");";
        $this->execute($query, $data);
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