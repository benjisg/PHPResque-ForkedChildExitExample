Purpose
-------
This is a project dedicated solely to demonstrating the effect that calling exit(0) or exit(1) in tearDown can have. Specially an exit(0) will stop the parent Worker perform() method from completing.

Running
-------
To start the worker and push it to the background
```bash
QUEUE=SampleJobQueue APP_INCLUDE=./ForkedChildExitSample/vendor/autoload.php nohup php ./ForkedChildExitSample/vendor/chrisboulton/php-resque/resque.php > ./ForkedChildExitSample/resque_worker_samplejob.log &
```

Run the script to queue the jobs and then print out the status results from Redis after 10 seconds
```bash
> php RunJob.php 
Job completed with exit(1) call now has a status of -> STATUS_FAILED
Job completed with exit(0) call now has a status of -> STATUS_RUNNING
Job completed with no exit() call now has a status of -> STATUS_COMPLETE
```
