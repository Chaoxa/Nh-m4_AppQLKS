-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2023 lúc 10:15 PM
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
  `address` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `guest`
--

INSERT INTO `guest` (`username`, `password`, `users_id`, `fullname`, `email`, `tel`, `avt`, `date_reg`, `address`) VALUES
('Quycute2003', '01e6cd1b208fb838b066b8d478f7fec2', 92, 'Trần Quang Quý', 'tranquy52003@gmail.com', '0375284572', 'public/uploads/avtfb.jpg', '01/09/2022', 'Hà Nội'),
('Tungbeng2003', '01e6cd1b208fb838b066b8d478f7fec2', 111, 'Nguyễn Viết Tùng', 'tungnguyenviet23062003@gmail.com', '0375284572', 'https://c2.staticflickr.com/8/7628/27739307291_c43b62d5df_b.jpg', '29/09/2022', 'Thôn Đình'),
('Phancuong1988', '01e6cd1b208fb838b066b8d478f7fec2', 112, 'Phan Văn Cương', 'chaoxa@yahoo.com', '0868690603', 'https://c2.staticflickr.com/8/7628/27739307291_c43b62d5df_b.jpg', '29/09/2022', 'TP Hồ Chí Minh');

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
-- Cấu trúc bảng cho bảng `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id` int(10) NOT NULL,
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

INSERT INTO `tbl_room` (`id`, `room_name`, `thumb_main_room`, `thumb_detail`, `creator`, `time`, `parent_hotel`, `old_price`, `discount`, `new_price`, `hotel_desc`, `hotel_detail`) VALUES
(7, 'Phòng TQ 1', 'admin/public/uploads/thumb_main_room1.jpg', '[\"admin\\/public\\/uploads\\/thumb_main_room1.jpg\",\"admin\\/public\\/uploads\\/thumb_room1_detail1.jpg\",\"admin\\/public\\/uploads\\/thumb_room1_detail2.jpg\",\"admin\\/public\\/uploads\\/thumb_room1_detail3.jpg\"]', 'Quycute2003', '24/02/2023 | 01:47', 12, '515000', '32', '350200', 'Phòng đẹp', 'Phòng có 5 giường ngủ'),
(8, 'Phòng TQ 2', 'admin/public/uploads/thumb_main_room2.jpg', '[\"admin\\/public\\/uploads\\/thumb_room2_detail3.jpg\",\"admin\\/public\\/uploads\\/thumb_main_room2.jpg\",\"admin\\/public\\/uploads\\/thumb_room2_detail1.jpg\",\"admin\\/public\\/uploads\\/thumb_room2_detail2.jpg\"]', 'Quycute2003', '24/02/2023 | 01:52', 12, '899000', '42', '521420', 'Phòng đẹp', 'Phòng có 5 giường ngủ'),
(9, 'Phòng PĐ 1', 'admin/public/uploads/thumb_room3_detail1.jpg', '[\"admin\\/public\\/uploads\\/thumb_room2_detail2.jpg\",\"admin\\/public\\/uploads\\/thumb_room2_detail3.jpg\",\"admin\\/public\\/uploads\\/thumb_room3_detail1.jpg\",\"admin\\/public\\/uploads\\/thumb_room3_detail2.jpg\"]', 'Quycute2003', '24/02/2023 | 02:31', 13, '1000000', '50', '500000', 'Phòng đẹp', 'Phòng có 5 giường ngủ'),
(24, 'Room PĐ 1', 'admin/public/uploads/hotel-2.jpg', '[\"admin\\/public\\/uploads\\/hotel-5.jpg\"]', '', '24/02/2023 | 09:49', 10, '1000000', '50', '500000', 'Phòng đẹp', 'Phòng có 5 giường ngủ'),
(33, 'Trần Quang Quý', 'admin/public/uploads/thumb_main_room3.jpg', '[\"admin\\/public\\/uploads\\/hotel-5.jpg\"]', 'Quycute2003', '25/02/2023 | 04:04', 10, '515000', '32', '350200', 'sdfsd', 'sdfsd');

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
-- Chỉ mục cho bảng `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `users_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT cho bảng `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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