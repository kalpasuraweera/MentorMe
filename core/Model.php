<?php
/*
In the Model trait we have basic CRUD operations
*/
trait Model
{
    use Database;
    /* 
    For where clause we can pass an array like this for equal condition:
    $data = [
        "user_id" => 1,
        "full_name" => "John"
    ];
    For not equal condition we can pass an array like this:
    $data = [
        "user_id" => ["not" => 1],
        "full_name" => "John"
    ];
    We check inequality with is_array() function.
    */
    public function insert($data)
    {
        $columns = array_keys($data);
        $column_string = implode(",", $columns);
        $query = "INSERT INTO `$this->table` ($column_string) VALUES (";
        foreach ($columns as $column) {
            $query .= ":$column,";
        }
        $query = rtrim($query, ",");
        $query .= ");";
        return $this->execute($query, $data);
    }
    public function findAll($columns = ["*"])
    {
        $column_string = count($columns) > 1 ? implode(",", $columns) : $columns[0];
        $query = "SELECT $column_string FROM `$this->table`;";
        return $this->execute($query);
    }
    public function findMany($where, $columns = ["*"])
    {
        $column_string = count($columns) > 1 ? implode(",", $columns) : $columns[0];
        $query = "SELECT $column_string FROM `$this->table` WHERE ";
        foreach ($where as $key => $value) {
            if (is_array($value)) {
                $query .= "$key != :$key AND ";
                $where[$key] = $value["not"];
            } else {
                $query .= "$key = :$key AND ";
            }
        }
        $query = rtrim($query, "AND ");
        $query .= ";";
        return $this->execute($query, $where);
    }
    public function findOne($where, $columns = ["*"])
    {

        $column_string = count($columns) > 1 ? implode(",", $columns) : $columns[0];
        $query = "SELECT $column_string FROM `$this->table` WHERE ";
        foreach ($where as $key => $value) {
            if (is_array($value)) {
                $query .= "$key != :$key AND ";
                $where[$key] = $value["not"];
            } else {
                $query .= "$key = :$key AND ";
            }
        }
        $query = rtrim($query, "AND ");
        $query .= " LIMIT 1;";
        return $this->execute($query, $where)[0] ?? null;
    }
    public function update($data, $where)
    {
        $query = "UPDATE `$this->table` SET ";
        foreach ($data as $key => $value) {
            $query .= "$key = :$key, ";
        }
        $query = rtrim($query, ", ");
        $query .= " WHERE ";
        foreach ($where as $key => $value) {
            if (is_array($value)) {
                $query .= "$key != :where_$key AND ";
                $data["where_$key"] = $value["not"];
            } else {
                $query .= "$key = :where_$key AND ";
                $data["where_$key"] = $value;
            }
        }
        $query = rtrim($query, "AND ");
        $query .= ";";
        return $this->execute($query, $data);
    }
    public function delete($where)
    {
        $query = "DELETE FROM `$this->table` WHERE ";
        foreach ($where as $key => $value) {
            if (is_array($value)) {
                $query .= "$key != :$key AND ";
                $where[$key] = $value["not"];
            } else {
                $query .= "$key = :$key AND ";
            }
        }
        $query = rtrim($query, "AND ");
        $query .= ";";
        return $this->execute($query, $where);
    }

}