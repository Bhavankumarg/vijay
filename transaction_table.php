<?php
include('db.php');

$query = "SELECT * FROM transactions";
$result = $mysqli->query($query);

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['Date'] . "</td>";
    echo "<td>" . $row['Description'] . "</td>";
    echo "<td>" . $row['Amount'] . "</td>";
    echo "</tr>";
}

$result->close();
$mysqli->close();
?>
