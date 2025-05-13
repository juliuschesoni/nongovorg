<?php
include 'ngo_header.php';
$name = strtolower(trim($_POST['name'])); //sanitize the name
insertData($conn, 'equipment_type','name', $name);
$conn->close();
header("Location: ../../frontend/forms/equipmenttypeF.html");
?>
