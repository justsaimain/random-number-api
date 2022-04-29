<?php

header('Content-type: application/json');

$interval = 60 * 5;

// the random numbers will be change every 5 seconds
// change (5) to the second you want to set timer for refresh random numbers

srand(floor(time() / $interval * 60));
$num_one =  rand(0000, 9999);
$num_two =  rand(0000, 9999);

$return_data = [
    'num_one' => '1.' . $num_one,
    'num_two' => '3.' . $num_two,
    'num_one_f' => substr($num_one, -1),
    'num_two_f' => substr($num_two, -1)
];


echo json_encode($return_data);
