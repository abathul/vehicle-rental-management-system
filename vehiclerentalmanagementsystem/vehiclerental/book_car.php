<?php
session_start();
require_once('db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $car_id = $_POST['car_id'];
    $username = $_SESSION['username']; // Get the logged-in username

    $sql = "INSERT INTO bookings (car_id, username) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $car_id, $username);

    if ($stmt->execute()) {
        echo "Booking successful.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
