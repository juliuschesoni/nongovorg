<?php
require_once '../forms/credentials.php';

function connectToDatabase() {
    // Create connection
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
$conn = connectToDatabase();
?>
