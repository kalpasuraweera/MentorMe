<?php

class BiWeeklyReportModel
{
    use Model;
    protected $table = "";

    public function addBiWeeklyReportData($data)
    {
        $meetingOutcomes = $data['meeting_outcomes'];
        $nextToWeekWork = $data['nextTwoWeekWork'];
        $pastTwoWeekWork = $data['pastTwoWeekWork'];
        $group_id = $data['group_id'];
        $date = $data['date'];

        $query = "
            INSERT INTO bi_weekly_report (group_id, date, meeting_outcomes, next_two_week_work, past_two_week_work)
            VALUES ('$group_id', '$date', '$meetingOutcomes', '$nextToWeekWork', '$pastTwoWeekWork')";

        $this->execute($query);
        return $this->getLastInsertedId();

    }

    public function addReportTaskData($data)
    {

        $taskId = $data['taskId'];
        $reportId = $data['reportId'];
        $type = $data['type'];
        $query = "
            INSERT INTO bi_weekly_report_task (report_id, task_id, type)
            VALUES ($reportId, $taskId, '$type')";

        return $this->execute($query);
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
}

?>