<?php
session_start();
include 'db.php';

// Lấy tất cả sản phẩm từ cơ sở dữ liệu
$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Sản Phẩm</title>
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
            <h1>Tất Cả Sản Phẩm</h1>
            <div class="products">
                <?php while ($product = $products->fetch_assoc()): ?>
                    <div class="product">
                        <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="width: 100%;"/>
                        <h2><?php echo $product['name']; ?></h2>
                        <p>Giá: <?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ</p>
                        <a href="product_detail.php?id=<?php echo $product['id']; ?>">Chi tiết</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="footer">Tên nhóm - Ngày sinh</div>
</body>
</html>

<?php $conn->close(); ?>
