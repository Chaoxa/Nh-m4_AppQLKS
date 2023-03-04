-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 04, 2023 lúc 12:16 PM
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
('Quycute2003', '01e6cd1b208fb838b066b8d478f7fec2', 114, 'Trần Quang Quý', 'tranquy52003@gmail.com', '0375284572', 'public/uploads/avtfb.jpg', '25/02/2023 | 10:20', 2500);

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
(34, 113, '2000', '1', '04/03/2023 | 15:46', 'nhom-4_154');

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
(3, 114, '0', '04/03/2023 | 11:36', 8, '0'),
(4, 113, '0', '04/03/2023 | 13:53', 24, '0'),
(5, 113, '0', '04/03/2023 | 13:53', 24, '0'),
(6, 113, '0', '04/03/2023 | 13:54', 24, '0'),
(7, 113, '0', '04/03/2023 | 13:55', 24, '0'),
(8, 113, '0', '04/03/2023 | 13:55', 24, '0'),
(9, 113, '0', '04/03/2023 | 13:55', 24, '0'),
(10, 113, '0', '04/03/2023 | 13:59', 24, '0'),
(11, 113, '0', '04/03/2023 | 14:05', 24, '0'),
(12, 113, '0', '04/03/2023 | 14:05', 24, '0'),
(13, 113, '0', '04/03/2023 | 14:06', 24, '0'),
(14, 113, '0', '04/03/2023 | 14:21', 8, '0'),
(15, 113, '0', '04/03/2023 | 14:26', 8, '0'),
(16, 113, '0', '04/03/2023 | 14:29', 8, '0'),
(17, 113, '0', '04/03/2023 | 14:42', 33, '0'),
(18, 113, '0', '04/03/2023 | 14:58', 33, '0'),
(19, 113, '0', '04/03/2023 | 15:13', 8, '0'),
(20, 113, '0', '04/03/2023 | 15:19', 8, '0'),
(21, 113, '0', '04/03/2023 | 15:22', 8, '0'),
(22, 113, '0', '04/03/2023 | 15:22', 8, '0'),
(23, 113, '0', '04/03/2023 | 15:24', 8, '0'),
(24, 113, '0', '04/03/2023 | 15:24', 8, '0'),
(25, 113, '0', '04/03/2023 | 15:25', 8, '0'),
(26, 113, '0', '04/03/2023 | 15:25', 8, '0'),
(27, 113, '0', '04/03/2023 | 15:27', 8, '0'),
(28, 113, '0', '04/03/2023 | 15:27', 8, '0'),
(29, 113, '0', '04/03/2023 | 15:39', 8, '0'),
(30, 113, '0', '04/03/2023 | 15:40', 8, '0'),
(31, 113, '0', '04/03/2023 | 15:40', 8, '0'),
(32, 113, '0', '04/03/2023 | 15:40', 8, '0'),
(33, 113, '0', '04/03/2023 | 15:41', 8, '0'),
(34, 113, '0', '04/03/2023 | 15:41', 8, '0'),
(35, 113, '0', '04/03/2023 | 15:47', 7, '0'),
(36, 113, '0', '04/03/2023 | 15:47', 7, '0'),
(37, 113, '0', '04/03/2023 | 15:47', 7, '0'),
(38, 113, '0', '04/03/2023 | 15:47', 7, '0'),
(39, 113, '0', '04/03/2023 | 15:47', 7, '0'),
(40, 113, '0', '04/03/2023 | 15:49', 7, '0'),
(41, 113, '0', '04/03/2023 | 15:49', 7, '0'),
(42, 113, '0', '04/03/2023 | 15:49', 7, '0');

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
  `hotel_detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_name`, `thumb_main_room`, `thumb_detail`, `creator`, `time`, `parent_hotel`, `old_price`, `discount`, `new_price`, `hotel_desc`, `hotel_detail`) VALUES
(7, 'Phòng TQ 1', 'admin/public/uploads/thumb_main_room1.jpg', '[\"admin\\/public\\/uploads\\/thumb_main_room1.jpg\",\"admin\\/public\\/uploads\\/thumb_room1_detail1.jpg\"]', 'Quycute2003', '24/02/2023 | 01:47', 12, '515000', '32', '350200', 'Phòng đẹp', 'Phòng có 5 giường ngủ'),
(8, 'Phòng TQ 2', 'admin/public/uploads/thumb_main_room2.jpg', '[\"admin\\/public\\/uploads\\/thumb_room2_detail3.jpg\",\"admin\\/public\\/uploads\\/thumb_main_room2.jpg\",\"admin\\/public\\/uploads\\/thumb_room2_detail1.jpg\"]', 'Quycute2003', '24/02/2023 | 01:52', 12, '899000', '42', '521420', 'Phòng đẹp', 'Phòng có 5 giường ngủ'),
(9, 'Phòng PĐ 1', 'admin/public/uploads/thumb_room3_detail1.jpg', '[\"admin\\/public\\/uploads\\/thumb_room2_detail2.jpg\",\"admin\\/public\\/uploads\\/thumb_room2_detail3.jpg\",\"admin\\/public\\/uploads\\/thumb_room3_detail1.jpg\"]', 'Quycute2003', '24/02/2023 | 02:31', 13, '1000000', '50', '500000', 'Phòng đẹp', 'Phòng có 5 giường ngủ'),
(24, 'Room PĐ 1', 'admin/public/uploads/hotel-2.jpg', '[\"admin\\/public\\/uploads\\/hotel-5.jpg\",\"admin/public/uploads/hotel-2.jpg\"]', '', '24/02/2023 | 09:49', 10, '1000000', '50', '500000', 'Phòng đẹp', 'Phòng có 5 giường ngủ'),
(33, 'Trần Quang Quý', 'admin/public/uploads/thumb_main_room3.jpg', '[\"admin\\/public\\/uploads\\/hotel-5.jpg\",\"admin/public/uploads/hotel-2.jpg\"]', 'Quycute2003', '25/02/2023 | 04:04', 10, '515000', '32', '350200', 'sdfsd', 'sdfsd');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tbl_order_room`
--
ALTER TABLE `tbl_order_room`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
