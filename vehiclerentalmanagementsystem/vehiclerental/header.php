<!DOCTYPE html>
<html>
<head>
<style>
        .functionalities {
            text-align: center;
        }

        .functionalities ul {
            list-style: none;
            padding: 0;
        }

        .functionalities li {
            display: inline;
            margin: 0 10px; /* Add space between links */
        }

        .functionalities a {
            text-decoration: none;
            color: #333; /* Link color */
            background-color: #eee; /* Background color */
            padding: 10px 20px; /* Padding for the links */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Smooth color transition on hover */
        }

        .functionalities a:hover {
            background-color: #333; /* Background color on hover */
            color: #fff; /* Text color on hover */
        }
    </style>
    <title>Your Title</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Include an external CSS file for styles -->
</head>
<body>
    <header>
        <nav class="login-register">
            <ul>
                <li><a href="login.html" class="button">Login</a></li>
                <li><a href="register.html" class="button">Register</a></li>
            </ul>
        </nav>
       
    </header>
    <div class="functionalities">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="list_cars.php">Car List</a></li>
                <li><a href="bookings.php">Bookings</a></li>
                <!-- Add links to other sections -->
            </ul>
</div>
</body>
</html>
