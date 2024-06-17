<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê loại sản phẩm</title>
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
    </style>
</head>
<body>

<div class="cart-info">
    <h2>Thống kê loại sản phẩm</h2>
    <table>
        <thead>
            <tr>
                <th>Số thứ tự</th>
                <th>Loại hàng</th>
                <th>Số lượng</th>
                <th>Giá cao nhất</th>
                <th>Giá thấp nhất</th>
                <th>Giá trung bình</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                foreach ($dsLoai as $loai) {
                    extract($loai); 
                    $avgprice=(int)$avgprice; 
                    $avgprice = number_format($avgprice).'đ';    
                    $maxprice = number_format($maxprice).'đ';    
                    $minprice = number_format($minprice).'đ';    
                    echo '  <tr>
                                <td>'.$i.'</td>
                                <td>'.$tenLoai.'</td>
                                <td>'.$countsp.'</td>
                                <td>'.$maxprice.'</td>
                                <td>'.$minprice.'</td>
                                <td>'.$avgprice.'</td>
                            </tr>';
                    $i += 1;
                }
            ?>
            
        </tbody>
    </table>

    <div class="place-order-btn-container">
        <a href="index.php?act=bieuDo" class="place-order-btn" >Xem biểu đồ</a>
    </div>
</div>

</body>
</html>
