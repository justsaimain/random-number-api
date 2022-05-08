<?php

$servername = "localhost";
$username = ""; // database username
$password = ""; // database password
$dbname = "random_api";


$form_num_one = $_POST['num_one'];
$form_num_two = $_POST['num_two'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO randoms (num_one, num_two) VALUES ('$form_num_one', '$form_num_two')";

$result = $conn->query($sql);

if ($conn->query($sql) === true) {
    echo "Saved";
    header('Location:panel.php');
    $conn->close();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
}
