-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2022 lúc 08:49 AM
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
-- Cơ sở dữ liệu: `database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', '2022-11-06 03:00:17', '2022-11-12 04:46:16'),
(2, 'Table', '2022-11-06 03:00:17', '2022-11-06 03:00:17'),
(3, 'Phụ kiện', '2022-11-12 05:17:54', '2022-11-12 05:17:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Chờ duyệt',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bẫy `order_details`
--
DELIMITER $$
CREATE TRIGGER `thg_delete_order` AFTER DELETE ON `order_details` FOR EACH ROW BEGIN
UPDATE products SET quantity = quantity + OLD.quantity WHERE id = OLD.product_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `thg_order` AFTER INSERT ON `order_details` FOR EACH ROW BEGIN
UPDATE products SET quantity = quantity - NEW.quantity WHERE id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `image`, `quantity`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại iPhone 13 Pro', 1, 'iphone-13-pro.png', 105, 29990000, 'Màn hình: OLED6.1\"Super Retina XDR.\r\nHệ điều hành: iOS 15.\r\nCamera sau: 3 camera 12 MP.\r\nCamera trước: 12 MP.\r\nChip: Apple A15 Bionic.\r\nRAM: 6 GB.\r\nBộ nhớ trong: 128 GB.\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G.\r\nPin, Sạc: 3095 mAh20 W', '2022-11-06 03:09:01', '2022-11-12 05:12:43'),
(2, 'Máy tính bảng iPad Pro M1 12.9 inch WiFi Cellular 128GB	', 2, 'ipad-pro-2021-129-inch-gray-600x600.png', 112, 29990000, 'Màn hình: 12.9\"Liquid Retina XDR mini-LED LCD.\r\nHệ điều hành: iPadOS 15.\r\nChip: Apple M1 8 nhân.\r\nRAM: 8 GB.\r\nBộ nhớ trong: 128 GB.\r\nKết nối: 5GNghe gọi qua FaceTime.\r\nSIM: 1 Nano SIM hoặc 1 eSIM.\r\nCamera sau: Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR.\r\nCamer', '2022-11-06 03:09:01', '2022-11-09 10:41:43'),
(3, 'Samsung Galaxy Z Fold3 5G', 1, 'sm-f926_zfold3_5g_openback_phantomsilver_210611.png', 101, 26990000, 'Màn hình: Dynamic AMOLED.\r\nInfinity-O Display, 38ppi, 120Hz.\r\nHệ điều hành: Android 11.\r\nCamera trước: 4MP.\r\nCamera sau: 3 Camera 12MP, 1 Camera 10MP.\r\nChipset: Snapdragon 888 5G (5 nm).\r\nRAM: 12 GB.\r\nBộ nhớ trong: 256 GB.\r\nSIM: 2 SIM (nano‑SIM và eSIM).\r\nPin: Li-Po 4400 mAh.', '2022-11-06 05:36:43', '2022-11-09 10:42:38'),
(4, 'Máy tính bảng iPad Pro M1 11 inch WiFi Cellular 1TB', 2, 'ipad-pro-m1-11-inch-wifi-cellular-bac-1.png', 102, 44590000, 'Màn hình: 11\"Liquid Retina.\r\nHệ điều hành: iPadOS 15.\r\nChip: Apple M1 8 nhân.\r\nRAM: 16 GB.\r\nBộ nhớ trong: 1 TB.\r\nKết nối: 5GNghe gọi qua FaceTime.\r\nSIM: 1 Nano SIM hoặc 1 eSIM.\r\nCamera sau: Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR.\r\nCamera trước: 12 MP.\r\nPin', '2022-11-06 07:24:07', '2022-11-09 10:40:15'),
(5, 'iPhone 11 64GB', 1, 'iphone-11-do-1-1-1-org.png', 100, 11499000, 'Công nghệ màn hình: IPS LCD.\r\nChuẩn màn hình: Liquid Retina HD.\r\nBộ nhớ trong: 64 GB.\r\nLoại SIM: 1 eSIM, 1 Nano SIM.\r\nDung lượng pin: 3110 mAh.\r\nOS: iOS.\r\n', '2022-11-09 08:38:29', '2022-11-09 10:42:56'),
(6, 'iPhone 14 Pro Max 128 GB', 1, '2222_iphone_14.png', 50, 32690000, 'Màn hình: OLED, Super Retina XDR.\r\nĐộ phân giải màn hình: 2796 x 1290 Pixels.\r\nCamera sau: 48 MP + 12 MP + 12 MP.\r\nCamera Selfie: 12 MP.\r\nRAM: 6 GB.\r\nBộ nhớ trong: 128 GB.\r\nCPU: Apple A16 Bionic.\r\nGPU: Apple GPU 6 nhân.\r\nTốc độ CPU: 3,46 GHz.\r\nTrọng lượng: 240g.\r\nThẻ sim: 1 eSIM, 1 Nano SIM.', '2022-11-09 10:47:17', '2022-11-12 07:48:32'),
(7, 'Airpods Pro 2020 (VN/A)', 3, '1405_airpods_pro_1.png', 50, 4490000, 'Hãng sản xuất: Apple.\r\nCổng/Khe cắm: Lightning.\r\nKích thước tai nghe: 30,9 - 21,8 - 24,0 mm.\r\nKích thước hộp sạc:	45,2 - 60,6 - 21,7 mm.\r\nChống nước: Chuẩn IPX4.\r\nBluetooth: 5.0.\r\nThời lượng pin: Thời gian nghe lên tới 4,5 giờ, đàm thoại lên tới 3,5 giờ.\r\nCảm biến	Micro dạng chùm kép, Micro hướng vào trong, Cảm biến quang kép, Gia tốc kế phát hiện chuyển động, Gia tốc phát hiện lời nói, Cảm biến lực.\r\nThơi lượng pin: Tai nghe : 4,5 giờ.\r\nHộp sạc: 24 giờ.\r\nCông nghệ âm thanh: Chống ồn chủ động, xuyên âm.\r\nTương thích:IOS, Android, Laptop có hỗ trợ Bluetooth, iPad, Macbook.', '2022-11-12 05:23:39', '2022-11-12 07:48:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `address`, `phone`, `role`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Lư Cẩm Long', 'Kiên Giang', '0349794177', 'admin', 'long@gmail.com', '123', '2022-11-06 07:57:17', '2022-11-09 10:35:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
