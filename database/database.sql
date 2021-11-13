-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 05:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `specialties`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Chả Cá'),
(2, 'Xu Xoa'),
(3, 'Cá Khô'),
(4, 'Tỏi Lý Sơn');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `subject_name`, `note`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Khanh', 'Nguyen Khac', 'encacap@gmail.com', '21312312321', 'chu de 1', 'Noi dung 1', '2021-10-22 16:22:55', '2021-10-22 11:29:52', 1),
(2, 'Tan', 'Tran Minh', 'TranTamDa@gmail.com', '0387565425', 'chu de 2', 'Noi dung 2', '2021-10-22 16:22:55', '2021-10-27 13:11:32', 1),
(3, 'Dongn', 'Nguyen Tan Ngoc', 'dongn@gmail.com', '0123456789', 'abc', 'accc', '2021-10-22 16:31:18', '2021-10-22 11:32:52', 1),
(4, 'DMT', 'HJE', 'Dmt142857@gmail.com', '', '123123123', '123123123', '2021-10-27 13:10:48', '2021-10-27 13:11:33', 1),
(5, 'Kabi', 'Kem', 'kabikem@gmail.com', '+84967025996', 'eqweqweqwe', 'qweqweqweqe', '2021-10-27 13:11:16', '2021-10-27 13:11:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `status`, `total_money`) VALUES
(1, 3, 'Nguyen Tan Ngoc Dong', 'dongn@gmail.com', '0123456789', 'Toky, quan 12, HCM', 'ABC', '2021-10-22 16:43:54', 1, 420000),
(2, 2, 'Tran Minh Tan', 'TranTamDa@gmail.com', '0387565425', 'Quan 12,HCM ', 'ABC', '2021-10-21 16:43:54', 2, 375000),
(3, 1, 'Nguyen Khac Khanh', 'encacap@gmail.com', '', 'Quan 12, HCM', '', '2021-10-27 12:42:16', 1, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`) VALUES
(1, 2, 1, 175000, 1, 175000),
(2, 2, 2, 200000, 1, 200000),
(3, 1, 3, 150000, 2, 300000),
(4, 1, 4, 120000, 1, 120000),
(5, 3, 5, 350000, 1, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 2, 'RONG ĐÔNG NẤU XU XOA', 200000, 175000, 'https://haisanso1.vn/wp-content/uploads/2021/01/rau-do%CC%82ng.jpg', '<p>Là một món ăn đặc trưng mang đậm hương vị từ biển, được nấu từ rong mọc tự nhiên trên các mỏm đá ven bờ. Khi ăn cảm giác mềm giòn dai như thạch rau câu. cách nấu xu xoa bằng rong biển vô cùng đơn giản, cuối tuần này, vào bếp trổ tài ngay để mang hương vị biển đến với căn bếp của bạn nhé!</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"font-weight: bold;\">Nguyên liệu chính:</strong></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\">&nbsp;</p>', '2021-10-22 14:03:21', '2021-10-27 08:26:11', 0),
(2, 1, 'CHẢ CÁ LÝ SƠN', 215000, 200000, 'https://dacsandanang365.com/wp-content/uploads/2019/10/ch%E1%BA%A3-c%C3%A1-%C4%90%E1%BB%8F-L%C3%BD-S%C6%A1n-2.jpg', 'Là một món ăn đặc trưng mang đậm hương vị từ biển, được nấu từ rong mọc tự nhiên trên các mỏm đá ven bờ. Khi ăn cảm giác mềm giòn dai như thạch rau câu. cách nấu xu xoa bằng rong biển vô cùng đơn giản, cuối tuần này, vào bếp trổ tài ngay để mang hương vị biển đến với căn bếp của bạn nhé!Quy trình chế biến hoàn toàn bằng thủ công: Cá được rửa sạch, dùng muỗng nạo tách thịt cá ra khỏi xương. Sau đó, bỏ thịt cá vào thau, nêm nếm gia vị tỏi tiêu, muối, bột ngọt rồi dùng tay nhào bóp cho đến khi chúng quyện chặt săn lại là được&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(37, 37, 43); font-family: Roboto, Helvetica, Arial, sans-serif;\"><strong style=\"font-weight: bold;\">Mục đích sử dụng:</strong><br>Bạn có thể sử dụng làm món bún chả cá Lý Sơn, canh chả cá Lý Sơn, ram chả cá đỏ Lý Sơn', '2021-10-22 09:53:21', '2021-10-22 09:27:06', 0),
(3, 1, 'CHẢ CÁ ĐỎ LÝ SƠN', 320000, 300000, 'https://toplist.vn/images/800px/dia-chi-ban-cha-ca-chat-luong-nhat-quang-ngai-416454.jpg', '<p style=\"text-align: justify; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 1.08rem; margin: auto; outline: 0px; padding: 5px 0px; vertical-align: baseline; line-height: 1.9rem; text-rendering: geometricprecision; color: rgb(32, 32, 32); max-width: 760px; font-family: sans-serif, Arial;\"> Lý Sơn đâu chỉ có mùi thơm của hành tỏi, mà nơi đây còn nức tiếng bởi món chả cá đỏ củ, thơm ngon nức tiếng, ai mà đã một lần thưởng thức sẽ nhớ hương vị đặc trưng của nó ngay, mùi thơm đặc trưng của thịt cá hoà cùng các loại gia vị, rồi độ dai ngọt kích thích vị giác người ăn vô cùng.</p>', '2021-10-22 09:14:29', '2021-10-22 11:55:44', 0),
(4, 1, 'CHẢ CÁ SỐNG LÝ SƠN', 125000, 120000, 'https://www.taidanang.com/wp-content/uploads/2019/06/bat-mi-dia-chi-ban-cha-ca-da-nang-vua-ngon-lai-vua-re-3.jpg', 'noi dung 2', '2021-10-22 09:19:49', '2021-10-22 11:06:45', 0),
(5, 2, 'RONG BIỂN ĐEN TỰ NHIÊN', 350000, 350000, 'https://haisanlyson.com.vn/wp-content/uploads/sites/26/2020/12/77-2-436x272.jpg', 'Rong biển đen tự nhiên đây là loại rong được vớt từ biển sau đó đêm phơi khô thành phẩm. . ', '2021-10-22 14:03:21', '2021-10-22 14:03:21', 0),
(6, 1, 'MỨT RONG BIỂN CHÁY TỎI ĐEN', 75000, 75000, 'https://haisanlyson.com.vn/wp-content/uploads/sites/26/2020/12/2222222-300x300.jpg', 'Mứt Rong Biển Đen dùng rất tốt cho sức khỏe, tim mạch, huyết ap, đái tháo đường, thanh lọc cơ thể', '2021-10-22 09:53:21', '2021-10-22 09:27:06', 0),
(7, 3, 'CÁ CƠM KHÔ', 255000, 250000, 'https://haisanlyson.com.vn/wp-content/uploads/sites/26/2021/11/f-min.jpg', 'Có thể chế biến thành Cá Cơm Riêm Mắm, Cá Cơm Sấy Giòn, Cá Cơm Nướng ', '2021-10-22 09:53:21', '2021-10-22 09:27:06', 0),
(8, 3, 'CÁ VÀNG CHỈ KHÔ', 250000, 250000, 'https://haisanlyson.com.vn/wp-content/uploads/sites/26/2021/11/j_optimized.jpg', 'Cá Chỉ Vàng Khô Được phơi trong điều kiện nắng gắt của miền trung, khi phơi sẽ bốc mùi thơm của cá tươi và màu sắc sặc vàng óng anh  trông rất đẹp mắt nhưng cũng nhiều giá trị dinh dưỡng', '2021-10-22 09:19:49', '2021-10-22 11:06:45', 0),
(9, 2, 'RONG BIỂN TƯƠI TỰ NHIÊN', 240000, 230000, 'https://haisanlyson.com.vn/wp-content/uploads/sites/26/2020/12/6.jpg', 'Rau Bồng Bồng đây là loại rau tự nhiên mà chỉ mỗi Đảo Lý Sơn mới có loại rau này là một trong những sản vật quý và hiểm của Đảo Lý Sơn. ', '2021-10-22 14:03:21', '2021-10-22 14:03:21', 0),
(10, 3, 'CÁ MỐI KHÔ', 190000, 180000, 'https://haisanlyson.com.vn/wp-content/uploads/sites/26/2021/11/t-min-768x768.jpg', 'Cá Mối rất nổi tiếng với mọi người hâu như ai cũng đã sử dụng và biết nó là sản phẩm bình dân, phù hợp với mọi tầng lớp nhưng Cá Mối có nhiều chất dinh dưỡng có giá trị cho cở thể như: nhiều đạm, vitamin A, DHA, và acid chất béo…', '2021-10-22 09:53:21', '2021-10-22 09:27:06', 0),
(11, 4, 'TỎI LÝ SƠN', 120000, 120000, 'https://haisanlyson.com.vn/wp-content/uploads/sites/26/2017/10/hinh-toi-ly-son.jpg', ' loại tỏi được trồng ở huyện đảo Lý Sơn (tỉnh Quảng Ngãi). Tỏi Lý Sơn đã trở thành đặc sản nổi tiếng đã trở thành thương hiệu và nhãn hiệu của vùng', '2021-10-22 09:19:49', '2021-10-22 11:06:45', 0),
(12, 4, 'TỎI CÔ ĐƠN LÝ SƠN', 1450000, 1300000, 'https://haisanlyson.com.vn/wp-content/uploads/sites/26/2017/10/hinh-toi-co-don.jpg', 'Đây là loại tỏi thơm ngon độc nhất vô nhị, được trồng từ đất lấy từ chân núi lửa và cát biển trắng mịn, tinh khiết. Với vùng đất được hình thành và khai sinh do hoạt động của núi lửa và sự bồi đắp của cát biển như Lý Sơn thì đây điều kiện lý tưởng để tỏi mồ côi phát triển ', '2021-10-22 14:03:21', '2021-10-22 14:03:21', 0),
(13, 1, 'TỎI ĐEN LÝ SƠN', 1250000, 1200000, 'https://haisanlyson.com.vn/wp-content/uploads/sites/26/2017/10/hinh-toi-den.jpg', 'Bảo vệ cơ thể phòng ngừa ung thư và giảm cholesteron, tăng cường miễn dịch, chống vi khuẩn và nhiễm trùng, ngăn ngừa và hỗ trợ bệnh ung thư, chống oxy hóa (sự lão hóa) và ngăn ngừa bệnh tật, điều trị tăng huyết áp, cơ chế hạn chế tăng men gan, giải độc và bảo vệ gan, làm giảm các biến chứng do bệnh tiểu đường, làm đẹp da, đen tóc và thúc đẩy mọc tóc, giảm thiểu nguy cơ bị ung thư tuyến tiền liệt, tăng trí nhớ, cải thiện chức năng não', '2021-10-22 09:53:21', '2021-10-22 09:27:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `user_id` int(11) NOT NULL,
  `token` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`user_id`, `token`, `created_at`) VALUES
(1, '7b887b1e751b6839105033c9f7bdf48c', '2021-10-19 17:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Nguyen Khac Khanh', 'encacap@gmail.com', '21312312321', 'Quan 12, HCM', 'b4cbd48886a5331c5eb2fedadabe311c', 1, '2021-10-19 10:39:39', '2021-10-20 17:40:06', 0),
(2, 'Nguyen Tan Ngoc Dong', 'dongn@gmail.com', '0123456789', 'Quan 12, HCM', 'b4cbd48886a5331c5eb2fedadabe311c', 2, '2021-10-19 10:42:39', '2021-10-20 17:43:19', 0),
(3, 'ABC', 'ABC@gmail.com', '8153565814', 'Quang Nam', 'b4cbd48886a5331c5eb2fedadabe311c', 2, '2021-10-20 17:16:11', '2021-10-20 17:53:15', 1),
(4, 'Tran Minh Tan', 'TranTamDa@gmail.com', '0387565425', 'TCH 18, quan12, HCM', 'b4cbd48886a5331c5eb2fedadabe311c', 2, '2021-10-20 17:17:27', '2021-10-20 17:17:27', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`user_id`,`token`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
