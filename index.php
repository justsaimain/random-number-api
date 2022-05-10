<?php

include('./database.php');

header('Content-type: application/json');


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from randoms";

$result = $conn->query($sql);

$row = mysqli_fetch_array($result, MYSQLI_BOTH);

$conn->close();

if ($row) {
    $num_one =  $row['num_one'];
    $num_two =  $row['num_two'];

    $return_data = [
        'num_one' => '1.' . $num_one,
        'num_two' => '3.' . $num_two,
        'num_one_f' => (string) $num_one,
        'num_two_f' => substr($num_one, -1) . substr($num_two, -1)
    ];
} else {
    $interval = 60 * 10;

    // the random numbers will be change every 5 seconds
    // change (5) to the second you want to set timer for refresh random numbers

    srand(floor(time() / $interval * 60));
    $num_one =  rand(111, 999);
    $num_two =  rand(111, 999);

    $return_data = [
        'num_one' => '1.' . $num_one,
        'num_two' => '3.' . $num_two,
        'num_one_f' => (string) $num_one,
        'num_two_f' => substr($num_one, -1) . substr($num_two, -1)
    ];
}

echo json_encode($return_data);
