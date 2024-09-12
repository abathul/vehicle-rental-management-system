<?php
// Establish a database connection
require_once('config.php');


// SQL query using ALL or ANY
$sql = "SELECT car_id, make, model, `condition`
        FROM car
        WHERE `condition` > ANY (SELECT `condition` FROM car)";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Query with ALL or ANY</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Cars in Better Condition</h2>
    <table>
        <tr>
            <th>Car ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Condition</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["car_id"] . "</td>";
            echo "<td>" . $row["make"] . "</td>";
            echo "<td>" . $row["model"] . "</td>";
            echo "<td>" . $row["condition"] . "</td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
