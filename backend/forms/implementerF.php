<?php
include 'ngo_header.php';
$name = strtolower(trim($_POST['name'])); //sanitize the name
insertData($conn, 'implementer','name', $name);
$conn->close();
header("Location: ../../frontend/forms/implementerF.html");
?>
