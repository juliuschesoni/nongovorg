<?php
//error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);

//connection settings

include 'query_header.php';
//query setting

$query = "SELECT ID, fname, lname FROM person WHERE person_type_id = 1 ORDER BY ID ASC";
$result = mysqli_query($conn, $query);
$person = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $person[] = $row;
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
  <h1>Project Managers</h1>
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
        <th>Name</th>
    </tr>
    <?php foreach ($person as $person): ?>
    <tr>
        <td><?php echo $person['ID']; ?></td>
        <td><?php echo $person['fname'] . ' ' . $person['lname']; ?></txd>
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
