<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý loại sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow-y: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            
        }

        .action-buttons a {
            display: inline-block;
            margin-right: 5px;
            padding: 5px 10px;
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            border: 1px solid #4caf50;
            border-radius: 4px;
        }

        .action-buttons a.edit {
            background-color: #2196F3;
            border: 1px solid #2196F3;
        }

        .action-buttons a.delete {
            background-color: #f44336;
            border: 1px solid #f44336;
        }

        .action-buttons a.add {
            background-color: #008CBA;
            border: 1px solid #008CBA;
        }

        .scrollable-table {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>
<body>

<h2>Danh sách loại sản phẩm</h2>

<div class="action-buttons">
    <a href="index.php?act=addDm" class="add">Thêm mới danh mục</a>
</div>

<div class="scrollable-table">
    <table>
        <thead>
            <tr>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Thương hiệu</th>
                <th>Xuất xứ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
             
            
            foreach ($listDm as $danhMuc) {
                extract($danhMuc);
                $suaDm = "index.php?act=suaDm&maLoai=".$maLoai;
                $xoaDm = "index.php?act=xoaDm&maLoai=".$maLoai;
                echo   '<tr>
                            <td>'.$maLoai.'</td>
                            <td>'.$tenLoai.'</td>
                            <td>'.$thuongHieu.'</td>
                            <td>'.$xuatXu.'</td>
                            <td class="action-buttons">
                                <a href="'.$suaDm.'" class="edit">Sửa</a>';
                                if($trangthaiLoai == 1){
                                    echo '<a href="'.$xoaDm.'" class="delete">Xoá</a>';
                                }
                echo        '</td>
                        </tr>';
            }

            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
        
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
