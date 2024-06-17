<?php 


function insert_danhmuc($tenLoai, $thuongHieu, $xuatXu, $trangThai){
    $sql ="insert into loaihang(tenLoai, thuongHieu, xuatXu, trangthaiLoai) values ('$tenLoai', '$thuongHieu', '$xuatXu', $trangThai)";
    my_mysqli_execute($sql);
}

function update_danhmuc($maLoai, $tenLoai, $thuongHieu, $xuatXu, $trangThai) {
    $sql ="update loaihang set tenLoai='".$tenLoai."', thuongHieu = '".$thuongHieu."', xuatXu = '".$xuatXu."', trangthaiLoai = ".$trangThai." where maLoai=".$maLoai;
    my_mysqli_execute($sql);  
}

function delete_danhmuc($maLoai){
    $sql ="update loaihang set trangthaiLoai = 0 where maLoai=".$maLoai;
    my_mysqli_execute($sql); 

    $sql ="update sanpham set trangthaiSP = 0 where maLoai=".$maLoai;
    my_mysqli_execute($sql);  
}

function loadAll_danhmuc(){
    $sql = "select * from loaihang order by maLoai desc";
    $listDm = my_mysqli_query($sql);
    return $listDm;
}

function loadOne_danhmuc($maLoai){
    $sql = "select * from loaihang where maLoai=".$maLoai;
    $dm = mysqli_query_one($sql);
    return $dm;
}

function check_danhmuc($tenLoai, $maLoai){
    $sql = "select * from loaihang where tenLoai='".$tenLoai."' and maLoai <> ".$maLoai;
    $dm = mysqli_query_one($sql);
    return $dm;
}



?>