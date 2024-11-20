<?php

class FeedbackModel
{
    use Model;
    protected $table = "feedback";
    public function getExaminerFeedbacks($data)
    {
        $query = "
            SELECT * FROM `feedback`
            WHERE user_id = :user_id AND group_id = :group_id AND type = 'EXAMINER_FEEDBACK'
        ";
        return $this->execute($query, $data);
    }

    public function addExaminerFeedback($data)
    {
        $query = "
            INSERT INTO `feedback` (user_id, group_id, feedback, type)
            VALUES (:user_id, :group_id, :feedback, 'EXAMINER_FEEDBACK')
        ";
        return $this->execute($query, $data);
    }

    public function getSupervisorFeedbacks($data)
    {
        $query = "
            SELECT * FROM `feedback`
            WHERE user_id = :user_id AND group_id = :group_id AND type = 'SUPERVISOR_FEEDBACK'
        ";
        return $this->execute($query, $data);
    }

    public function addSupervisorFeedback($data)
    {
        $query = "
            INSERT INTO `feedback` (user_id, group_id, feedback, type)
            VALUES (:user_id, :group_id, :feedback, 'SUPERVISOR_FEEDBACK')
        ";
        return $this->execute($query, $data);
    }

    public function editFeedback($data)
    {
        $query = "
            UPDATE `feedback`
            SET feedback = :feedback
            WHERE feedback_id = :feedback_id
        ";
        return $this->execute($query, $data);
    }

    public function deleteFeedback($data)
    {
        $query = "
            DELETE FROM `feedback`
            WHERE feedback_id = :feedback_id
        ";
        return $this->execute($query, $data);
    }
}