<?php
class ffmpeg{
    public function execute($command) {
        $filePath=APPPATH.'libraries/';
        $executable=$filePath. 'ffmpeg';
        $command = "\"$executable\" " ."-version 2>&1";
       echo shell_exec($command);
        echo $command;
        exec($command, $output, $returnCode);
        print_r($output);
        print_r($returnCode);
        if ($returnCode !== 0) {
            return false; // Handle errors as needed
        }

        return true; // Command executed successfully
    }

}
