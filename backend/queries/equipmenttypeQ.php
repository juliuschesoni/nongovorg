<?php
include 'query_header.php';
$query = "SELECT ID, name FROM equipment_type ORDER BY ID ASC";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $typeId = $row['ID'];
        $typeName = $row['name'];
        echo "<a href='../../frontend/forms/equipmentF.html?typeId=$typeId'>$typeName</a><br>";
    }
} else {
    echo "No equipment types found.";
}

// Close the connection
mysqli_close($conn);
?>
