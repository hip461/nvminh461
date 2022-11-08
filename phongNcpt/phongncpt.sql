-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 03, 2022 lúc 08:18 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phongncpt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `id` int(11) NOT NULL,
  `hoTen` int(50) NOT NULL,
  `lienHe` int(50) NOT NULL,
  `donVi` int(50) NOT NULL,
  `chucVu` int(50) NOT NULL,
  `gopY` int(255) NOT NULL,
  `ngayThem` datetime NOT NULL,
  `ghiChu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `fullname` varchar(35) NOT NULL,
  `chucVu` varchar(35) NOT NULL,
  `email` varchar(30) NOT NULL,
  `soDienThoai` varchar(10) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `fullname`, `chucVu`, `email`, `soDienThoai`, `diaChi`, `username`, `pass`, `level`, `image`) VALUES
(1, 'Nguyễn Văn Minh', 'admin', 'a@gmail.com', '0321546677', 'Hà Đông, Hà Nội', 'admin', '1', 0, ''),
(2, 'Nguyễn Văn A', 'user', 'b@gmail.com', '0334688946', 'Hà Đông, Hà Nội', 'user', '1', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhiemvu`
--

CREATE TABLE `tbl_nhiemvu` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(35) NOT NULL,
  `nhiemVu` varchar(255) NOT NULL,
  `tienDo` varchar(255) NOT NULL,
  `duKien` varchar(255) NOT NULL,
  `hoanThanh` date NOT NULL,
  `user_add` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhiemvu`
--

INSERT INTO `tbl_nhiemvu` (`id`, `fullname`, `username`, `nhiemVu`, `tienDo`, `duKien`, `hoanThanh`, `user_add`) VALUES
(1, 'Nguyễn Đức Quân', 'hhhh', 'gfhgfghvfhfgvbnvghg', 'ffhfgh', 'jgjhgjhg', '2022-10-31', 'Nguyễn Văn A'),
(2, 'Nguyễn Văn A', 'sdfsd', 'Nhập liệu', 'xong ', 'không có', '2022-11-23', 'Nguyễn Văn A'),
(3, 'Nguyễn Văn a', 'sdfsd', 'Viết backend xong trước 18-11', 'xong phần nhiệm vụ', 'Báo cáo', '2022-11-02', 'Nguyễn Văn A');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_nhiemvu`
--
ALTER TABLE `tbl_nhiemvu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_nhiemvu`
--
ALTER TABLE `tbl_nhiemvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
