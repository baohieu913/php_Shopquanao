-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2023 lúc 07:39 AM
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
(3, 'adad', 13, 17, 0, '0000-00-00'),
(7, 'sdad', 12, 17, 0, '0000-00-00'),
(12, 'ad', 13, 17, 1, '2023-11-30'),
(14, 'ádadada', 13, 17, 1, '2023-11-30'),
(15, 'ádasd', 13, 17, 0, '0000-00-00'),
(16, 'ádasd', 13, 17, 1, '2023-11-30'),
(17, 'VŨ Đức Hùng', 10, 17, 1, '2023-12-01'),
(18, 'VŨ Đức Hùng', 10, 17, 0, '2023-12-01'),
(19, 'VDH ẩn danh', 13, 17, 1, '2023-12-01'),
(20, 'dâdada', 12, 17, 0, '2023-12-01'),
(21, 'adadad', 12, 17, 0, '2023-12-01'),
(22, 'adadad', 12, 17, 0, '2023-12-01'),
(23, 'adadad', 12, 17, 0, '2023-12-01'),
(24, 'adadad', 12, 17, 0, '2023-12-01'),
(25, 'adadad', 12, 17, 0, '2023-12-01'),
(26, 'adadad', 12, 17, 0, '2023-12-01'),
(27, 'adadad', 12, 17, 0, '2023-12-01'),
(28, 'adadad', 12, 17, 0, '2023-12-01'),
(29, 'adadad', 12, 17, 0, '2023-12-01'),
(30, 'adadad', 12, 17, 0, '2023-12-01'),
(31, 'adadad', 12, 17, 0, '2023-12-01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`maBL`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `maBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
