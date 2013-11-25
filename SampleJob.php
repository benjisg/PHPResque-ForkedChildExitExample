<?php

class SampleJob {
	
	private $ExitType = null;

	public function setUp() {
		echo "===== Running Job Setup =====\n";
	}

	public function perform() {
		echo "===== Running Job Perform =====\n";
		$this->ExitType = $this->args["exit"];
	}

	public function tearDown() {
		echo "===== Running Job Tear Down =====\n";
		if($this->ExitType !== null) {
			echo "===== Exiting with a status of " . $this->ExitType . " =====\n";
			exit($this->ExitType);
		}

		echo "\n\n";
	}

}

?>