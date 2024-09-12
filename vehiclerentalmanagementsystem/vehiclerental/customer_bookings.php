<!DOCTYPE html>
<html>
<head>
    <title>Your Bookings</title>
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

    if (isset($_SESSION['customer_id'])) {
        $customer_id = $_SESSION['customer_id'];

        // Query the reservations for the customer
        $sql = "SELECT r.reservation_id, c.make, c.model
                FROM reservation r
                INNER JOIN car c ON r.car_id = c.car_id
                WHERE r.customer_id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $customer_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo "<h2>Your Bookings</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Reservation ID</th><th>Car Make</th><th>Car Model</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["reservation_id"] . "</td>";
                echo "<td>" . $row["make"] . "</td>";
                echo "<td>" . $row["model"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<h2>You have no bookings.</h2>";
        }

        $stmt->close();
    } else {
        echo "<h2>You are not logged in.</h2>";
    }

    $conn->close();
    ?>
</body>
</html>
