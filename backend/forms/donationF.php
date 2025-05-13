<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Check if the form is submitted
include 'ngo_header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $email = trim(strtolower($_POST["email"]));
    $amount = $_POST["number"];
    $password = $_POST["password"];

    // Prepare the query to validate the email and person type
    $query = "SELECT person_type_id FROM person WHERE email = ? AND password = ? AND person_type_id = 2";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    // Check if the email and person type are valid
    if ($stmt->num_rows > 0) {
        // Insert the values into the donations table
        $insertQuery = "INSERT INTO donation (email, amount) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("si", $email, $amount);
        $insertStmt->execute();

        // Check if the insertion was successful
        if ($insertStmt->affected_rows > 0) {
            //echo "Donation has been successfully submitted.";
            header("Location: ../../frontend/forms/donationF.html?error=0");
        } else {
            echo "Failed to submit the donation.";
        }
    } else {
        //echo "Invalid email or person type.";
        header("Location: ../../frontend/forms/donationF.html?error=1");
    }

    // Close the statements and the database connection
    $stmt->close();
    $insertStmt->close();
    $conn->close();
}
?>
