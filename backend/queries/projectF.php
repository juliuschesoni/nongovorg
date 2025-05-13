<?php
//report errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

//select county
include 'query_header.php';
$query = "SELECT ID, name FROM county ORDER BY ID ASC";
$result = mysqli_query($conn, $query);
$counties = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $counties[] = $row;
    }
}

//select programme
$query = "SELECT ID, name FROM programme ORDER BY ID ASC";
$result = mysqli_query($conn, $query);
$programmes = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $programmes[] = $row;
    }
}

//select implementer
$query = "SELECT ID, name FROM implementer ORDER BY ID ASC";
$result = mysqli_query($conn, $query);
$implementers = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $implementers[] = $row;
    }
}

//select project manager
$query = "SELECT ID, fname, lname FROM person WHERE person_type_id = 1 ORDER BY ID ASC";
$result = mysqli_query($conn, $query);
$person = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $person[] = $row;
    }
}
//select budget amount
$query = "SELECT ID, amount FROM budget ORDER BY ID ASC";
$result = mysqli_query($conn, $query);
$budget = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $budget[] = $row;
    }
}

//close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projects Form</title>
    <link rel="icon" href="../../frontend/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../frontend/styles/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../frontend/styles/styles.css">
</head>
<body>
    <header>
    <h2>Register a Project</h2>
    </header>
    <nav class="form-nav">
      <a href="../../admin/admin.html">admin</a>
      <a href="../../">logout</a>
    </nav>
    <main>
    <section class="form-section">
    <form action="../forms/insert_projectF.php" method="POST">
        <label for="county">Select County:</label>
        <select name="county" id="county">
            <option value="" selected>Choose County</option>
            <?php foreach ($counties as $county): ?>
                <option value="<?php echo $county['ID']; ?>"><?php echo $county['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="programme">Select Programme:</label>
        <select name="programme" id="programme">
            <option value="" selected>Choose Programme</option>
            <?php foreach ($programmes as $programme): ?>
                <option value="<?php echo $programme['ID']; ?>"><?php echo $programme['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="implementer">Select Implementation Agency:</label>
        <select name="implementer" id="implementer">
            <option value="" selected>Choose Implementation Agency</option>
            <?php foreach ($implementers as $implementer): ?>
                <option value="<?php echo $implementer['ID']; ?>"><?php echo $implementer['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="person">Select Project Manager:</label>
        <select name="person" id="person">
            <option value="" selected>Choose Project Manager</option>
            <?php foreach ($person as $person): ?>
                <option value="<?php echo $person['ID']; ?>"><?php echo '(ID:'.$person['ID'] .')'. ' ' .$person['fname'] . ' ' . $person['lname']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="budget">Select Budget Amount:</label>
        <select name="budget" id="budget">
            <option value="" selected>Choose Budget Amount</option>
            <?php foreach ($budget as $budget): ?>
                <option value="<?php echo $budget['ID']; ?>"><?php echo $budget['amount']; ?></option>
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
