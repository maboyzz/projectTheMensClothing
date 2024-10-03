<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Kiểm tra và lưu vào cơ sở dữ liệu nếu cần
    $conn->query("INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')");

    header("Location: contact.php?status=success");
    exit;
}
?>
