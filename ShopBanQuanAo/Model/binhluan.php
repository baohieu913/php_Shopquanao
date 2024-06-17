<?php 
function loadAll_bl($maSP){
    $sql = "select a.*,b.tenNguoidung from binhluan a,taikhoan b where  a.maTK=b.maTK and a.tinhtrang = 1 and a.maSP = '".$maSP."'";
    $bl = my_mysqli_query($sql);
    return $bl; 
}

function loadALL_bl1($maSP){
    $sql = "select * from binhluan where maTK = -1 and tinhtrang = 1 and maSP = '".$maSP."'";
    $bl = my_mysqli_query($sql);
    return $bl; 
}


function loadALL_bl_admin($maSP){
    $sql = "select * from binhluan where maSP = '".$maSP."'";
    $bl = my_mysqli_query($sql);
    return $bl; 
}

function insert_bl($maTK, $maSP, $noidung){
    $sql ="insert into binhluan(maTK, maSP, noidung, tinhtrang) values ($maTK, $maSP,'".$noidung."', 0 )";
    my_mysqli_execute($sql);
}
function update_blh($maBL) {
    $sql ="update binhluan set tinhtrang = '1' where maBL=".$maBL;
    my_mysqli_execute($sql);  
}
function update_bla($maBL) {
    $sql ="update binhluan set tinhtrang = '0' where maBL=".$maBL;
    my_mysqli_execute($sql);  
}

function delete_bl($mabl){
    $sql = "delete from binhluan where maBL =".$mabl;
    my_mysqli_execute($sql);
}
?>