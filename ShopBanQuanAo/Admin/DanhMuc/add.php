<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Thông Tin Loại Sản Phẩm</title>
    <style>
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group .labelRadio {
            display: inline-block;
            margin-bottom: 8px;
            margin-right: 10px;
        }

        .form-group input[type="radio"] {
            display: inline-block;
            width: calc(100% - 250px); 
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px; 
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Thông Tin Loại Sản Phẩm</h2>
    <form method="POST" action="index.php?act=addDm">
        <div class="form-group">
            <label for="typeName">Tên Loại:</label>
            <input type="text" id="typeName" name="tenLoai" placeholder="Nhập tên loại sản phẩm" required>
        </div>
        <div class="form-group">
            <label for="thuongHieu">Tên Thương Hiệu:</label>
            <input type="text" id="thuongHieu" name="thuongHieu" placeholder="Nhập tên thương hiệu" required>
        </div>
        <div class="form-group">
            <label for="xuatXu">Xuất Xứ:</label>
            <input type="text" id="xuatXu" name="xuatXu" placeholder="Nhập tên quốc gia sản xuất" required>
        </div>
        <div class="form-group">
            <label>Trạng Thái Hoạt Động:</label>
            <label class="labelRadio" for="isActiveYes">Có</label>
            <input type="radio" id="isActiveYes" name="trangThai" value="1" checked>
            <label class="labelRadio" for="isActiveNo">Không</label>
            <input type="radio" id="isActiveNo" name="trangThai" value="0">
        </div>
        <div class="form-group">
            <button type="submit" name="themloai">Lưu Thông Tin</button>
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

