<?php 
    session_start();
    include "Model/mysqli.php";
    include "Model/danhmuc.php";
    include "Model/sanpham.php";
    include "Model/taikhoan.php";
    include "Model/cart.php";
    include "Model/binhluan.php";

    include "Global.php";
    //var_dump($_SESSION['user']);
    //unset($_SESSION['mycart']);

    if(!isset($_SESSION['mycart'])){
        $_SESSION['mycart']=[];
    }

    if(!isset($_REQUEST["page"])){
        $page = 1;
    } else {
        $page = $_REQUEST["page"];
    }

    // kiểm tra key tìm kiếm để thêm cả vào ô input và giữ khi chuyển trang
    if(!isset($_REQUEST["key"])){
        $key = "";
    } else {
        $key = $_REQUEST["key"];
    }
    include "View/Header.php";

    if(isset($_GET['sapxep'])){
        $sapXep = $_GET['sapxep'];
        
    }else {
        $sapXep = "";
    }
    $sanPham = loadAll_sanpham_trangchu($page, $sapXep);
    $danhMuc = loadAll_danhmuc();
    $total_page = numpage_sanpham_trangchu();
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'dangKy':
                include "View/Container.php";
                include "View/DangKy.php";
                break;
            case 'dangNhap':
                include "View/Container.php";
                include "View/DangNhap.php";
                break;
            case 'chitietSP':
                $sanpham=loadOne_sanpham($_GET['maSP']);
                include "View/ChiTietSP.php";
                break;
            case 'SPtheoDM':
                if(!isset($_REQUEST["pageloai"])){
                    $pageloai = 1;
                } else {
                    $pageloai = $_REQUEST["pageloai"];
                }
                $sanphamtheoloai = loadAll_sanpham_theoloai($pageloai, $_GET['maLoai']);
                $total_page_theoloai = numpage_sanpham_theoloai($_GET['maLoai']);
                include "View/SPtheoDM.php";
                break;
            case 'timkiemSP':
                if(!isset($_REQUEST["pagetk"])){
                    $pagetk = 1;
                } else {
                    $pagetk = $_REQUEST["pagetk"];
                }
                $sanphamtimkiem = loadAll_sanpham_timkiem($pagetk, $key);
                $total_page_timkiem=numpage_sanpham_timkiem($key);
                include "View/TimkiemSP.php";
                break;
            case 'dangky':
                if(isset($_POST['dangky'])){
                    if($_POST['email']&&$_POST['tendangky']&&$_POST['matkhau']&&$_POST['matkhaunl']){
                        $check=check_taikhoan($_POST['email'], $_POST['tendangky']);
                        if(is_array($check)){
                            $thongbao = "Đã tồn tại email hoặc tên tài khoản!"; 
                        } else {
                            if($_POST['matkhau'] == $_POST['matkhaunl']){
                                insert_taikhoan($_POST['email'], $_POST['tendangky'], $_POST['matkhau']);
                                $thongbao= "Đăng ký thành công!";
                            } else {
                                $thongbao= "Nhập lại mật khẩu!";
                            }
                        }
                    } else {
                        $thongbao= "Vui lòng nhập đầy đủ thông tin!";
                    }
                }
                include "View/DangKy.php";
                break;
            case 'dangnhap':
                
                if(isset($_POST['dangnhap'])){
                    if($_POST['tendangnhap']&&$_POST['matkhau']){  
                        $check_user=check_user($_POST['tendangnhap'], $_POST['matkhau']);
                        if(is_array($check_user)){
                            if($check_user['trangthaiTK'] == 1){
                                $_SESSION['user']=$check_user;
                                //header("Location: index.php");
                                echo '<script>window.location.href = "index.php";</script>';                
                            } else {
                                $thongbao= "Tài khoản không còn được phép hoạt động!"; 
                            }
                        } else {
                            $thongbao= "Tài khoản hoặc mật khẩu không đúng!"; 
                        }             
                    } else {
                        $thongbao= "Vui lòng nhập đầy đủ thông tin!";
                    }
                }
                
                include "View/DangNhap.php";
                break;
            case 'quenmk':
                if(isset($_POST['guiemail'])){
                    $checkemail=check_email($_POST['email']);
                    if(is_array($checkemail)){
                        $thongbao = "Mật khẩu của bạn là:".$checkemail['passWord'];
                    }else {
                        $thongbao = "Email không tồn tại";
                    }
                }
                include "View/QuenMK.php";
                break;
            case 'thoat':
                unset($_SESSION['user']);
                $_SESSION['mycart']=[];
                echo '<script>window.location.href = "index.php";</script>'; 
                break;

            // Shopping-Cart
            case 'addtocart':
                if(isset($_POST['addtocart'])){
                    $maSP = $_POST['maSP'];
                    $tenSP = $_POST['tenSP'];
                    $anhSP = $_POST['anhSP'];
                    $giaSP = (int)$_POST['giaSP'];
                    $soLuong = (int)$_POST['quantity'];
                    //
                    $r=loadOne_sanpham($maSP);
                    $r['soLuong'] = $soLuong;
                    $itemArray =array($r['tenSP']=>$r);

                    if(!empty($_SESSION['mycart'])){
                        if(in_array($r['tenSP'], array_keys($_SESSION['mycart']))){
                            foreach ($_SESSION['mycart'] as $k=>$v) {
                                if($r['tenSP']==$k){
                                    $_SESSION['mycart'][$k]['soLuong'] += $soLuong;
                                }
                            }
                        } else {
                            $_SESSION['mycart']=array_merge($_SESSION['mycart'], $itemArray);
                        }
                    } else {
                        $_SESSION['mycart'] = $itemArray;
                    } 
                    echo '<script>window.location.href = "index.php";</script>'; 
                }
                //include "View/Cart/Viewcart.php";
                //include "View/Container.php";

                break;
            case 'delcart':
                if(isset($_GET['idcart'])){
                    array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
                }else {
                    $_SESSION['mycart']=[];
                }
                //header('Location: index.php?act=viewcart');
                echo '<script>window.location.href = "index.php?act=viewcart";</script>'; 
                break;
            case 'viewcart':
                include "View/Cart/Viewcart.php";
                break;
            case 'bill':
                include "View/Cart/Bill.php";
                break;
            case 'billconfirm':
                if(isset($_POST['taodonhang'])){
                    $name=$_POST['name'];
                    $diachi=$_POST['address'];
                    $email=$_POST['email'];
                    $soDT=$_POST['phone'];
                    $pttt=$_POST['payment'];
                    $ngaydathang=date('Y-m-d');
                    $tongdonhang=$_POST['tongdonhang'];
                    // Tạo hoá đơn
                    if(isset($_SESSION['user'])){
                        $maHD=insert_hoadon($_SESSION['user']['maTK'],$name, $diachi, $soDT, $email, $pttt, $ngaydathang, $tongdonhang);
                    } else {
                        $maTK=0;
                        $maHD=insert_hoadon($maTK,$name, $diachi, $soDT, $email, $pttt, $ngaydathang, $tongdonhang);
                    }
                    // Thêm vào bảng giỏ hàng và (trừ số lượng, thêm số lượng bán)$_SESSION['mycart']
                    foreach ($_SESSION['mycart'] as $cart) {
                        extract($cart);
                        // Nếu như chưa đăng nhập thì maTK trong giỏ hàng không cần nhập và có mặc định bằng 0
                        if(isset($_SESSION['user'])){
                            //function insert_giohang($maTK, $maSP, $imgSP, $tenSP, $giaSP, $soLuong, $thanhTien, $maHD)
                            $thanhTien = $giaSP * $soLuong;
                            insert_giohang($_SESSION['user']['maTK'], $maSP, $anhSP, $tenSP, $giaSP, $soLuong, $thanhTien, $maHD);
                        } else {
                            $maTK=0;
                            $thanhTien = $giaSP * $soLuong;
                            insert_giohang($maTK, $maSP, $anhSP, $tenSP, $giaSP, $soLuong, $thanhTien, $maHD);
                        }
                        //hàm update
                        update_sanpham_Confirm($maSP, $soLuong);
                    }
                    // xoá session
                    unset($_SESSION['mycart']);
                }
                $hoadon=loadOne_hoadon($maHD);
                $listGH=loadAll_giohang($maHD);
                include "View/Cart/Billconfirm.php";
                break;
            case 'myBill':
                $dsHD=loadAll_hoadon($_SESSION['user']['maTK']);
                include "View/Cart/Mybill.php";
                break;
            case 'xacnhanDh':
                $trangthai = 3;
                update_trangThai($_GET['maHD'], $trangthai);
                $dsHD=loadAll_hoadon($_SESSION['user']['maTK']);
                include "View/Cart/Mybill.php";
                break;
            case 'huyDh':
                cancel_Donhang($_GET['maHD']);
                $dsHD=loadAll_hoadon($_SESSION['user']['maTK']);
                include "View/Cart/Mybill.php";
                break;
            case 'xemchitietDh':
                $hd=loadOne_hoadon($_GET['maHD']);
                $listGh=loadAll_giohang($_GET['maHD']);
                include "View/Cart/billDetail.php";
                break;
            case 'thongtinCanhan':
                $dm=$_SESSION['user'];
                include "View/ThongtinKH.php";
                break;
            case 'sua_thongtin_Tk':
                if(isset($_POST['capnhattaikhoan'])){  
                    $check=check_taikhoan_update($_GET['maTK'], $_POST['email'], $_POST['tenTK']);
                    if(is_array($check)){
                        $thongbao = "Đã tồn tại email hoặc tên tài khoản!";         
                    } else {
                        update_taikhoan($_GET['maTK'], $_POST['email'], $_POST['tenTK'], $_POST['matkhau'], $_POST['tennguoidung'], $_POST['diachi'], $_POST['sodienthoai'], $_POST['quyenhan']);             
                        $thongbao = "Cập nhật thành công! Vui lòng đăng nhập lại";      
                    }
                }
                $dm=$_SESSION['user'];
                include "View/ThongtinKH.php";
                break;

            case 'chitiet':
                $hd = loadOne_chitietDH($maHD);
                include "view/cart/chitiet_dh.php";
                break;

                //binh luận
            case 'binhluanact':
                if(isset($_POST['binhluan'])&&($_POST['binhluan'])){
                    $bl = $_POST['noidung'];
                    $maSP = $_POST['maSP'];
                        if(isset($_SESSION['user'])){
                            insert_bl($_SESSION['user']['maTK'], $maSP, $bl);
                            $thongbao = "Đã gửi bình luận!";
                        } else {
                            $maTK=-1;
                            insert_bl($maTK, $maSP, $bl);
                            $thongbao = "Đã gửi bình luận!";
                        }
                    }
                $sanpham=loadOne_sanpham($_POST['maSP']);
                include "view/ChiTietSP.php";
                break;
            default:
                include "View/Container.php";
                break;
        }
    } else {
        include "View/Container.php";
    }
    
    include "View/Footer.php";
?>