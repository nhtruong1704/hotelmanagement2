-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2022 lúc 08:04 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hotel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_phone` varchar(20) DEFAULT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_phone`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', '7 937 051-95-69', 'admin@gmail.com', '123456'),
(2, 'Victor', '7 909 889-06-71', 'victorvu@mail.ru', '123456'),
(3, 'Hana', '7 907 447-19-50', 'hana@yandex.ru', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `bill_total_cost` int(11) NOT NULL,
  `bill_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`bill_id`, `bill_total_cost`, `bill_paid`) VALUES
(1, 13400, 0),
(2, 14200, 1),
(3, 27100, 1),
(4, 22400, 1),
(5, 30000, 0),
(6, 18700, 1),
(7, 21800, 1),
(8, 30800, 0),
(9, 30000, 0),
(10, 26000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chefs`
--

CREATE TABLE `chefs` (
  `chef_id` int(11) NOT NULL,
  `chef_name` varchar(50) NOT NULL,
  `chef_position` varchar(15) NOT NULL,
  `chef_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chefs`
--

INSERT INTO `chefs` (`chef_id`, `chef_name`, `chef_position`, `chef_salary`) VALUES
(1, 'Xiangling', 'Main', 30000),
(2, 'Diona', 'Sub', 40000),
(3, 'Hutao', 'Main', 50000),
(4, 'Barbara', 'Sub', 15000),
(5, 'Jean', 'Sub', 48000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `customers_email` varchar(50) NOT NULL,
  `customer_vip` int(11) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_birthday` varchar(20) DEFAULT NULL,
  `customer_gender` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_phone`, `customer_address`, `customers_email`, `customer_vip`, `customer_password`, `customer_birthday`, `customer_gender`) VALUES
(1, 'Albedo', '7 936 761-22-58', 'Russia', 'Albedo123@mail.ru', 0, '123456', '01.01.1998', 1),
(2, 'Aloy', '7 979 873-34-85', 'America', 'Aloy159@mail.ru', 1, '123456', '02.01.2000', 0),
(3, 'Fischl', '7 932 950-78-97', 'France', 'Fischl456@mail.ru', 0, '123456', '13.02.1997', 0),
(4, 'Beidou', '7 954 601-49-72', 'China', 'Beidou78@mail.ru', 1, '123456', '04.01.1994', 0),
(5, 'Kaedehara Kazuha', '7 937 051-95-69', 'Japan', 'Kaedehara81@mail.ru', 0, '123456', '25.01.1991', 1),
(6, 'Diluc', '7 909 889-06-71', 'Vienam', 'Diluc789@mail.ru', 0, '123456', '06.04.1998', 1),
(7, 'Eula', '7 907 447-19-50', 'Korea', 'Eula1212@mail.ru', 1, '123456', '07.01.2001', 0),
(8, 'Kujou Sara', '7 962 383-13-46', 'England', 'Kujou456@mail.ru', 1, '123456', '08.06.1998', 0),
(9, 'Tartaglia', '7 934 886-20-13', 'Italy', 'Tartaglia123@mail.ru', 0, '123456', '19.02.1992', 1),
(10, 'Venti', '7 974 896-45-63', 'Ireland', 'Venti7879@mail.ru', 0, '123456', '10.01.1992', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fooditems`
--

CREATE TABLE `fooditems` (
  `fooditem_id` int(11) NOT NULL,
  `fooditem_name` varchar(50) NOT NULL,
  `fooditem_price` int(11) NOT NULL,
  `fooditem_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `fooditems`
--

INSERT INTO `fooditems` (`fooditem_id`, `fooditem_name`, `fooditem_price`, `fooditem_description`) VALUES
(1, 'Chilli and pineapple jam', 2500, 'A sweet jam made from habanero chilli and fresh pineapple'),
(2, 'Rhubarb and cardamom cheesecake', 3100, 'A rich cheesecake layered with fresh rhubarb and green cardamom'),
(3, 'Bran and orange muffins', 1200, 'Crumbly muffins made with bran and sweet orange'),
(4, 'Cucumber and egg maki', 1500, 'Toasted seaweed wrapped around sushi rice, filled with fresh cucumber and free range eggs'),
(5, 'Mandarine and kumquat jam', 700, 'A sweet jam made from fresh mandarine and kumquat'),
(6, 'Sausage and spinach wontons', 3000, 'Thin wonton cases stuffed with spicy sausage and fresh spinach'),
(7, 'Almond and pecan pancake', 4000, 'Fluffy pancake filled with blanched almond and pecan'),
(8, 'Eel and mango cake', 3200, 'Rich cake made with eel and fresh mango'),
(9, 'Chilli and cocoa cake', 1400, 'Rich cake made with hot chilli and cocoa'),
(10, 'Honey and bran biscuits', 1900, 'Crunchy biscuits made with acacia honey and bran'),
(11, 'Hazelnut and spinach pancake', 1000, 'Crispy pancake filled with hazelnut and fresh spinach'),
(12, 'Raspberry and soda bread', 1400, 'Crunchy bread made with fresh raspberry and soda'),
(13, 'Date and pumpkin seed cupcakes', 1800, 'Crumbly cupcakes made with moist date and pumpkin seeds'),
(14, 'Grouse and crayfish panini', 2600, 'A hot, pressed panini filled with grouse and crayfish'),
(15, 'Blackcurrant and thyme cake', 700, 'Rich cake made with fresh blackcurrant and dried thyme'),
(16, 'Jalapeno and persimmon wontons', 1800, 'Thin wonton cases stuffed with fresh jalapeno and persimmon'),
(17, 'Sorrel and lemon biscuits', 4100, 'Crunchy biscuits made with sorrel and tangy lemon'),
(18, 'Rosemary and stilton parcels', 2900, 'Thin filo pastry cases stuffed with dried rosemary and stilton'),
(19, 'Falafel and grouse bagel', 4000, 'A warm bagel filled with falafel and grouse'),
(20, 'Almond and bilberry jam', 3400, 'A rich jam made from toasted almond and fresh bilberry');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `foodorders`
--

CREATE TABLE `foodorders` (
  `foodorder_id` int(11) NOT NULL,
  `foodorder_no` int(11) NOT NULL,
  `fooditem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `foodorders`
--

INSERT INTO `foodorders` (`foodorder_id`, `foodorder_no`, `fooditem_id`) VALUES
(1, 2022001, 15),
(2, 2022002, 19),
(3, 2022003, 2),
(4, 2022004, 4),
(5, 2022005, 20),
(6, 2022006, 12),
(7, 2022007, 6),
(8, 2022008, 9),
(9, 2022009, 15),
(10, 20220010, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `housekeepings`
--

CREATE TABLE `housekeepings` (
  `housekeeping_id` int(11) NOT NULL,
  `housekeeping_name` varchar(50) NOT NULL,
  `housekeeping_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `housekeepings`
--

INSERT INTO `housekeepings` (`housekeeping_id`, `housekeeping_name`, `housekeeping_salary`) VALUES
(1, 'Sangonomiya Kokomi', 19000),
(2, 'Qiqi', 15000),
(3, 'Klee', 12000),
(4, 'Xiao', 18000),
(5, 'Ningguang', 29000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receptionists`
--

CREATE TABLE `receptionists` (
  `receptionist_id` int(11) NOT NULL,
  `receptionist_name` varchar(50) NOT NULL,
  `receptionist_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `receptionists`
--

INSERT INTO `receptionists` (`receptionist_id`, `receptionist_name`, `receptionist_salary`) VALUES
(1, 'Zhongli', 9000),
(2, 'Yoimiya', 8000),
(3, 'Sucrose', 10000),
(4, 'Sayu', 8500),
(5, 'Rosaria', 9000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(20) NOT NULL,
  `room_price` int(11) NOT NULL,
  `room_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `room_price`, `room_description`) VALUES
(1, 'A100', 3000, '1 спальня • 1 ванная комната • 30m²2 кровати (1 особо широкая двуспальная, 2 диван-кровать)'),
(2, 'A101', 5000, '2 спальня • 1 ванная комната • 50m²2 кровати (2 особо широкая двуспальная, 1 диван-кровать)'),
(3, 'A102', 6000, '2 спальня • 2 ванная комната • 60m²2 кровати (2 особо широкая двуспальная, 2 диван-кровать)'),
(4, 'A103', 4000, '2 спальня • 1 ванная комната • 40m²2 кровати (2 особо широкая двуспальная, 2 диван-кровать)'),
(5, 'A104', 2000, '1 спальня • 1 ванная комната • 30m²2 кровати (1 особо широкая двуспальная, 1 диван-кровать)'),
(6, 'A105', 4000, ' 2 спальня • 1 ванная комната • 50m²2 кровати (1 особо широкая двуспальная, 1 диван-кровать)'),
(7, 'A106', 2000, '1 спальня • 1 ванная комната • 60m²2 кровати (1 особо широкая двуспальная, 1 диван-кровать)'),
(8, 'A107', 4000, '2 спальня • 1 ванная комната • 50m²2 кровати (2 особо широкая двуспальная, 1 диван-кровать)'),
(9, 'A108', 3000, '1 спальня • 1 ванная комната • 30m²2 кровати (1 особо широкая двуспальная, 1 диван-кровать)'),
(10, 'A109', 3000, '2 спальня • 1 ванная комната • 40m²2 кровати (1 особо широкая двуспальная, 1 диван-кровать)'),
(11, 'A110', 5000, '2 спальня • 1 ванная комната • 30m²2 кровати (2 особо широкая двуспальная, 2 диван-кровать)'),
(12, 'B201', 6000, 'Кровати: 1 двуспальная или 2 односпальные'),
(13, 'B202', 4000, 'Стандартный двухместный номер с 1 кроватью • 1 большая двуспальная кровать'),
(14, 'B203', 2000, 'Кровати: 1 двуспальная или 2 односпальные'),
(15, 'B204', 4000, 'Стандартный двухместный номер с 1 кроватью • 1 большая двуспальная кровать'),
(16, 'B205', 2000, 'Кровати: 1 двуспальная или 2 односпальные'),
(17, 'B206', 4000, 'Двухместный номер эконом-класса с 1 кроватью на мансардном или цокольном этаже, без окна'),
(18, 'B207', 3000, 'Двухместный номер эконом-класса с 1 кроватью на мансардном или цокольном этаже, без окна'),
(19, 'B208', 9000, 'Двухместный номер с 1 кроватью или 2 отдельными кроватями • Кровати: 1 двуспальная или 2 односпальные'),
(20, 'B209', 4000, 'Двухместный номер эконом-класса с 1 кроватью на мансардном или цокольном этаже, без окна'),
(21, 'B210', 2000, 'Двухместный номер эконом-класса с 1 кроватью на мансардном или цокольном этаже, без окна'),
(22, 'C301', 4000, 'Номер с кроватью размера «queen-size» и общей ванной комнатой • 2 большая двуспальная кровать'),
(23, 'C302', 2000, 'Номер с кроватью размера «queen-size» и общей ванной комнатой • 1 большая двуспальная кровать'),
(24, 'C303', 4000, 'Номер с кроватью размера «queen-size» и общей ванной комнатой • 2 большая двуспальная кровать'),
(25, 'C304', 6000, 'Номер с кроватью размера «queen-size» и общей ванной комнатой • 3 большая двуспальная кровать'),
(26, 'C305', 4000, 'Номер с кроватью размера «queen-size» и общей ванной комнатой • 2 большая двуспальная кровать'),
(27, 'C306', 2000, 'Номер с кроватью размера «queen-size» и общей ванной комнатой • 1 большая двуспальная кровать'),
(28, 'C307', 4000, '3 кровати (2 односпальные, 1 широкая двуспальная)'),
(29, 'C308', 3000, '2 кровати (1 односпальные, 1 широкая двуспальная)'),
(30, 'C309', 6000, '3 кровати (2 односпальные, 1 широкая двуспальная)'),
(31, 'C310', 10000, '4 кровати (2 односпальные, 2 широкая двуспальная)');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Chỉ mục cho bảng `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`chef_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `fooditems`
--
ALTER TABLE `fooditems`
  ADD PRIMARY KEY (`fooditem_id`);

--
-- Chỉ mục cho bảng `foodorders`
--
ALTER TABLE `foodorders`
  ADD PRIMARY KEY (`foodorder_id`),
  ADD KEY `fooditem_id` (`fooditem_id`);

--
-- Chỉ mục cho bảng `housekeepings`
--
ALTER TABLE `housekeepings`
  ADD PRIMARY KEY (`housekeeping_id`);

--
-- Chỉ mục cho bảng `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`receptionist_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chefs`
--
ALTER TABLE `chefs`
  MODIFY `chef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `fooditems`
--
ALTER TABLE `fooditems`
  MODIFY `fooditem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `foodorders`
--
ALTER TABLE `foodorders`
  MODIFY `foodorder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `housekeepings`
--
ALTER TABLE `housekeepings`
  MODIFY `housekeeping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `receptionist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `foodorders`
--
ALTER TABLE `foodorders`
  ADD CONSTRAINT `fooditem_id` FOREIGN KEY (`fooditem_id`) REFERENCES `fooditems` (`fooditem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
