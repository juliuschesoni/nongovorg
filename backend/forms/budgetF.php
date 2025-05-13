<?php
include 'ngo_header.php';
$number = $_POST['number'];
insertData($conn, 'budget', 'amount', $number);
$conn->close();
header("Location: ../../frontend/forms/budgetF.html");
?>
