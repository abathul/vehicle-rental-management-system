<!DOCTYPE html>
<html>
<head>
    <title>All Bookings</title>
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
    require_once('config.php');
    session_start();

    $sql = "SELECT r.reservation_id, c.name AS customer_name, car.make, car.model FROM reservation r
            INNER JOIN customer c ON r.customer_id = c.customer_id
            INNER JOIN car ON r.car_id = car.car_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>All Bookings</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Reservation ID</th><th>Customer Name</th><th>Car Make</th><th>Car Model</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["reservation_id"] . "</td>";
            echo "<td>" . $row["customer_name"] . "</td>";
            echo "<td>" . $row["make"] . "</td>";
            echo "<td>" . $row["model"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No bookings found.";
    }

    $conn->close();
    ?>
</body>
</html>
