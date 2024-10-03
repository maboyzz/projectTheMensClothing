<?php
include 'db.php';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Đăng nhập thành công
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php"); // Chuyển hướng đến trang chính
            exit;
        } else {
            $message = "Mật khẩu không chính xác!";
        }
    } else {
        $message = "Tài khoản không tồn tại!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Đăng Nhập</title>
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
            <h1>Đăng Nhập</h1>
            <?php if ($message): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" required>

                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" required>

                <button type="submit">Đăng Nhập</button>
            </form>
            <p>Đã có tài khoản? <a href="register.php">Đăng ký</a></p>
        </div>
    </div>
    <div class="footer">Tên nhóm - Ngày sinh</div>
</body>
</html>

<?php $conn->close(); ?>
