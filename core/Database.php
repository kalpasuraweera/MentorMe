<?php

trait Database
{
    private function connect()
    {
        try {
            return new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
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


}