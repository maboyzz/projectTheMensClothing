<?php
session_start();
include 'db.php';

if (!isset($_GET['id'])) {
    die("Sản phẩm không tồn tại.");
}

$id = $_GET['id'];

// Lấy thông tin sản phẩm từ cơ sở dữ liệu
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Chi Tiết Sản Phẩm</title>
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
            <h1><?php echo $product['name']; ?></h1>
            <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="width: 100%;"/>
            <p>Giá: <?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ</p>
            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <label for="quantity">Số lượng:</label>
                <input type="number" name="quantity" min="1" value="1" required>
                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
                <button type="submit" name="buy_now">Mua ngay</button>
            </form>
        </div>
    </div>
    <div class="footer">Tên nhóm - Ngày sinh</div>
</body>
</html>

<?php $conn->close(); ?>
