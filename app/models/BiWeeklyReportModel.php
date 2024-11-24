<?php

class BiWeeklyReportModel 
{
    use Model;
    protected $table = "";

    public function addBiWeeklyReportData($data) {
        // echo "<script>console.log('add bi weekly report data');</script>";
        // echo "<script>console.log('insdie ethe model" . json_encode($data, JSON_HEX_TAG) . "');</script>";
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

    public function addReportTaskdata($data) {

        $taskId = $data['taskId'];
        $reportId = $data['reportId'];
        $query = "
            INSERT INTO bi_weekly_report_task (report_id, task_id)
            VALUES ($reportId, $taskId)
        ";

        return $this->execute($query);
    }
}

?>