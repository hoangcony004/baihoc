-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 05, 2022 lúc 02:53 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pro_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_nhanvien`
--

CREATE TABLE `admin_nhanvien` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `lv` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin_nhanvien`
--

INSERT INTO `admin_nhanvien` (`id`, `username`, `password`, `full_name`, `lv`) VALUES
(5, 'admin', '123456789', 'Nguyễn Vân', 1),
(14, 'Aptech', 'aptech', 'Aptechfkjdklfjdlfk', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`) VALUES
(1, 'Điện thoại'),
(2, 'Ipad'),
(3, 'Máy tính'),
(4, 'Sony');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

CREATE TABLE `oder` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amount` decimal(15,0) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder`
--

INSERT INTO `oder` (`id`, `full_name`, `address`, `phone`, `email`, `amount`, `status`) VALUES
(1, 'Van', 'abc', '09121323', 'van.cdcd@gmail.com', '600000', 0),
(2, 'Aptech', 'Ha Noi', '948484', 'kgjkl@gmail.com', '600000', 1),
(4, 'Aptech1', 'Hanoi', '03939', 'akdfj@gmail.com', '1150000', 1),
(8, 'VANVAN', 'HANOI', '0948444', 'bsluuthanh@gmail.com', '0', 1),
(16, 'VANVAN', 'Ha Noi', '343434', 'bsluuthanh@gmail.com', '0', 1),
(32, 'VANVAN22', 'Ha Noi', '343434', 'bsluuthanh@gmail.com', '400000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder_detail`
--

CREATE TABLE `oder_detail` (
  `id` int(11) NOT NULL,
  `oder_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `amount` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder_detail`
--

INSERT INTO `oder_detail` (`id`, `oder_id`, `product_id`, `qty`, `price`, `amount`) VALUES
(1, 1, 7, 3, '200000', '600000'),
(2, 2, 7, 3, '200000', '600000'),
(3, 4, 7, 3, '200000', '600000'),
(4, 4, 9, 1, '450000', '450000'),
(5, 4, 8, 1, '100000', '100000'),
(6, 32, 1, 1, '100000', '100000'),
(7, 32, 7, 1, '200000', '200000'),
(8, 32, 8, 1, '100000', '100000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `amount` int(11) NOT NULL,
  `img_link` varchar(50) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `price`, `amount`, `img_link`, `content`) VALUES
(1, 1, 'Điện thoại Iphone', '100000', 122, '../img/1.jpg', 'cực đẹp'),
(7, 1, 'Điện thoại Iphone', '200000', 11, '../img/3.jpg', 'Đẹp cực kì rất đẹp'),
(8, 1, 'Điện thoại Iphone 13', '100000', 88, '../img/2.jpg', 'Samsung Gala1xy X'),
(9, 1, 'Điện thoại Iphone 13', '450000', 122, '../img/4.jpg', 'Samsung Gala1xy X'),
(10, 1, 'Điện thoại Iphone 13', '130000', 123, '../img/5.jpg', 'Đẹp cực kì'),
(11, 2, 'Ipad thế hệ mới', '900000', 10, '../img/6.jpg', 'Samsung Gala1xy X'),
(12, 2, 'Ipad thế hệ mới', '10000', 123, '../img/7.jpg', 'Đẹp cực kì'),
(13, 2, 'Ipad thế hệ mới', '100000', 123, '../img/8.jpg', 'Samsung Gala1xy X'),
(14, 2, 'Ipad thế hệ mới', '20000000', 20, '../img/9.jpg', 'Ipad thế hệ mới nhiều tính năng mới'),
(15, 3, 'Máy tính Macbook new', '20000000', 20, '../img/10.jpg', 'MacBook Air 2020 13 inch Apple M1 8GB RAM 256GB SSD - NEW'),
(16, 3, 'Máy tính Macbook', '15000000', 20, '../img/11.jpg', 'MacBook Air 2020 13 inch Apple M1 8GB RAM 256GB SSD - NEW'),
(17, 3, 'Máy tính Macbook new', '15000000', 20, '../img/12.jpg', '\r\nMacOne\r\nMacBook Air 2020 13 inch Apple M1 8GB RAM 256GB SSD - NEW');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `star` int(1) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_nhanvien`
--
ALTER TABLE `admin_nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oder_detail`
--
ALTER TABLE `oder_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oder_detail_ibfk_1` (`oder_id`),
  ADD KEY `oder_detail_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`catalog_id`);

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_ibfk_1` (`user_id`),
  ADD KEY `rate_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_nhanvien`
--
ALTER TABLE `admin_nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `oder_detail`
--
ALTER TABLE `oder_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `oder_detail`
--
ALTER TABLE `oder_detail`
  ADD CONSTRAINT `oder_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
