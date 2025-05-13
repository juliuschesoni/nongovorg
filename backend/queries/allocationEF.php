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
//select equipment
$query = "SELECT ID, name FROM equipment ORDER BY ID ASC";
$result = mysqli_query($conn, $query);
$equipment = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $equipment[] = $row;
    }
}

//close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Equipment Form</title>
    <link rel="icon" href="../../frontend/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../frontend/styles/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../frontend/styles/styles.css">
</head>
<body>
    <header>
    <h2>Register Project Equipment</h2>
    </header>
    <nav class="form-nav">
      <a href="projectQ1.php">projects</a>
      <a href="../../admin/admin.html">admin</a>
      <a href="../../">logout</a>
    </nav>
    <main>
    <section class="form-section">
    <form action="../forms/insert_allocationEF.php" method="POST">
        <label for="project">Select Project ID:</label>
        <select name="project" id="number">
            <option value="" selected>Choose Project ID</option>
            <?php foreach ($projects as $project): ?>
                <option value="<?php echo $project['id']; ?>"><?php echo $project['id']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="equipment">Select Equipment:</label>
        <select name="equipment" id="name">
            <option value="" selected>Choose Equipment</option>
            <?php foreach ($equipment as $equipment): ?>
                <option value="<?php echo $equipment['ID']; ?>"><?php echo $equipment['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="quantity"> Quantity:</label>
        <input type="number" id="number" name="quantity" min="1">
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
