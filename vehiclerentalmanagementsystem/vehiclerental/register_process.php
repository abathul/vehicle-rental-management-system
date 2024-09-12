<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'vehicle_rental';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$customer_id = $_POST['customer_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$password = $_POST['password'];

// Use a prepared statement to prevent SQL injection
$sql = "INSERT INTO customer (customer_id, name, email, phone_number,password) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $customer_id, $name, $email, $phone_number, $password);

if ($stmt->execute()) {
    echo "Registration successful";
} else {
    // Handle errors, for example, redirect to a specific error page
    header("Location: login.php?error=2");
}

$stmt->close();
$conn->close();
?>
