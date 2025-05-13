<?php
include 'ngo_header.php';
$name = strtolower(trim($_POST['name'])); //sanitize the name
insertData($conn, 'programme','name', $name);
$conn->close();
header("Location: ../../frontend/forms/programmeF.html");
?>
