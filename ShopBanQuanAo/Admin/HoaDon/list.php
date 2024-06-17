<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
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

        a.detail {
            display: inline-block;
            margin-right: 5px;
            padding: 5px 10px;
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            border: 1px solid #4caf50;
            border-radius: 4px;
            background-color: #008CBA;
            border: 1px solid #008CBA;
        }

        .action-buttons a.edit {
            background-color: #2196F3;
            border: 1px solid #2196F3;
        }

        .action-buttons a.cancel {
            background-color: #f44336;
            border: 1px solid #f44336;
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

<h2>Danh sách đơn hàng</h2>


<form class="search-form" method="POST" action="index.php?act=qlHd">
    <input type="text" placeholder="Nhập tên khách hàng" name="key">
    <select name="trangThai">
        <option value="-1" selected>Tất cả</option>
        <option value="0">Đơn hàng mới</option>
        <option value="1">Đơn hàng đang xử lý</option>
        <option value="2">Đơn hàng đang vận chuyển</option>
        <option value="3">Đơn hàng đã giao</option>
        <option value="4">Đơn hàng đã hoàn tất</option>
    </select>
    <input type="submit" name="timkiem" value="Tìm kiếm">
</form>

<div class="scrollable-table">
    <table>
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Số lượng hàng</th>
                <th>Giá trị đơn hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Xem chi tiết</th>       
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($dsHd as $hd) {
                    extract($hd);
                    $suaHd = "index.php?act=suaHd&maHD=".$maHD;
                    $huyHd = "index.php?act=huyHd&maHD=".$maHD;
                    $chitietHd = "index.php?act=chitietHd&maHD=".$maHD;
                    $soSp=loadAll_giohang_count($maHD);
                    $tinhTrang=get_trangthaiDh($trangthaiHD);
                    $khachHang=$tenHD.'<br>'.$emailHD.'<br>'.$diachiHD.'<br>'.$sodtHD;
                    $tongHoaDon = number_format($tongHD).'đ';

                    echo '  <tr>
                                <td>MDH'.$maHD.'</td>
                                <td>'.$khachHang.'</td>
                                <td>'.$soSp.'</td>
                                <td>'.$tongHoaDon.'</td>
                                <td>'.$tinhTrang.'</td>
                                <td>'.$ngaydathang.'</td>
                                <td><a href="'.$chitietHd.'" class="detail">Xem chi tiết</a></td>';
                                if($trangthaiHD == 0 || $trangthaiHD == 1){
                                    echo    '<td class="action-buttons">
                                                <a href="'.$huyHd.'" class="cancel">Huỷ đơn hàng</a>
                                            </td>';
                                }
                    echo     '</tr>';
                }
            ?>
            
            <!-- <a href="'.$suaHd.'" class="edit">Sửa</a> -->
        </tbody>
    </table>
</div>

</body>
</html>
