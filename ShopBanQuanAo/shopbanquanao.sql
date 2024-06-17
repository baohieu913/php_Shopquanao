-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2023 lúc 10:39 AM
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
(65, 10, 21, 'Áo len.jpg', 'Áo Len', 232000, 2, 464000, 56),
(66, 10, 20, 'Áo hoodie 1.jpg', 'Áo Nỉ Hoodie Đôi Bạn Đen Trắng NB/T2/PB/K7', 132000, 2, 264000, 56),
(67, 10, 19, 'Áo khoác 3.jpg', 'Áo khoác 2 lớp', 542000, 1, 542000, 56),
(68, 10, 22, 'Áo khoác 1.png', 'Áo khoác Bomber mũ trùm đầu Hoo1die nỉ bông cúc bấm nam nữ Vintage FKZ Unisex', 123999, 1, 123999, 56),
(69, 10, 17, 'Áo khoác.jpg', 'Áo khoác Bomber mũ trùm đầu Hoodie nỉ bông cúc bấm nam nữ Vintage FKZ Unisex', 342000, 1, 342000, 58),
(70, 10, 19, 'Áo khoác 3.jpg', 'Áo khoác 2 lớp', 542000, 3, 1626000, 59),
(71, 10, 20, 'Áo hoodie 1.jpg', 'Áo Nỉ Hoodie Đôi Bạn Đen Trắng NB/T2/PB/K7', 132000, 1, 132000, 59),
(72, 10, 21, 'Áo len.jpg', 'Áo Len', 232000, 2, 464000, 60),
(73, 10, 21, 'Áo len.jpg', 'Áo Len', 232000, 1, 232000, 61),
(74, 10, 17, 'Áo khoác.jpg', 'Áo khoác Bomber mũ trùm đầu Hoodie nỉ bông cúc bấm nam nữ Vintage FKZ Unisex', 342000, 1, 342000, 62),
(75, 10, 20, 'Áo hoodie 1.jpg', 'Áo Nỉ Hoodie Đôi Bạn Đen Trắng NB/T2/PB/K7', 132000, 1, 132000, 62);

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
  `trangthaiHD` tinyint(4) DEFAULT 0 COMMENT '0.Đơn hàng mới 1. Đang xử lý 2. Đang giao hàng 3. Đã giao hàng 4. ADmin(khách hàng đã nhận) Khách(Đã nhận được hàng)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`maHD`, `maTK`, `tenHD`, `diachiHD`, `sodtHD`, `emailHD`, `ptttHD`, `ngaydathang`, `tongHD`, `trangthaiHD`) VALUES
(56, 10, 'Đức Hùng', 'Hưng Yên', '0869972842', 'nguyenvanan11@gmail.com', 1, '2023-11-24', 1393999, 0),
(57, 10, 'Đức Hùng', 'Hưng Yên', '0869972842', 'nguyenvanan11@gmail.com', 1, '2023-11-24', 1393999, 0),
(58, 10, 'Đức Hùng', 'Hưng Yên', '0869972842', 'nguyenvanan11@gmail.com', 1, '2023-11-24', 342000, 4),
(59, 10, 'Đức Hùng', 'Hưng Yên', '0869972842', 'nguyenvanan11@gmail.com', 2, '2023-11-24', 1758000, 4),
(60, 10, 'Đức Hùng', 'Hưng Yên', '0869972842', 'nguyenvanan11@gmail.com', 1, '2023-11-24', 464000, 0),
(61, 10, 'Đức Hùng', 'Hưng Yên', '0869972842', 'nguyenvanan11@gmail.com', 1, '2023-11-24', 232000, 0),
(62, 10, 'Đức Hùng', 'Hà Nội', '0869972842', 'vuduchung1703@gmail.com', 1, '2023-11-25', 474000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihang`
--

CREATE TABLE `loaihang` (
  `maLoai` int(11) NOT NULL,
  `tenLoai` varchar(255) NOT NULL,
  `thuongHieu` varchar(255) NOT NULL,
  `xuatXu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihang`
--

INSERT INTO `loaihang` (`maLoai`, `tenLoai`, `thuongHieu`, `xuatXu`) VALUES
(11, 'Áo khoác', 'H&M', 'Sweden'),
(12, 'Áo Sweater - Hoodie', 'Chanel', 'Pháp'),
(16, 'Giày', 'Gucci', 'Italy'),
(17, 'Dép', 'Gucci1', 'Italy1'),
(18, 'Áo len', 'Thương hiệu AL', 'Xuất xứ AL');

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
  `soLuongban` int(11) DEFAULT 0,
  `maLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `giaSP`, `anhSP`, `moTa`, `soLuong`, `soLuongban`, `maLoai`) VALUES
(17, 'Áo khoác Bomber mũ trùm đầu Hoodie nỉ bông cúc bấm nam nữ Vintage FKZ Unisex', 342000, 'Áo khoác.jpg', 'Áo khoác ', 48, 12, 11),
(19, 'Áo khoác 2 lớp', 542000, 'Áo khoác 3.jpg', 'Áo khoác 3', 46, 5, 11),
(20, 'Áo Nỉ Hoodie Đôi Bạn Đen Trắng NB/T2/PB/K7', 132000, 'Áo hoodie 1.jpg', 'Áo Hoodie 1', 6, 7, 12),
(21, 'Áo Len', 232000, 'Áo len.jpg', 'Áo len cổ lọ', 0, 5, 11),
(22, 'Áo khoác Bomber mũ trùm đầu Hoo1die nỉ bông cúc bấm nam nữ Vintage FKZ Unisex', 123999, 'Áo khoác 1.png', 'abc', 1, 1, 17),
(23, 'Giày da', 700000, 'Anh.jpg', 'Giày', 3, 0, 16);

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
  `quyen` int(11) NOT NULL DEFAULT 0 COMMENT '0. Khách hàng 1.Nhân viên 2.Quản lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`maTK`, `email`, `userName`, `passWord`, `tenNguoidung`, `address`, `soDT`, `quyen`) VALUES
(3, 'nguyenvanan@gmail.com', '', '123456', NULL, NULL, NULL, 0),
(4, 'hai2001hy@gmail.com', '', '123456', 'Nguyễn Văn Hải', NULL, NULL, 0),
(9, 'vuduchung1703@gmail.com', 'evasan5', '123456', 'Đức Hùng', 'Hưng Yên', '0869972842', 0),
(10, 'nguyenvanan11@gmail.com', 'evasan1', '1234567', 'Đức Hùng', 'Hưng Yên', '0869972842', 1),
(11, 'meomeohy2003@gmail.com', 'evasan4', 'hunghy17', NULL, 'Hà Nội', '0869972843', 0),
(12, 'admin@gmail.com', 'Admin', '123456', NULL, NULL, NULL, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `maGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `maTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
