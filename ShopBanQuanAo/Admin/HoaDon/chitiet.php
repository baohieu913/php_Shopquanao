<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <style>
        
        .cart-info h2{
            margin-top: 0;
            background-color: #ee4d2d;
            color: white;
            padding: 10px;
            border-radius: 4px;
        }

        .cart-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .cart-info table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cart-info th, .cart-info td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .cart-info td {
            background-color: #f2f2f2;
        }

        .cart-info .place-order-btn-container {
            text-align: right;
            margin-top: 20px;
        }

        .place-order-btn {
            background-color: #ee4d2d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        table img {
            max-width: 50px; 
            height: auto;
        }
    </style>
</head>
<body>

<div class="cart-info">
    <h2>Thông tin giỏ hàng</h2>
    <table>
        <thead>
            <tr>
                <th>Số thứ tự</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                    $i=0;
                    foreach ($listGh as $cart) {
                        extract($cart);
                        //$spadd=[$maSP,$tenSP,$anhSP,$giaSP,$soLuong, $ttien];
                        //var_dump($cart[3]);
                        //$giaTien = number_format($cart[3]).'đ';
                        //$tTienSP = number_format($cart[5]).'đ';
                        $imgSP = "../Upload/".$imgSP;
                        $donGia = number_format($giaSP).'đ';
                        $tt = number_format($thanhTien).'đ';

                        echo '  <tr>
                                    <td>'.($i+1).'</td>
                                    <td><img src="'.$imgSP.'" alt="Product 1"></td>
                                    <td>'.$tenSP.'</td>
                                    <td>'.$donGia.'</td>
                                    <td>'.$soLuong.'</td>
                                    <td>'.$tt.'</td>
                                </tr>  ';
                        $i += 1;
                    }
                
            
            ?>
        </tbody>
    </table>
    <?php
        extract($hoaDon);
        $maHD = $_GET['maHD'];
        $tt = $trangthaiHD;
        if($trangthaiHD > -1){
            $trangthaiHD += 1;
        }
        $trangThai=get_trangthaiDh($trangthaiHD);
    ?>
    <div class="place-order-btn-container">
        <a href="index.php?act=xulyHd&trangthai=<?=$tt?>&maHD=<?=$maHD?>" class="place-order-btn" ><?=$trangThai?></a>
    </div>
</div>

</body>
</html>
