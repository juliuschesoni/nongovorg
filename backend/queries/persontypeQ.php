<?php
include 'query_header.php';
$query = "SELECT ID, name FROM person_type ORDER BY ID ASC";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $personTypeId = $row['ID'];
        $personTypeName = $row['name'];
        echo "<a href='../../frontend/forms/personF.html?personTypeId=$personTypeId'>$personTypeName</a><br>";
    }
} else {
    echo "No person types found.";
}

// Close the connection
mysqli_close($conn);
?>
