-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3307
-- Thời gian đã tạo: Th5 20, 2020 lúc 05:36 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoppingdog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(4) NOT NULL,
  `MSHH` varchar(5) NOT NULL,
  `Soluong` tinyint(4) NOT NULL,
  `GiaDatHang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `Soluong`, `GiaDatHang`) VALUES
(1, 'ms04', 2, 12000000),
(2, 'ms01 ', 1, 12000000),
(2, 'ms08 ', 1, 15000000),
(2, 'ms12 ', 3, 18000000),
(3, 'ms01 ', 1, 12000000),
(3, 'ms03 ', 1, 10000000),
(3, 'ms07 ', 1, 20000000),
(3, 'ms08 ', 1, 15000000),
(4, 'ms07 ', 3, 20000000),
(4, 'ms08 ', 1, 15000000),
(5, 'ms08 ', 1, 15000000),
(5, 'ms13 ', 1, 18000000),
(6, 'ms08 ', 1, 15000000),
(6, 'ms12 ', 3, 18000000),
(7, 'ms08 ', 1, 15000000),
(7, 'ms11 ', 3, 17000000),
(8, 'ms14 ', 1, 7000000),
(9, 'ms01 ', 1, 12000000),
(9, 'ms14 ', 1, 7000000),
(10, 'ms01 ', 1, 12000000),
(10, 'ms12 ', 1, 18000000),
(10, 'ms14 ', 1, 7000000),
(11, 'ms14 ', 3, 7000000),
(12, 'ms07 ', 1, 20000000),
(12, 'ms08 ', 10, 15000000),
(13, 'ms07 ', 1, 20000000),
(13, 'ms08 ', 10, 15000000),
(14, 'ms07 ', 1, 20000000),
(14, 'ms08 ', 10, 15000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(4) NOT NULL,
  `MSKH` int(4) NOT NULL,
  `MSNV` int(4) DEFAULT NULL,
  `NgayDH` datetime NOT NULL,
  `TongTien` double NOT NULL,
  `TrangThai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `TongTien`, `TrangThai`) VALUES
(1, 1, NULL, '2020-05-18 15:44:02', 30000000, 'Chưa Xác Nhận'),
(2, 2, NULL, '2020-05-18 15:46:48', 81000000, 'Chưa Xác Nhận'),
(3, 1, NULL, '2020-05-18 15:53:23', 22000000, 'Chưa Xác Nhận'),
(4, 4, NULL, '2020-05-18 16:07:20', 75000000, 'Chưa Xác Nhận'),
(5, 5, NULL, '2020-05-18 16:19:44', 33000000, 'Chưa Xác Nhận'),
(6, 6, NULL, '2020-05-18 16:23:30', 69000000, 'Chưa Xác Nhận'),
(7, 2, NULL, '2020-05-18 16:27:48', 66000000, 'Chưa Xác Nhận'),
(8, 7, NULL, '2020-05-18 16:39:31', 7000000, 'Chưa Xác Nhận'),
(9, 7, NULL, '2020-05-18 16:40:41', 19000000, 'Chưa Xác Nhận'),
(10, 2, NULL, '2020-05-18 16:41:30', 37000000, 'Chưa Xác Nhận'),
(11, 1, NULL, '2020-05-18 16:44:58', 21000000, 'Chưa Xác Nhận'),
(12, 2, NULL, '2020-05-18 17:22:19', 170000000, 'Chưa Xác Nhận'),
(13, 2, NULL, '2020-05-18 17:23:45', 170000000, 'Chưa Xác Nhận'),
(14, 2, NULL, '2020-05-18 17:23:48', 170000000, 'Chưa Xác Nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(5) NOT NULL,
  `TenHH` varchar(50) NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` tinyint(4) NOT NULL,
  `MaNhom` varchar(5) NOT NULL,
  `Hinh` varchar(50) NOT NULL,
  `MoTaHH` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `Hinh`, `MoTaHH`) VALUES
('ms01', 'Alaska', 12000000, 100, 'cc', 'alaska.jpg', 'khongco'),
('ms02', 'Husky', 14000000, 100, 'cc', 'husky.jpg', 'khongco'),
('ms03', 'Golden', 10000000, 100, 'cc', 'golden.jpg', 'khongco'),
('ms04', 'Corgi', 8000000, 100, 'cc', 'corgi.jpg', 'khongco'),
('ms05', 'Shiba-inu', 9000000, 100, 'cc', 'shiba-inu.jpg', 'khongco'),
('ms06', 'Pug', 7000000, 100, 'cc', 'pug.jpg', 'khongco'),
('ms07', 'Bull', 20000000, 100, 'cc', 'bulldog.jpg', 'khongco'),
('ms08', 'Beagle', 15000000, 100, 'cs', 'beagle.jpg', 'khongco'),
('ms09', 'Black and Tan Coonhound', 16000000, 100, 'cs', 'black_and_tan_coonhound.jpg', 'khongco'),
('ms10', 'Rottweiler', 10000000, 100, 'cs', 'rottweiler.jpg', 'khongco'),
('ms11', 'Dachshund', 17000000, 100, 'cs', 'dachshund.jpg', 'khongco'),
('ms12', 'English Foxhound', 18000000, 100, 'cs', 'english-foxhound.jpg', 'khongco'),
('ms13', 'German Shorthaired Pointer', 18000000, 100, 'cs', 'germanshorthairedpointer.jpg', 'khongco'),
('ms14', 'Becgie', 7000000, 100, 'cs', 'becgie.jpg', 'khongco');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(4) NOT NULL,
  `HoTenKH` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `username` varchar(16) DEFAULT NULL,
  `passwd` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `DiaChi`, `SoDienThoai`, `username`, `passwd`) VALUES
(1, 'Khách Hàng A', 'Q.Ninh Kiều TP.CT', '0795414444', 'kha', 'kha'),
(2, 'Khách Hàng B', 'Q.Tân Phú TP.HCM', '0857474154', 'khb', 'khb'),
(3, 'Khách Hàng C', 'An Giang', '0696585474', NULL, NULL),
(4, 'Khách Hàng D', 'Trà Vinh', '0696585969', NULL, NULL),
(5, 'Khách Hàng E', 'Bạc Liêu', '0696585969', NULL, NULL),
(6, 'Khách Hàng CC', 'An Giang', '0795414444', NULL, NULL),
(7, 'Nguyễn Văn A', 'Gò Vấp TP.HCM', '0123456789', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(4) NOT NULL,
  `HoTenNV` varchar(50) NOT NULL,
  `ChucVu` varchar(50) NOT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `username` varchar(16) DEFAULT NULL,
  `passwd` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `username`, `passwd`) VALUES
(1, 'Nhân Viên A', 'Quản lý', 'Cà Mau', '0784747484', 'nva', 'nva'),
(2, 'Nhân Viên B', 'Phục vụ', 'TP.HCM', '0896585475', 'nvb', 'nvb');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `MaNhom` varchar(5) NOT NULL,
  `TenNhom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhomhanghoa`
--

INSERT INTO `nhomhanghoa` (`MaNhom`, `TenNhom`) VALUES
('cc', 'Chó Cảnh'),
('cs', 'Chó Săn');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSNV` (`MSNV`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaNhom` (`MaNhom`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Chỉ mục cho bảng `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  ADD PRIMARY KEY (`MaNhom`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `SoDonDH` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`),
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaNhom`) REFERENCES `nhomhanghoa` (`MaNhom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
