<?php

class TimeTableModel
{
    use Model;
    protected $table = "timetable";

    public function importTimeTable($data)
    {
        $query = "
            INSERT INTO $this->table (time_slot, monday, tuesday, wednesday, thursday, friday)
            VALUES (:time_slot, :monday, :tuesday, :wednesday, :thursday, :friday)
        ";

        foreach ($data as $row) {
            $this->execute($query, [
                ':time_slot' => $row["Time"],
                ':monday' => $row["Monday"],
                ':tuesday' => $row["Tuesday"],
                ':wednesday' => $row["Wednesday"],
                ':thursday' => $row["Thursday"],
                ':friday' => $row["Friday"]
            ]);
        }
    }

    public function deleteTimeTable()
    {
        $query = "
            DELETE FROM $this->table
        ";

        return $this->execute($query);
    }

    public function getTimeTable()
    {
        $query = "
            SELECT * FROM $this->table;
        ";

        return $this->execute($query);
    }
}
