<?php

require_once __DIR__ . "/vendor/autoload.php";

// A reversal map pulled from Resque Job Status
$resqueJobStatusValues = Array(
	1 => "STATUS_WAITING",
	2 => "STATUS_RUNNING",
	3 => "STATUS_FAILED",
	4 => "STATUS_COMPLETE"
);

$jobStatusIdWithExit1 = Resque::enqueue("SampleJobQueue", "SampleJob", Array("exit" => 1), true);
$jobStatusIdWithExit0 = Resque::enqueue("SampleJobQueue", "SampleJob", Array("exit" => 0), true);
$jobStatusIdWithNoExit = Resque::enqueue("SampleJobQueue", "SampleJob", Array("exit" => null), true);
sleep(10);
$jobStatusWithExit1 = new Resque_Job_Status($jobStatusIdWithExit1);
echo "Job completed with exit(1) call now has a status of -> " . $resqueJobStatusValues[$jobStatusWithExit1->get()] . "\n";
$jobStatusWithExit0 = new Resque_Job_Status($jobStatusIdWithExit0);
echo "Job completed with exit(0) call now has a status of -> " . $resqueJobStatusValues[$jobStatusWithExit0->get()] . "\n";
$jobStatusWithNoExit = new Resque_Job_Status($jobStatusIdWithNoExit);
echo "Job completed with no exit() call now has a status of -> " . $resqueJobStatusValues[$jobStatusWithNoExit->get()] . "\n";

?>