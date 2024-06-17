<?php 
// Số sản phẩm hiển thị
$num_row_of_page = 10;


function insert_sanpham($tenSP, $giaSP, $anhSP, $moTa, $soLuong, $maLoai, $trangThai){
    $sql ="insert into sanpham(tenSP, giaSP, anhSP, moTa, soLuong, maLoai, trangthaiSP) values ('$tenSP', $giaSP, '$anhSP', '$moTa', $soLuong, $maLoai, $trangThai)";
    my_mysqli_execute($sql);
}

function update_sanpham($maSP, $tenSP, $giaSP, $anhSP, $moTa, $soLuong, $maLoai, $trangThai) {
    if($anhSP!=""){
        $sql ="update sanpham set tenSP='".$tenSP."', giaSP=".$giaSP.", anhSP='".$anhSP."', moTa='".$moTa."', soLuong =".$soLuong.", maLoai =".$maLoai.", trangthaiSP =".$trangThai." where maSP=".$maSP;
    } else {
        $sql ="update sanpham set tenSP='".$tenSP."', giaSP=".$giaSP.", moTa='".$moTa."', soLuong =".$soLuong.", maLoai =".$maLoai.", trangthaiSP =".$trangThai." where maSP=".$maSP;
    }
    my_mysqli_execute($sql);  
}

// Giảm số lượng khi confirmHD
function update_sanpham_Confirm($maSP, $soLuong) {
    $sql ="update sanpham set soLuong = (soLuong -".$soLuong.") where maSP=".$maSP;
    my_mysqli_execute($sql);  
}

function update_sanpham_Quantity($maSP, $soLuong) {
    $sql ="update sanpham set soLuong = (soLuong +".$soLuong.") where maSP=".$maSP;
    my_mysqli_execute($sql);  
}

function delete_sanpham($maSP){
    $sql ="update sanpham set trangthaiSP = 0 where maSP=".$maSP;
    my_mysqli_execute($sql);  
}

function loadAll_sanpham_trangchu($page, $sapxep){
    // chưa có $page thì xử lý ngoài index

    // Số bản ghi trên mỗi trang
    global $num_row_of_page;
    // Bản ghi bắt đầu
    $start = $num_row_of_page * ($page - 1);
    switch ($sapxep) {
        case "banChay":
            // Do số lượng bán được tính từ bảng giỏ hàng (Phải lấy những giỏ hàng không thuộc về đơn hàng đã bị huỷ)
            // Lấy những giỏ hàng không thuộc về hoá đơn bị huỷ
            // Join bảng sản phẩm vào và lấy những sản phẩm có trạng thái hoạt động và có số lượng > 0
            $sql = "SELECT sanpham.*, COALESCE(sum(T.soluong), 0) as soluongBan FROM sanpham LEFT JOIN (SELECT maSP, soLuong from giohang  JOIN hoadon on giohang.maHD = hoadon.maHD 
            WHERE hoadon.trangthaiHD <> -1) as T on sanpham.maSP = T.maSP
            WHERE sanpham.trangthaiSP <> 0 and sanpham.soLuong > 0
            GROUP BY sanpham.maSP
            ORDER BY soluongBan DESC limit ".$start.",".$num_row_of_page;
            break;
            
        case "moiNhat":
            $sql = "select * from sanpham where soLuong > 0 and sanpham.trangthaiSP <> 0 order by maSP desc limit ".$start.",".$num_row_of_page;
            break;
    
        case "giathapdencao":
            $sql = "select * from sanpham where soLuong > 0 and sanpham.trangthaiSP <> 0 order by giaSP asc limit ".$start.",".$num_row_of_page;
            break;
    
        case "giacaodenthap":
            $sql = "select * from sanpham where soLuong > 0 and sanpham.trangthaiSP <> 0 order by giaSP desc limit ".$start.",".$num_row_of_page;
            break;
    
        default:
            $sql = "select * from sanpham where soLuong > 0 and sanpham.trangthaiSP <> 0 limit ".$start.",".$num_row_of_page;
            break;
    }
    
    $listSp = my_mysqli_query($sql);
    return $listSp;
    
}

function numpage_sanpham_trangchu(){
    // chưa có $page thì xử lý ngoài index

    // Số bản ghi trên mỗi trang
    global $num_row_of_page;
    // Bản ghi bắt đầu
    $sql = "select * from sanpham where soLuong > 0 and sanpham.trangthaiSP <> 0 order by maSP desc";
    $listSp = my_mysqli_query($sql);
    $total_page = ceil(count($listSp)/$num_row_of_page);
    return $total_page;
}

function loadAll_sanpham_theoloai($page, $maLoai){
    // Số bản ghi trên mỗi trang
    global $num_row_of_page;
    // Bản ghi bắt đầu
    $start = $num_row_of_page * ($page - 1);
    $sql = "select * from sanpham where soLuong > 0 and sanpham.trangthaiSP <> 0 and maLoai=".$maLoai." order by maSP desc limit ".$start.",".$num_row_of_page;;
    
    $listSp = my_mysqli_query($sql);
    return $listSp;
}

function numpage_sanpham_theoloai($maLoai){
    // chưa có $page thì xử lý ngoài index

    // Số bản ghi trên mỗi trang
    global $num_row_of_page;
    // Bản ghi bắt đầu
    $sql = "select * from sanpham where soLuong > 0 and sanpham.trangthaiSP <> 0 and maLoai=".$maLoai." order by maSP desc";
    $listSp = my_mysqli_query($sql);
    $total_page = ceil(count($listSp)/$num_row_of_page);
    return $total_page;
}

function loadAll_sanpham_timkiem($page, $key){
    // Số bản ghi trên mỗi trang
    global $num_row_of_page;
    // Bản ghi bắt đầu
    $start = $num_row_of_page * ($page - 1);
    $sql = "select * from sanpham where soLuong > 0 and sanpham.trangthaiSP <> 0 and tenSP like '%".$key."%' order by maSP desc limit ".$start.",".$num_row_of_page;;
    
    $listSp = my_mysqli_query($sql);
    return $listSp;
}

function numpage_sanpham_timkiem($key){
    // chưa có $page thì xử lý ngoài index

    // Số bản ghi trên mỗi trang
    global $num_row_of_page;
    // Bản ghi bắt đầu
    $sql = "select * from sanpham where sanpham.trangthaiSP <> 0 and soLuong > 0 and tenSP like '%".$key."%' order by maSP desc";
    $listSp = my_mysqli_query($sql);
    $total_page = ceil(count($listSp)/$num_row_of_page);
    return $total_page;
}

function loadAll_sanpham($key, $maLoai){
    $sql = "select * from sanpham where 1";
    if($key!=""){
        $sql.=" and tenSP like '%".$key."%'";
    }
    if($maLoai>0){
        $sql.=" and maLoai = ".$maLoai."";
    }
    $sql.=" order by maSP desc";
    $listSp = my_mysqli_query($sql);
    return $listSp;
}

function loadOne_sanpham($maSP){
    $sql = "select * from sanpham where maSP=".$maSP;
    $sanpham = mysqli_query_one($sql);
    return $sanpham;
}

function check_sanpham($tenSP, $maSP){
    $sql = "select * from sanpham where tenSP='".$tenSP."' and maSP <> '".$maSP."'";
    $dm = mysqli_query_one($sql);
    return $dm;
}

function loadSLB_sanpham($maSP){
    $sql = "SELECT SUM(giohang.soLuong) as soluongBan 
    from sanpham JOIN giohang on sanpham.maSP = giohang.maSP 
    JOIN hoadon on hoadon.maHD = giohang.maHD
    WHERE sanpham.maSP = ".$maSP." and hoadon.trangthaiHD <> -1  GROUP by sanpham.maSP, sanpham.tenSP ORDER BY sanpham.maSP DESC";
    $dm = mysqli_query_one($sql);
    return $dm;
}

function loadOne_chitietDH($maHD){
    $sql = "select * from hoadon where maHD ='".$maHD."'";
    $hd =  mysqli_query_one($sql);
    return $hd;
}


?>