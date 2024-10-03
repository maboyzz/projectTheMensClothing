<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>THỨ TRONG TUẦN</title>
	<style type="text/css">
		body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form {
            border: 1px solid black;
            width: 700px;
            height: auto;
            text-align: center;
        }
        .title {
            margin: 10px 0px;
            background-color: bisque;
        }
        .table {
            width: 100%;
            background-color: beige;
        }
        .rows th, .rows td {
            padding: 8px;
        }
        .col {
            text-align: left;
            width: 150px;
        }
        .ngay{
    		width: 50px;
        }
        .thang{
    		width: 50px;
        }
        .nam{
    		width: 50px;
        }
        .input-data {
            width: 100%;
            margin: 20px;
        }
        #input-color{
            background-color: #FDA7DF;
            text-align: center;
            margin-left: 140px;
        }
	</style>
</head>
<body>
	<?php
		$ngay = date('d');
		$thang = date('m');
		$nam = date('Y');
		$timngay = "";

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$ngay = $_POST['ngay'];
			$thang = $_POST['thang'];
			$nam = $_POST['nam'];

			if (checkdate($thang, $ngay, $nam)) {
				$time = mktime(0, 0, 0, $thang, $ngay, $nam);
				$thu = date('w', $time);

				switch($thu) {
					case 0: $timngay = "Chủ nhật"; break;
					case 1: $timngay = "Thứ hai"; break;
					case 2: $timngay = "Thứ ba"; break;
					case 3: $timngay = "Thứ tư"; break;
					case 4: $timngay = "Thứ năm"; break;
					case 5: $timngay = "Thứ sáu"; break;
					case 6: $timngay = "Thứ bảy"; break;
					default: $timngay = "Không xác định"; break;
				}
			} else{
				$timngay = "Không hợp lệ";
			}
			
		}
	?>
	<form method="POST" action="" class="form">
		<h2 class="title">Tìm thứ trong tuần</h2>
		<table class="table">
			<tr class="rows">
				<th class="col">Ngày/ tháng/ năm:</th>
				<td><input type="number" name="ngay" class="input ngay" min="1" max="31" value="<?php echo $ngay ?>"></td>
				<td><label>/</label></td>
				<td><input type="number" name="thang" class="input thang" min="1" max="12" value="<?php echo $thang ?>"></td>
				<td><label>/</label></td>	
				<td><input type="number" name="nam" class="input nam" value="<?php echo $nam ?>"></td>
				<td><input type="submit" name="submit" class="submit" value="Tìm thứ trong tuần"></td>
			</tr>
			<tr class="rows">
				<td colspan="4">
					<input type="text" name="timngay" id="input-color" class="input-data" 
                           value="<?php echo !empty($timngay) ? "Ngày $ngay Tháng $thang Năm $nam $timngay" : '' ?>" readonly>
                </td>
			</tr>
		</table>
	</form>
</body>
</html>
