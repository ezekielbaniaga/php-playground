<?php

    echo "<pre>";

    # start process
    $pid = popen("cmd.exe /C dir", 'r');

    # read 1KB, then output immediately to minimize memory footprint
    do {
        $output = fread($pid, 1024);
        echo $output;
    } while(!feof($pid));

    pclose($pid);

    echo "</pre>";

?>