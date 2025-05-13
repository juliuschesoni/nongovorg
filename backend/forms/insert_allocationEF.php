<?php
include 'ngo_header.php';

// Retrieve form data
$project = $_POST['project'];
$equipment = $_POST['equipment'];
$quantity = $_POST['quantity'];

$insertSql = "INSERT INTO poject_allocation (project_id, equipment_id, equipment_quantity) VALUES (?, ?, ?)";
$insertStmt = mysqli_prepare($conn, $insertSql);
mysqli_stmt_bind_param($insertStmt, 'iii', $project, $equipment, $quantity);

    // Execute the prepared statement
if (mysqli_stmt_execute($insertStmt)) {
        echo "inserted successfully.";
} else {
        echo "Error inserting:" . mysqli_error($conn);
}

// Close the statement
mysqli_stmt_close($insertStmt);

// Close the statement and the database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

header("Location: ../queries/allocationEF.php");
?>
