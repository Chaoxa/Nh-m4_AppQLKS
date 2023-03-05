-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 05, 2023 lúc 08:26 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlks_traveloka`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guest`
--

CREATE TABLE `guest` (
  `username` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `users_id` int(10) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `avt` varchar(1000) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `date_reg` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `coin` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `guest`
--

INSERT INTO `guest` (`username`, `password`, `users_id`, `fullname`, `email`, `tel`, `avt`, `date_reg`, `coin`) VALUES
('Chaoxa2003', '01e6cd1b208fb838b066b8d478f7fec2', 113, 'Trần Quang Quý', 'tranquy52003@gmail.com', '0375284572', 'public/uploads/avt_zalo.jpg', '25/02/2023 | 10:17', 247),
('Quycute2003', '01e6cd1b208fb838b066b8d478f7fec2', 114, 'Trần Quang Quý', 'tranquy52003@gmail.com', '0375284572', 'public/uploads/avtfb.jpg', '25/02/2023 | 10:20', 563);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `thumb_main` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`id`, `name`, `thumb_main`, `address`, `creator`, `time`) VALUES
(10, 'Khách sạn Park TQ Saigon', 'admin/public/uploads/hotel-1.jpg', 'TP.Hồ Chí Minh', 'Quycute2003', '23/02/2023 | 00:18'),
(11, 'Khách sạn Capella Hanoi', 'admin/public/uploads/hotel-2.jpg', 'Hà Nội', 'Quycute2003', '23/02/2023 | 00:21'),
(12, 'Khách sạn InterContinental Hanoi Westlake', 'admin/public/uploads/hotel-5.jpg', 'Hà Nội', 'Quycute2003', '23/02/2023 | 00:21'),
(13, 'Khách sạn InterContinental Saigon ', 'admin/public/uploads/hotel-4.jpg', 'Đà Nẵng', 'Quycute2003', '23/02/2023 | 00:22'),
(14, 'Khách sạn Sofitel Legend Metropole Thanh Hóa', 'admin/public/uploads/hotel-3.jpg', 'Thanh Hóa', 'Quycute2003', '23/02/2023 | 00:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_coin`
--

CREATE TABLE `tbl_order_coin` (
  `id` int(10) NOT NULL,
  `guest_parent` int(10) NOT NULL,
  `amount_coin` varchar(10) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `time` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_coin`
--

INSERT INTO `tbl_order_coin` (`id`, `guest_parent`, `amount_coin`, `status`, `time`, `code`) VALUES
(28, 114, '1000', '1', '02/03/2023 | 02:26', 'nhom-4_022'),
(29, 114, '100000', '1', '02/03/2023 | 03:31', 'nhom-4_033'),
(30, 114, '1120', '0', '02/03/2023 | 10:13', 'nhom-4_101'),
(31, 113, '1120', '0', '02/03/2023 | 10:34', 'nhom-4_103'),
(32, 114, '1120', '0', '04/03/2023 | 11:47', 'nhom-4_114'),
(33, 113, '13056', '0', '04/03/2023 | 14:57', 'nhom-4_145'),
(34, 113, '2000', '1', '04/03/2023 | 15:46', 'nhom-4_154'),
(35, 114, '1000', '1', '04/03/2023 | 19:03', 'nhom-4_190'),
(36, 114, '1120', '1', '04/03/2023 | 19:10', 'nhom-4_191');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_room`
--

CREATE TABLE `tbl_order_room` (
  `order_id` int(10) NOT NULL,
  `guest_id` int(10) NOT NULL,
  `room_status` enum('0','1') DEFAULT '0',
  `time` varchar(50) NOT NULL,
  `room_id` int(10) NOT NULL,
  `payment_methods` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_room`
--

INSERT INTO `tbl_order_room` (`order_id`, `guest_id`, `room_status`, `time`, `room_id`, `payment_methods`) VALUES
(67, 114, '0', '04/03/2023 | 19:33', 33, '0'),
(68, 114, '0', '04/03/2023 | 19:35', 33, '0'),
(69, 114, '0', '04/03/2023 | 22:52', 9, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_room`
--

CREATE TABLE `tbl_room` (
  `room_id` int(10) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `thumb_main_room` text NOT NULL,
  `thumb_detail` text NOT NULL,
  `creator` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `parent_hotel` int(10) NOT NULL,
  `old_price` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `new_price` varchar(50) NOT NULL,
  `hotel_desc` text DEFAULT NULL,
  `hotel_detail` text DEFAULT NULL,
  `number_rooms` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_name`, `thumb_main_room`, `thumb_detail`, `creator`, `time`, `parent_hotel`, `old_price`, `discount`, `new_price`, `hotel_desc`, `hotel_detail`, `number_rooms`) VALUES
(7, 'Phòng TQ 1', 'admin/public/uploads/thumb_main_room1.jpg', '[\"admin\\/public\\/uploads\\/thumb_main_room1.jpg\",\"admin\\/public\\/uploads\\/thumb_room1_detail1.jpg\"]', 'Quycute2003', '24/02/2023 | 01:47', 12, '515000', '32', '350200', 'Phòng đẹp', 'Phòng có 5 giường ngủ', '0'),
(8, 'Phòng TQ 2', 'admin/public/uploads/thumb_main_room2.jpg', '[\"admin\\/public\\/uploads\\/thumb_room2_detail3.jpg\",\"admin\\/public\\/uploads\\/thumb_main_room2.jpg\",\"admin\\/public\\/uploads\\/thumb_room2_detail1.jpg\"]', 'Quycute2003', '24/02/2023 | 01:52', 12, '899000', '42', '521420', 'Phòng đẹp', 'Phòng có 5 giường ngủ', '0'),
(9, 'Phòng PĐ 1', 'admin/public/uploads/thumb_room3_detail1.jpg', '[\"admin\\/public\\/uploads\\/thumb_room2_detail2.jpg\",\"admin\\/public\\/uploads\\/thumb_room2_detail3.jpg\",\"admin\\/public\\/uploads\\/thumb_room3_detail1.jpg\"]', 'Quycute2003', '24/02/2023 | 02:31', 13, '1000000', '50', '500000', 'Phòng đẹp', 'Phòng có 5 giường ngủ', '0'),
(24, 'Room PĐ 1', 'admin/public/uploads/hotel-2.jpg', '[\"admin\\/public\\/uploads\\/hotel-5.jpg\",\"admin/public/uploads/hotel-2.jpg\"]', '', '24/02/2023 | 09:49', 10, '1000000', '50', '500000', 'Phòng đẹp', 'Phòng có 5 giường ngủ', '0'),
(33, 'Trần Quang Quý', 'admin/public/uploads/thumb_main_room3.jpg', '[\"admin\\/public\\/uploads\\/hotel-5.jpg\",\"admin/public/uploads/hotel-2.jpg\"]', 'Quycute2003', '25/02/2023 | 04:04', 10, '515000', '32', '350200', 'sdfsd', 'sdfsd', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fullname`, `username`, `password`, `email`, `phone`) VALUES
(1, 'Trần Quang Quý', 'Quycute2003', '01e6cd1b208fb838b066b8d478f7fec2', 'tranquy52003@gmail.com', '0375284572');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`users_id`);

--
-- Chỉ mục cho bảng `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order_coin`
--
ALTER TABLE `tbl_order_coin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order_room`
--
ALTER TABLE `tbl_order_room`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `parent_hotel` (`parent_hotel`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `guest`
--
ALTER TABLE `guest`
  MODIFY `users_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_order_coin`
--
ALTER TABLE `tbl_order_coin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `tbl_order_room`
--
ALTER TABLE `tbl_order_room`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD CONSTRAINT `tbl_room_ibfk_1` FOREIGN KEY (`parent_hotel`) REFERENCES `tbl_hotel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
