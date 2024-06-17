-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2023 lúc 06:54 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopbanquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `maBL` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `maTK` int(11) NOT NULL DEFAULT 13,
  `maSP` int(11) NOT NULL,
  `tinhtrang` int(3) NOT NULL DEFAULT 0,
  `ngaybl` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`maBL`, `noidung`, `maTK`, `maSP`, `tinhtrang`, `ngaybl`) VALUES
(1, 'sda', 0, 12, 1, '0000-00-00'),
(2, 'sda', 12, 19, 0, '0000-00-00'),
(18, 'VŨ Đức Hùng', 10, 17, 1, '2023-12-01'),
(19, 'VDH ẩn danh', -1, 17, 1, '2023-12-01'),
(33, 'Sản phẩm tốt', 12, 17, 0, '2023-12-01'),
(34, 'Sản phẩm tốt', 12, 17, 0, '2023-12-01'),
(35, 'Sản phẩm tốt', 12, 17, 0, '2023-12-01'),
(36, 'Bình luận', 10, 17, 0, '2023-12-01'),
(37, 'Sản phẩm tốt', 10, 17, 0, '2023-12-01'),
(38, 'Sản phẩm tốt', 10, 17, 1, '2023-12-01'),
(39, 'Sản phẩm mới', -1, 17, 1, '2023-12-01'),
(40, 'Sản phẩm tốt', 12, 28, 1, '2023-12-19'),
(41, 'Sản phẩm mới', 9, 28, 0, '2023-12-19'),
(42, 'Sản phẩm mới', 9, 30, 0, '2023-12-19'),
(43, 'Sản phẩm tốt', 12, 60, 1, '2023-12-19'),
(44, 'Sản phẩm mới', -1, 60, 1, '2023-12-19'),
(45, 'Sản phẩm tốt', 12, 28, 1, '2023-12-19'),
(46, 'Sản phẩm mới', -1, 28, 1, '2023-12-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `maGH` int(11) NOT NULL,
  `maTK` int(11) DEFAULT 0 COMMENT '0. KH không đăng nhập',
  `maSP` int(11) NOT NULL,
  `imgSP` varchar(255) DEFAULT NULL,
  `tenSP` varchar(255) DEFAULT NULL,
  `giaSP` int(11) NOT NULL DEFAULT 0,
  `soLuong` int(11) NOT NULL,
  `thanhTien` int(11) NOT NULL,
  `maHD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`maGH`, `maTK`, `maSP`, `imgSP`, `tenSP`, `giaSP`, `soLuong`, `thanhTien`, `maHD`) VALUES
(123, 12, 36, 'Áo sweatshirt nữ tay dài Classic Sports Big Logo.webp', 'Áo sweatshirt nữ tay dài Classic Sports Big Logo', 1500000, 1, 1500000, 101),
(124, 12, 47, 'Áo Khoác Jean Marble Dye.webp', 'Áo Khoác Jean Marble Dye', 250000, 5, 1250000, 101),
(125, 9, 37, 'Áo sweatshirt unisex cổ tròn tay dài Diamond Monogram Jacquard.webp', 'Áo sweatshirt unisex cổ tròn tay dài Diamond Monogram Jacquard', 2000000, 5, 10000000, 102),
(126, 9, 53, 'Áo Stussy Spychedelic Hood Ash Heather.png', 'Áo Stussy Spychedelic Hood Ash Heather', 1000000, 5, 5000000, 102);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `maHD` int(11) NOT NULL,
  `maTK` int(11) DEFAULT 0,
  `tenHD` varchar(255) NOT NULL,
  `diachiHD` varchar(255) NOT NULL,
  `sodtHD` varchar(50) NOT NULL,
  `emailHD` varchar(100) NOT NULL,
  `ptttHD` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1. Thanh toán trực tiếp 2.Chuyển khoản',
  `ngaydathang` date NOT NULL,
  `tongHD` int(11) NOT NULL DEFAULT 0,
  `trangthaiHD` tinyint(4) DEFAULT 0 COMMENT '-1.Đơn hàng bị huỷ 0.Đơn hàng mới 1. Đang xử lý 2. Đang giao hàng 3. Đã giao hàng 4. ADmin(khách hàng đã nhận) Khách(Đã nhận được hàng)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`maHD`, `maTK`, `tenHD`, `diachiHD`, `sodtHD`, `emailHD`, `ptttHD`, `ngaydathang`, `tongHD`, `trangthaiHD`) VALUES
(101, 12, 'Đức Hùng', 'Hưng Yên', '0869972842', 'admin@gmail.com', 1, '2023-12-18', 2750000, -1),
(102, 9, 'Đức Hùng', 'Hưng Yên', '0869972842', 'vuduchung1703@gmail.com', 1, '2023-12-18', 15000000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihang`
--

CREATE TABLE `loaihang` (
  `maLoai` int(11) NOT NULL,
  `tenLoai` varchar(255) NOT NULL,
  `thuongHieu` varchar(255) NOT NULL,
  `xuatXu` varchar(255) NOT NULL,
  `trangthaiLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihang`
--

INSERT INTO `loaihang` (`maLoai`, `tenLoai`, `thuongHieu`, `xuatXu`, `trangthaiLoai`) VALUES
(20, 'Áo len', 'Gucci', 'Italy', 0),
(24, 'Áo Hoodie', 'Stussy', 'Mỹ', 1),
(25, 'Denim', 'Levi', 'Sanfasico', 1),
(26, 'Sweater', 'MLB', 'Mỹ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(11) NOT NULL,
  `tenSP` varchar(255) NOT NULL,
  `giaSP` int(11) NOT NULL,
  `anhSP` varchar(255) NOT NULL,
  `moTa` text NOT NULL,
  `soLuong` int(11) DEFAULT 0,
  `maLoai` int(11) NOT NULL,
  `trangthaiSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `giaSP`, `anhSP`, `moTa`, `soLuong`, `maLoai`, `trangthaiSP`) VALUES
(20, 'Áo Nỉ Hoodie Đôi Bạn Đen Trắng NB/T2/PB/K7', 132000, 'Áo hoodie 1.jpg', 'Áo Hoodie 1', 30, 12, 0),
(21, 'Áo Len', 232003, 'Áo len.jpg', 'Áo len cổ lọ', 19, 11, 0),
(23, 'Giày da', 700000, 'Anh.jpg', 'Giày', 0, 16, 0),
(28, 'MLB - Áo sweater unisex cổ tròn tay dài Monogram', 590000, 'Ao mlb.webp', 'Áo sweater thương hiệu MLB', 50, 26, 1),
(29, 'Áo sweatshirt unisex cổ tròn tay dài Monative Monogram Overfit', 990000, 'MLB ao.webp', 'Sản phẩm bán chạy của MLB', 60, 26, 1),
(30, 'Áo sweatshirt nữ cổ tròn tay dài Boucle Logo', 599000, 'MLB nu.webp', 'Mẫu áo sweater bán chạy cho nữ ', 60, 26, 1),
(31, 'Áo sweatshirt unisex tay dài hiện đại', 250000, 'Ao hien dai.webp', 'Sản phẩm của bộ sưu tập mới', 50, 26, 1),
(32, 'Áo sweatshirt unisex tay dài Argyle Allover Overfit', 700000, 'Áo sweatshirt unisex tay dài Argyle Allover Overfit.webp', 'Sản phẩm nổi trội ', 20, 26, 1),
(33, 'Áo sweatshirt unisex cổ tròn tay dài Mega Bear', 1000000, 'Áo sweatshirt unisex cổ tròn tay dài Mega Bear.webp', 'Sản phẩm trong collection mới \r\n', 50, 26, 1),
(34, 'Áo sweatshirt unisex cổ tròn tay dài Like Daily', 1200000, 'Áo sweatshirt unisex cổ tròn tay dài Like Daily.webp', 'sản phẩm trong bộ sự tập mới', 30, 26, 1),
(35, 'Áo sweatshirt nữ tay dài phom croptop Varsity', 1200000, 'Áo sweatshirt nữ tay dài phom croptop Varsity.webp', 'Áo sweater cho nữ ', 40, 26, 1),
(36, 'Áo sweatshirt nữ tay dài Classic Sports Big Logo', 1500000, 'Áo sweatshirt nữ tay dài Classic Sports Big Logo.webp', 'Có logo hãng to', 50, 26, 1),
(37, 'Áo sweatshirt unisex cổ tròn tay dài Diamond Monogram Jacquard', 2000000, 'Áo sweatshirt unisex cổ tròn tay dài Diamond Monogram Jacquard.webp', 'Sản phẩm mới trong bộ sư tập', 35, 26, 1),
(38, 'Quần Jeans Nữ Dài Baggy', 550000, 'Quần Jeans Nữ Dài Baggy.webp', 'Quần jean cho nữ ', 20, 25, 1),
(39, 'Áo Khoác Jeans Nữ', 700000, 'Áo Khoác Jeans Nữ.webp', 'Đồ denim chất lượng', 40, 25, 1),
(40, 'Áo Khoác Jeans Nam', 600000, 'Áo Khoác Jeans Nam.webp', 'Áo khoắc denim', 20, 25, 1),
(41, 'Quần Jeans Skinny Grey Wash', 550000, 'Quần Jeans Skinny Grey Wash.webp', 'abcvvc', 40, 25, 1),
(42, 'Quần Jeans Skinny Torn Knee Light Blue', 550000, 'Quần Jeans Skinny Torn Knee Light Blue.webp', 'ádfgg', 20, 25, 1),
(43, 'Áo Khoác Denim Rhythm Of Life', 450000, 'Áo Khoác Denim Rhythm Of Life.webp', 'asss', 10, 25, 1),
(44, 'Áo Trucker Denim Extended Shoulder', 300000, 'Áo Trucker Denim Extended Shoulder.webp', 'askks', 30, 25, 1),
(45, 'Áo Khoác Denim Classic Assemble', 299000, 'Áo Khoác Denim Classic Assemble.webp', 'AÂ', 20, 25, 1),
(46, 'Áo Khoác Jean Cartoon Embroidery', 400000, 'Áo Khoác Jean Cartoon Embroidery.webp', 'sfdsfsf', 30, 25, 1),
(47, 'Áo Khoác Jean Marble Dye', 250000, 'Áo Khoác Jean Marble Dye.webp', 'ứdsfs', 20, 25, 1),
(48, 'ÁO HOODIE STUSSY 8 BALL', 800000, 'ÁO HOODIE STUSSY 8 BALL.jpg', '=))))', 20, 24, 1),
(49, 'Áo Stussy Basic Stussy Hoodie 2023 ‘Ash Heather’', 2000000, 'Áo Stussy Basic Stussy Hoodie 2023 ‘Ash Heather’.png', 'ádsad', 50, 24, 1),
(50, 'Áo Stussy Basic Stussy Zip Hoodie 2022 ‘Ash Heather’', 1000000, 'Áo Stussy Basic Stussy Zip Hoodie 2022 ‘Ash Heather’.png', 'ưqd', 20, 24, 1),
(51, 'Áo Stussy Stock Logo Embroidered Hoodie Black', 990000, 'Áo Stussy Stock Logo Embroidered Hoodie Black.png', 'ưqdrf', 30, 24, 1),
(52, 'Áo Stussy Roll The Dice Hoodie ‘Black’', 1500000, 'Áo Stussy Roll The Dice Hoodie ‘Black’.png', 'qrqư', 40, 24, 1),
(53, 'Áo Stussy Spychedelic Hood Ash Heather', 1000000, 'Áo Stussy Spychedelic Hood Ash Heather.png', 'sdfsà', 25, 24, 1),
(54, 'Áo Stussy x Our Legacy Work Shop Surfman Pigment Dyed Hoodie ‘Natural’', 990000, 'Áo Stussy x Our Legacy Work Shop Surfman Pigment Dyed Hoodie ‘Natural’.png', 'ưqr', 20, 24, 1),
(55, 'Áo Stussy x Our Legacy Work Shop Surfman Pigment Dyed Hoodie ‘Dark Olive’', 1200000, 'Áo Stussy x Our Legacy Work Shop Surfman Pigment Dyed Hoodie ‘Dark Olive’.png', 'trh', 30, 24, 1),
(56, 'Áo Stussy x Dries Van Noten Tie Dye Hoodie ‘Blue’', 1800000, 'Áo Stussy x Dries Van Noten Tie Dye Hoodie ‘Blue’.png', 'èwèw', 40, 24, 1),
(57, 'Áo Stussy x Dries Van Noten Bandana Hoodie ‘Camel’', 2000000, 'Áo Stussy x Dries Van Noten Bandana Hoodie ‘Camel’.png', 'sầ', 30, 24, 1),
(58, 'Áo sweatshirt unisex tay dài Rabbit Mega Overfit', 2000000, 'Áo sweatshirt unisex tay dài Rabbit Mega Overfit.webp', 'sfdsf', 30, 26, 1),
(59, 'Áo Khoác Jean Heavy Wash Ombre', 300000, 'Áo Khoác Jean Heavy Wash Ombre.webp', 'ừds', 30, 25, 1),
(60, 'STUSSY BASIC HOODIE - PUTTY', 1000000, 'STUSSY BASIC HOODIE - PUTTY.jpg', 'ưqẻqư', 30, 24, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `maTK` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `passWord` varchar(50) NOT NULL,
  `tenNguoidung` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `soDT` varchar(255) DEFAULT NULL,
  `quyen` int(11) NOT NULL DEFAULT 0 COMMENT '0. Khách hàng 1.Nhân viên 2.Quản lý',
  `trangthaiTK` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`maTK`, `email`, `userName`, `passWord`, `tenNguoidung`, `address`, `soDT`, `quyen`, `trangthaiTK`) VALUES
(9, 'vuduchung1703@gmail.com', 'evasan5', '123456', 'Đức Hùng', 'Hưng Yên', '0869972842', 0, 1),
(10, 'nguyenvanan11@gmail.com', 'evasan1', '1234567', 'Đức Hùng', 'Hưng Yên', '0869972842', 1, 1),
(12, 'admin@gmail.com', 'Admin', '12345', 'Đức Hùng', 'Hưng Yên', '0869972842', 2, 1),
(13, 'hai2001hy@gmail.com', 'hunghy17', 'hunghy17', NULL, NULL, NULL, 0, 0),
(14, 'qt32486@gmail.com', 'Quocngu', '12345678', 'Quốc ngu ', 'Hoàng mai', '0702058551', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`maBL`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`maGH`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHD`);

--
-- Chỉ mục cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`maLoai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`maTK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `maBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `maGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `maTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
