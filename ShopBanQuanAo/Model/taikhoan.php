<?php 
function insert_taikhoan($email, $tendangky,$password){
    $trangThai  = 1;
    $sql ="insert into taikhoan(email, userName, passWord, trangthaiTK) values ('$email', '$tendangky', '$password', $trangThai)";
    my_mysqli_execute($sql);
}

function insert_taikhoan_admin($email, $tendangky, $password, $tennguoidung, $diachi, $sodienthoai, $quyen, $trangThai){
    $sql ="insert into taikhoan(email, userName, passWord, tenNguoidung, address, soDT, quyen, trangthaiTK) values ('$email', '$tendangky', '$password', '$tennguoidung', '$diachi', '$sodienthoai', $quyen, $trangThai)";
    my_mysqli_execute($sql);
}

function update_taikhoan($maTK, $email, $tendangky, $password, $tennguoidung, $diachi, $sodienthoai, $quyen, $trangThai){
    $sql ="update taikhoan set email='".$email."', userName='".$tendangky."', passWord='".$password."', tennguoidung ='".$tennguoidung."', address='".$diachi."', soDT='".$sodienthoai."', quyen=".$quyen.", trangthaiTK = ".$trangThai." where maTK=".$maTK;
    my_mysqli_execute($sql);
}

function delete_taikhoan($maTK){
    $sql ="update taikhoan set trangthaiTK = 0 where maTK=".$maTK;
    my_mysqli_execute($sql);
}

function check_user($tendangnhap, $password){
    $sql = "select * from taikhoan where userName='".$tendangnhap."' and passWord='".$password."'";
    $sanpham = mysqli_query_one($sql);
    return $sanpham;
}

function check_email($email){
    $sql = "select * from taikhoan where email='".$email."'";
    $sanpham = mysqli_query_one($sql);
    return $sanpham;
}

function loadAll_taikhoan($key, $quyenhan){
    $sql = "select * from taikhoan where userName <> 'Admin' ";
    if($key!=""){
        $sql.=" and tenNguoidung like '%".$key."%'";
    }
    if($quyenhan>-1){
        $sql.=" and quyen = ".$quyenhan."";
    }
    
    $sql.=" order by maTK desc";
    $listSp = my_mysqli_query($sql);
    return $listSp;
}

function loadOne_taikhoan($maTK){
    $sql = "select * from taikhoan where maTK=".$maTK;
    $taikhoan = mysqli_query_one($sql);
    return $taikhoan;
}

function check_taikhoan($email, $username){
    $sql = "select * from taikhoan where email='".$email."' or userName = '".$username."'";
    $dm = mysqli_query_one($sql);
    return $dm;
}

function check_taikhoan_update($maTK, $email, $username){
    $sql = "select * from taikhoan where (email='".$email."' or userName = '".$username."') and maTK <>".$maTK;
    $dm = mysqli_query_one($sql);
    return $dm;
}

?>