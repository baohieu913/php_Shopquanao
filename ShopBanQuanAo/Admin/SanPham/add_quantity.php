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
    </style>
</head>
<body>

<div class="form-container">
    <h2>Thêm Số Lượng SP</h2>
    <form method="POST" action="index.php?act=themSl_action">
        <div class="form-group">
            <label for="productQuantity">Số Lượng:</label>
            <div>
                <?php 
                    $maSPham = $_GET['maSP'];
                ?>
                <input type="hidden" name="maSP" value="<?=$maSPham?>"> 
                <input type="number" id="productQuantity" name="soLuong" placeholder="Nhập số lượng sản phẩm muốn thêm" required min="0">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="themSl">Thêm</button>
        </div>
    </form>
</div>

</body>
</html>

