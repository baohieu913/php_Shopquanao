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
        
        .cart-total {
            font-size: 16px;
            font-weight: 500;
            padding: 10px;
            text-align: right;
        }
    </style>
</head>
<body>
<form action="index.php?act=billconfirm" method="post">
    <div class="form-container">
        <h2>Thông tin đặt hàng</h2>
        <?php 
            if(isset($_SESSION['user'])){
                //var_dump($_SESSION['user']);
                $name=$_SESSION['user']['tenNguoidung'];
                $address=$_SESSION['user']['address'];
                $email=$_SESSION['user']['email'];
                $tel=$_SESSION['user']['soDT'];
            } else {
                $name="";
                $address="";
                $email="";
                $tel="";          
            }
        
        ?>
        
            <label for="customerName">Người đặt hàng:</label>
            <input type="text" id="customerName" name="name" required value="<?=$name?>">

            <label for="customerAddress">Địa chỉ:</label>
            <input type="text" id="customerAddress" name="address" required value="<?=$address?>">

            <label for="customerEmail">Email:</label>
            <input type="email" id="customerEmail" name="email" required value="<?=$email?>">

            <label for="customerPhone">Điện thoại:</label>
            <input type="tel" id="customerPhone" name="phone" required value="<?=$tel?>">
        
    </div>

    <div class="payment-method">
        <h2>Phương thức thanh toán</h2>
        
            <label>
                <input type="radio" name="payment" value="1" checked>
                Trả tiền khi nhận hàng
            </label>

            <label>
                <input type="radio" name="payment" value="2">
                Chuyển khoản ngân hàng
            </label>
        
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
                    $tong=0;
                    $i=0;
                    foreach ($_SESSION['mycart'] as $cart) {
                        extract($cart);
                        $anhSPham = $img_path.$anhSP;
                        //$spadd=[$maSP,$tenSP,$anhSP,$giaSP,$soLuong, $ttien];
                        //var_dump($cart[3]);
                        $giaTien = number_format($giaSP).'đ';
                        $thanhTien = $giaSP*$soLuong;
                        $tt = number_format($thanhTien).'đ';
                        $tong += $thanhTien;
                        
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
        <?php 
            $tongTien = number_format($tong).'đ';
            echo '  <div class="cart-total">
                        <p>Tổng đơn hàng: '.$tongTien.'</p>
                    </div>';
        ?>

        <div class="place-order-btn-container">
            <input type="hidden" name="tongdonhang" value="<?=$tong?>"></input>
            <input type="submit" class="place-order-btn" name="taodonhang" value="Xác nhận thanh toán"></input>
        </div>
    </div>
</form>


</body>
</html>
