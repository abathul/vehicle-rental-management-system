<?php

require_once('config.php');
// SQL query with GROUP BY
$sql = "SELECT customer_id, COUNT(reservation_id) as total_reservations FROM reservation GROUP BY customer_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Query with GROUP BY</title>
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
    <h2>Total Reservations per Customer</h2>
    <table>
        <tr>
            <th>Customer ID</th>
            <th>Total Reservations</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["customer_id"] . "</td>";
            echo "<td>" . $row["total_reservations"] . "</td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
