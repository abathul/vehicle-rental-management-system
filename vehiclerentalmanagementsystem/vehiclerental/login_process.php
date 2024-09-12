<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check user credentials
    $sql = "SELECT * FROM customer WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            
            // Check if the user is an admin
            $adminSql = "SELECT * FROM admin WHERE name = ?";
            $adminStmt = $conn->prepare($adminSql);
            $adminStmt->bind_param("s", $username);
            $adminStmt->execute();
            $adminResult = $adminStmt->get_result();
            
            if ($adminResult->num_rows == 1) {
                header("Location: admin_home.php");
            } else {
                header("Location: list_cars.php");
            }
        // } else {
            // header("Location: login.php?error=1");
        // }
    } else {
        header("Location: login.php?error=1");
    }

    $stmt->close();
}

$conn->close();
?>
