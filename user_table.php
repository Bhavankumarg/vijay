<?php
include('db.php');

$query = "SELECT * FROM user";
$result = $mysql->query($query);

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['user_id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";
}

$result->close();
$mysqli->close();
?>
