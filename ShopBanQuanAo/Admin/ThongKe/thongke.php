<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <style>

        .statistics-container {
            display: flex;
            justify-content: space-evenly;
            margin-top: 32px;
        }

        .statistics-link {
            padding: 15px 25px;
            text-decoration: none;
            color: #fff;
            background-color: #4caf50;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .statistics-link:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="statistics-container">
    <a href="index.php?act=thongKe" class="statistics-link">Thống kê số lượng sản phẩm</a>
    <a href="index.php?act=thongKeSLB" class="statistics-link">Thống kê số lượng bán</a>
</div>

</body>
</html>
