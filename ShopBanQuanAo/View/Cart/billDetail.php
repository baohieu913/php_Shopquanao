<?php 
    extract($hd);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
          
        }

        .invoice {
            border: 1px solid #ccc;
            padding: 20px;
            width: 80%;
            margin: 0 auto;
        }

        .invoice-header,
        .invoice-footer {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
        }

        .invoice-items {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
        .invoice-footer {
            
            margin: 30px 0px;
        }
        .ab{
            color: #fff;
            background-color: #ee4d2d;
        }
        .back{
            width: 100%;
            height: 100%;
            text-Decoration: none;
        }


    </style>
</head>
<body>

    <div class="invoice">
        <div class="invoice-header">
            <h1>HÓA ĐƠN</h1>
        </div>
        <div class="invoice-body">
            <p><strong>Khách hàng:</strong> <?=$tenHD?></p>
            <p><strong>Địa chỉ:</strong> <?=$diachiHD?></p>
            <p><strong>Ngày:</strong> <?=$ngaydathang?></p>
        </div>
        <div class="invoice-items">
            <h2>Chi tiết hóa đơn</h2>
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $tong = 0;
                        foreach ($listGh as $giohang) {
                            extract($giohang);
                        $giaSPham = number_format($giaSP).'đ';
                        $tt = number_format($thanhTien).'đ';
                            echo '  <tr>
                                        <td>'.$tenSP.'</td>
                                        <td>'.$soLuong.'</td>
                                        <td>'.$giaSPham.'</td>
                                        <td>'.$tt.'</td>
                                    </tr>';
                            $tong += $thanhTien;
                        }
                    
                    ?>
                </tbody>
            </table>
        </div>
        <div class="invoice-footer">
            <p><strong>Tổng cộng:</strong><?php 
                $tongTien = number_format($tong).'đ';
                echo $tongTien;
            ?></p>
        </div>
        <a href="index.php?act=myBill" class = 'back'> 
            <div class="invoice-footer ab">
             Trở lại
            </div>
        </a>
    </div>

</body>
</html>

