<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'query_header.php';
$query = "SELECT * from projectvehicleView";
$result = mysqli_query($conn, $query);
$view = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $view[] = $row;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>LBC</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../frontend/images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../../frontend/styles/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../frontend/styles/styles.css">
</head>
<body>
  <header>
  <h2>Projects</h2>
  </header>
  <nav class="form-nav">
  <a href="../../">home</a>
  <a href="index.html">view records</a>
  <a href="../../admin/admin.html">add records</a>
  <a href="../../">logout</a>
  </nav>
  <main>
  <section class="tcontainer">
  <table>
    <tr>
        <th>Plate Number</th>
        <th>Programme</th>
        <th>County</th>
        <th>Date</th>
    </tr>
    <?php foreach ($view as $view): ?>
    <tr>
        <td><?php echo $view['plate_number']; ?></td>
        <td><?php echo $view['programme_name']; ?></td>
        <td><?php echo $view['county_name']; ?></td>
        <td><?php echo $view['date_added']; ?></td>
    </tr>
    <?php endforeach; ?>
   </table>
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
</body>
</html>
<?php
$conn->close();
?>
