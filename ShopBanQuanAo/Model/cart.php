<?php 
function insert_hoadon($matk, $name, $diachi, $soDT, $email, $pttt, $ngaydathang, $tongdonhang){
    $sql ="insert into hoadon(maTK, tenHD, diachiHD, sodtHD, emailHD, ptttHD, ngaydathang, tongHD) values ($matk, '$name', '$diachi', '$soDT', '$email', $pttt, '$ngaydathang', $tongdonhang)";
    return my_mysqli_execute_return_lastInsertId($sql);
}

function insert_giohang($maTK, $maSP, $imgSP, $tenSP, $giaSP, $soLuong, $thanhTien, $maHD){
    $sql ="insert into giohang(maTK, maSP, imgSP, tenSP, giaSP, soLuong, thanhTien, maHD) values ($maTK, $maSP, '$imgSP', '$tenSP', $giaSP, $soLuong, $thanhTien, $maHD)";
    my_mysqli_execute($sql);
}

function delete_hoadon($maHD){
    $sql = "delete from hoadon where maHD=".$maHD;
    my_mysqli_execute($sql);
}

function loadOne_hoadon($maHD){
    $sql = "select * from hoadon where maHD=".$maHD;
    $hoadon = mysqli_query_one($sql);
    return $hoadon;
}

function loadAll_giohang($maHD){
    $sql = "select * from giohang where maHD=".$maHD;
    $hoadon = my_mysqli_query($sql);
    return $hoadon;
}

// Dùng chung cho cả lịch sử mua hàng của khách và hiển thị trong quản lý đơn hàng

function loadAll_hoadon_timkiem($key, $trangthai){
    $sql = "select * from hoadon where 1";
    if($key!=""){
        $sql.=" and tenHD like '%".$key."%'";
    }
    if($trangthai>-1){
        $sql.=" and trangthaiHD = ".$trangthai."";
    }
    
    $sql.=" order by maHD desc";
    $listHd = my_mysqli_query($sql);
    return $listHd;
}


function loadAll_hoadon($maTK){
    $sql = "select * from hoadon where 1 ";
    if($maTK>0){
        $sql .=" and maTK=".$maTK." order by maHD desc ";
    } else {
        $sql .=" order by maHD desc ";
    }
    $hoadon = my_mysqli_query($sql);
    return $hoadon;
}

function get_trangthaiDh($trangthaiHD){
    switch ($trangthaiHD) {
        case '-1':
            $tt="Đơn hàng đã bị huỷ";
            break;
        case '0':
            $tt="Đơn hàng mới";
            break;
        case '1':
            $tt="Đang xử lý";
            break;
        case '2':
            $tt="Đang giao hàng";
            break;
        case '3':
            $tt="Đã giao hàng";
            break;
        case '4':
            $tt="Khách hàng đã nhận";
            break;
        default:
            $tt="Đã hoàn tất";
            break;
    }
    return $tt;
}

// Khác func trên tại case 4
function get_trangthaiDh_KH($trangthaiHD){
    switch ($trangthaiHD) {
        case '-1':
            $tt="Đơn hàng đã bị huỷ";
            break;
        case '0':
            $tt="Đơn hàng mới";
            break;
        case '1':
            $tt="Đang xử lý";
            break;
        case '2':
            $tt="Đang giao hàng";
            break;
        case '3':
            $tt="Đã giao hàng";
            break;
        case '4':
            $tt="Đã nhận hàng";
            break;
        default:
            $tt="Đã hoàn tất";
            break;
    }
    return $tt;
}

function loadAll_giohang_count($maHD){
    $sql = "select * from giohang where maHD=".$maHD;
    $hoadon = my_mysqli_query($sql);
    return sizeof($hoadon);
}

function update_trangThai($maHD, $trangthai) {
    if($trangthai < 4 && $trangthai > -1){
        $trangthai += 1;
        $sql = "update hoadon set trangthaiHD =".$trangthai." where maHD =".$maHD;
        my_mysqli_execute($sql);
    }
}
// Cập nhật trạng thái đơn hàng kèm cập nhật số lượng khi huỷ đơn hàng
function cancel_Donhang($maHD) {
        $sql = "update hoadon set trangthaiHD = -1 where maHD =".$maHD;
        return_quantity($maHD);
        my_mysqli_execute($sql);
    
}
// Trả lại số lượng của sản phẩm khi huỷ đơn hàng
function return_quantity($maHD){
    $dsSP=loadAll_giohang($maHD);
    foreach ($dsSP as $ds) {
        extract($ds);
        $sql ="update sanpham set soLuong = (soLuong +".$soLuong.") where maSP=".$maSP;
        my_mysqli_execute($sql);  
    }
}

function loadAll_thongke(){
    $sql = "SELECT loaihang.tenLoai , COALESCE(COUNT(sanpham.maSP), 0) as countsp, COALESCE(MIN(sanpham.giaSP), 0) as minprice, COALESCE(MAX(sanpham.giaSP), 0) as maxprice, COALESCE(AVG(sanpham.giaSP), 0) as avgprice 
            from sanpham RIGHT JOIN loaihang ON sanpham.maLoai = loaihang.maLoai 
            WHERE loaihang.trangthaiLoai = 1 and sanpham.trangthaiSP = 1
            GROUP by loaihang.maLoai 
            ORDER BY loaihang.maLoai DESC";
    $dsLoai = my_mysqli_query($sql);
    return $dsLoai;
}

function loadAll_thongkeSLB(){
    $sql = "SELECT loaihang.tenLoai , COALESCE(SUM(soLuongban), 0) as soluongBan 
            from (SELECT sanpham.maLoai, sanpham.tenSP , SUM(giohang.soLuong) as soluongBan 
                from sanpham JOIN giohang on sanpham.maSP = giohang.maSP
                JOIN hoadon on hoadon.maHD = giohang.maHD
                WHERE hoadon.trangthaiHD <> -1 and sanpham.trangthaiSP <> 0
                GROUP by sanpham.maSP, sanpham.tenSP ORDER BY sanpham.maSP DESC) as T 
            RIGHT JOIN loaihang ON T.maLoai = loaihang.maLoai 
            WHERE loaihang.trangthaiLoai = 1  GROUP by loaihang.maLoai ORDER BY loaihang.maLoai DESC;";
    $dsLoai = my_mysqli_query($sql);
    return $dsLoai;
}

?>

