<?php
session_start();
include 'db.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // Kiểm tra nếu sản phẩm đã có trong giỏ
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Giỏ Hàng</title>
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
            <h1>Giỏ Hàng</h1>
            <?php if (empty($_SESSION['cart'])): ?>
                <p>Giỏ hàng của bạn đang trống.</p>
            <?php else: ?>
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                    <?php foreach ($_SESSION['cart'] as $id => $quantity): ?>
                        <?php
                        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
                        include 'db.php';
                        $product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
                        $subtotal = $product['price'] * $quantity;
                        $total += $subtotal;
                        ?>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <h2>Tổng: <?php echo number_format($total, 0, ',', '.'); ?> VNĐ</h2>
                <button onclick="alert('Chức năng thanh toán sẽ được triển khai sau!')">Thanh Toán</button>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer">Tên nhóm - Ngày sinh</div>
</body>
</html>

<?php $conn->close(); ?>
