<!DOCTYPE html>
<html>
<head>
    <title>Add Car</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        .admin-content {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .functionalities ul {
            list-style: none;
            padding: 0;
            margin: 0;
            background-color: #333;
            color: #fff;
            text-align: center;
        }
        .functionalities ul li {
            display: inline;
            margin: 10px;
        }
        .functionalities ul li a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <nav class="functionalities">
            <ul>
                <li><a href="admin_home.php">Admin Home</a></li>
                <li><a href="add_car.php">Add Car</a></li>
                <li><a href="view_bookings.php">View Bookings</a></li>
                <!-- Add links to other admin-specific sections -->
            </ul>
        </nav>
    </header>
    
    <div class="admin-content">
        <h1>Add Car</h1>
        <form method="post" action="add_car_process.php">
            <label for="car_id">Car ID:</label>
            <input type="number" name="car_id" id="car_id" required>
            
            <label for="make">Make:</label>
            <input type="text" name="make" id="make" required>

            <label for="model">Model:</label>
            <input type="text" name="model" id="model" required>

            <label for="condition">Condition:</label>
            <input type="text" name="condition" id="condition" required>

            <input type="submit" value="Add Car">
        </form>
    </div>
</body>
</html>
