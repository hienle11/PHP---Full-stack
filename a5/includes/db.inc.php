<?php
# Set the general information of the database used for this project
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$host = 'localhost';
$db = 'assignment5';
$user = 'root';
$password = 'root';
$port = 8889;

# Create a database connection object
$conn = mysqli_connect($host, $user, $password, $db, $port);

# If connection failed print error
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}