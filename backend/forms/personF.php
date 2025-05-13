<?php
include 'ngo_header.php';

if (isset($_GET['personTypeId'])) {
    $personTypeId = $_GET['personTypeId'];
} else {
    echo "personTypeId is missing in the URL.";
    exit;
}

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
} else {
    echo "Error: " . $insertStmt->error;
}

// Close the database connection
$checkStmt->close();
$insertStmt->close();
$conn->close();
header("Location: ../../frontend/forms/personF.html?personTypeId=$personTypeId");
?>
