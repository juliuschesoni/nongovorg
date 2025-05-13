<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'credentials.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM person WHERE person_type_id = '2' AND email = '$email' AND password = '$password'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    // Authentication successful
    // Redirect to a success page or perform further actions
    header("Location: ../../donor/donate.html");
    exit();
} else {
    // Authentication failed
    // Redirect to an error page or display an error message
    //echo'Wrong Username Or Password';
    header("Location: ../../frontend/forms/donorlogin.html?error=1");
    exit();
}

// Close the database connection
$conn->close();

?>
