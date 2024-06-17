<?php 
    extract($sanpham);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }

        .product-detail {
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;

        }

        .product-detail img {
            max-width: 30%;
            height: auto;
            border-radius: 8px;
            margin-right: 20px;
        }

        .product-info {
            flex-grow: 1;
        }

        .product-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .product-info p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .quantity-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .quantity-container label {
            margin-right: 10px;
        }

        .quantity-input {
            width: 50px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .quantity-btn {
            padding: 8px 12px;
            background-color: #ee4d2d;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        .quantity-btn:hover {
            background-color: #ee4d2d;
        }

        .product-info a,
        .buy-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #ee4d2d;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .product-info a:hover {
            background-color: #ee4d2d;
        }

        .product-info [type="submit"] {
            display: inline-block;
            padding: 10px 15px;
            background-color: #ee4d2d;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .product-info [type="submit"]:hover {
            background-color: #ee4d2d;
        }
                
        .comment-section {
            max-width: 600px;
            margin: 20px auto 20px 0;
            font-size: 1.4rem;
        }

        .comment-header h1 {
            margin: 0;
        }

        .comment-list {
            margin-top: 20px;
        }

        .comment-table {
            width: 100%;
            border-collapse: collapse;
        }

        .comment-user {
            font-weight: bold;
        }

        .comment-date,
        .comment-blank {
            color: #888;
        }

        .comment-content {
            padding-top: 5px;
            margin-bottom: 22px;
            display: block;
        }

        .comment-form {
            margin-top: 20px;
        }

        .comment-form input[type="text"] {
            width: 70%;
            padding: 8px;
            box-sizing: border-box;
            margin-right: 10px;
            border-radius: 3px;
        }

        .comment-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }

        .comment-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        #sellNumber {
            float: right;
            color: #808080;
            margin-top: -20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="product-detail">
        <?php 
            $loai=loadOne_danhmuc($maLoai);
            extract($loai);
            // Số lượng bán
            $soLuongban=loadSLB_sanpham($maSP);
            if(is_array($soLuongban)){
                extract($soLuongban);
            } else {
                $soluongBan = 0;
            }
            
            //
            $anhSPham = $img_path.$anhSP;
            $giaSPham = $giaSP;
            $giaTienSP = number_format($giaSPham).'đ';
            echo '  
                    <img src="'.$anhSPham.'" alt="Product Image">
                    <div class="product-info">
                        <p id="sellNumber">'.$soluongBan.' | Đã bán</p>
                        <h2>'.$tenSP.'</h2>
                        <p>Số Lượng: '.$soLuong.'</p>
                        <p>Giá: '.$giaTienSP.'</p>
                        <p>Loại:'.$tenLoai.'</p>
                        
                        <form action="index.php?act=addtocart" method="post">
                            <input type="hidden" name="maSP" value="'.$maSP.'">
                            <input type="hidden" name="tenSP" value="'.$tenSP.'">
                            <input type="hidden" name="anhSP" value="'.$anhSPham.'">
                            <input type="hidden" name="giaSP" value='.$giaSP.'>
                            <div class="quantity-container">
                                <label for="quantity">Số Lượng Muốn Mua:</label>
                                <input type="number" id="quantity" name="quantity" class="quantity-input" value="1" min="1" max="'.$soLuong.'">
                            </div>
                            <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                        </form>
                        
                    </div>';
        
        ?>
    </div>
    <div class="comment-section">
    <div class="comment-header">
        <h1>Bình luận</h1>
    </div>
    <div class="comment-list">
        <table class="comment-table">
            <?php
            $comments =  loadAll_bl($maSP);

            foreach ($comments as $comment) {
                extract($comment);
                
                echo '<tr>
                        <td class="comment-user">' . $tenNguoidung . ':</td>
                        <td class="comment-date">' . $ngaybl . '</td>
                    </tr>';
                echo '<tr>
                        <td class="comment-content">' . $noidung . '</td>
                    </tr>';
            }
            $comments1 = loadALL_bl1($maSP);

            foreach ($comments1 as $comment) {
                extract($comment);
                
                echo '<tr>
                        <td class="comment-user">Ẩn danh:</td>
                        <td class="comment-date">' . $ngaybl . '</td>
                    </tr>';
                echo '<tr>
                        <td class="comment-content">' . $noidung . '</td>
                    </tr>';
            }
            ?>
        </table>
    </div>
    <div class="comment-form">
        <form action="index.php?act=binhluanact" method="post">
            <div>
                <input type="hidden" name="maSP" value="<?php echo $maSP ?>">
                <input type="text" name="noidung" placeholder="Viết bình luận ..." required>
                <input type="submit" name="binhluan" value="Bình luận">
            </div>
        </form>
    </div>
    <?php  
    if(isset($thongbao)){
        echo $thongbao;
    }
?>
</div>


</div>

</body>
</html>

