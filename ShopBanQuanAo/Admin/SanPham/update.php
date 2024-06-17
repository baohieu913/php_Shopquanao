<?php 
    extract($dm);
    $maLoaidm = $maLoai;
    $anhSP_path = "../upload/".$anhSP;
    if(is_file($anhSP_path)){
        $anhSP = "<img src='".$anhSP_path."' height=80>" ;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sửa Sản Phẩm</title>
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

        .form-group .labelRadio {
            display: inline-block;
            margin-bottom: 8px;
            margin-right: 10px;
        }

        .form-group input[type="radio"] {
            display: inline-block;
            width: calc(100% - 300px); 
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
    <h2>Thông Tin Sản Phẩm</h2>
    <form method="POST" action="index.php?act=sua_action_Sp&maSP=<?=$maSP?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="productName">Tên Sản Phẩm:</label>
            <input type="text" id="productName" name="tenSP" placeholder="Nhập tên sản phẩm" required value="<?=$tenSP?>">
        </div>
        <div class="form-group">
            <label for="productPrice">Giá Sản Phẩm:</label>
            <input type="number" step="1000" id="productPrice" name="giaSP" placeholder="Nhập giá sản phẩm" required value="<?=$giaSP?>">
        </div>
        <div class="form-group">
            <label for="productImage">Ảnh Sản Phẩm:</label>
            <input type="file" id="productImage" name="anhSP" accept="image/*" >
            <?=$anhSP?>
        </div>
        <div class="form-group">
            <label for="productDescription">Mô Tả:</label>
            <textarea id="productDescription" name="moTa" placeholder="Nhập mô tả sản phẩm" required><?=$moTa?></textarea>
        </div>
        <div class="form-group">
            <label for="productQuantity">Số Lượng:</label>
            <div>
                <input type="number" id="productQuantity" name="soLuong" placeholder="Nhập số lượng" required min="0" value="<?=$soLuong?>">
            </div>
        </div>
        <div class="form-group">
            <label for="productCategory">Loại Sản Phẩm:</label>
            <select id="productCategory" name="loaiSP" required>
                <?php 
                    foreach ($listDm as $danhMuc) {
                        extract($danhMuc);
                        if($maLoaidm == $maLoai){
                            echo '<option selected value="'.$maLoai.'">'.$tenLoai.'</option>';
                        }else {
                            echo '<option value="'.$maLoai.'">'.$tenLoai.'</option>';
                        }
                    }
                ?>        
            </select>
        </div>
        <div class="form-group">
            <label>Trạng Thái Hoạt Động:</label>
            <label class="labelRadio" for="isActiveYes">Có</label>
            <input type="radio" id="isActiveYes" name="trangThai" value="1" <?=($trangthaiSP == 1) ? 'checked' : ''?>>
            <label class="labelRadio" for="isActiveNo">Không</label>
            <input type="radio" id="isActiveNo" name="trangThai" value="0" <?=($trangthaiSP == 0) ? 'checked' : ''?>>
        </div>
        <div class="form-group">
            <button type="submit" name="suasanpham">Lưu Thông Tin</button>
        </div>
    </form>
</div>

</body>
</html>
