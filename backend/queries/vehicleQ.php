<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'query_header.php';
$query = "SELECT ID, plate_number FROM vehicle ORDER BY ID ASC";
$result = mysqli_query($conn, $query);
$record = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $record[] = $row;
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
  <h1>Vehicles</h1>
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
        <th>ID</th>
        <th>Plate Number</th>
    </tr>
    <?php foreach ($record as $record): ?>
    <tr>
        <td><?php echo $record['ID']; ?></td>
        <td><?php echo $record['plate_number']; ?></td>
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
