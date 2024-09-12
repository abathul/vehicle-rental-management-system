<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $car_id = $_POST['car_id'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $condition = $_POST['condition'];

    // Insert the car details into the car table, including car_id
    $sql = "INSERT INTO car (car_id, make, model, `condition`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $car_id, $make, $model, $condition);

    if ($stmt->execute()) {
        echo "Car added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
