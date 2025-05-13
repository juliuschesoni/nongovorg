<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'credentials.php';
$dbname = "adminlogin";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    // Authentication successful
    // Redirect to a success page or perform further actions
    header("Location: ../../admin/admin.html");
    exit();
} else {
    // Authentication failed
    // Redirect to an error page or display an error message
    //echo'Wrong Username Or Password';
    header("Location: ../../frontend/forms/adminlogin.html?error=1");
    exit();
}

// Close the database connection
$conn->close();

?>
