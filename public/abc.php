<?php
ini_set('max_execution_time', 60 * 3 * 60); //3 minutes

$data = csv_to_array($filename);
function csv_to_array($filename)
{
    $file = fopen(public_path("/$filename"), 'r');

    $i = 1;
    $first_line = "";
    $data = [];
    while (($line = fgetcsv($file)) !== FALSE) {

        if ($i == 1) {
            $first_line = $line;
        } else {
            if (!isset($first_line[53]) || !isset($line[53])) {

                //dd(count($first_line), count($line), array_reverse($first_line), array_reverse($line));
            }
            $arr = [];
            for ($j = 0; $j < count($first_line); $j++) {
                $arr[trim($first_line[$j], " ")] = isset($line[$j]) ? $line[$j] : "";
            }

            $data[] = $arr;
        }
        $i++;
        //$line is an array of the csv elements
    }
    fclose($file);
    return $data;
}