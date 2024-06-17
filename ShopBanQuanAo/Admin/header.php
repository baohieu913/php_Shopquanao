<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Admin Dashboard</title>

</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
</header>

<nav>
    <a href="index.php?act=qlDm">Quản lý danh mục</a>
    <a href="index.php?act=qlSp">Quản lý sản phẩm</a>
    <a href="index.php?act=qlHd">Quản lý đơn hàng</a>
    <?php 
        $tk = $_SESSION['user'];
        extract($tk);
        // $quyen == 2
        if($quyen == 2){
            echo '  <a href="index.php?act=qlTk">Quản lý tài khoản</a>
                    <a href="index.php?act=tke">Thống kê</a>';
        }
    ?>

    
</nav>