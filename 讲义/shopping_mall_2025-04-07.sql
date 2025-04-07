# ************************************************************
# Sequel Ace SQL dump
# 版本号： 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# 主机: 127.0.0.1 (MySQL 8.0.41)
# 数据库: shopping_mall
# 生成时间: 2025-04-07 14:15:48 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# 转储表 address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `address`;

CREATE TABLE `address` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL COMMENT '用户ID',
  `province_id` int NOT NULL COMMENT '省',
  `city_id` int NOT NULL COMMENT '市',
  `area_id` int NOT NULL COMMENT '区/县',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '详细地址',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '电话号码',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '备注信息',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='用户地址';

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;

INSERT INTO `address` (`id`, `user_id`, `province_id`, `city_id`, `area_id`, `address`, `phone`, `note`, `created_at`, `updated_at`)
VALUES
	(1,1,1,1,1,'北京市海淀区清华大学东门18号','13800001111','收货人：张伟','2025-04-07 22:38:21','2025-04-07 22:38:21'),
	(2,2,2,2,2,'广州市天河区天河路88号','13900002222','收货人：李娜','2025-04-07 22:38:21','2025-04-07 22:38:21'),
	(3,3,3,3,2,'浙江省天河区幸福小区3号楼','13939473495','收货人：郭超','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(4,4,3,3,1,'浙江省海淀区幸福小区4号楼','13948442691','收货人：郭超','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(5,5,1,2,1,'北京市海淀区幸福小区5号楼','13965165376','收货人：孙梅','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(6,6,1,2,3,'北京市西湖区幸福小区6号楼','13922140147','收货人：张伟','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(7,7,3,2,1,'浙江省海淀区幸福小区7号楼','13946788838','收货人：张伟','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(8,8,3,3,2,'浙江省天河区幸福小区8号楼','13994709727','收货人：刘洋','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(9,9,2,3,1,'广东省海淀区幸福小区9号楼','13963104526','收货人：郭超','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(10,10,2,1,2,'广东省天河区幸福小区10号楼','13997066644','收货人：王芳','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(11,11,2,2,2,'广东省天河区幸福小区11号楼','13960528861','收货人：杨静','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(12,12,3,3,2,'浙江省天河区幸福小区12号楼','13983114204','收货人：孙梅','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(13,13,3,1,1,'浙江省海淀区幸福小区13号楼','13994314750','收货人：陈杰','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(14,14,1,1,3,'北京市西湖区幸福小区14号楼','13981062500','收货人：王芳','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(15,15,1,1,2,'北京市天河区幸福小区15号楼','13969625134','收货人：郭超','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(16,16,1,2,2,'北京市天河区幸福小区16号楼','13962741954','收货人：孙梅','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(17,17,1,3,3,'北京市西湖区幸福小区17号楼','13994490102','收货人：王芳','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(18,18,1,1,3,'北京市西湖区幸福小区18号楼','13970666539','收货人：刘洋','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(19,19,2,3,3,'广东省西湖区幸福小区19号楼','13993843669','收货人：陈杰','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(20,20,1,3,1,'北京市海淀区幸福小区20号楼','13983064565','收货人：张伟','2025-04-07 22:46:53','2025-04-07 22:46:53');

/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 area
# ------------------------------------------------------------

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '区/县',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='区/县';

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;

INSERT INTO `area` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'海淀区','2025-04-07 22:38:08','2025-04-07 22:38:08'),
	(2,'天河区','2025-04-07 22:38:08','2025-04-07 22:38:08'),
	(3,'西湖区','2025-04-07 22:38:08','2025-04-07 22:38:08');

/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '品牌',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='品牌';

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'苹果','2025-04-07 22:36:15','2025-04-07 22:36:15'),
	(2,'小米','2025-04-07 22:36:15','2025-04-07 22:36:15'),
	(3,'三星','2025-04-07 22:36:15','2025-04-07 22:36:15'),
	(5,'索尼','2025-04-07 22:46:53','2025-04-07 22:46:53');

/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 city
# ------------------------------------------------------------

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '城市',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='城市';

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;

INSERT INTO `city` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'北京市','2025-04-07 22:37:56','2025-04-07 22:37:56'),
	(2,'广州市','2025-04-07 22:37:56','2025-04-07 22:37:56'),
	(3,'杭州市','2025-04-07 22:37:56','2025-04-07 22:37:56');

/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 order_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_products`;

CREATE TABLE `order_products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL COMMENT '订单ID',
  `product_id` int NOT NULL COMMENT '商品ID',
  `quantity` int NOT NULL COMMENT '数量',
  `price` decimal(10,2) NOT NULL COMMENT '下单时的商品单价',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='订单中的商品';

LOCK TABLES `order_products` WRITE;
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`)
VALUES
	(1,1,1,1,3999.00,'2025-04-07 22:38:41','2025-04-07 22:38:41'),
	(2,2,2,2,249.00,'2025-04-07 22:38:41','2025-04-07 22:38:41'),
	(3,3,4,2,1299.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(4,4,4,1,1299.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(5,5,5,2,1099.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(6,6,1,1,3999.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(7,7,3,2,5699.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(8,8,1,2,3999.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(9,9,5,2,1099.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(10,10,5,2,1099.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(11,11,3,3,5699.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(12,12,4,2,1299.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(13,13,4,1,1299.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(14,14,1,1,3999.00,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(15,15,1,1,3999.00,'2025-04-07 22:46:53','2025-04-07 22:46:53');

/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '订单编号',
  `user_id` int NOT NULL COMMENT '用户ID',
  `address_id` int NOT NULL COMMENT '地址ID',
  `status` tinyint NOT NULL COMMENT '订单状态:1已下单未付款, 2已付款未发货, 3已发货待签收, 4已退货已退款',
  `amounts` decimal(10,2) NOT NULL COMMENT '应付金额',
  `coupon` double(5,2) NOT NULL COMMENT '折扣率, 百分之多少',
  `actual_amounts` decimal(10,2) NOT NULL COMMENT '实付金额',
  `pay_type` tinyint(1) DEFAULT NULL COMMENT '支付方式:1信用卡, 2微信支付, 3支付宝, 4银联卡',
  `pay_type_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '支付平台对应的编号',
  `paid_at` timestamp NULL DEFAULT NULL COMMENT '付款时间',
  `pay_platform_callback` json DEFAULT NULL COMMENT '支付平台返回的详细数据',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='订单';

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `order_sn`, `user_id`, `address_id`, `status`, `amounts`, `coupon`, `actual_amounts`, `pay_type`, `pay_type_no`, `paid_at`, `pay_platform_callback`, `created_at`, `updated_at`)
VALUES
	(1,'ORD20250407001',1,1,2,3999.00,0.90,3599.10,3,'ALIPAY20250407001','2025-04-07 22:36:54',NULL,'2025-04-07 22:36:54','2025-04-07 22:36:54'),
	(2,'ORD20250407002',2,1,1,249.00,1.00,249.00,2,NULL,NULL,NULL,'2025-04-07 22:36:54','2025-04-07 22:36:54'),
	(3,'ORD20250407003',12,12,2,2598.00,1.00,2598.00,2,'PAYNO003','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(4,'ORD20250407004',9,9,4,1299.00,1.00,1299.00,4,'PAYNO004','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(5,'ORD20250407005',3,3,2,2198.00,1.00,2198.00,2,'PAYNO005','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(6,'ORD20250407006',6,6,4,3999.00,0.95,3799.05,3,'PAYNO006','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(7,'ORD20250407007',11,11,2,11398.00,0.95,10828.10,3,'PAYNO007','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(8,'ORD20250407008',18,18,2,7998.00,1.00,7998.00,1,'PAYNO008','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(9,'ORD20250407009',5,5,4,2198.00,0.95,2088.10,2,'PAYNO009','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(10,'ORD20250407010',12,12,3,2198.00,1.00,2198.00,2,'PAYNO010','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(11,'ORD20250407011',6,6,4,17097.00,1.00,17097.00,2,'PAYNO011','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(12,'ORD20250407012',17,17,2,2598.00,0.95,2468.10,4,'PAYNO012','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(13,'ORD20250407013',15,15,1,1299.00,0.95,1234.05,4,'PAYNO013','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(14,'ORD20250407014',20,20,1,3999.00,0.95,3799.05,1,'PAYNO014','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(15,'ORD20250407015',8,8,1,3999.00,0.95,3799.05,1,'PAYNO015','2025-04-07 22:46:53',NULL,'2025-04-07 22:46:53','2025-04-07 22:46:53');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 product_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL COMMENT '对应商品ID',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '链接',
  `type` tinyint(1) NOT NULL COMMENT '图片类型:1banner, 2详情, 3主要的',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='商品图片';

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;

INSERT INTO `product_images` (`id`, `product_id`, `url`, `type`, `created_at`, `updated_at`)
VALUES
	(1,1,'https://example.com/images/mate.jpg',3,'2025-04-07 22:38:56','2025-04-07 22:38:56'),
	(2,2,'https://example.com/images/band8.jpg',3,'2025-04-07 22:38:56','2025-04-07 22:38:56'),
	(3,3,'https://example.com/images/product_3.jpg',3,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(4,4,'https://example.com/images/product_4.jpg',3,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(5,5,'https://example.com/images/product_5.jpg',3,'2025-04-07 22:46:53','2025-04-07 22:46:53');

/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_sn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '编号',
  `brand_id` int NOT NULL COMMENT '品牌',
  `stock` int NOT NULL DEFAULT '0' COMMENT '库存',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '商品名',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '单价',
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '描述',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='商品';

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `product_sn`, `brand_id`, `stock`, `name`, `price`, `desc`, `created_at`, `updated_at`)
VALUES
	(1,'P10001',1,100,'iPhone SE',3999.00,'性能强悍的旗舰手机','2025-04-07 22:36:40','2025-04-07 22:36:40'),
	(2,'P10002',2,150,'小米手环8',249.00,'智能穿戴设备，功能丰富','2025-04-07 22:36:40','2025-04-07 22:36:40'),
	(3,'P10003',3,80,'三星笔记本电脑',5699.00,'商务办公好选择','2025-04-07 22:36:40','2025-04-07 22:36:40'),
	(4,'P00004',1,49,'iPad mini',1299.00,'适合学生学习娱乐','2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(5,'P00005',5,98,'索尼手机',1099.00,'千元性价比之王','2025-04-07 22:46:53','2025-04-07 22:46:53');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 province
# ------------------------------------------------------------

DROP TABLE IF EXISTS `province`;

CREATE TABLE `province` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '省',
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='省份';

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;

INSERT INTO `province` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'北京市','2025-04-07 22:37:44','2025-04-07 22:37:44'),
	(2,'广东省','2025-04-07 22:37:44','2025-04-07 22:37:44'),
	(3,'浙江省','2025-04-07 22:37:44','2025-04-07 22:37:44');

/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;


# 转储表 users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '用户名',
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '邮箱地址',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '电话号码',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'https://127.0.0.1:8000/uploads/images/avatar/defaul.png' COMMENT '头像',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `gender` tinyint(1) DEFAULT NULL COMMENT '性别:1男, 0女',
  `is_vip` tinyint(1) NOT NULL DEFAULT '0' COMMENT '会员:1是, 0否',
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_email` (`email`),
  KEY `uni_phone` (`phone`),
  KEY `idx_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='用户表';

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `avatar`, `birthday`, `gender`, `is_vip`, `created_at`, `updated_at`)
VALUES
	(1,'张伟','zhangwei@example.com','13800001111','','1995-06-15',1,1,'2025-04-07 22:35:49','2025-04-07 22:35:49'),
	(2,'李娜','lina@example.com','13900002222','','1998-03-22',0,0,'2025-04-07 22:35:49','2025-04-07 22:35:49'),
	(3,'王强','wangqiang@example.com','13600003333','','2000-01-01',1,1,'2025-04-07 22:35:49','2025-04-07 22:35:49'),
	(4,'赵敏','zhaomin@example.com','13700004444','','1997-09-10',0,0,'2025-04-07 22:35:49','2025-04-07 22:35:49'),
	(5,'陈杰','user5@example.com','13878447960','','1997-07-23',1,0,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(6,'刘洋','user6@example.com','13815322921','','1999-01-26',1,0,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(7,'孙梅','user7@example.com','13827195052','','1995-12-16',0,1,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(8,'郭超','user8@example.com','13878053140','','1992-07-10',1,0,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(9,'刘洋','user9@example.com','13885971260','','2004-08-10',0,0,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(10,'周婷','user10@example.com','13850060075','','1994-09-16',0,0,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(11,'王芳','user11@example.com','13856088199','','2001-07-30',0,0,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(12,'孙梅','user12@example.com','13823681968','','2004-12-18',0,1,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(13,'赵敏','user13@example.com','13859754100','','2003-07-20',1,1,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(14,'陈杰','user14@example.com','13861527218','','2005-06-07',1,1,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(15,'赵敏','user15@example.com','13864940831','','2003-03-11',1,1,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(16,'周婷','user16@example.com','13885284560','','2003-11-27',1,0,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(17,'孙梅','user17@example.com','13895722003','','2004-01-27',1,1,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(18,'张伟','user18@example.com','13897939511','','1995-04-17',1,0,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(19,'杨静','user19@example.com','13855303408','','2005-03-24',0,0,'2025-04-07 22:46:53','2025-04-07 22:46:53'),
	(20,'周婷','user20@example.com','13813573531','','2000-01-11',0,1,'2025-04-07 22:46:53','2025-04-07 22:46:53');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

-- 用户在查看订单列表的时候, 其实是已经登录了的, 所以我们知道当前用户是谁, 也就是可以拿到用户的 ID 1

-- 查询满足条件的订单数据
/* SELECT id, order_sn, user_id, address_id, `status`, amounts, coupon, actual_amounts, pay_type, paid_at, created_at, updated_at
FROM orders
WHERE user_id = 6 AND created_at BETWEEN '2025-04-01 20:00:00' AND '2025-04-10 23:00:00'
ORDER BY created_at DESC
LIMIT 10; */

-- 每个订单对应的商品信息, 同时去查询商品对应的主要图片
/* SELECT order_products.id AS order_product_id, products.name AS product_name, products.price, order_products.quantity, product_images.url, brands.name AS brand_name
FROM order_products
LEFT JOIN products ON order_products.product_id = products.id
LEFT JOIN product_images ON products.id = product_images.product_id AND product_images.type = 3
LEFT JOIN brands ON products.brand_id = brands.id
WHERE order_products.order_id = 11; */

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
