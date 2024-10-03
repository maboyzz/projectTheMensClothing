<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thứ trong tuần</title>

    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }
        .contain{
           
            border: 1px solid black;
            height: auto;
            width: 500px;
            background-color: #ffcccc;
            padding: 0px 10px 30px 10px;
        }
        .head{
            text-align: center;
           background-color: #fb88c2;
        }
        .giua{
            display: flex;
            justify-content: center;          
        }
        .text{
            width: 50px;
            margin: 0px 10px 0px 10px;
        }
        .bottom{
            margin-top: 10px;
            display: flex;
            justify-content: center; 
        }

    </style>
</head>
<body>
    <form action=""method="post" class="contain" >

     
            <div class ="head">
                <h1>Tìm Thứ Trong Tuần</h1>
            </div>
            <div class="giua">
                Ngày/Tháng/Năm: 
                <input type="text" class="text" name="ngay" min="1" max="31" required>/
                <input type="text" class="text"name="thang" min="1" max="12" required>/
                <input type="text" class="text" name="nam" min="1900"required >
                <input type="submit" value="Tìm thứ trong tuần">
                   
            </div>
            <div class="bottom">
            <input type="text" name="hienthi" readonly style="width: 60%;">

            </div>
       

    </form>
    
</body>
</html>
