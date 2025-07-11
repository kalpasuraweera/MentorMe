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
        VALUES ($group_id, '$date', '$meeting_outcomes', '$next_two_week_work', '$past_two_week_work')
    ";

        $this->execute($query);
        return $this->getLastInsertedId();
    }

    public function updateBiWeeklyReportData($data)
    {
        // Manually assign each value
        $report_id = $data['report_id'];
        $group_id = $data['group_id'];
        $date = $data['date'];
        $meeting_outcomes = $data['meeting_outcomes'];
        $next_two_week_work = $data['next_two_week_work'];
        $past_two_week_work = $data['past_two_week_work'];

        // SQL query
        $query = "
            UPDATE bi_weekly_report 
            SET group_id = $group_id, 
                date = '$date', 
                meeting_outcomes = '$meeting_outcomes', 
                next_two_week_work = '$next_two_week_work', 
                past_two_week_work = '$past_two_week_work'
            WHERE report_id = $report_id";

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
            ORDER BY date DESC;

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

    public function deleteBiweeklyReport($data)
    {
        // echo "<script>console.log('SQL Query: " . json_encode($id) . "');</script>";
        // exit();
        $query = "
            DELETE FROM bi_weekly_report
            WHERE report_id = :report_id
        ";

        return $this->execute($query, $data);
    }
}

?>