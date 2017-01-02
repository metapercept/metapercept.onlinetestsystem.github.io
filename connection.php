<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "online_test_db";

// Create connection
global $conn;
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$db_select = mysqli_select_db($conn,"$db_name");
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}
?>