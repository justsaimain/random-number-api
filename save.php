<?php

include('./database.php');

$form_num_one = $_POST['num_one'];
$form_num_two = $_POST['num_two'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($form_num_one === "" && $form_num_two === "") {
    header('Location:panel.php');
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
