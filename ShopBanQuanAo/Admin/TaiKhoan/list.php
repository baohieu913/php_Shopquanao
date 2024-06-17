<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

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

<h2>Danh sách tài khoản</h2>

<div class="action-buttons">
    <a href="index.php?act=addTk" class="add">Thêm mới tài khoản</a>
</div>

<?php 

    if(isset($thongbao)&&($thongbao!="")){
        echo $thongbao;
    }
?>

<form class="search-form" method="POST" action="index.php?act=qlTk">
    <input type="text" placeholder="Nhập tên người dùng" name="key">
    <select name="quyenhan">
        <option value="-1" selected>Tất cả</option>
        <option value="0">Khách hàng</option>
        <option value="1">Nhân viên</option>
        
    </select>
    <input type="submit" name="timkiem" value="Tìm kiếm">
</form>

<div class="scrollable-table">
    <table>
        <thead>
            <tr>
                <th>Mã TK</th>
                <th>Email</th>
                <th>Tên tài khoản</th>
                <th>Mật khẩu</th>
                <th>Tên người dùng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Quyền hạn</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($listTk as $taiKhoan) {
                extract($taiKhoan);
                $suaTk = "index.php?act=suaTk&maTK=".$maTK;
                $xoaTk = "index.php?act=xoaTk&maTK=".$maTK;
                if($quyen==0){
                    $quyenhan = "Khách hàng";
                } else {
                    $quyenhan = "Nhân viên";
                }
                
                echo   '<tr>
                            <td>'.$maTK.'</td>
                            <td>'.$email.'</td>
                            <td>'.$userName.'</td>
                            <td>'.$passWord.'</td>
                            <td>'.$tenNguoidung.'</td>
                            <td>'.$address.'</td>
                            <td>'.$soDT.'</td>
                            <td>'.$quyenhan.'</td>
                            <td class="action-buttons">
                                <a href="'.$suaTk.'" class="edit">Sửa</a>';
                            if($trangthaiTK == 1){
                                echo '<a href="'.$xoaTk.'" class="delete">Xoá</a>';
                            }
                echo        '</td>
                        </tr>';
            }

            
            ?> 
        </tbody>
    </table>
</div>

</body>
</html>
