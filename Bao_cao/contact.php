<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Liên Hệ</title>
</head>
<body>
    <div class="top-menu">
        <img src="images/logo.png" alt="Logo" style="height: 50px; vertical-align: middle;"/>
        <a href="cart.php">Giỏ Hàng</a>
        <a href="login.php">Đăng Nhập</a> | 
        <a href="register.php">Đăng Ký</a>
    </div>
    <div class="container">
        <div class="left-menu">
            <a href="index.php">Trang Chủ</a>
            <a href="products.php">Sản Phẩm</a>
            <a href="about.php">Giới Thiệu</a>
            <a href="contact.php">Liên Hệ</a>
        </div>
        <div class="content">
            <h1>Liên Hệ</h1>
            <form method="POST" action="send_contact.php">
                <label for="name">Họ và Tên:</label>
                <input type="text" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                
                <label for="message">Tin Nhắn:</label>
                <textarea name="message" required></textarea>
                
                <button type="submit">Gửi</button>
            </form>
        </div>
    </div>
    <div class="footer">Tên nhóm - Ngày sinh</div>
</body>
</html>
