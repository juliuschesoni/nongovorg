<?php
include 'ngo_header.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the equipment name and equipment type ID from the form submission
    $equipmentName = strtolower(trim($_POST['name']));
    $equipmentTypeId = $_GET['typeId'];

    // Check if the equipment name already exists in the database
    $stmt = $conn->prepare('SELECT name FROM equipment WHERE name = ?');
    $stmt->bind_param('s', $equipmentName);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Equipment name already exists, redirect to the form page with an error message
        header("Location: ../../frontend/forms/equipmentF.html?typeId=$equipmentTypeId&error=1");
        exit;
    }

    // Close the prepared statement
    $stmt->close();

    // Equipment name doesn't exist, insert the record
    $stmt = $conn->prepare('INSERT INTO equipment (name, equipment_type_id) VALUES (?, ?)');
    $stmt->bind_param('si', $equipmentName, $equipmentTypeId);
    $stmt->execute();

    // Close the prepared statement
    $stmt->close();

    // Redirect to a success page
    header("Location: ../../frontend/forms/equipmentF.html?typeId=$equipmentTypeId");
    exit;
}

// Close the database connection
$conn->close();
?>

