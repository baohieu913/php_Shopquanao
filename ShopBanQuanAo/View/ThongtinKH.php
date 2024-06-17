<?php 
    extract($dm);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Thêm Tài Khoản</title>
    <style>
        .form-container {
            background-color: #fff;
            padding: 10px 20px 32px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
            
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 4px;
        }

        .form-group button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Thông Tin Tài Khoản</h2>
    <form method="POST" action="index.php?act=sua_thongtin_Tk&maTK=<?=$maTK?>">
        <div class="form-group">
            <label for="Email">Email:</label>
            <input type="email" id="Email" name="email" placeholder="Nhập email" required value="<?=$email?>">
        </div>
        <div class="form-group">
            <label for="tenTK">Tên Tài Khoản:</label>
            <input type="text" id="tenTK" name="tenTK" placeholder="Nhập tên tài khoản" required value="<?=$userName?>">
        </div>
        <div class="form-group">
            <label for="matkhau">Mật Khẩu:</label>
            <input type="text" id="matkhau" name="matkhau" placeholder="Nhập mật khẩu" required value="<?=$passWord?>">
        </div>
        <div class="form-group">
            <label for="tennguoidung">Tên Người Dùng:</label>
            <input type="text" id="tennguoidung" name="tennguoidung" placeholder="Nhập tên người dùng" required value="<?=$tenNguoidung?>">
        </div>
        <div class="form-group">
            <label for="diachi">Địa Chỉ:</label>
            <input type="text" id="diachi" name="diachi" placeholder="Nhập địa chỉ" required value="<?=$address?>"></input>
        </div>
        <div class="form-group">
            <label for="sodienthoai">Số Điện Thoại:</label>
            <input type="text" id="sodienthoai" name="sodienthoai" placeholder="Nhập số điện thoại" required value="<?=$soDT?>"></input>
        </div>
        <?php 
            if($quyen == 0){
                $quyenhan = "Khách hàng";
            } else if($quyen == 1){
                $quyenhan = "Nhân viên";
            } else {
                $quyenhan = "Admin";
            }
        ?>
        <div class="form-group">
            <label for="quyenhan">Quyền hạn:</label>
            <input type="text" id="quyenhan" name="quyen" readonly value="<?=$quyenhan?>"></input>
            <input type="hidden" name="quyenhan" value="<?=$quyen?>"></input>

        </div>
        
        <div class="form-group">
            <button type="submit" name="capnhattaikhoan">Cập Nhật Thông Tin</button>
        </div>
    </form>
    <?php 
        if(isset($thongbao)&&($thongbao!="")){
            echo $thongbao;
        }
    ?>
</div>

</body>
</html>
