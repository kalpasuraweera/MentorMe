<?php

class FeedbackModel
{
    use Model;
    protected $table = "feedback";
    public function getUserFeedbacks($data)
    {
        $query = "
            SELECT * FROM `feedback`
            WHERE user_id = :user_id AND group_id = :group_id
        ";
        return $this->execute($query, $data);
    }

    public function addUserFeedback($data)
    {
        $query = "
            INSERT INTO `feedback` (user_id, group_id, feedback)
            VALUES (:user_id, :group_id, :feedback)
            ON DUPLICATE KEY UPDATE feedback = :feedback
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