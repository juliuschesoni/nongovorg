<?php
//report errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

//select project id
include 'query_header.php';
$query = "SELECT id FROM project";
$result = mysqli_query($conn, $query);
$projects = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}

//select vehicles
$query = "SELECT ID,plate_number FROM vehicle ORDER BY ID ASC";
$result = mysqli_query($conn, $query);
$vehicles = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vehicles[] = $row;
    }
}

//close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Allocation Form</title>
    <link rel="icon" href="../../frontend/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../frontend/styles/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../frontend/styles/styles.css">
</head>
<body>
    <header>
    <h2>Allocate Vehicle to Project</h2>
    </header>
    <nav class="form-nav">
      <a href="projectQ1.php">projects</a>
      <a href="../../admin/admin.html">admin</a>
      <a href="../../">logout</a>
    </nav>
    <main>
    <section class="form-section">
    <form action="../forms/insert_allocationVF.php" method="POST">
        <label for="project">Select Project ID:</label>
        <select name="project" id="number">
            <option value="" selected>Choose Project ID</option>
            <?php foreach ($projects as $project): ?>
                <option value="<?php echo $project['id']; ?>"><?php echo $project['id']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="vehicle">Select Vehicle:</label>
        <select name="vehicle" id="name">
            <option value="" selected>Choose Vehicle</option>
            <?php foreach ($vehicles as $vehicle): ?>
                <option value="<?php echo $vehicle['ID']; ?>"><?php echo $vehicle['plate_number']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>
    </section>
    </main>
    <footer class="a_footer" id="a_footer">
      <div id="a_footerItems">
         <span>© 2024 LBC</span>
           <ul>
           <li>Privacy and Cookies</li>
           <li>Content Policy</li>
           <li>Terms of Use</li>
           <li>Feedback</li>
           </ul>
      </div>
    </footer>
    <script src="../../frontend/styles/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
