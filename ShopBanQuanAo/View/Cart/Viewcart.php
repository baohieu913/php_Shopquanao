<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header h1 {
            margin-top: 0;
            background-color: #ee4d2d;
            color: white;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
        }

        .cart-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .cart-item {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        .cart-item img {
            max-width: 80px;
            max-height: 80px;
            margin-right: 10px;
        }

        .cart-item-details {
            flex-grow: 1;
        }

        .cart-item-details h3 {
            margin: 0;
        }

        .cart-item-details p {
            margin: 0;
            color: #888;
        }

        .quantity-input {
            width: 40px;
            padding: 5px;
            box-sizing: border-box;
        }

        .cart-item-remove {
            cursor: pointer;
            color: #e74c3c;
            text-decoration: none; 
            display: inline-block; 
        }

        .cart-item-total {
            font-weight: bold;
        }

        .cart-total {
            background-color: #ee4d2d;
            color: white;
            padding: 10px;
            text-align: right;
        }

        .cart-actions {
            padding: 10px;
            text-align: right;
        }

        .checkout-button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none; 
            display: inline-block; 
        }

        .cart-actions {
            display: flex;
            justify-content: space-between;
        }

        .cart-actions .delete-all {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e74c3c; 
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

    </style>
</head>
<body>

<header>
    <h1>Giỏ hàng</h1>
</header>


<div class="cart-container">
    
<?php 
    $i=0;
    foreach ($_SESSION['mycart'] as $cart) {
        extract($cart);
        $anhSPham = $img_path.$anhSP;
        //$spadd=[$maSP,$tenSP,$anhSP,$giaSP,$soLuong, $ttien];
        //var_dump($cart[3]);
        $giaTien = number_format($giaSP).'đ';
        //$tTienSP = number_format($cart[5]).'đ';

        echo ' <div class="cart-item">
                    <img src="'.$anhSPham.'" alt="Product 1">
                    <div class="cart-item-details">
                        <h3>'.$tenSP.'</h3>
                        <p>Giá: '.$giaTien.'</p>
                        <p>Số lượng: '.$soLuong.'</p>
                    </div>
                    <a href="index.php?act=delcart&idcart='.$i.'" class="cart-item-remove" >Xoá</a>
                </div>';
        $i += 1;
    }
?>

    <div class="cart-actions">
        
        <?php 
            if(is_array($_SESSION['mycart'])){
                $soLuong = count($_SESSION['mycart']);
            } else {
                $soLuong = 0;
            }

            if($soLuong > 0){
                echo ' <a href="index.php?act=delcart" class="delete-all" >Xoá giỏ hàng</a>';
                echo ' <a href="index.php?act=bill" class="checkout-button" >Mua sản phẩm</a>';
            } else {
                echo '<img src="./assets/img/no_cart.png" alt="" class="header__cart-no-cart-img">';
            }
        ?>
    </div>

</div>

</body>
</html>
