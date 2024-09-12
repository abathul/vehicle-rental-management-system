<?php
require_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Available Cars</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h2 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        table {
            background-color: #fff;
            border-collapse: collapse;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            max-width: 800px;
            padding: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background-color: #333;
            color: #fff;
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
    <?php
    if (isset($_SESSION['customer_id'])) {
        // Query to select cars that are not in the reservation table
        $sql = "SELECT car_id, make, model, `condition`
                FROM car
                WHERE car_id NOT IN (SELECT DISTINCT car_id FROM reservation)";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Available Cars</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Car ID</th><th>Make</th><th>Model</th><th>Condition</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["car_id"] . "</td>";
                echo "<td>" . $row["make"] . "</td>";
                echo "<td>" . $row["model"] . "</td>";
                echo "<td>" . $row["condition"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No available cars.";
        }
    } else {
        echo "You are not logged in.";
    }
    $conn->close();
    ?>
</body>
</html>
