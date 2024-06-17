<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <style>

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;

            padding: 10px;
            border-radius: 4px;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
        .payment-method h2,
        .cart-info h2,
        .form-container h2 {
            margin-top: 0;
            background-color: #ee4d2d;
            color: white;
            padding: 10px;
            border-radius: 4px;
        }

        .payment-method {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .payment-method label {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
        }

        .payment-method input {
            margin-right: 10px;
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
        .order-date,
        .cart-total {
            font-size: 16px;
            font-weight: 500;
            padding: 10px;
            text-align: center;
        }

        .form-container div,
        .payment-method div {
            margin-bottom: 10px;
        }

        .form-container div label,
        .payment-method div label {
            display: block;
            margin-bottom: 5px;
            padding: 10px;
            border-radius: 4px;
        }

        .form-container div p,
        .payment-method div p {
            margin: 0;
            padding: 10px;
            border-radius: 4px;
        }

        .order-code-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .order-code {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
<?php
    if(isset($hoadon)&&is_array($hoadon)){
        extract($hoadon);
        $tongTien = number_format($tongHD).'đ';
    }
?>


<div class="order-code-container">
    <p class="order-code">Mã đơn hàng: MDH<?=$maHD?></p>
</div>
<div class="order-date">
    <p>Ngày đặt hàng: <?=$ngaydathang?></p>
</div>
<div class="cart-total">
    <p>Tổng đơn hàng: <?=$tongTien?></p>
</div>



<div class="form-container">
    <h2>Thông tin đặt hàng</h2>
    
    <div>
        <label for="customerName">Người đặt hàng:</label>
        <p><?=$tenHD?></p>
    </div>

    <div>
        <label for="customerAddress">Địa chỉ:</label>
        <p><?=$diachiHD?></p>
    </div>

    <div>
        <label for="customerEmail">Email:</label>
        <p><?=$emailHD?></p>
    </div>

    <div>
        <label for="customerPhone">Điện thoại:</label>
        <p><?=$sodtHD?></p>
    </div>
</div>

<div class="payment-method">
    <h2>Phương thức thanh toán</h2>
    <div>
        <label>
            <input type="radio" name="paymentMethod" value="cashOnDelivery" <?php if($hoadon['ptttHD']==1){echo "checked";} ?> disabled>
            Trả tiền khi nhận hàng
        </label>
    </div>

    <div>
        <label>
            <input type="radio" name="paymentMethod" value="bankTransfer" <?php if($hoadon['ptttHD']==2){echo "checked";} ?> disabled>
            Chuyển khoản ngân hàng
        </label>
    </div>
</div>



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
                foreach ($listGH as $cart) {
                    extract($cart);
                    $anhSPham = $img_path.$imgSP;
                    $giaTien = number_format($giaSP).'đ';
                    $thanhTien = $giaSP*$soLuong;
                    $tt = number_format($thanhTien).'đ';
                    
                    echo '  <tr>
                                <td>'.($i+1).'</td>
                                <td><img src="'.$anhSPham.'" alt="Product 1"></td>
                                <td>'.$tenSP.'</td>
                                <td>'.$giaTien.'</td>
                                <td>'.$soLuong.'</td>
                                <td>'.$tt.'</td>
                            </tr>  ';
                    $i += 1;
                }
                
            
            ?>
            
        </tbody>
    </table>
    

    <div class="place-order-btn-container">
        <a href="index.php" class="place-order-btn" >Hoàn tất thanh toán</a>
    </div>
</div>



</body>
</html>
