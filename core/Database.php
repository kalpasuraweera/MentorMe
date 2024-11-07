<?php

trait Database
{
    private $Connection;
    private function connect()
    {
        try {
            if ($this->Connection == null) {
                $this->Connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            }
            return $this->Connection;
        } catch (PDOException $e) {
            if (DEBUG)
                trigger_error($e->getMessage());
            return null;
        }

    }

    public function execute($query, $data = [])
    {
        try {
            $connection = $this->connect();
            if ($connection == null)
                return [];
            $statement = $connection->prepare($query);
            $statement->execute($data);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            if (DEBUG)
                trigger_error($e->getMessage());
            return [];
        }
    }

    public function getLastInsertedId()
    {
        if($this->Connection == null)
            return null;
        return $this->Connection->lastInsertId();
    }

    public function beginTransaction()
    {
        if($this->Connection == null)
        return null;
        $this->Connection->beginTransaction();
    }

    public function commit()
    {
        if($this->Connection == null)
        return null;
        $this->Connection->commit();
    }

    public function rollBack()
    {
        if($this->Connection == null)
        return null;
        if($this->Connection->inTransaction())
            $this->Connection->rollBack();
    }

}