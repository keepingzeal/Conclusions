-- MySQL dump 10.13  Distrib 5.7.11, for Linux (x86_64)
--
-- Host: localhost    Database: imooc
-- ------------------------------------------------------
-- Server version	5.7.11-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `art`
--

DROP TABLE IF EXISTS `art`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `art` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章标题',
  `contents` text COLLATE utf8_unicode_ci NOT NULL COMMENT '文章内容',
  `author` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '作者名称',
  `cate` int(4) NOT NULL COMMENT '文章分类ID',
  `ctime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'create time',
  `mtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'modify time',
  `status` enum('delete','online','offline') COLLATE utf8_unicode_ci DEFAULT 'offline' COMMENT '是否被删除',
  PRIMARY KEY (`id`),
  KEY `Title index` (`title`),
  KEY `分类索引` (`cate`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art`
--

LOCK TABLES `art` WRITE;
/*!40000 ALTER TABLE `art` DISABLE KEYS */;
INSERT INTO `art` VALUES (4,'测试文章标题','12312312','yi',1,'2017-05-13 14:18:00','2017-05-13 14:18:00','offline'),(5,'测试文章标题','12312312','yi',1,'2017-05-13 14:18:37','2017-05-13 14:18:37','offline'),(6,'测试文章标题','12312312','yi',1,'2017-05-13 14:18:38','2017-05-13 14:18:38','offline'),(7,'测试文章标题','12312312','yi',1,'2017-05-13 14:21:01','2017-05-13 14:21:01','offline'),(10,'测试文章标题','12312312','yi',1,'2017-05-13 14:21:20','2017-05-13 14:21:20','offline'),(14,'测试文章 testId:31801Changed444','测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493测试内容1807888493151','yi1948226284152',1,'2017-05-13 14:54:38','2017-05-13 14:55:51','offline'),(15,'测试文章 testId:49815','测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012测试内容1022353012','yi2142990483',1,'2017-07-17 16:35:01','2017-07-17 16:35:01','offline');
/*!40000 ALTER TABLE `art` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '账单id',
  `itemid` int(11) NOT NULL COMMENT '商品id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT '商品价格，单位为分',
  `status` enum('paid','unpaid','failed','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unpaid' COMMENT '支付状态',
  `transaction` text COLLATE utf8_unicode_ci COMMENT '交易ID',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `ptime` timestamp NULL DEFAULT NULL COMMENT '支付时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
INSERT INTO `bill` VALUES (1,1,1,10,'paid','9223372036854775807','2017-07-06 14:30:13','2017-07-06 15:02:52','2017-07-06 15:02:52');
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cate`
--

DROP TABLE IF EXISTS `cate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT '类目名',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='分类信息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cate`
--

LOCK TABLES `cate` WRITE;
/*!40000 ALTER TABLE `cate` DISABLE KEYS */;
INSERT INTO `cate` VALUES (1,'啊哈哈哈');
/*!40000 ALTER TABLE `cate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT '商品描述',
  `price` bigint(20) NOT NULL DEFAULT '0' COMMENT '商品价格，单位为分',
  `stock` int(11) NOT NULL COMMENT '商品数量',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `etime` timestamp NOT NULL COMMENT '过期时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'测试商品123','商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！商品描述信息！！！',10,99,'2017-07-06 14:08:37','2017-07-31 14:22:29','2017-07-06 14:30:13');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_record`
--

DROP TABLE IF EXISTS `sms_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `contents` text COLLATE utf8_unicode_ci NOT NULL COMMENT '消息内容',
  `template` int(11) NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '发送时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='短信发送记录';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_record`
--

LOCK TABLES `sms_record` WRITE;
/*!40000 ALTER TABLE `sms_record` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'user id',
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user name',
  `pwd` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user password',
  `email` text COLLATE utf8_unicode_ci COMMENT '用户邮箱',
  `mobile` bigint(11) DEFAULT NULL COMMENT '用户手机号',
  `reg_time` timestamp NOT NULL COMMENT 'user register time',
  `update_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'information change time',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户注册信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'pangee','64166e7bf41c7ada0f8c5b6e18301554',NULL,NULL,'2017-07-06 14:28:49',NULL),(5,'test','c8bb9401addc891f66b7a6f4c2e85691',NULL,NULL,'2017-07-08 16:20:02',NULL),(4,'apitest_uname_1300224274','71788eccd0aaf996b569db61fb74b1d7',NULL,NULL,'2017-07-08 15:08:29',NULL),(6,'apitest_uname_757319156','cd86831cae7a1624a93e2b4fe77025ea',NULL,NULL,'2017-07-08 16:47:49',NULL),(7,'test1112','c8bb9401addc891f66b7a6f4c2e85691',NULL,NULL,'2017-07-17 16:35:06',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-11 20:23:22
