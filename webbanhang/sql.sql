-- Xóa database cũ nếu đã tồn tại
DROP DATABASE IF EXISTS my_store;
-- Dumping database structure for my_store
CREATE DATABASE IF NOT EXISTS `my_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_store`;

-- Dumping structure for table my_store.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.account: ~2 rows (approximately)
INSERT INTO `account` (`id`, `username`, `fullname`, `password`, `role`) VALUES
	(4, 'admin', 'admin', '$2y$12$j9s.Hi/uINvEbTghX8Raye1kkWypVcUPRz18XkUediQSXVSUKVlZG', 'admin'),
	(5, 'user', 'user', '$2y$12$2fW06RrLtkLNIkqFmomQGemUAObaCmuSIUyKEmINk2PQfMIfNO4p2', 'user');

-- Dumping structure for table my_store.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.category: ~4 rows (approximately)
INSERT INTO `category` (`id`, `name`, `description`) VALUES
	(1, 'Điện thoại', 'Danh mục các loại điện thoại'),
	(2, 'Laptop', 'Danh mục các loại laptop'),
	(3, 'Máy tính bảng', 'Danh mục các loại máy tính bảng'),
	(4, 'Phụ kiện', 'Danh mục phụ kiện điện tử');

-- Dumping structure for table my_store.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `status` enum('new','processing','completed') DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.orders: ~0 rows (approximately)
INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `status`, `created_at`) VALUES
	(1, 'hhh', '12121', 'asaa', 'new', '2025-03-17 09:07:46');

-- Dumping structure for table my_store.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.product: ~0 rows (approximately)
INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
	(1, 'iPhone 14 Pro', 'Điện thoại cao cấp từ Apple với chip A16 Bionic', 25990000.00, 'iphone14pro.jpg', 1),
	(2, 'MacBook Air M2', 'Laptop mỏng nhẹ với hiệu năng mạnh mẽ', 32990000.00, 'macbookairm2.jpg', 2),
	(3, 'iPad Air 2023', 'Máy tính bảng đa năng với màn hình Retina', 17990000.00, 'ipadair2023.jpg', 3),
	(4, 'Tai nghe AirPods Pro', 'Tai nghe không dây với chế độ chống ồn', 5990000.00, 'airpodspro.jpg', 4),
	(5, 'Samsung Galaxy S23', 'Điện thoại flagship từ Samsung', 22990000.00, 'galaxys23.jpg', 1),
	(6, 'Samsung Galaxy Z Fold 5', 'Điện thoại gập cao cấp với màn hình AMOLED', 43990000.00, 'galaxyzfold5.jpg', 1),
   (7, 'Dell XPS 13', 'Laptop siêu mỏng với hiệu năng vượt trội', 35990000.00, 'dellxps13.jpg', 2),
   (8, 'Samsung Galaxy Tab S9', 'Máy tính bảng mạnh mẽ với bút S Pen', 21990000.00, 'galaxytabs9.jpg', 3),
   (9, 'Sạc nhanh Anker 65W', 'Bộ sạc nhanh đa năng cho nhiều thiết bị', 890000.00, 'anker65w.jpg', 4),
   (10, 'Google Pixel 8', 'Điện thoại thông minh với camera đỉnh cao', 18990000.00, 'pixel8.jpg', 1);
	
-- Dumping structure for table my_store.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.order_details: ~0 rows (approximately)
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
	(1, 1, 1, 1, 1212111.00);

