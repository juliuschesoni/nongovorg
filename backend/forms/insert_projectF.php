<?php
include 'ngo_header.php';

// Retrieve form data
$county = $_POST['county'];
$programme = $_POST['programme'];
$implementer = $_POST['implementer'];
$person = $_POST['person'];
$budget = $_POST['budget'];

// Check if the record already exists
$sql = "SELECT * FROM project WHERE budgetid = ? AND personid = ? AND programmeid = ? AND countyid = ? AND implementerid = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'iiiii', $budget, $person, $programme, $county, $implementer);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// If no matching record found, insert the data
if (mysqli_num_rows($result) == 0) {
    $insertSql = "INSERT INTO project (budgetid, personid, programmeid, countyid, implementerid) VALUES (?, ?, ?, ?, ?)";
    $insertStmt = mysqli_prepare($conn, $insertSql);
    mysqli_stmt_bind_param($insertStmt, 'iiiii', $budget, $person, $programme, $county, $implementer);

    // Execute the prepared statement
    if (mysqli_stmt_execute($insertStmt)) {
        echo "Project inserted successfully.";
    } else {
        echo "Error inserting project: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($insertStmt);
} else {
    echo "Record already exists in the database.";
}

// Close the statement and the database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

header("Location: ../queries/projectF.php");
?>
