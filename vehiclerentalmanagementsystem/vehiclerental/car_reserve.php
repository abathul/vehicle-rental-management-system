<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $car_id = $_POST['car_id'];
    $customer_id = $_SESSION['customer_id']; // Assuming you store customer ID in the session
    // echo $customer_id;
    // Generate a unique reservation ID (you can use a more complex logic)
    $reservation_id = (int)uniqid();
    // echo (int)$reservation_id;
    // Insert the booking details into the reservation table
    $sql = "INSERT INTO reservation (reservation_id, customer_id, car_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Use "ssi" to bind the parameters as integers
    $stmt->bind_param("ssi", $reservation_id, $customer_id, $car_id);

    if ($stmt->execute()) {
        echo "Car booked successfully. Your Reservation ID is: $reservation_id";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}


$conn->close();
?>