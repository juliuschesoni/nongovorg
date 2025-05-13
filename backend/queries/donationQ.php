<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'query_header.php';
$query = "SELECT ID,email,amount,date_added FROM donation ORDER BY ID ASC";
$result = mysqli_query($conn, $query);
$donation = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $donation[] = $row;
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
  <h1>Counties records</h1>
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
        <th>Email</th>
        <th>Amount[USD]</th>
        <th>Date</th>
    </tr>
    <?php foreach ($donation as $donation): ?>
    <tr>
        <td><?php echo $donation['ID']; ?></td>
        <td><?php echo $donation['email']; ?></td>
        <td><?php echo $donation['amount']; ?></td>
        <td><?php echo $donation['date_added']; ?></td>
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
