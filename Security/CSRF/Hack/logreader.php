<?php
$file = fopen('log.txt', 'r');
if ($file) {
    while (($keys = fgets($file)) !== false) {
        var_dump($keys);
        $keys = json_decode($keys);
        var_dump($keys);
        foreach ($keys as $p) {
            printf("[%s] %s<br>", date("Y-m-d H:i:s", $p['t']), $p['k']);
        }
    }
    fclose($file);
} else {
    echo "Error reading file!";
}
