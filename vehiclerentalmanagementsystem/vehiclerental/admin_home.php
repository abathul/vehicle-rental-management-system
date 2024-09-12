<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Include an external CSS file for styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .admin-content {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        .functionalities {
            margin: 20px auto;
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .functionalities ul {
            list-style-type: none;
            padding: 0;
        }

        .functionalities ul li {
            margin: 10px 0;
        }

        .functionalities ul li a {
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
        }

        .functionalities ul li a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="admin-content">
        <h1>Welcome, Admin!</h1>
        <!-- Add admin-specific content and functionality here -->
    </div>

    <div class="functionalities">
        <ul>
            <li><a href="admin_home.php">Admin Home</a></li>
            <li><a href="add_car.php">Add Car</a></li>
            <li><a href="bookings.php">View Bookings</a></li>
            <li><a href="groupby.php">View Total Reservations per Customer</a></li>
            <li><a href="allany.php">View Cars in better condition</a></li>
        </ul>
    </div>
</body>
</html>
