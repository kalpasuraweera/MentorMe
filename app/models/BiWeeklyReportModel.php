<?php

class BiWeeklyReportModel
{
    use Model;
    protected $table = "bi_weekly_report";

public function addBiWeeklyReportData($data)
{    
    // Manually assign each value
    $group_id = $data['group_id'];
    $date = $data['date'];
    $meeting_outcomes = $data['meeting_outcomes'];
    $next_two_week_work = $data['next_two_week_work'];
    $past_two_week_work = $data['past_two_week_work'];

    // SQL query
    $query = "
        INSERT INTO bi_weekly_report (group_id, date, meeting_outcomes, next_two_week_work, past_two_week_work)
        VALUES ($group_id, $date, $meeting_outcomes, $next_two_week_work, $past_two_week_work)
    ";

    $this->execute($query);
    return $this->getLastInsertedId();
}


    public function addReportTaskData($data)
    {
        $query = "
            INSERT INTO bi_weekly_report_task (report_id, task_id, type)
            VALUES (:report_id, :task_id, :type)
        ";
        return $this->execute($query, $data);
    }

    public function getBiWeeklyReports($data)
    {
        $query = "
            SELECT * 
            FROM bi_weekly_report
            WHERE group_id = :group_id
        ";
        return $this->execute($query, $data);
    }

    public function resubmitBiWeeklyReport($data)
    {
        $query = "
            UPDATE bi_weekly_report
            SET status = 'PENDING', meeting_outcomes = :meeting_outcomes, next_two_week_work = :next_two_week_work, past_two_week_work = :past_two_week_work
            WHERE report_id = :report_id
        ";
        return $this->execute($query, $data);
    }
}

?>