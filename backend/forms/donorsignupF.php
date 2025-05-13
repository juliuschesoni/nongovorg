<?php
include 'ngo_header.php';

$personTypeId = '2';
$firstName = strtolower(trim($_POST['fname']));
$lastName = strtolower(trim($_POST['lname']));
$email = strtolower(trim($_POST['email']));
$password = $_POST['password'];

// Validate the form inputs
if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
    echo "Please fill in all the required fields.";
    exit;
}

// Check if the record already exists
$checkSql = "SELECT COUNT(*) FROM person WHERE email = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $email);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();
$rowCount = $checkResult->fetch_row()[0];

if ($rowCount > 0) {
    echo "Record with the same email already exists.";
    header("Location: ../../frontend/forms/donorsignupF.html?error=1");
    exit;
}

// Hash the password
//$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the database insert query
$insertSql = "INSERT INTO person (fname, lname, email, password, person_type_ID) VALUES (?, ?, ?, ?, ?)";
$insertStmt = $conn->prepare($insertSql);
$insertStmt->bind_param("ssssi", $firstName, $lastName, $email, $password, $personTypeId);

if ($insertStmt->execute()) {
    echo "Row added successfully.";
    header("Location: ../../frontend/forms/donorsignupF.html?error=0");
} else {
    echo "Error: " . $insertStmt->error;
}

// Close the database connection
$checkStmt->close();
$insertStmt->close();
$conn->close();
?>
