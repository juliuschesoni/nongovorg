<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'ngo_header.php';

// Retrieve form data
$project = $_POST['project'];
$vehicle = $_POST['vehicle'];

//avoid duplication
$checkSql = "SELECT * FROM project_allocation WHERE project_id = ? AND vehicle_id = ?";
$checkStmt = mysqli_prepare($conn, $checkSql);
mysqli_stmt_bind_param($checkStmt, 'ii', $project, $vehicle);
mysqli_stmt_execute($checkStmt);
$result = mysqli_stmt_get_result($checkStmt);

if (mysqli_num_rows($result) > 0) {
    // A similar record already exists, handle accordingly, Error=1
    header("location: ../queries/allocationVF.php?error=1");
} else{

$insertSql = "INSERT INTO project_allocation (project_id, vehicle_id) VALUES (?, ?)";
$insertStmt = mysqli_prepare($conn, $insertSql);
mysqli_stmt_bind_param($insertStmt, 'ii', $project, $vehicle);

    // Execute the prepared statement
if (mysqli_stmt_execute($insertStmt)) {
        echo "vehicle inserted successfully.";
} else {
        echo "Error inserting vehicle: " . mysqli_error($conn);
}

// Error=0 and Close the statement
header("Location: ../queries/allocationVF.php?error=0");
mysqli_stmt_close($insertStmt);
}
mysqli_stmt_close($checkStmt);
mysqli_close($conn);
?>
