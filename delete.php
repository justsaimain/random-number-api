<?php

include('./database.php');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "truncate randoms";

$result = $conn->query($sql);

if ($conn->query($sql) === true) {
    echo "Delete";
    header('Location:panel.php');
    $conn->close();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
}
