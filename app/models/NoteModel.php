<?php

class NoteModel
{
    use Model;
    protected $table = "note";
    public function getExaminerNotes($data)
    {
        $query = "
            SELECT * FROM `note`
            WHERE user_id = :user_id AND group_id = :group_id AND type = 'EXAMINER_NOTE'
        ";
        return $this->execute($query, $data);
    }

    public function addExaminerNote($data)
    {
        $query = "
            INSERT INTO `note` (user_id, group_id, note, created_at, type)
            VALUES (:user_id, :group_id, :note, NOW(), 'EXAMINER_NOTE')
        ";
        return $this->execute($query, $data);
    }

    public function getSupervisorNotes($data)
    {
        $query = "
            SELECT * FROM `note`
            WHERE user_id = :user_id AND group_id = :group_id AND type = 'SUPERVISOR_NOTE'
        ";
        return $this->execute($query, $data);
    }

    public function addSupervisorNote($data)
    {
        $query = "
            INSERT INTO `note` (user_id, group_id, note, created_at, type)
            VALUES (:user_id, :group_id, :note, NOW(), 'SUPERVISOR_NOTE')
        ";
        return $this->execute($query, $data);
    }

    public function editNote($data)
    {
        $query = "
            UPDATE `note`
            SET note = :note
            WHERE note_id = :note_id
        ";
        return $this->execute($query, $data);
    }

    public function deleteNote($data)
    {
        $query = "
            DELETE FROM `note`
            WHERE note_id = :note_id
        ";
        return $this->execute($query, $data);
    }
}