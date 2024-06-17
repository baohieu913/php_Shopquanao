<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <style>


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            max-height: 400px;
            overflow-y: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons a {
            display: inline-block;
            margin-right: 5px;
            padding: 5px 10px;
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            border: 1px solid #4caf50;
            border-radius: 4px;
        }
        .action-buttons a.add_quantity {
            background-color: #ee4d2d;
            border: 1px solid #ee4d2d;
        }
        .action-buttons a.edit {
            background-color: #2196F3;
            border: 1px solid #2196F3;
        }

        .action-buttons a.delete {
            background-color: #f44336;
            border: 1px solid #f44336;
        }

        .action-buttons a.add {
            background-color: #008CBA;
            border: 1px solid #008CBA;
        }

        .scrollable-table {
            max-height: 200px;
            overflow-y: auto;
        }

        .product-image {
            max-width: 50px;
            max-height: 50px;
            object-fit: cover;
        }

        /* Form styling */
        .search-form {
            text-align: center;
            margin: 20px 0;
        }

        .search-form input[type="text"], .search-form select {
            padding: 10px;
            border: none;
            outline: none;
            width: 200px;
            border-radius: 4px;
            transition: width 0.3s ease-in-out;
        }

        .search-form input[type="text"]:focus, .search-form select:focus {
            width: 250px;
        }

        .search-form input[type="submit"] {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .search-form input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>

<h2>Danh sách sản phẩm</h2>

<div class="action-buttons">
    <a href="index.php?act=addSp" class="add">Thêm mới sản phẩm</a>
</div>
<?php 
    if(isset($thongbao)&&($thongbao!="")){
        echo $thongbao;
    }
?>
<form class="search-form" method="POST" action="index.php?act=qlSp">
    <input type="text" placeholder="Nhập tên sản phẩm" name="key">
    <select name="maLoai">
        <option value="0" selected>Tất cả</option>
        <?php 
            foreach ($listDm as $danhMuc) {
                extract($danhMuc);
                echo '<option value="'.$maLoai.'">'.$tenLoai.'</option>';
            }
        ?>
    </select>
    <input type="submit" name="timkiem" value="Tìm kiếm">
</form>

<div class="scrollable-table">
    <table>
        <thead>
            <tr>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Giá SP</th>
                <th>Ảnh SP</th>
                <th>Mô Tả</th>
                <th>Số Lượng</th>
                <th>Số Lượng Bán</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($listSp as $sanPham) {
                extract($sanPham);
                $giaTienSP = number_format($giaSP).'đ';
                $them_sL ="index.php?act=themSl&maSP=".$maSP;
                $suaSp = "index.php?act=suaSp&maSP=".$maSP;
                $xoaSp = "index.php?act=xoaSp&maSP=".$maSP;
                $blsp = "index.php?act=blsp&maSP=".$maSP;
                $anhSP_path = "../upload/".$anhSP;
                if(is_file($anhSP_path)){
                    $anhSP = $anhSP_path;
                }
                // Số lượng bán
                $soLuongban=loadSLB_sanpham($maSP);
                if(is_array($soLuongban)){
                    extract($soLuongban);
                } else {
                    $soluongBan = 0;
                }
                
                //
                echo   '<tr>
                            <td>'.$maSP.'</td>
                            <td style="width: 400px;">'.$tenSP.'</td>
                            <td>'.$giaTienSP.'</td>
                            <td><img src="'.$anhSP.'" alt="Product Image" class="product-image"></td>
                            <td>'.$moTa.'</td>
                            <th>'.$soLuong.'</th>
                            <th>'.$soluongBan.'</th>
                            <td class="action-buttons">';
                                if($trangthaiSP == 1){
                                    echo '  <a href="'.$them_sL.'" class="add_quantity">Nhập hàng</a>
                                            <a href="'.$xoaSp.'" class="delete">Xoá</a>';

                                }
                echo            '<a href="'.$suaSp.'" class="edit">Sửa</a>
                                <a href="'.$blsp.'" class="bl">Xem bình luận</a>
                            </td>
                        </tr>';
            }
            ?> 
        </tbody>
    </table>
</div>

</body>
</html>
