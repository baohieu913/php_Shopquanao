<?php 
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['user']["quyen"] == 0){
        echo '<script>window.location.href = "../index.php?act=dangnhap";</script>';     
    }
    include "../Model/mysqli.php";
    include "../Model/danhmuc.php";
    include "../Model/sanpham.php";
    include "../Model/taikhoan.php";
    include "../Model/cart.php";
    include "../Model/binhluan.php";

    include "header.php";
    // Controller
    
    if(isset($_GET['act'])){
        $action = $_GET['act'];
        switch ($action) {

            // Controller LoaiHang: Phần dành cho xử lý danh mục (Loại sản phẩm, Loại hàng)
            case 'qlDm':  
                $listDm = loadAll_danhmuc();
                include "DanhMuc/list.php";
                break;
            case 'addDm':
                if(isset($_POST['themloai'])){
                    $maAdd = -1;
                    $check=check_danhmuc($_POST["tenLoai"], $maAdd);   
                    if(is_array($check)){
                        $thongbao = "Danh mục đã tồn tại!";
                    } else {
                        insert_danhmuc($_POST["tenLoai"], $_POST['thuongHieu'], $_POST['xuatXu'], $_POST['trangThai']);
                        $thongbao = "Thêm thành công!";
                    }                
                }
                include "DanhMuc/add.php";
                break;
            case 'suaDm':
                $dm = loadOne_danhmuc($_GET['maLoai']);
                include "DanhMuc/update.php";
                break;
            case 'sua_action_Dm':
                if(isset($_POST['sualoai'])){
                    $check=check_danhmuc($_POST["tenLoai"], $_GET["maLoai"]);   
                    if(is_array($check)){
                        $thongbao = "Tên danh mục đã tồn tại!";
                    } else {
                        update_danhmuc($_GET["maLoai"], $_POST["tenLoai"], $_POST["thuongHieu"], $_POST["xuatXu"], $_POST['trangThai']);             
                        $thongbao = "Sửa thành công!";
                    }    
                }
                $listDm = loadAll_danhmuc();
                include "DanhMuc/list.php";
                break;
            case 'xoaDm':
                delete_danhmuc($_GET['maLoai']);
                $thongbao = "Ngừng cung cấp danh mục thành công!";
                $listDm = loadAll_danhmuc();
                include "DanhMuc/list.php";
                break;
            // End Controller: Kết thúc xử lý danh mục (Loại sản phẩm, Loại hàng)

            // Controller SanPham
            case 'qlSp':  
                if(isset($_POST['timkiem'])){
                    $key = $_POST['key'];
                    $maLoai = $_POST['maLoai'];
                }else {
                    $key = '';
                    $maLoai = 0;
                }
                $listDm=loadAll_danhmuc();
                $listSp = loadAll_sanpham($key, $maLoai);
                include "SanPham/list.php";
                break;

            case 'addSp':
                if(isset($_POST['themsanpham'])){ 
                    $target_dir = "../Upload/";
                    $target_file =   $target_dir.basename($_FILES["anhSP"]["name"]);
                    $tenSP=$_POST['tenSP'];
                    // Khi thêm thì không cần tìm những tên trùng khác mã hiện tại => chỉ cần KT tên
                    $maSP = -1;
                    $check=check_sanpham($tenSP,$maSP);
                    if(is_array($check)){
                        $thongbao = "Sản phẩm đã tồn tại!";
                    }else {
                        move_uploaded_file($_FILES["anhSP"]["tmp_name"], $target_file);
                        insert_sanpham($_POST['tenSP'], $_POST['giaSP'], $_FILES["anhSP"]["name"], $_POST['moTa'], $_POST['soLuong'], $_POST['loaiSP'], $_POST['trangThai']);
                        $thongbao = "Thêm thành công!";         
                    }
                }
                $listDm=loadAll_danhmuc();
                include "SanPham/add.php";
                break;
            case 'suaSp':

                $dm = loadOne_sanpham($_GET['maSP']);
                $listDm=loadAll_danhmuc();
                include "SanPham/update.php";
                break;
                
            case 'sua_action_Sp':
                if(isset($_POST['suasanpham'])){
                    $target_dir = "../Upload/";
                    $target_file =   $target_dir . basename($_FILES["anhSP"]["name"]);
                    $tenSP=$_POST['tenSP'];
                    $check=check_sanpham($tenSP, $_GET['maSP']);
                    if(is_array($check)){
                        $thongbao = "Sản phẩm đã tồn tại!";
                    }else {
                        move_uploaded_file($_FILES["anhSP"]["tmp_name"], $target_file);
                        update_sanpham($_GET['maSP'], $_POST['tenSP'], $_POST['giaSP'], $_FILES["anhSP"]["name"], $_POST['moTa'], $_POST['soLuong'], $_POST['loaiSP'], $_POST['trangThai']);
                        $thongbao = "Cập nhật thành công!";         
                    }            
                }
                if(isset($_POST['timkiem'])){
                    $key = $_POST['key'];
                    $maLoai = $_POST['maLoai'];
                }else {
                    $key = '';
                    $maLoai = 0;
                }
                $listDm=loadAll_danhmuc();
                $listSp = loadAll_sanpham($key, $maLoai);
                include "SanPham/list.php";
                break;
            case 'xoaSp':
                $thongbao = "Dừng bán sản phẩm thành công!";
                delete_sanpham($_GET['maSP']);
                if(isset($_POST['timkiem'])){
                    $key = $_POST['key'];
                    $maLoai = $_POST['maLoai'];
                }else {
                    $key = '';
                    $maLoai = 0;
                }
                $listDm=loadAll_danhmuc();
                $listSp = loadAll_sanpham($key, $maLoai);
                include "SanPham/list.php";
                break;
            //quản lý bình luận
            case 'blsp':
                $bl=loadALL_bl_admin($_GET['maSP']);
                include "binhluan/kiemduyetbl.php";
                break;

            case 'anhien':
                if(isset($_POST['hien'])){
                    $mabl = $_POST['maBL'];
                    update_blh($mabl);
                    $thongbao = "Hiển thị bình luận thành công!";
                }
                if(isset($_POST['an'])){
                    $mabl = $_POST['maBL'];
                    update_bla($mabl);
                    $thongbao = "Ẩn bình luận thành công!";
                }
                if(isset($_POST['xoa'])){
                    $mabl = $_POST['maBL'];
                    delete_bl($mabl);
                    $thongbao = "Xóa bình luận thành công!";
                }
                
                $bl=loadALL_bl_admin($_POST['maSP']);
                include "binhluan/kiemduyetbl.php";
                break;
            

            case 'themSl':
                
                include "SanPham/add_quantity.php";
                break;
            case 'themSl_action':
                if(isset($_POST['themSl'])){
                    $maSP = $_POST['maSP'];
                    $soLuong = $_POST['soLuong'];
                    update_sanpham_Quantity($maSP, $soLuong);
                    echo 'Thêm số lượng thành công!';
                }
                if(isset($_POST['timkiem'])){
                    $key = $_POST['key'];
                    $maLoai = $_POST['maLoai'];
                }else {
                    $key = '';
                    $maLoai = 0;
                }
                $listDm=loadAll_danhmuc();
                $listSp = loadAll_sanpham($key, $maLoai);
                include "SanPham/list.php";
                break;
            // End Controller SanPham

            // Controller TaiKhoan
            case 'qlTk':  
                if(isset($_POST['timkiem'])){
                    $key = $_POST['key'];
                    $quyenhan = $_POST['quyenhan'];
                }else {
                    $key = '';
                    $quyenhan = -1;
                }
                $listTk = loadAll_taikhoan($key, $quyenhan);
                include "TaiKhoan/list.php";
                break;
            case 'addTk':  
                if(isset($_POST['themtaikhoan'])){ 
                    $check=check_taikhoan($_POST['email'], $_POST['tenTK']);
                    if(is_array($check)){
                        $thongbao = "Đã tồn tại email hoặc tên tài khoản!";         
                    } else {
                        insert_taikhoan_admin($_POST['email'], $_POST['tenTK'], $_POST['matkhau'], $_POST['tennguoidung'], $_POST['diachi'], $_POST['sodienthoai'], $_POST['quyenhan'], $_POST['trangThai']);
                        $thongbao = "Thêm thành công";         
                    }
                }
                include "TaiKhoan/add.php";
                break;
            case 'suaTk':
                $dm = loadOne_taikhoan($_GET['maTK']);
                include "TaiKhoan/update.php";
                break;
            case 'sua_action_Tk':
                if(isset($_POST['capnhattaikhoan'])){  
                    $check=check_taikhoan_update($_GET['maTK'], $_POST['email'], $_POST['tenTK']);
                    if(is_array($check)){
                        $thongbao = "Đã tồn tại email hoặc tên tài khoản!";         
                    } else {
                        update_taikhoan($_GET['maTK'], $_POST['email'], $_POST['tenTK'], $_POST['matkhau'], $_POST['tennguoidung'], $_POST['diachi'], $_POST['sodienthoai'], $_POST['quyenhan'], $_POST['trangThai']);             
                        $thongbao = "Cập nhật thành công!";         
                    }
                }
                if(isset($_POST['timkiem'])){
                    $key = $_POST['key'];
                    $quyenhan = $_POST['quyenhan'];
                }else {
                    $key = '';
                    $quyenhan = -1;
                }
                $listTk = loadAll_taikhoan($key, $quyenhan);
                include "TaiKhoan/list.php";
                break;
            case 'xoaTk':
                $thongbao = "Ngừng hoạt động tài khoản thành công!";
                delete_taikhoan($_GET['maTK']);
                if(isset($_POST['timkiem'])){
                    $key = $_POST['key'];
                    $quyenhan = $_POST['quyenhan'];
                }else {
                    $key = '';
                    $quyenhan = -1;
                }
                $listTk = loadAll_taikhoan($key, $quyenhan);
                include "TaiKhoan/list.php";
                break;
            // End Controller TaiKhoan

            // Controller HoaDon (DonHang)
            case 'qlHd':
                if(isset($_POST['timkiem'])){
                    $dsHd=loadAll_hoadon_timkiem($_POST['key'], $_POST['trangThai']);
                }else{
                    $dsHd=loadAll_hoadon(-1);
                }
                include "HoaDon/list.php";
                break;
            case 'chitietHd':
                $hoaDon=loadOne_hoadon($_GET['maHD']);
                $listGh=loadAll_giohang($_GET['maHD']);
                include "HoaDon/chitiet.php";
                break;
            case 'xulyHd':
                update_trangThai($_GET['maHD'], $_GET['trangthai']);
                $dsHd=loadAll_hoadon(-1);
                include "HoaDon/list.php";
                break;
            case 'huyHd':
                cancel_Donhang($_GET['maHD']);
                $dsHd=loadAll_hoadon(-1);
                include "HoaDon/list.php";
                break;
            // End HoaDon

            // Controller Thống kê
            case 'thongKe':
                $dsLoai=loadAll_thongke();
                include "ThongKeSL/list.php";
                break;
            case 'bieuDo':
                $dsLoai=loadAll_thongke();
                include "ThongKeSL/bieudo.php";
                break;
            case 'thongKeSLB':
                $dsLoai=loadAll_thongkeSLB();
                include "ThongKeSLB/list.php";
                break;
            case 'bieuDoSLB':
                $dsLoai=loadAll_thongkeSLB();
                include "ThongKeSLB/bieudoSLB.php";
                break;
            case 'tke':
                include "ThongKe/thongke.php";
                break;
            default:
                include "container.php";
                break;
            // End thống kê
        }
    } else {
        include "container.php";
    }
    // End Controller
    include "footer.php";

?>