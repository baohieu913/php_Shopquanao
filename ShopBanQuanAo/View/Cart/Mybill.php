<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đơn hàng</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .order-info-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .order-info {
            padding: 20px;
        }

        .order-info h2 {
            margin-top: 0;
            background-color: #ee4d2d;
            color: white;
            padding: 10px;
            border-radius: 4px;
        }

        .order-details {
            margin-top: 20px;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .order-details th, .order-details td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .order-details td {
            background-color: #f2f2f2;
        }

        .status-container {
            background-color: #4CAF50; 
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
        }

        .status-container-cancel {
            background-color: #ee4d2d; 
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
        }

        .delivered-link {
            color: #fff; 
            text-decoration: none;
            font-weight: bold;
        }

        .cancel-order {
            color: #fff; 
            text-decoration: none;
            font-weight: bold;
        }


        .status-container:hover {
            background-color: #45a049; 
        }

        .delivered-link:hover {
            color: #ffeb3b; 
        }
        .action-buttons a {
            display: inline-block;
            margin-right: 5px;
            padding: 5px 10px;
            text-decoration: none;
            background-color: #ee4d2d;
            color: white;
            border: 1px solid #ee4d2d;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="order-info-container">
    <div class="order-info">
        <h2>Tất cả đơn hàng</h2>

        <div class="order-details">
            <table>
                <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Số lượng mặt hàng</th>
                        <th>Tổng giá trị đơn hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Chi tiết đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(is_array($dsHD)){
                            $i = 1;
                            foreach ($dsHD as $hd) {
                                extract($hd);
                                $ttdh=get_trangthaiDh_KH($trangthaiHD);
                                $soLuongSP=loadAll_giohang_count($maHD);
                                $chitiet = "index.php?act=chitiet&maHD=".$maHD;
                                $tongHoaDon = number_format($tongHD).'đ';

                                echo '  <tr>
                                            <td>'.$i.'</td>
                                            <td>MDH'.$maHD.'</td>
                                            <td>'.$ngaydathang.'</td>
                                            <td>'.$soLuongSP.'</td>
                                            <td>'.$tongHoaDon.'</td>';
                                if($trangthaiHD != 3 && $trangthaiHD != 0){
                                    echo            '<td>'.$ttdh.'</td>';
                                } else if($trangthaiHD == 0){
                                    echo '<td><div class="status-container-cancel"><a href="index.php?act=huyDh&maHD='.$maHD.'" class="cancel-order">Huỷ đơn hàng</a></div></td>';
                                } else {
                                    echo '<td><div class="status-container"><a href="index.php?act=xacnhanDh&maHD='.$maHD.'" class="delivered-link">Đã nhận hàng</a></div></td>';
                                }
                                $i += 1;
                                echo '<td class="action-buttons"><a href="index.php?act=xemchitietDh&maHD='.$maHD.'">Xem chi tiết</a></td></tr>';
                               
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>    
    </div>  
</div>

</body>
</html>
