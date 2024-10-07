<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thứ trong tuần</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
            font-family: Arial, sans-serif;
        }
        .contain {
            border: 1px solid black;
            width: 500px;
            background-color: #ffcccc;
            padding: 20px;
            border-radius: 10px;
        }
        .head {
            text-align: center;
            background-color: #fb88c2;
            padding: 10px 0;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .giua {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .text {
            width: 50px;
            margin: 0px 10px;
        }
        .bottom {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .result {
            text-align: center;
            font-size: 1.2rem;
            color: #333;
        }
    </style>
</head>
<body>
<?php
    $result = "";
    if (isset($_POST['submit'])) {
        $day = $_POST['ngay'];
        $month = $_POST['thang'];
        $year = $_POST['nam'];

        // Tạo chuỗi ngày hợp lệ
        $date = "$year-$month-$day";

        // Lấy thứ trong tuần
        $weekday = date('l', strtotime($date));

        // Chuyển thứ sang tiếng Việt
        $days = array(
            'Monday' => 'Thứ Hai',
            'Tuesday' => 'Thứ Ba',
            'Wednesday' => 'Thứ Tư',
            'Thursday' => 'Thứ Năm',
            'Friday' => 'Thứ Sáu',
            'Saturday' => 'Thứ Bảy',
            'Sunday' => 'Chủ Nhật'
        );
        
        $weekday_in_vietnamese = $days[$weekday];
        $result = "Ngày $day tháng $month năm $year là $weekday_in_vietnamese";
    }
?>
    <form action="" method="post" class="contain">
        <div class="head">
            Tìm Thứ Trong Tuần
        </div>
        <div class="giua">
            Ngày/Tháng/Năm: 
            <input type="text" class="text" name="ngay" min="1" max="31" placeholder="Ngày" required> /
            <input type="text" class="text" name="thang" min="1" max="12" placeholder="Tháng" required> /
            <input type="text" class="text" name="nam" min="1900" placeholder="Năm" required>
            <input type="submit" name="submit" value="Tìm thứ trong tuần">
        </div>
        <div class="bottom">
            <input type="text" name="hienthi" readonly style="width: 100%; text-align: center;" value="<?php echo $result; ?>">
        </div>
    </form>
</body>
</html>
