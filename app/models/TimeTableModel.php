<?php

class TimeTableModel
{
    use Model;
    protected $table = "timetable";

    public function importTimeTable($data, $type)
    {
        $query = "
            INSERT INTO $this->table (time_slot, monday, tuesday, wednesday, thursday, friday, type)
            VALUES (:time_slot, :monday, :tuesday, :wednesday, :thursday, :friday, :type)
        ";

        foreach ($data as $row) {
            $this->execute($query, [
                ':time_slot' => $row["Time"],
                ':monday' => $row["Monday"],
                ':tuesday' => $row["Tuesday"],
                ':wednesday' => $row["Wednesday"],
                ':thursday' => $row["Thursday"],
                ':friday' => $row["Friday"],
                ':type' => $type
            ]);
        }
    }

    public function deleteTimeTable($type)
    {
        $query = "
            DELETE FROM $this->table WHERE type = '$type'
        ";

        return $this->execute($query);
    }

    public function getTimeTable()
    {
        $query = "
            SELECT * FROM $this->table
        ";

        return $this->execute($query);
    }
}
