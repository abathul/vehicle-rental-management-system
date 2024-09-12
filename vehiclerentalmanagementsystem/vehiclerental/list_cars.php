<!DOCTYPE html>
<html>
<head>
    <title>Car Listing</title>
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

        .center {
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 20px;
            cursor: pointer;
            margin: 0 10px;
            text-decoration: none;
        }

        .button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <?php
    require_once('config.php');
    session_start();

    $sql = "SELECT car_id, make, model, `condition` FROM car";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Available Cars</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Car ID</th><th>Make</th><th>Model</th><th>Condition</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["car_id"] . "</td>";
            echo "<td>" . $row["make"] . "</td>";
            echo "<td>" . $row["model"] . "</td>";
            echo "<td>" . $row["condition"] . "</td>";
            // Add the "Book Car" button with a form for each car
            echo "<td>";
            echo "<form method='post' action='car_reserve.php'>";
            echo "<input type='hidden' name='car_id' value='" . $row['car_id'] . "'>";
            echo "<input type='submit' value='Book Car'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No cars found.";
    }

    $conn->close();
    ?>
    
    <div class="button-container">
        <a href="customer_bookings.php" class="button">View My Bookings</a>
        <a href="available_cars.php" class="button">View Available Cars</a>
        <a href="correlated.php" class="button">View Popular Cars</a>
    </div>
</body>
</html>
