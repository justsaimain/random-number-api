<?php

$servername = "localhost";
$username = "root";
$password = "Justsaimain@3820";
$dbname = "random_api";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// $hash_password = password_hash('admin', PASSWORD_DEFAULT);
$username = "admin";

$sql = "INSERT INTO users (username, pass) VALUES ('$username', 'admin')";

if ($conn->query($sql) === true) {
    echo "Admin created successfully";
    echo "\n";
    echo "Username : $username";
    echo "\n";
// echo "Password : $hash_password";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
