<?php
include 'ngo_header.php';
$name = strtolower(trim($_POST['name'])); //sanitize the name
insertData($conn, 'person_type','name', $name);
$conn->close();
header("Location: ../../frontend/forms/persontypeF.html");
?>
