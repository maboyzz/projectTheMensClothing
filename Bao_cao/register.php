<?php
session_start();
include 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Kiểm tra nếu tên người dùng đã tồn tại
    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($result->num_rows == 0) {
        // Thêm người dùng mới
        $conn->query("INSERT INTO users (username, email, password, phone, address) VALUES ('$username', '$email', '$password', '$phone', '$address')");
        header("Location: login.php"); // Chuyển đến trang đăng nhập
        exit;
    } else {
        $message = "Tên người dùng đã tồn tại.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Đăng Ký</title>
</head>
<body>
    <div class="top-menu">
        <a href="cart.php">Giỏ Hàng</a>
        <a href="login.php">Đăng Nhập</a> | 
        <a href="register.php">Đăng Ký</a>
    </div>
    <div class="container">
        <div class="left-menu">
            <img src="images/logo.png" alt="Logo" style="height: 50px; vertical-align: middle;"/>
            <a href="index.php">Trang Chủ</a>
            <a href="products.php">Sản Phẩm</a>
            <a href="about.php">Giới Thiệu</a>
            <a href="contact.php">Liên Hệ</a>
        </div>
        <div class="content">
            <h1>Đăng Ký</h1>
            <?php if ($message): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" required>

                <label for="email">Email:</label>
                <input type="email" name="email" required>

                <label for="phone">Số điện thoại:</label>
                <input type="text" name="phone" required>

                <label for="address">Địa chỉ:</label>
                <input type="text" name="address" required>

                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" required>

                <button type="submit">Đăng Ký</button>
            </form>
            <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
        </div>
    </div>
    <div class="footer">Tên nhóm - Ngày sinh</div>
</body>
</html>

<?php $conn->close(); ?>
