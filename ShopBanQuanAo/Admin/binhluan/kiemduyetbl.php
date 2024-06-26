<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
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
        .action-buttons input {
            display: inline-block;
            margin-right: 5px;
            padding: 5px 10px;
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            border: 1px solid #4caf50;
            border-radius: 4px;
        }
        .action-buttons input[name = 'xoa'] {
            background-color: #ee4d2d;
            border: 1px solid #ee4d2d;
        }
        .action-buttons input[name = 'an'] {
            background-color: #2196F3;
            border: 1px solid #2196F3;
        }
        .action-buttons input[name = 'an']:hover {
            cursor:pointer ;
        }
        .action-buttons input[name = 'hien']:hover {
            cursor:pointer ;
        }
        .action-buttons input[name = 'xoa']:hover {
            cursor:pointer ;
        }
        
    </style>
</head>
<body>

<h2>Danh sách bình luận</h2>

<div class="scrollable-table">
        <table>
            <thead>
                <tr>
                    <th>Mã bình luận</th>
                    <th>Nội dung</th>
                    <th>Mã tài khoản</th>
                    <th>Mã sản phẩm</th>
                    <th>Tình trạng</th>
                    <th>Ngày bình luận</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($bl as $bl1) {
                    extract($bl1);
                    echo   '<tr>
                                <td>'.$maBL.'</td>
                                <td style="width: 400px;">'.$noidung.'</td>
                                <td>'.$maTK.'</td>
                                <td>'.$maSP.'</td>
                                <th>'.$tinhtrang.'</th>
                                <th>'.$ngaybl.'</th>
                                <td class="action-buttons">                  
                                <form action="index.php?act=anhien" method="post">
                                    <input type="hidden" name="maBL" value="'.$maBL.'">
                                    <input type="hidden" name="noidung" value="'.$noidung.'">
                                    <input type="hidden" name="maTK" value="'.$maTK.'">
                                    <input type="hidden" name="maSP" value="'.$maSP.'">
                                    <input type="hidden" name="tingtrang" value='.$tinhtrang.'>
                                    <input type="hidden" name="ngaybl" value='.$ngaybl.'>

                                    <input type="submit" name ="hien" value = "Hiện" >
                                    <input type="submit" name ="an" value = "Ẩn">
                                    <input type="submit" name ="xoa" value = "Xóa">
                                    
                                </form>
                                </td>
                            </tr>';
                }
                ?> 
                <?php 
                   if(isset($thongbao)&&($thongbao!="")) echo $thongbao
                ?>
            </tbody>
        </table>
</div>
</body>
</html>
