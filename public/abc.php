<?php
ini_set('max_execution_time', 60 * 3 * 60); //3 minutes
$data = csv_to_array();
function csv_to_array()
{
    $file = fopen(public_path('/BasicCompanyData-2021-11-01-part1_6.csv'), 'r');
    $i = 1;
    $first_line = "";
    $data = [];
    while (($line = fgetcsv($file)) !== FALSE) {

        if ($i == 1) {
            $first_line = $line;
        } else {
            $arr = [];
            for ($j = 0; $j < count($first_line); $j++) {
                $arr[trim($first_line[$j], " ")] = $line[$j];
            }

            $data[] = $arr;
        }
        $i++;
        //$line is an array of the csv elements
    }
    fclose($file);
    return $data;
}