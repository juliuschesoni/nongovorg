<?php
require_once 'credentials.php';

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
function insertData($conn, $tableName, $columnName, $value) {
    if (!empty($value)) {
        $paramType = is_int($value) ? "i" : "s";
        $stmt = $conn->prepare("SELECT $columnName FROM $tableName WHERE $columnName = ?");
        $stmt->bind_param($paramType, $value);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) {
            $stmt = $conn->prepare("INSERT INTO $tableName ($columnName) VALUES (?)");
            $stmt->bind_param($paramType, $value);
            $stmt->execute();
        }

        $stmt->close();
    }
}
$conn = connectToDatabase();
?>
