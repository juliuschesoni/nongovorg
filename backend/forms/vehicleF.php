<?php
include 'ngo_header.php';
$name = trim($_POST['name']); //sanitize the name
insertData($conn, 'vehicle','plate_number', $name);
$conn->close();
header("Location: ../../frontend/forms/vehicleF.html");
?>
