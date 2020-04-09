-- MySQL dump 10.13  Distrib 8.0.19, for Linux (x86_64)
--
-- Host: localhost    Database: mycaredb
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,1,'Admin','admin@admin.com','/admins/December2019/gXs9H7sAYpOqDxw8fzRE.png',NULL,'$2y$10$mF4BmxcF3n56bHtmy.G6UuQvp5jUBlOaHCgyMO7ts0kpiQtQsRG5W','3gYQGNpwhSLctQTXzQOvayNk0rzHMeI2PIAaJKxQa9TvDes5U9NKfHn88ZLi','{\"locale\":\"en\"}','2020-04-01 06:26:54','2020-04-06 13:10:08');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `andalusia_groups`
--

DROP TABLE IF EXISTS `andalusia_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `andalusia_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci,
  `url` text COLLATE utf8_unicode_ci,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `andalusia_groups`
--

LOCK TABLES `andalusia_groups` WRITE;
/*!40000 ALTER TABLE `andalusia_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `andalusia_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `start` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` int DEFAULT NULL,
  `payment_confirmed` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (2,1,6,'2020-04-09 08:15:00','15','toothache',NULL,NULL,'2020-04-08 09:04:31','2020-04-08 09:04:31'),(3,1,7,'2020-04-09 10:45:00','15','huihuihu',NULL,NULL,'2020-04-08 09:18:06','2020-04-08 09:18:06');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int unsigned DEFAULT NULL,
  `order` int NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,1,'Category 1','category-1','2020-04-01 06:26:54','2020-04-01 06:26:54'),(2,NULL,1,'Category 2','category-2','2020-04-01 06:26:54','2020-04-01 06:26:54');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clinic_requests`
--

DROP TABLE IF EXISTS `clinic_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clinic_requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_id` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `further_requirements` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clinic_requests`
--

LOCK TABLES `clinic_requests` WRITE;
/*!40000 ALTER TABLE `clinic_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `clinic_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clinics`
--

DROP TABLE IF EXISTS `clinics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clinics` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `small_description` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map_x` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map_y` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8_unicode_ci,
  `meta_description` longtext COLLATE utf8_unicode_ci,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clinics`
--

LOCK TABLES `clinics` WRITE;
/*!40000 ALTER TABLE `clinics` DISABLE KEYS */;
INSERT INTO `clinics` VALUES (1,'عيادة أمراض القلب','Cardiac Diseases Clinic','ayadh-amradh-alqlb','cardiac-diseases-clinic','تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج، حيث ساعدت عيادة أمراض القلب في علاج ما يزيد على 2000 مريض، وأعادت لهم الأمل في حياة سعيدة وآمنة من جديد.','\n\nتضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج، حيث ساعدت عيادة أمراض القلب في علاج ما يزيد على 2000 مريض، وأعادت لهم الأمل في حياة سعيدة وآمنة من جديد.\n\n\\n\nوتتميز العيادة بخدمات استثنائية تساعد على أن تكون رحلة العلاج رحلة آمنة وبأقصى درجات الرعاية للمرضى، مثل:-\n\n\\n\n \n\n\\n\n\\n\nخدمة طوارئ القلب متوفرة 24 ساعة يومياً طوال أيام الأسبوع.\n\\n\nوجود استشاري قلب عند الطلب 24 ساعة يومياً طوال أيام الأسبوع.\n\\n\nوحدة رعاية القلب تعمل على مدار 24 ساعة يومياً.\n\\n\n\\n\n \n\n\\n\nالخدمات التي تقدمها عيادة أمراض القلب:-\n\\n\n\\n\nإجراء قسطرة القلب التشخيصية والعلاجية.\n\\n\nعلاج أمراض القلب الروماتيزمية والوراثية.\n\\n\nفشل وتضخم عضلة القلب.\n\\n\nتركيب صمامات ودعامات القلب.\n\\n\nعلاج عدم انتظام ضربات القلب.\n\\n\nعلاج أمراض الشرايين التاجية.\n\\n\nالذبحة الصدرية وجلطة القلب.\n\\n\nتصلب الشرايين.\n\\n\nرسم القلب العادي وبالمجهود.\n\\n\nفحص القلب بالموجات الصوتية (إيكو).\n\\n\nرسم القلب لمدة 24 ساعة (هولتر).\n\\n\n','حي الجامعة - شارع السيرة العطرة','0126806666','hjh.info@andalusiagroup.net','21.58323','29.953463','clinics\\January2020\\fuVVomxRgSDIEwQ6gogq.jpg','عيادة أمراض القلب،امراض القلب،دكتور امراض القلب','تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج',1,'2020-01-29 06:34:00','2020-04-04 11:38:00'),(2,'اسم بالعرب','name test','asm-balarb','name-test','تجربة وصف صغير ','\n\nوصف المنشور \n\n','تجرية ','555555555555','test@example.com',NULL,NULL,'clinics/April2020/jhPeaQXKjhtnAZFrnS7i.png','test','تجربة البيانات الاساسية بالعربي ',1,'2020-04-06 13:18:17','2020-04-06 13:18:28');
/*!40000 ALTER TABLE `clinics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_rows` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8_unicode_ci,
  `order` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=294 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,'{}',1),(2,1,'name','text','First Name',1,1,1,1,1,1,'{}',2),(3,1,'email','text','Email',1,1,1,1,1,1,'{}',4),(4,1,'password','password','Password',1,0,0,1,1,0,'{}',5),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,'{}',6),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,'{}',7),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',9),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,'{}',10),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,'{}',12),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',0,0,0,0,0,0,'{}',11),(22,4,'id','number','ID',1,0,0,0,0,0,NULL,1),(23,4,'parent_id','select_dropdown','Parent',0,0,1,1,1,1,'{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',2),(24,4,'order','text','Order',1,1,1,1,1,1,'{\"default\":1}',3),(25,4,'name','text','Name',1,1,1,1,1,1,NULL,4),(26,4,'slug','text','Slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\"}}',5),(27,4,'created_at','timestamp','Created At',0,0,1,0,0,0,NULL,6),(28,4,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(29,5,'id','number','ID',1,0,0,0,0,0,'{}',1),(30,5,'author_id','text','Author',1,0,1,1,0,1,'{}',2),(31,5,'category_id','text','Category',0,0,1,1,1,0,'{}',3),(32,5,'title','text','Title',1,1,1,1,1,1,'{}',4),(33,5,'excerpt','text_area','Excerpt',0,0,1,1,1,1,'{}',5),(34,5,'body','rich_text_box','Body',1,0,1,1,1,1,'{}',6),(35,5,'image','image','Post Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',7),(36,5,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}',8),(37,5,'meta_description','text_area','Meta Description',0,0,1,1,1,1,'{}',9),(38,5,'meta_keywords','text_area','Meta Keywords',0,0,1,1,1,1,'{}',10),(39,5,'status','select_dropdown','Status',1,1,1,1,1,1,'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',11),(40,5,'created_at','timestamp','Created At',0,1,1,0,0,0,'{}',12),(41,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',13),(42,5,'seo_title','text','SEO Title',0,1,1,1,1,1,'{}',14),(43,5,'featured','checkbox','Featured',1,1,1,1,1,1,'{}',15),(44,6,'id','number','ID',1,0,0,0,0,0,NULL,1),(45,6,'author_id','text','Author',1,0,0,0,0,0,NULL,2),(46,6,'title','text','Title',1,1,1,1,1,1,NULL,3),(47,6,'excerpt','text_area','Excerpt',1,0,1,1,1,1,NULL,4),(48,6,'body','rich_text_box','Body',1,0,1,1,1,1,NULL,5),(49,6,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}',6),(50,6,'meta_description','text','Meta Description',1,0,1,1,1,1,NULL,7),(51,6,'meta_keywords','text','Meta Keywords',1,0,1,1,1,1,NULL,8),(52,6,'status','select_dropdown','Status',1,1,1,1,1,1,'{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}',9),(53,6,'created_at','timestamp','Created At',1,1,1,0,0,0,NULL,10),(54,6,'updated_at','timestamp','Updated At',1,0,0,0,0,0,NULL,11),(55,6,'image','image','Page Image',0,1,1,1,1,1,NULL,12),(56,1,'email_verified_at','timestamp','',0,0,1,1,1,1,'{}',8),(57,9,'id','number','Id',1,0,0,0,0,0,'{}',1),(58,9,'role_id','text','Role Id',0,1,1,1,1,1,'{}',10),(59,9,'name','text','Name',1,1,1,1,1,1,'{}',2),(60,9,'email','text','Email',1,1,1,1,1,1,'{}',3),(61,9,'avatar','image','Avatar',0,1,1,1,1,1,'{}',9),(62,9,'email_verified_at','timestamp','Email Verified At',0,0,0,0,0,0,'{}',7),(63,9,'password','password','Password',1,0,0,1,1,0,'{}',4),(64,9,'remember_token','text','Remember Token',0,0,0,0,0,0,'{}',5),(65,9,'settings','hidden','Settings',0,0,0,0,0,0,'{}',11),(66,9,'created_at','timestamp','Created At',0,1,1,0,0,0,'{}',6),(67,9,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8),(68,9,'admin_belongsto_role_relationship','relationship','roles',0,1,1,1,1,1,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":\"0\"}',12),(103,16,'id','text','Id',1,0,0,0,0,0,'{}',1),(104,16,'photo_ar','image','Photo Ar',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(105,16,'photo_en','image','Photo En',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',3),(106,16,'link','text','Link',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(107,16,'created_at','timestamp','Created_at',0,1,0,0,0,0,'{}',6),(108,16,'updated_at','timestamp','',0,0,0,0,0,0,'{}',7),(109,16,'status','hidden','',0,0,0,0,0,0,'{}',5),(110,16,'deleted_at','timestamp','',0,0,0,0,0,0,'{}',8),(125,18,'id','text','Id',1,0,0,0,0,0,'{}',1),(126,18,'name_ar','text','Name Ar',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(127,18,'name_en','text','Name En',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(128,18,'small_description','text_area','Small Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(129,18,'description','rich_text_box','Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',7),(130,18,'address','text','Address',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',8),(131,18,'phone','text','Phone',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',9),(132,18,'email','text','Email',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',10),(133,18,'map_x','text','Map X',0,0,1,1,1,1,'{}',11),(134,18,'map_y','text','Map Y',0,0,1,1,1,1,'{}',12),(135,18,'photo','image','Photo',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',13),(136,18,'meta_keywords','text','Meta Keywords',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',14),(137,18,'meta_description','text_area','Meta Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',15),(138,18,'created_at','timestamp','Created At',0,0,1,1,0,1,'{}',16),(139,18,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',17),(140,18,'status','text','',0,0,0,0,0,0,'{}',18),(141,19,'id','text','Id',1,0,0,0,0,0,'{}',1),(142,19,'name_ar','text','Name Ar',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(143,19,'name_en','text','Name En',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(144,19,'small_description','text_area','Small Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(145,19,'description','rich_text_box','Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',7),(146,19,'photo','image','Photo',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',8),(147,19,'meta_keywords','text','Meta Keywords',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',9),(148,19,'meta_description','text_area','Meta Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',10),(149,19,'status','text','Status',0,0,0,0,0,0,'{}',11),(150,19,'created_at','timestamp','Created At',0,0,1,1,0,1,'{}',12),(151,19,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',13),(164,21,'id','text','Id',1,0,0,0,0,0,'{}',1),(167,21,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',4),(168,21,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),(169,21,'name','text','name',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(170,21,'slug','text','slug',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true}}',3),(171,21,'description','text_area','description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(173,5,'post_belongstomany_tag_relationship','relationship','tags',0,1,1,1,1,1,'{\"model\":\"App\\\\Tag\",\"table\":\"tags\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"post_tag\",\"pivot\":\"1\",\"taggable\":\"on\"}',16),(174,22,'id','text','Id',1,0,0,0,0,0,'{}',1),(176,22,'description','rich_text_box','Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(177,22,'start','timestamp','Start',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required|date\"}}',7),(178,22,'end','timestamp','End',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required|date|after_or_equal:start\"}}',8),(179,22,'img','image','Img',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',9),(180,22,'images','multiple_images','Images',0,0,1,1,1,1,'{}',10),(181,22,'map_x','text','Map X',0,0,1,1,1,1,'{}',11),(182,22,'map_y','text','Map Y',0,0,1,1,1,1,'{}',12),(183,22,'stock','number','Stock',0,0,1,1,1,1,'{}',13),(184,22,'status','number','Status',0,0,0,0,0,0,'{}',14),(185,22,'created_at','timestamp','Created At',0,0,1,1,0,1,'{}',17),(186,22,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',18),(187,22,'title_ar','text','Title Ar',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(188,22,'title_en','text','Title En',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(189,22,'meta_keywords','text','meta Keywords',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',15),(190,22,'meta_description','text_area','meta Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',16),(191,1,'last_name','text','Last Name',0,1,1,1,1,1,'{}',3),(192,1,'phone','text','Phone',1,1,1,1,1,1,'{}',13),(193,1,'gender','text','Gender',1,1,1,1,1,1,'{}',14),(194,1,'address','text_area','',0,0,1,1,1,1,'{}',15),(195,5,'post_belongstomany_user_relationship','relationship','users',0,0,0,0,0,0,'{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"post_user\",\"pivot\":\"1\",\"taggable\":\"0\"}',17),(204,19,'slug_ar','text','Slug Ar',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name_ar\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:services,slug_ar\"}}',3),(205,19,'slug_en','text','Slug En',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name_en\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:services,slug_en\"}}',5),(206,18,'slug_ar','text','Slug Ar',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name_ar\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:clinics,slug_ar\"}}',3),(207,18,'slug_en','text','Slug En',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name_en\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:clinics,slug_en\"}}',5),(208,22,'slug_ar','text','Slug Ar',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"title_ar\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:events,slug_ar\"}}',3),(209,22,'slug_en','text','Slug En',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"title_en\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:events,slug_en\"}}',5),(210,26,'id','text','Id',1,0,0,0,0,0,'{}',1),(211,26,'first_name','text','First Name',0,1,1,1,1,1,'{}',2),(212,26,'last_name','text','Last Name',0,1,1,1,1,1,'{}',3),(213,26,'email','text','Email',0,1,1,1,1,1,'{}',4),(214,26,'phone','text','Phone',0,1,1,1,1,1,'{}',5),(215,26,'gender','select_dropdown','Gender',0,1,1,1,1,1,'{\"default\":\"Male\",\"options\":{\"1\":\"Male\",\"2\":\"Female\"}}',6),(216,26,'clinic_id','text','Clinic Id',0,0,1,1,1,1,'{}',7),(217,26,'type','select_dropdown','Type',0,1,1,1,1,1,'{\"default\":\"clinic\",\"options\":{\"1\":\"clinic\",\"2\":\"doctor\",\"3\":\"service\",\"4\":\"post\"}}',8),(218,26,'url','text','Url',0,0,1,1,1,1,'{}',9),(219,26,'further_requirements','text_area','Further Requirements',0,1,1,1,1,1,'{}',10),(220,26,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',11),(221,26,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',12),(222,26,'clinic_request_belongsto_clinic_relationship','relationship','clinics',0,1,1,1,1,1,'{\"model\":\"App\\\\Clinic\",\"table\":\"clinics\",\"type\":\"belongsTo\",\"column\":\"clinic_id\",\"key\":\"id\",\"label\":\"name_ar\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":\"0\"}',13),(223,28,'id','text','Id',1,0,0,0,0,0,'{}',1),(224,28,'title','text','Title',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(225,28,'url','text','Url',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',3),(226,28,'status','text','Status',0,0,0,0,0,0,'{}',4),(227,28,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',5),(228,28,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(229,29,'id','number','ID',1,0,0,0,0,0,'{}',0),(230,29,'speciality_id','text','Speciality Id',0,0,1,1,1,1,'{\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',1),(232,29,'clinic_id','text','Clinic Id',0,0,1,1,1,1,'{\"relationship\":{\"key\":\"id\",\"label\":\"name_ar\"}}',3),(234,29,'title_ar','text','Title Ar',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',5),(235,29,'title_en','text','Title En',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(236,29,'description','rich_text_box','Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',7),(237,29,'position','text','Position',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',8),(238,29,'speciality','text','Speciality',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',9),(239,29,'photo','image','Photo',0,1,1,1,1,1,'{}',10),(240,29,'meta_keywords','text','Meta Keywords',0,0,1,1,1,1,'{}',11),(241,29,'meta_description','text_area','Meta Description',0,0,1,1,1,1,'{}',12),(242,29,'status','text','Status',0,0,0,0,0,0,'{}',13),(243,29,'created_at','timestamp','Created At',0,0,1,0,0,0,'{}',14),(244,29,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',15),(245,30,'id','number','ID',1,0,0,0,0,0,NULL,0),(246,30,'doctor_id','text','Doctor Id',1,1,1,1,1,1,NULL,1),(247,30,'workinghours_belongsto_doctor_relationship','relationship','Doctor',1,1,1,1,1,1,'{\"model\":\"App\\\\Doctor\",\"table\":\"doctors\",\"type\":\"belongsTo\",\"column\":\"doctor_id\",\"key\":\"id\",\"label\":\"title_en\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":\"0\"}',2),(248,30,'day','select_dropdown','Day',0,1,1,1,1,1,'{\"default\":\"Saturday\",\"options\":{\"Saturday\":\"Saturday\",\"Sunday\":\"Sunday\",\"Monday\":\"Monday\",\"Tuesday\":\"Tuesday\",\"Wednesday\":\"Wednesday\",\"Thursday\":\"Thursday\",\"Friday\":\"Friday\"}}',3),(249,30,'start','time','Start',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(250,30,'end','time','End',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',5),(251,30,'type','select_dropdown','Type',0,1,1,1,1,1,'{\"default\":\"Working\",\"options\":{\"Working\":\"Working\",\"Break\":\"Break\"}}',6),(252,30,'created_at','timestamp','Created At',0,0,1,0,0,0,NULL,7),(253,30,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,8),(254,31,'id','number','ID',1,0,0,0,0,0,'{}',0),(255,31,'doctor_id','text','Doctor Id',0,1,1,1,1,1,'{}',1),(257,31,'user_id','text','User Id',0,1,1,1,1,1,'{}',3),(259,31,'start','timestamp','Start',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',5),(260,31,'duration','text','Duration',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(261,31,'comments','text_area','Comments',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',7),(262,31,'confirmed','select_dropdown','Confirmed',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"},\"default\":\"0\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}',8),(263,31,'payment_confirmed','select_dropdown','Payment Confirmed',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"},\"default\":\"0\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}',9),(264,31,'created_at','timestamp','Created At',0,0,1,0,0,0,'{}',10),(265,31,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',11),(266,32,'id','number','ID',1,0,0,0,0,0,NULL,0),(267,32,'name','text','Name',1,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',1),(268,32,'created_at','timestamp','Created At',0,0,1,0,0,0,NULL,2),(269,32,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,3),(270,29,'slug_ar','text','Slug Ar',0,1,1,1,1,1,'{}',4),(271,29,'slug_en','text','Slug En',0,1,1,1,1,1,'{}',5),(272,29,'email','text','Email',0,1,1,1,1,1,'{}',16),(273,29,'phone','text','Phone',0,1,1,1,1,1,'{}',17),(274,29,'price','text','Price',0,1,1,1,1,1,'{}',18),(275,29,'duration','text','Duration By Min',0,1,1,1,1,1,'{}',19),(276,29,'gender','text','Gender',0,1,1,1,1,1,'{}',21),(285,29,'doctor_belongsto_clinic_relationship','relationship','clinics',0,1,1,1,1,1,'{\"model\":\"App\\\\Clinic\",\"table\":\"clinics\",\"type\":\"belongsTo\",\"column\":\"clinic_id\",\"key\":\"id\",\"label\":\"name_en\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":null}',22),(286,29,'doctor_belongsto_speciality_relationship','relationship','specialities',0,1,1,1,1,1,'{\"model\":\"App\\\\Speciality\",\"table\":\"specialities\",\"type\":\"belongsTo\",\"column\":\"speciality_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":null}',23),(292,31,'appointment_belongsto_doctor_relationship','relationship','doctors',0,1,1,1,1,1,'{\"model\":\"App\\\\Doctor\",\"table\":\"doctors\",\"type\":\"belongsTo\",\"column\":\"doctor_id\",\"key\":\"id\",\"label\":\"title_en\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":null}',12),(293,31,'appointment_belongsto_user_relationship','relationship','users',0,1,1,1,1,1,'{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":null}',13);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','App\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',NULL,1,0,'\"\\\\\\\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"desc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\\\\\\\"\"','2019-11-10 09:05:36','2020-02-04 07:27:43'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,'\"null\"','2019-11-10 09:05:36','2019-11-10 09:05:36'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'','',1,0,'\"null\"','2019-11-10 09:05:36','2019-11-10 09:05:36'),(4,'categories','categories','Category','Categories','voyager-categories','TCG\\Voyager\\Models\\Category',NULL,'','',1,0,'\"null\"','2019-11-10 09:05:43','2019-11-10 09:05:43'),(5,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','TCG\\Voyager\\Policies\\PostPolicy',NULL,NULL,1,0,'\"\\\\\\\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"desc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\\\\\\\"\"','2019-11-10 09:05:44','2020-02-05 13:52:38'),(6,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page',NULL,'','',1,0,'\"null\"','2019-11-10 09:05:45','2019-11-10 09:05:45'),(9,'admins','admins','Admin','Admins','voyager-person','App\\Admin','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',NULL,1,0,'\"\\\\\\\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\\\\\\\"\"','2019-11-11 05:35:32','2019-11-11 06:36:14'),(16,'sliders','sliders','Slider','Sliders','voyager-code','App\\Slider',NULL,'App\\Http\\Controllers\\SliderController',NULL,1,0,'\"\\\\\\\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\\\\\\\"\"','2020-01-26 11:49:00','2020-01-27 08:57:08'),(18,'clinics','clinics','Clinic','Clinics',NULL,'App\\Clinic',NULL,NULL,NULL,1,0,'\"\\\\\\\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\\\\\\\"\"','2020-01-27 13:07:26','2020-02-26 13:48:15'),(19,'services','services','Service','Services',NULL,'App\\Service',NULL,NULL,NULL,1,0,'\"\\\\\\\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\\\\\\\"\"','2020-01-28 06:29:40','2020-02-26 14:00:03'),(21,'tags','tags','Tag','Tags',NULL,'App\\Tag',NULL,NULL,NULL,1,0,'\"\\\\\\\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\\\\\\\"\"','2020-01-29 05:58:30','2020-02-26 14:00:40'),(22,'events','events','Event','Events',NULL,'App\\Event',NULL,'App\\Http\\Controllers\\EventController',NULL,1,0,'\"\\\\\\\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\\\\\\\"\"','2020-02-02 07:38:18','2020-02-26 13:39:36'),(26,'clinic_requests','clinic-requests','Clinic Request','Clinic Requests',NULL,'App\\ClinicRequest',NULL,NULL,NULL,1,0,'\"\\\\\\\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\\\\\\\"\"','2020-02-09 08:45:13','2020-02-09 14:16:55'),(28,'andalusia_groups','andalusia-groups','Andalusia Group','Andalusia Groups',NULL,'App\\AndalusiaGroup',NULL,NULL,NULL,1,0,'\"\\\\\\\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\\\\\\\"\"','2020-02-09 12:51:57','2020-03-01 15:22:52'),(29,'doctors','doctors','Doctor','Doctors','voyager-activity','App\\Doctor',NULL,NULL,NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"desc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2020-04-01 06:26:54','2020-04-04 00:39:14'),(30,'workinghours','workinghours','Working Hour','Working Hours','voyager-receipt','App\\Workinghour',NULL,'','',1,0,'null','2020-04-01 06:26:54','2020-04-01 06:26:54'),(31,'appointments','appointments','Appointment','Appointments','voyager-alarm-clock','App\\Appointment',NULL,'\\App\\Http\\Controllers\\AppointmentController',NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"desc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2020-04-01 06:26:55','2020-04-04 19:22:06'),(32,'specialities','specialities','Speciality','Specialities','voyager-certificate','App\\Speciality',NULL,'','',1,0,'null','2020-04-01 06:26:55','2020-04-01 06:26:55');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speciality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clinic_id` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speciality_id` int unsigned DEFAULT NULL,
  `gender` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,'أكرم ماجد','Akram Maged','أكرم-ماجد','Akram-Maged','<p>بكالوريوس في طب وجراحة الفم والأسنان - الإجراءات والفحوصات التي تخص الأسنان- عمليات خلع الأسنان والخلع الجراحي- تنظيف الأسنان- بانوراما الأسنان - أشعة عادية على الأسنان بمستشفى حي الجامعة</p>','استشاري','أخصائي طب الأسنان','doctors\\Appdoctorphotos\\Akram-Maged.jpg','','',1,'2020-04-07 21:10:27','2020-04-08 01:26:45',NULL,'akram.maged@andalusiagroup.net','51234567','150','15',1,'male'),(2,'أحمد جابر','Ahmed Gaber','أحمد-جابر','Ahmed-Gaber','ماجيستر في أمراض القلب والأوعية الدموية--حالات ضغط الدم وتصلب الشرايين.- عدم انتظام ضربات القلب - أمراض القلب الروماتيزمية - أمراض صمامات القلب - أمراض الشرايين التاجية (جلطة القلب - الذبحة الصدرية- فشل عضلة القلب وتضخم عضلة القلب - علاج جلطات الشرايين التاجية الحادة بالقسطرة- إجراء رسم القلب العادي وبالمجهود - رسم قلب لمدة 24 ساعة (هولتر)-موجات صوتية على القلب-متابعة قياس الضغط 24 ساعة','أخصائي','أخصائي أمراض القلب والأوعية الدموية','doctors\\Appdoctorphotos\\Ahmed-Gaber.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'AHMED.JABER@ANDALUSIAGROUP.NET','50002','75','15',2,'male'),(3,'مصطفى سلامة','Moustafa Salama','مصطفى-سلامة','Moustafa-Salama','\\\"استشاري الجراحة العامة لفريقنا الطبي المميز بمستشفى أندلسية حي الجامعة.\\r\\n\\r\\nخبرة أكثر من 15 عامًا في الجراحة العامة، وحاصل على دكتوراه في الجراحة العامة من جامعة الأزهر بالقاهرة، وعمل كأخصائي أول للجراحة العامة بمستشفى جامعة ابن سينا بجدة\\r\\n\\\"\\r\\n','استشاري','استشاري الجراحة العامة','doctors\\Appdoctorphotos\\Moustafa-Salama.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'Moustafa-Salama@Andalusiagroup.net','50003','150','15',3,'male'),(4,'عصام عبد الفتاح','Essam AbdElFattah','عصام-عبد-الفتاح','Essam-AbdelFattah','ماجستير الأمراض الجلدية والتناسلية - التهاب الجلد والحكة والحساسية-البقع الجلدية البيضاء والملونة والهالات السوداء-السنطات والزوائد الجلدية-حب الشباب وآثاره','أخصائي','أخصائي الأمراض الجلدية','doctors\\Appdoctorphotos\\Essam-AbdelFattah.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'Essam.AbdelFatah@ANDALUSIAGROUP.NET','50004','75','15',4,'male'),(5,'هبة غازي','Heba Ghazy','هبة-غازي','Heba-Ghazy','لحاصلة على بكالوريوس في الطب من جامعة الإسكندرية 2005م، والحاصلة أيضاً على ماجستير في الأمراض الجلدية والتناسلية، بالإضافة إلى دبلومة في الطب التجميلي والليزر.بمستشفى حي الجامعة','أخصائي','أخصائي الأمراض الجلدية','doctors\\Appdoctorphotos\\Heba-Ghazy.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'heba.ghazy@andalusiagroup.net','50005','75','15',4,'female'),(6,'إبراهيم عيد','Ibrahim Eid','إبراهيم-عيد','Ibrahim-Eid','ماجستير في الأنف والأذن والحنجرة -   علاج التهاب اللوزتين والحلق وخراج خلف اللوزتين- النزيف الدموي من الأنف- الزدات الأنفية والانسداد','أخصائي','أخصائى أنف وأذن وحنجرة','doctors\\Appdoctorphotos\\Ibrahim-Eid.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'IBRAHIM.EID@ANDALUSIAGROUP.NET','50006','75','15',5,'male'),(7,'علاء الشامي','Alaa AL Shamy','علاء-الشامي','Alaa-AL-Shamy','ماجستير أمراض الباطنة - علاج أمراض الجهاز الهضمي والكبد- أمراض سوء الامتصاص والهضم- قرحة المعدة والأثنى عشر- مناظير الجهاز الهضمي- الكبد الدهني وتضخم الكبد- التهابات البنكرياس- القولون العصبي- التشخيص المبكر لأورام الجهاز الهضمي- الغدد الصماء والاضطراب الهرموني- حمى (الضنك – النزفية – الانفلونزا)- حمى (التيفويد – المالطية)- تشخيص مرض السكري والوقاية من مضاعفاته- آلام المفاصل الروماتيزمية- الروماتويد والذئبة الحمراء والأمراض المناعية-  المغص والالتهابات الكلوية- الفشل الكلوي ومسبباته- منظار المعدة- منظار القولون- مناظير القنوات المرارية- تركيب بالون المعدة- ربط وحقن دوالي المرئ والمعدة- توسيع المرئ والقولون- استئصال اللحمية بالمنظار','أخصائي','أخصائي أمراض الباطنة وأمراض الكلى','doctors\\Appdoctorphotos\\Alaa-AL-Shamy.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'ALAA.ELSHAMY@ANDALUSIAGROUP.NET','50007','75','15',6,'male'),(8,'خالد عبد العزيز','Khaled AbdelAziz','خالد-عبد-العزيز','Khaled-AbdelAziz','ماجستير أمراض الباطنة - علاج أمراض الجهاز الهضمي والكبد- أمراض سوء الامتصاص والهضم- قرحة المعدة والأثنى عشر- مناظير الجهاز الهضمي- الكبد الدهني وتضخم الكبد- التهابات البنكرياس- القولون العصبي- التشخيص المبكر لأورام الجهاز الهضمي- الغدد الصماء والاضطراب الهرموني- حمى (الضنك – النزفية – الانفلونزا)- حمى (التيفويد – المالطية)- تشخيص مرض السكري والوقاية من مضاعفاته- آلام المفاصل الروماتيزمية- الروماتويد والذئبة الحمراء والأمراض المناعية-  المغص والالتهابات الكلوية- الفشل الكلوي ومسبباته- منظار المعدة- منظار القولون- مناظير القنوات المرارية- تركيب بالون المعدة- ربط وحقن دوالي المرئ والمعدة- توسيع المرئ والقولون- استئصال اللحمية بالمنظار بمستشفى حي الجامعة','أخصائي','أخصائي أمراض الجهاز الهضمي والكلى','doctors\\Appdoctorphotos\\Khaled-AbdelAziz.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'KHALID.ABDULATEF@ANDALUSIAGROUP.NET','50008','75','15',7,'male'),(9,'عزت كريمة','Ezzat Karima','عزت-كريمة','Ezzat-Karima','ماجستير أمراض الباطنة - علاج أمراض الجهاز الهضمي والكبد- أمراض سوء الامتصاص والهضم- قرحة المعدة والأثنى عشر- مناظير الجهاز الهضمي- الكبد الدهني وتضخم الكبد- التهابات البنكرياس- القولون العصبي- التشخيص المبكر لأورام الجهاز الهضمي- الغدد الصماء والاضطراب الهرموني- حمى (الضنك – النزفية – الانفلونزا)- حمى (التيفويد – المالطية)- تشخيص مرض السكري والوقاية من مضاعفاته- آلام المفاصل الروماتيزمية- الروماتويد والذئبة الحمراء والأمراض المناعية- المغص والالتهابات الكلوية- الفشل الكلوي ومسبباته- منظار المعدة- منظار القولون- مناظير القنوات المرارية- تركيب بالون المعدة- ربط وحقن دوالي المرئ والمعدة- توسيع المرئ والقولون- استئصال اللحمية بالمنظار بمستشفى حي الجامعة','أخصائي','أخصائي الامراض الباطنية','doctors\\Appdoctorphotos\\Ezzat-Karima.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'Ezzat.Karima@ANDALUSIAGROUP.NET','50009','75','15',8,'female'),(10,'أسامة عبد السلام','Osama AbdelSalam','أسامة-عبد-السلام','Osama-AbdelSalam','دكتوراه في الأمراض العصبية - الصرع- ضعف وضمور العضلات- أمراض الأعصاب المركزية والطرفية- شلل وآلام الأعصاب (الخامس والسابع)- الجلطات الدماغية والشلل- أمراض الذاكرة (الزهايمر)- الصداع بأنواعه- أمراض الحركة (الشلل الرعاش)- التهاب الأعصاب الطرفية- فقدان الذاكرة- أمراض الحبل الشوكي- رسم عصب- رسم عضلات بمستشفى حي الجامعة','استشاري','استشارى أمراض المخ و الأعصاب','doctors\\Appdoctorphotos\\Osama-AbdelSalam.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'Osama.AbdelSalam@ANDALUSIAGROUP.NET','50010','150','15',9,'male'),(11,'منال فوزي','Manal Fawzy','منال-فوزي','Manal-Fawzy','ماجيستير أمراض النساء والتوليد - التهابات الجهاز التناسلي-  آلام واضطرابات الدورة الشهرية- الوقاية والتشخيص المبكر للأورام- استئصال أورام الرحم والمبيض بالمنظار  (أكياس المبيض – الورم الليفي)- سقوط الرحم.- الأندومتريوزيس- متابعة مرحلة ما بعد انقطاع الطمث.- الولادة الطبيعية بدون ألم- الولادة القيصرية- جهاز قياس نبضات قلب الجنين CTG- حالات الحمل الحرج والإجهاض المتكرر- حالات الحمل خارج الرحم- تسمم الحمل- علاج عقم الزوجين- تنظيم الأسرة- إجراء اختبارات الحمل- مسحة عنق الرحم- إجراء الموجات فوق الصوتية','أخصائي','أخصائى أمراض النساء والولادة','doctors\\Appdoctorphotos\\Manal-Fawzy.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'MANAL.AHMED@ANDALUSIAGROUP.NET','50011','75','15',10,'female'),(12,'شيماء عصام','Shaimaa Essam','شيماء-عصام','Shaimaa-Essam','ماجستير في أمراض النساء والتوليد - التهابات الجهاز التناسلي-  آلام واضطرابات الدورة الشهرية- الوقاية والتشخيص المبكر للأورام- استئصال أورام الرحم والمبيض بالمنظار  (أكياس المبيض – الورم الليفي)- سقوط الرحم.- الأندومتريوزيس- متابعة مرحلة ما بعد انقطاع الطمث.- الولادة الطبيعية بدون ألم- الولادة القيصرية- جهاز قياس نبضات قلب الجنين CTG- حالات الحمل الحرج والإجهاض المتكرر- حالات الحمل خارج الرحم- تسمم الحمل- علاج عقم الزوجين- تنظيم الأسرة- إجراء اختبارات الحمل- مسحة عنق الرحم- إجراء الموجات فوق الصوتية','أخصائي','أخصائى أمراض النساء والولادة','doctors\\Appdoctorphotos\\Shaimaa-Essam.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'SHIMAA.HANAFY@ANDALUSIAGROUP.NET','50012','75','15',10,'female'),(13,'نهير درويش','Nohier Darweesh','نهير-درويش','Nohier-Darweesh','خبرة 15 سنة في طب النساء والولادة، وحاصلة على البورد العربي في اختصاص الولادة وأمراض النساء، وعلى بكالوريوس الطب والجراحة، وماجستير في أمراض النساء والولادة. بمستشفى حي الجامعة','أخصائي','أخصائى أول نساء وولادة','doctors\\Appdoctorphotos\\Nohier-Darweesh.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'noheir.darwish@andaluisagroup.net','50013','75','15',11,'female'),(14,'محمد نصر','Mohammed Nasr','محمد-نصر','Mohammed-Nasr','محمد نصر استشاري طب وجراحة العيون والليزر لفريقنا الطبي بمستشفى أندلسية حي الجامعة.\\r\\nاستشاري جراحة العيون بوحدة الليزر بمستشفى قصر العيني، وعضو الجمعية الأوروبية لجراحة المياه البيضاء وإصلاح عيوب الإبصار، والجمعية الأوروبية لجراحة الشبكية، والأكاديمية الأمريكية للعيون، وحاصل على شهادة المجلس العالمي للعيون.','استشاري','استشارى طب و جراحة العيون','doctors\\Appdoctorphotos\\Mohammed-Nasr.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'m4nasr@yahoo.com','50014','150','15',12,'male'),(15,'محمود حرب','Mahmoud Harb','محمود-حرب','Mahmoud-Harb','ماجستير في جراحة العظام - آلام والتهابات المفاصل- تمزق الأربطة- خلع المفاصل- إصابات غضروف الركبة- تمزق الرباط الصليبي الأمامي والخلفي- علاج الخلع المتكرر لمفصل الكتف- جراحات استبدال المفاصل والمفاصل الصناعية- تغيير مفصل الركبة- الكسور ومضاعفاتها (بطء الالتحام – الاعوجاج)- خشونة الركبة- آلم القدمين- حقن البلازما للركبة- الاستبدال الكلي لمفصل الركبة والكوع- عملية منظار الركبة ومناظير المفاصل- هشاشة العظام- التهابات وخشونة المفاصل- الطب الرياضي- عمليات العمود الفقري - عمليات تسليك الأعصاب والأوتار- تثبيت الكسور وعمليات الشرائح والمسامير - علاج العيوب الخلقية لعظام اليد','أخصائي','أخصائي أمراض العظام والمفاصل','doctors\\Appdoctorphotos\\Mahmoud-Harb.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'MAHMOUD.HARB@ANDALUSIAGROUP.NET','50015','75','15',13,'male'),(16,'محمد العشماوي','Mohammed Ashmway','محمد-العشماوي','Mohammed-Ashmway','خبرة 14 سنة في طب العظام، وحاصل على الماجستير والدكتوراه في طب العظام والكسور والإصابات، والزمالة الألمانية لطب','أخصائي','أخصائي أمراض العظام والمفاصل','doctors\\Appdoctorphotos\\Mohammed-Ashmway.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'mohamedashmway@andalusiagroup.net','50016','75','15',13,'male'),(17,'منصور عبد الله','Mansour Abdllah','منصور-عبد-الله','Mansour-Abdullah','ماجستير في طب الأطفال - الفحص الشامل بعد الولادة- متابعة وعلاج الصفراء لحديثي الولادة- مشاكل الرضاعة- أمراض الجهاز التنفسي والهضمي لحديثي الولادة - التهاب الشعب الهوائية والالتهاب الرئوي - الحساسية والربو- الكحة المزمنة - الحمى الروماتيزمية على القلب- الالتهاب الكبدي- التهاب الكلى- تطعيمات الأطفال ','أخصائي','أخصائى طب الأطفال','doctors\\Appdoctorphotos\\Mansour-Abdullah.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'MANSOR.ABDULLAH@ANDALUSIAGROUP.NET','50017','75','15',14,'female'),(18,'ميرفت عبد الحميد','Mervat AbdElhamid','ميرفت-عبد-الحميد','Mervat-AbdElhamid','ماجستير في طب الأطفال - الفحص الشامل بعد الولادة- متابعة وعلاج الصفراء لحديثي الولادة- مشاكل الرضاعة- أمراض الجهاز التنفسي والهضمي لحديثي الولادة - التهاب الشعب الهوائية والالتهاب الرئوي - الحساسية والربو- الكحة المزمنة - الحمى الروماتيزمية على القلب- الالتهاب الكبدي- التهاب الكلى- تطعيمات الأطفال','أخصائي','أخصائى طب الأطفال','doctors\\Appdoctorphotos\\Mervat-AbdElhamid.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'MERVAT.DEGHED@ANDALUSIAGROUP.NET','50018','75','15',14,'female'),(19,'محمد إفريج','Mohammed Efrieg','محمد-إفريج','Mohammed-Efrieg','أخصائي اول المسالك البوليه -  ماجستير  في جراحة المسالك البوليه -علاج حصوات الكلى وتفتيتها وحصوات المسالك البولية -مناظير الجهاز البولي (الكلى – الحالب - المثانية) -العيوب الخلقية في الكلى والحالب والمثانة -ضيق وانسداد مجرى البول -المغص الكلوي المتكرر -أورام الجهاز البولي التناسلي-سلس البول والبول الدومي - أمراض الذكورة والعقم والعجز الجنسي عند الرجال -علاج أمراض البروستاتا والكشف الدوري- تفتيت الحصوات عن طريق جهاز الموجات التصادمية -تفتيت حصوات الكلى بالليزر عن طريق منظار الكلى -تفتيت حصوات المثانة باستخدام المفتت الهوائي والليزر -تفتيت حصوات الحالب باستخدام المفتت الهوائي الكلوي-وحدة مسالك الأطفال-علاج تشوهات الجهاز البولي التناسلي للأطفال-تصليح فتحة مجرى البول- تصليح إعوجاج القضيب-تصليح ضيق حوض الكلى-تصليح الارتجاع البولي من المثانة للحالب جراحياً وبدون جراحة .بمستشفى حي الجامعة','استشاري','استشاري المسالك البولية','doctors\\Appdoctorphotos\\Mohammed-Efrieg.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'Mohamed.Efrieg@Andalusiagroup.net','50019','150','15',15,'male'),(20,'رانيا الباز','Rania Elbaz','رانيا-الباز','Rania-Elbaz','استشاري الامراض النفسية -دكتوراه في الامراض النفسيه -استشارات نفسية -متابعة مرضي الاكتئاب و الزهايمر-أضطرابات المزاج  -اكتئاب الحمل و ما بعد الولادة  -التدريب على تنمية مهارات أولياء الامور-العلاج السلوكي -التدريب على المهارات الاجتماعية. بمستشفى حي الجامعة','استشاري','استشارى أمراض النفسية','doctors\\Appdoctorphotos\\Rania-Elbaz.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'Rania.ELBaz@andalusiagroup.com','50020','150','15',16,'female'),(21,'أهداف عنان','Ahdaf Anan','أهداف-عنان','Ahdaf-Anan','','استشاري','استشارى الأمراض الصدرية','doctors\\Appdoctorphotos\\Ahdaf-Anan.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'AHDAF.ANNAN@ANDALUSIAGROUP.NET','50021','150','15',17,'male'),(22,'نبيل هيبة','Nabil Heba','نبيل-هيبة','Nabil-Heba','','استشاري','استشارى الأمراض الصدرية','doctors\\Appdoctorphotos\\Nabil-Heba.jpg','','',1,'2020-04-07 21:10:27','2020-04-07 21:10:27',NULL,'NABIL.HIBAH@ANDALUSIAGROUP.NET','50022','150','15',17,'female');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_user`
--

DROP TABLE IF EXISTS `event_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `event_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_user`
--

LOCK TABLES `event_user` WRITE;
/*!40000 ALTER TABLE `event_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8_unicode_ci,
  `map_x` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map_y` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-dashboard','#000000',NULL,1,'2019-11-10 09:05:37','2019-11-10 09:19:52','voyager.dashboard','null'),(2,1,'Media','','_self','voyager-images','#000000',NULL,12,'2019-11-10 09:05:37','2020-02-23 07:37:15','voyager.media.index','null'),(3,1,'Users','','_self','voyager-person','#000000',16,2,'2019-11-10 09:05:37','2019-11-11 06:34:16','voyager.users.index','null'),(4,1,'Roles','','_self','voyager-lock','#000000',NULL,11,'2019-11-10 09:05:37','2020-02-23 07:37:15','voyager.roles.index','null'),(5,1,'Tools','','_self','voyager-tools','#000000',NULL,14,'2019-11-10 09:05:37','2020-02-23 07:37:15',NULL,''),(6,1,'Menu Builder','','_self','voyager-list','#000000',5,1,'2019-11-10 09:05:37','2019-11-10 09:39:35','voyager.menus.index','null'),(7,1,'Database','','_self','voyager-data','#000000',5,2,'2019-11-10 09:05:37','2019-11-10 09:39:54','voyager.database.index','null'),(8,1,'Compass','','_self','voyager-compass','#000000',5,3,'2019-11-10 09:05:37','2019-11-10 09:40:33','voyager.compass.index','null'),(9,1,'BREAD','','_self','voyager-bread','#000000',5,4,'2019-11-10 09:05:37','2019-11-10 09:40:51','voyager.bread.index','null'),(10,1,'Settings','','_self','voyager-settings','#000000',17,3,'2019-11-10 09:05:37','2020-02-09 14:03:00','voyager.settings.index','null'),(11,1,'Categories','','_self','voyager-categories','#000000',43,2,'2019-11-10 09:05:43','2020-01-29 08:36:31','voyager.categories.index','null'),(12,1,'Posts','','_self','voyager-news','#000000',43,1,'2019-11-10 09:05:44','2020-01-29 08:36:31','voyager.posts.index','null'),(13,1,'Pages','','_self','voyager-file-text','#000000',NULL,13,'2019-11-10 09:05:46','2020-02-23 07:37:15','voyager.pages.index','null'),(14,1,'Hooks','','_self','voyager-hook','#000000',5,5,'2019-11-10 09:05:48','2019-11-10 09:41:04','voyager.hooks','null'),(15,1,'Admins','','_self','voyager-person','#000000',16,1,'2019-11-11 05:35:32','2019-11-11 06:34:30','voyager.admins.index','null'),(16,1,'All Users','','_self','voyager-people','#000000',NULL,10,'2019-11-11 06:33:43','2020-02-23 07:37:15',NULL,''),(17,1,'Site Settings','','_self','voyager-settings','#000000',NULL,9,'2019-11-11 06:43:15','2020-02-23 07:37:15',NULL,''),(31,1,'Sliders','','_self','voyager-code',NULL,17,1,'2020-01-26 11:49:00','2020-01-29 09:11:45','voyager.sliders.index',NULL),(33,1,'Clinics','','_self','voyager-home','#000000',NULL,2,'2020-01-27 13:07:26','2020-02-09 14:03:00','voyager.clinics.index','null'),(34,1,'Services','','_self','voyager-puzzle','#000000',NULL,4,'2020-01-28 06:29:40','2020-02-09 14:03:18','voyager.services.index','null'),(36,2,'الصفحة الرئيسية','الصفحة-الرئيسية','_self',NULL,'#000000',NULL,1,'2020-01-28 11:23:39','2020-02-03 10:27:15',NULL,''),(37,2,'خدماتنا','/services','_self',NULL,'#000000',NULL,2,'2020-01-28 11:28:49','2020-02-03 10:19:31',NULL,''),(38,2,'اطبائنا','/اطبائنا','_self',NULL,'#000000',NULL,3,'2020-01-28 11:30:44','2020-02-03 10:19:31',NULL,''),(39,2,'تواصل معنا','/','_self',NULL,'#000000',NULL,5,'2020-01-28 11:31:22','2020-02-03 10:19:31',NULL,''),(40,2,'من نحن','من-نحن','_self',NULL,'#000000',NULL,7,'2020-01-28 11:31:54','2020-02-03 15:19:33',NULL,''),(41,2,'عيادتنا','/عيادتنا','_self',NULL,'#000000',NULL,4,'2020-01-28 11:33:04','2020-02-03 10:19:31',NULL,''),(42,1,'Tags','','_self','voyager-tag','#000000',43,3,'2020-01-29 05:58:30','2020-01-29 08:36:31','voyager.tags.index','null'),(43,1,'Posts','','_self','voyager-file-text','#000000',NULL,8,'2020-01-29 08:35:05','2020-02-23 07:38:24',NULL,''),(46,1,'Yaost','','_self','voyager-megaphone','#000000',NULL,7,'2020-01-30 09:29:54','2020-02-23 08:49:45','voyager.sitesettings.index','null'),(47,1,'Events','','_self','voyager-group','#000000',NULL,6,'2020-02-02 07:38:18','2020-02-23 07:38:22','voyager.events.index','null'),(49,2,'المجموعات','/المجموعات','_self',NULL,'#000000',NULL,6,'2020-02-02 15:34:43','2020-02-03 15:19:33',NULL,''),(50,2,'دكاتره','\\دكاتره','_self',NULL,'#000000',NULL,9,'2020-02-02 16:05:57','2020-02-03 15:19:31',NULL,''),(52,2,'عن الويبسايت','https://www.andalusiahjh.com/ar','_self',NULL,'#000000',NULL,10,'2020-02-03 07:03:04','2020-02-03 15:19:30',NULL,''),(54,2,'تمام','/تم__ام','_self',NULL,'#000000',NULL,8,'2020-02-03 10:19:21','2020-02-03 15:19:31',NULL,''),(58,1,'Clinic Requests','','_self','voyager-bell','#000000',59,1,'2020-02-09 08:45:13','2020-02-09 14:03:00','voyager.clinic-requests.index','null'),(61,1,'Doctors Requests','','_self','voyager-bell','#000000',60,1,'2020-02-09 08:52:35','2020-02-09 14:03:08','voyager.clinic-requests.index',NULL),(63,1,'Services Requests','voyager.clinic-requests.index','_self','voyager-bell','#000000',62,1,'2020-02-09 08:56:52','2020-02-09 14:03:18',NULL,''),(64,1,'Clinic requests','','_self','voyager-bell','#000000',NULL,5,'2020-02-09 09:08:49','2020-02-09 14:04:07','voyager.clinic-requests.index','null'),(66,1,'Andalusia Groups','','_self','voyager-documentation','#000000',17,2,'2020-02-09 12:51:57','2020-02-09 12:53:59','voyager.andalusia-groups.index','null'),(67,1,'Doctors','','_self','voyager-group','#000000',NULL,3,'2020-01-27 13:07:26','2020-02-09 14:03:00','','null'),(68,1,'Doctors','','_self','voyager-activity',NULL,67,1,'2020-04-01 06:26:54','2020-04-01 06:26:54','voyager.doctors.index',NULL),(69,1,'Working Hours','','_self','voyager-receipt',NULL,67,2,'2020-04-01 06:26:54','2020-04-01 06:26:54','voyager.workinghours.index',NULL),(70,1,'Appointments','','_self','voyager-alarm-clock',NULL,67,3,'2020-04-01 06:26:55','2020-04-01 06:26:55','voyager.appointments.index',NULL),(71,1,'Specialities','','_self','voyager-certificate',NULL,67,4,'2020-04-01 06:26:55','2020-04-01 06:26:55','voyager.specialities.index',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2020-04-01 06:26:52','2020-04-01 06:26:52'),(2,'site','2020-04-01 06:26:52','2020-04-01 06:26:52');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1025 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (961,'2014_10_12_000000_create_users_table',1),(962,'2014_10_12_100000_create_password_resets_table',1),(963,'2016_01_01_000000_add_voyager_user_fields',1),(964,'2016_01_01_000000_create_data_types_table',1),(965,'2016_01_01_000000_create_pages_table',1),(966,'2016_01_01_000000_create_posts_table',1),(967,'2016_02_15_204651_create_categories_table',1),(968,'2016_05_19_173453_create_menu_table',1),(969,'2016_10_21_190000_create_roles_table',1),(970,'2016_10_21_190000_create_settings_table',1),(971,'2016_11_30_135954_create_permission_table',1),(972,'2016_11_30_141208_create_permission_role_table',1),(973,'2016_12_26_201236_data_types__add__server_side',1),(974,'2017_01_13_000000_add_route_to_menu_items_table',1),(975,'2017_01_14_005015_create_translations_table',1),(976,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(977,'2017_03_06_000000_add_controller_to_data_types_table',1),(978,'2017_04_11_000000_alter_post_nullable_fields_table',1),(979,'2017_04_21_000000_add_order_to_data_rows_table',1),(980,'2017_07_05_210000_add_policyname_to_data_types_table',1),(981,'2017_08_05_000000_add_group_to_settings_table',1),(982,'2017_11_26_013050_add_user_role_relationship',1),(983,'2017_11_26_015000_create_user_roles_table',1),(984,'2018_03_11_000000_add_user_settings',1),(985,'2018_03_14_000000_add_details_to_data_types_table',1),(986,'2018_03_16_000000_make_settings_value_nullable',1),(987,'2019_08_19_000000_create_failed_jobs_table',1),(988,'2020_01_26_1580046377_create_sliders_table',1),(989,'2020_01_27_1580130832_create_clinics_table',1),(990,'2020_01_28_082126_create_services_table',1),(991,'2020_01_28_1580202864_create_doctors_table',1),(992,'2020_01_29_1580284673_create_Tags_table',1),(993,'2020_01_29_1580284853_create_post_tag_table',1),(994,'2020_02_02_1580636169_create_events_table',1),(995,'2020_02_03_154301_create_social_accounts_table',1),(996,'2020_02_04_1580806341_add_last_name_phone_gender_address_to_users_table',1),(997,'2020_02_04_1580831332_create_post_user_table',1),(998,'2020_02_05_1580893135_create_andl_groups_table',1),(999,'2020_02_05_162605_create_notifications_table',1),(1000,'2020_02_05_162605_create_surveys_table',1),(1001,'2020_02_05_162606_create_survey_question_table',1),(1002,'2020_02_05_162607_create_survey_answer_table',1),(1003,'2020_02_05_162608_create_survey_user_info_table',1),(1004,'2020_02_05_162609_create_survey_user_answer_table',1),(1005,'2020_02_09_1581244986_create_clinic_requests_table',1),(1006,'2020_03_01_1580284853_create_user_event_table',1),(1007,'2020_03_02_1583140464_create_adminss_table',1),(1008,'2020_03_02_1583140841_create_seo_settingss_table',1),(1009,'2020_03_28_1585412097_add_doctor_id_to_users_table',1),(1010,'2020_03_28_1585412144_add_clinic_id_to_doctors_table',1),(1011,'2020_03_28_1585426557_add_email_to_doctors_table',1),(1012,'2020_03_28_1585426751_add_phone_to_doctors_table',1),(1013,'2020_03_28_1585434667_create_workinghours_table',1),(1014,'2020_03_28_1585437347_create_appointments_table',1),(1015,'2020_03_28_1585437491_add_price_duration_to_doctors_table',1),(1016,'2020_03_28_1585437756_add_created_at_updated_at_to_appointments_table',1),(1017,'2020_03_29_110100_create_jobs_table',1),(1018,'2020_03_30_1585536239_create_specialities_table',1),(1019,'2020_03_30_1585536398_add_speciality_id_to_doctors_table',1),(1020,'2020_03_31_1585639842_create_photos_table',1),(1021,'2020_03_31_1585642131_add_gender_to_doctors_table',1),(1022,'2020_04_02_104133_create_notes_table',1),(1023,'2020_04_05_1586088867_add_reset_token_to_users_table',1),(1024,'2020_04_07_1586219016_add_phone_last_name_to_users_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `appointment_id` int unsigned NOT NULL,
  `noteable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noteable_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notes_appointment_id_foreign` (`appointment_id`),
  KEY `notes_noteable_type_noteable_id_index` (`noteable_type`,`noteable_id`),
  CONSTRAINT `notes_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('normal','offer') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'normal',
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`),
  CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,0,'Hello World','Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.','\n\nHello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.\n\n\\n\nBallast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.\n\n','pages/page1.jpg','hello-world','Yar Meta Description','Keyword1, Keyword2','ACTIVE','2020-04-01 06:26:54','2020-04-01 06:26:54');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(115,1),(116,1),(117,1),(118,1),(119,1),(120,1),(121,1),(122,1),(123,1),(124,1),(125,1),(126,1),(127,1),(128,1),(129,1),(130,1),(131,1),(132,1),(133,1),(134,1),(135,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2020-04-08 00:06:02','2020-04-08 00:06:02'),(2,'browse_bread',NULL,'2020-04-08 00:06:02','2020-04-08 00:06:02'),(3,'browse_database',NULL,'2020-04-08 00:06:02','2020-04-08 00:06:02'),(4,'browse_media',NULL,'2020-04-08 00:06:02','2020-04-08 00:06:02'),(5,'browse_compass',NULL,'2020-04-08 00:06:02','2020-04-08 00:06:02'),(6,'browse_menus','menus','2020-04-08 00:06:02','2020-04-08 00:06:02'),(7,'read_menus','menus','2020-04-08 00:06:02','2020-04-08 00:06:02'),(8,'edit_menus','menus','2020-04-08 00:06:02','2020-04-08 00:06:02'),(9,'add_menus','menus','2020-04-08 00:06:02','2020-04-08 00:06:02'),(10,'delete_menus','menus','2020-04-08 00:06:03','2020-04-08 00:06:03'),(11,'browse_roles','roles','2020-04-08 00:06:03','2020-04-08 00:06:03'),(12,'read_roles','roles','2020-04-08 00:06:03','2020-04-08 00:06:03'),(13,'edit_roles','roles','2020-04-08 00:06:03','2020-04-08 00:06:03'),(14,'add_roles','roles','2020-04-08 00:06:03','2020-04-08 00:06:03'),(15,'delete_roles','roles','2020-04-08 00:06:03','2020-04-08 00:06:03'),(16,'browse_users','users','2020-04-08 00:06:03','2020-04-08 00:06:03'),(17,'read_users','users','2020-04-08 00:06:03','2020-04-08 00:06:03'),(18,'edit_users','users','2020-04-08 00:06:03','2020-04-08 00:06:03'),(19,'add_users','users','2020-04-08 00:06:03','2020-04-08 00:06:03'),(20,'delete_users','users','2020-04-08 00:06:03','2020-04-08 00:06:03'),(21,'browse_settings','settings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(22,'read_settings','settings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(23,'edit_settings','settings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(24,'add_settings','settings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(25,'delete_settings','settings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(26,'browse_categories','categories','2020-04-08 00:06:03','2020-04-08 00:06:03'),(27,'read_categories','categories','2020-04-08 00:06:03','2020-04-08 00:06:03'),(28,'edit_categories','categories','2020-04-08 00:06:03','2020-04-08 00:06:03'),(29,'add_categories','categories','2020-04-08 00:06:03','2020-04-08 00:06:03'),(30,'delete_categories','categories','2020-04-08 00:06:03','2020-04-08 00:06:03'),(31,'browse_posts','posts','2020-04-08 00:06:03','2020-04-08 00:06:03'),(32,'read_posts','posts','2020-04-08 00:06:03','2020-04-08 00:06:03'),(33,'edit_posts','posts','2020-04-08 00:06:03','2020-04-08 00:06:03'),(34,'add_posts','posts','2020-04-08 00:06:03','2020-04-08 00:06:03'),(35,'delete_posts','posts','2020-04-08 00:06:03','2020-04-08 00:06:03'),(36,'browse_pages','pages','2020-04-08 00:06:03','2020-04-08 00:06:03'),(37,'read_pages','pages','2020-04-08 00:06:03','2020-04-08 00:06:03'),(38,'edit_pages','pages','2020-04-08 00:06:03','2020-04-08 00:06:03'),(39,'add_pages','pages','2020-04-08 00:06:03','2020-04-08 00:06:03'),(40,'delete_pages','pages','2020-04-08 00:06:03','2020-04-08 00:06:03'),(41,'browse_admins','admins','2020-04-08 00:06:03','2020-04-08 00:06:03'),(42,'read_admins','admins','2020-04-08 00:06:03','2020-04-08 00:06:03'),(43,'edit_admins','admins','2020-04-08 00:06:03','2020-04-08 00:06:03'),(44,'add_admins','admins','2020-04-08 00:06:03','2020-04-08 00:06:03'),(45,'delete_admins','admins','2020-04-08 00:06:03','2020-04-08 00:06:03'),(46,'browse_sliders','sliders','2020-04-08 00:06:03','2020-04-08 00:06:03'),(47,'read_sliders','sliders','2020-04-08 00:06:03','2020-04-08 00:06:03'),(48,'edit_sliders','sliders','2020-04-08 00:06:03','2020-04-08 00:06:03'),(49,'add_sliders','sliders','2020-04-08 00:06:03','2020-04-08 00:06:03'),(50,'delete_sliders','sliders','2020-04-08 00:06:03','2020-04-08 00:06:03'),(51,'browse_clinics','clinics','2020-04-08 00:06:03','2020-04-08 00:06:03'),(52,'read_clinics','clinics','2020-04-08 00:06:03','2020-04-08 00:06:03'),(53,'edit_clinics','clinics','2020-04-08 00:06:03','2020-04-08 00:06:03'),(54,'add_clinics','clinics','2020-04-08 00:06:03','2020-04-08 00:06:03'),(55,'delete_clinics','clinics','2020-04-08 00:06:03','2020-04-08 00:06:03'),(56,'browse_services','services','2020-04-08 00:06:03','2020-04-08 00:06:03'),(57,'read_services','services','2020-04-08 00:06:03','2020-04-08 00:06:03'),(58,'edit_services','services','2020-04-08 00:06:03','2020-04-08 00:06:03'),(59,'add_services','services','2020-04-08 00:06:03','2020-04-08 00:06:03'),(60,'delete_services','services','2020-04-08 00:06:03','2020-04-08 00:06:03'),(61,'browse_doctors','doctors','2020-04-08 00:06:03','2020-04-08 00:06:03'),(62,'read_doctors','doctors','2020-04-08 00:06:03','2020-04-08 00:06:03'),(63,'edit_doctors','doctors','2020-04-08 00:06:03','2020-04-08 00:06:03'),(64,'add_doctors','doctors','2020-04-08 00:06:03','2020-04-08 00:06:03'),(65,'delete_doctors','doctors','2020-04-08 00:06:03','2020-04-08 00:06:03'),(66,'browse_tags','tags','2020-04-08 00:06:03','2020-04-08 00:06:03'),(67,'read_tags','tags','2020-04-08 00:06:03','2020-04-08 00:06:03'),(68,'edit_tags','tags','2020-04-08 00:06:03','2020-04-08 00:06:03'),(69,'add_tags','tags','2020-04-08 00:06:03','2020-04-08 00:06:03'),(70,'delete_tags','tags','2020-04-08 00:06:03','2020-04-08 00:06:03'),(71,'browse_sitesettings','sitesettings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(72,'read_sitesettings','sitesettings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(73,'edit_sitesettings','sitesettings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(74,'add_sitesettings','sitesettings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(75,'delete_sitesettings','sitesettings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(76,'browse_events','events','2020-04-08 00:06:03','2020-04-08 00:06:03'),(77,'read_events','events','2020-04-08 00:06:03','2020-04-08 00:06:03'),(78,'edit_events','events','2020-04-08 00:06:03','2020-04-08 00:06:03'),(79,'add_events','events','2020-04-08 00:06:03','2020-04-08 00:06:03'),(80,'delete_events','events','2020-04-08 00:06:03','2020-04-08 00:06:03'),(81,'browse_clinic_requests','clinic_requests','2020-04-08 00:06:03','2020-04-08 00:06:03'),(82,'read_clinic_requests','clinic_requests','2020-04-08 00:06:03','2020-04-08 00:06:03'),(83,'edit_clinic_requests','clinic_requests','2020-04-08 00:06:03','2020-04-08 00:06:03'),(84,'add_clinic_requests','clinic_requests','2020-04-08 00:06:03','2020-04-08 00:06:03'),(85,'delete_clinic_requests','clinic_requests','2020-04-08 00:06:03','2020-04-08 00:06:03'),(86,'browse_andalusia_groups','andalusia_groups','2020-04-08 00:06:03','2020-04-08 00:06:03'),(87,'read_andalusia_groups','andalusia_groups','2020-04-08 00:06:03','2020-04-08 00:06:03'),(88,'edit_andalusia_groups','andalusia_groups','2020-04-08 00:06:03','2020-04-08 00:06:03'),(89,'add_andalusia_groups','andalusia_groups','2020-04-08 00:06:03','2020-04-08 00:06:03'),(90,'delete_andalusia_groups','andalusia_groups','2020-04-08 00:06:03','2020-04-08 00:06:03'),(91,'browse_notifications','notifications','2020-04-08 00:06:03','2020-04-08 00:06:03'),(92,'read_notifications','notifications','2020-04-08 00:06:03','2020-04-08 00:06:03'),(93,'edit_notifications','notifications','2020-04-08 00:06:03','2020-04-08 00:06:03'),(94,'add_notifications','notifications','2020-04-08 00:06:03','2020-04-08 00:06:03'),(95,'delete_notifications','notifications','2020-04-08 00:06:03','2020-04-08 00:06:03'),(96,'browse_survey_question','survey_question','2020-04-08 00:06:03','2020-04-08 00:06:03'),(97,'read_survey_question','survey_question','2020-04-08 00:06:03','2020-04-08 00:06:03'),(98,'edit_survey_question','survey_question','2020-04-08 00:06:03','2020-04-08 00:06:03'),(99,'add_survey_question','survey_question','2020-04-08 00:06:03','2020-04-08 00:06:03'),(100,'delete_survey_question','survey_question','2020-04-08 00:06:03','2020-04-08 00:06:03'),(101,'browse_surveys','surveys','2020-04-08 00:06:03','2020-04-08 00:06:03'),(102,'read_surveys','surveys','2020-04-08 00:06:03','2020-04-08 00:06:03'),(103,'edit_surveys','surveys','2020-04-08 00:06:03','2020-04-08 00:06:03'),(104,'add_surveys','surveys','2020-04-08 00:06:03','2020-04-08 00:06:03'),(105,'delete_surveys','surveys','2020-04-08 00:06:03','2020-04-08 00:06:03'),(106,'browse_survey_answer','survey_answer','2020-04-08 00:06:03','2020-04-08 00:06:03'),(107,'read_survey_answer','survey_answer','2020-04-08 00:06:03','2020-04-08 00:06:03'),(108,'edit_survey_answer','survey_answer','2020-04-08 00:06:03','2020-04-08 00:06:03'),(109,'add_survey_answer','survey_answer','2020-04-08 00:06:03','2020-04-08 00:06:03'),(110,'delete_survey_answer','survey_answer','2020-04-08 00:06:03','2020-04-08 00:06:03'),(111,'browse_workinghours','workinghours','2020-04-08 00:06:03','2020-04-08 00:06:03'),(112,'read_workinghours','workinghours','2020-04-08 00:06:03','2020-04-08 00:06:03'),(113,'edit_workinghours','workinghours','2020-04-08 00:06:03','2020-04-08 00:06:03'),(114,'add_workinghours','workinghours','2020-04-08 00:06:03','2020-04-08 00:06:03'),(115,'delete_workinghours','workinghours','2020-04-08 00:06:03','2020-04-08 00:06:03'),(116,'browse_appointments','appointments','2020-04-08 00:06:03','2020-04-08 00:06:03'),(117,'read_appointments','appointments','2020-04-08 00:06:03','2020-04-08 00:06:03'),(118,'edit_appointments','appointments','2020-04-08 00:06:03','2020-04-08 00:06:03'),(119,'add_appointments','appointments','2020-04-08 00:06:03','2020-04-08 00:06:03'),(120,'delete_appointments','appointments','2020-04-08 00:06:03','2020-04-08 00:06:03'),(121,'browse_specialities','specialities','2020-04-08 00:06:03','2020-04-08 00:06:03'),(122,'read_specialities','specialities','2020-04-08 00:06:03','2020-04-08 00:06:03'),(123,'edit_specialities','specialities','2020-04-08 00:06:03','2020-04-08 00:06:03'),(124,'add_specialities','specialities','2020-04-08 00:06:03','2020-04-08 00:06:03'),(125,'delete_specialities','specialities','2020-04-08 00:06:03','2020-04-08 00:06:03'),(126,'browse_bookings','bookings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(127,'read_bookings','bookings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(128,'edit_bookings','bookings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(129,'add_bookings','bookings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(130,'delete_bookings','bookings','2020-04-08 00:06:03','2020-04-08 00:06:03'),(131,'browse_booking_phones','booking_phones','2020-04-08 00:06:03','2020-04-08 00:06:03'),(132,'read_booking_phones','booking_phones','2020-04-08 00:06:03','2020-04-08 00:06:03'),(133,'edit_booking_phones','booking_phones','2020-04-08 00:06:03','2020-04-08 00:06:03'),(134,'add_booking_phones','booking_phones','2020-04-08 00:06:03','2020-04-08 00:06:03'),(135,'delete_booking_phones','booking_phones','2020-04-08 00:06:03','2020-04-08 00:06:03');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int unsigned NOT NULL,
  `photo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tag` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int DEFAULT NULL,
  `tag_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_user`
--

DROP TABLE IF EXISTS `post_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_user`
--

LOCK TABLES `post_user` WRITE;
/*!40000 ALTER TABLE `post_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,2,'عملية تغيير مفصل الركبة','عملية تغيير مفصل الركبة','تعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد','\n\nعملية تغيير مفصل الركبة\n\n\\n\nعملية تغيير مفصل الركبة\n\\n\nتعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد أو للتآكل مما يسبب آلام قوية يصعب تحملها وتؤدي لصعوبة في الحركة، وهنا العملية هي الحل الأمثل للتخلص من هذه الآلام المزعجة وامتلاك القدرة على ممارسة الأنشطة اليومية بسهولة.\n\n\\n\nتحتاج هذة العملية لإجراء الكثير من الفحوصات والتحاليل قبل العملية للتأكد من أنها الحل المناسب والأخير للقضاء على آلام الركبة والقدرة على الحركة بشكل سليم.\n\n\\n\nوفي العملية يتم استبدال المفصل الطبيعي بآخر صناعي مصنوع من التيتانيوم أو البلاستيك القوي، ويتم إجراءها تحت تأثير التخدير الموضعي أو الكلي حسب ما يحدده الطبيب.\n\n\\n\nتنقسم عملية تغيير المفصل إلى نوعين وهما :-\n\\n\n- تغيير كلي لمفصل الركبة.\n\n\\n\nحيث يتم تغيير المفصل بالكامل نتيجة حدوث تضرر أو تآكل المفصل بالكامل.\n\n\\n\n- تغيير جزئي لمفصل الركبة.\n\n\\n\nحيث يتم تغيير الجزء المتضرر فقط من المفصل، وذلك ضمن شروط معينة وهي:-\n\n\\n\n- أن يكون الرباط الصليبي الأمامي سليمًا.\n\n\\n\n- وأن يكون النصف الخارجي من المفصل سليمًا.\n\n\\n\n- أن يكون مقدار الاعوجاج أقل من 15 درجة.\n\n\\n\n6 أسباب لإجراء عملية مفصل الركبة :\n\\n\nيلجأ الطبيب لإجراء تغيير المفصل الركبة للحالات التي لا تتحمل الآلام والضغط على الركبة ومن هذه الحالات:-\n\n\\n\n1- هشاشة العظام:\n\n\\n\nوتعتبر هشاشة العظام من الأسباب الرئيسية لإجراء العملية حيث يصبح المفصل ضعيف وهش غير قادر على تحمل المزيد من الضغط عليه.\n\n\\n\n2- خشونة الركبة:\n\n\\n\nالخشونة هي تآكل لغضروف الركبة ومن ثم تآكل المفصل نفسه وفي الحالات المتقدمة يصبح المفصل غير قادر على امتصاص الصدمات مما يعوق الحركة بشكل كبير أو يمنعها نسبياً.\n\n\\n\n3- زيادة الوزن:\n\n\\n\nتشكل السمنة خطراً  كبيراً على مفصل الركبة لأن الوزن الزائد يؤدي إلى زيادة الضغط على المفصل و\n\n\\n\nتآكل الغضروف.\n\n\\n\n4- الإصابات الخارجية:\n\n\\n\nكالإصابات التي تحدث في الملاعب أو إصابات الحوادث والكسور.\n\n\\n\n5- الاستئصال الجزئي للغضروف المفصلي للركبة:\n\n\\n\nبعد هذا الاستئصال يفقد المفصل قدرته على امتصاص الصدمات فقد تحتاج بعض الحالات حينها لاستبدال المفصل.\n\n\\n\n6- التهاب المفاصل الروماتويدي:\n\n\\n\nتسبب الالتهابات الروماتويدية آلام شديدة لا تُحتمل في المفاصل وقد تؤدي في النهاية إلى تشوه كامل في المفصل فيضطر الطبيب لإجراء عملية تبديل مفصل الركبة.\n\n\\n\nعلامات تستدعي إجراء عملية تغيير مفصل الركبة :-\n\\n\n- حدوث تآكل في مفصل أو غضروف الركبة.\n\n\\n\n- آلام شديدة في الركبة وتظهر خاصة في أوقات الراحة وأثناء النوم ليلاً.\n\n\\n\n- التيبس والتصلب في مفصل الركبة لأنه يسبب صعوبة في ممارسة الأنشطة اليومية كصعوبة في ارتداء الملابس أو الأحذية وغيرها من الأنشطة اليومية المعتادة.\n\n\\n\n- صعوبة في المشي.\n\n\\n\n- محدودية الحركة وعدم قيام المفصل بأداء وظيفته كاملة. \"عملية\n\n\\n\n4 خطوات هامة قبل عـملية تغيير مـفصل الركبة:-\n\\n\nقبل إجراء عملية تبديل مفصل الركبة يقوم الطبيب بتحديد الفحوصات والتحاليل التي يحتاجها المريض وهي:-\n\n\\n\n- إجراء أشعة رنين مغناطيسي أو أشعة سينية على الركبة.\n\n\\n\n- إجراء تحاليل للدم كصورة دم كاملة، وتخثر الدم، وكيمياء الدم، ووظائف الكلى والكبد.\n\n\\n\n- إجراء فحص البول.\n\n\\n\n- إجراء تخطيط كهربية القلب (رسم القلب).\n\n\\n\nوإذا كان المريض يتناول أدوية معينة يحدد الطبيب الأدوية التي يجب التوقف عن تناولها قبل العملية.\n\n\\n\nهل تظهر مضاعفات بعد عملية تغيير مفصل الركبة\n\\n\nفي بعض الحالات قد تظهر بعض المضاعفات مثل:\n\n\\n\n- حدوث تورم والتهابات وآلام في المفصل.\n\n\\n\n- التعرض لكسور في عظام الركبة.\n\n\\n\n- حدوث تصلب في مفصل الركبة.\n\n\\n\n- حدوث ضرر في العصب أو العضلات.\n\n\\n\nولكن هناك بعض الشروط التي قد تحميك من هذه المضاعفات وتساعد في نجاح عملية تبديل مفصل الركبة وهي..\n\n\\n\n- إجراء العملية تحت إشراف طبيب عظام ماهر ومتخصص وله خبرة في إجراء عملية تبديل مفصل الركبة لمرات عديدة.\n\n\\n\n- التأكد من جودة نوع المفصل المستخدم.\n\n\\n\n- التخلص من الوزن الزائد قبل إجراء الجراحة.\n\n\\n\n- عمل جلسات علاج طبيعي بعد إجراء الجراحة.\n\n\\n\n-اتباع تعليمات الطبيب للحفاظ على المفصل لأطول فترة ممكنة.\n\n\\n\nأهمية العلاج الطبيعي بعد عملية تغيير مفصل الركبة :-\n\\n\n- يعد العلاج الطبيعي من أهم خطوات التعافي بعد عملية تبديل مفصل الركبة، وللحفاظ على مفصل الركبة الذي تم استبداله.\n\n\\n\n- يعمل العلاج الطبيعي على تقوية عضلات الساق الضعيفة، لأن قوة العضلات تساعد في تخفيف ضغط وزن الجسم على مفاصل الركبة.\n\n\\n\nبعد عملية تبديل مفصل الركبة تعرف على أنواع تمارين العلاج الطبيعي\n\\n\nتتنوع تمارين العلاج الطبيعي لتناسب تفاصيل كل حالة ومن هذه التمارين..\n\n\\n\n- العلاج المائي، لعلاج آلام العضلات الناتجة عن إجراء الجراحة، والشعور بالراحة والاسترخاء.\n\n\\n\n- تمارين التوازن والإطالة والتقوية.\n\n\\n\n- استخدام النبضات الكهربائية لتنشيط وتقوية العضلات.\n\n\\n\n- استخدام الأشعة تحت الحمراء لتخفيف الألم والالتهابات، حيث أن حرارتها تساعد على توسيع الأوعية الدموية التي تخفف من الشعور بالألم بشكل كبير.\n\n\\n\n- تدليك الأنسجة العميقة للتخفيف من تشنجات العضلات وتقليل الالتهابات.\n\n\\n\n- العلاج بالترددات الاهتزازية لتقوية العضلات وزيادة نشاط الأعصاب.\n\n\\n\nنصائح هامة بعد العملية :-\n\\n\n- الراحة التامة في الفراش ووضع الساق في خط مستقيم لتسهيل تدفق الدم والتخفيف من الألم.\n\n\\n\n- الانتظام في تناول الأدوية كما يصفها الطبيب لتمام التعافي من آثار العملية.\n\n\\n\n- استخدام كمادات الثلج على مفصل الركبة في البداية بعد إجراء عملية تبديل مفصل الركبة، فالثلج يساعد على تخدير منطقة المفصل وبالتالي تقليل الشعور بالألم والتخفيف من الالتهابات.\n\n\\n\n- بعد التئام الجرح يمكن استخدام كمادات المياه الساخنة للتخفيف من الألم وزيادة الشعور بالراحة والاسترخاء.\n\n\\n\n- يمكن استخدام العكاز أو الكرسي المتحرك مؤقتاً خلال الأيام الأولى من إجراء الجراحة عند القيام بأي نشاط معين، وذلك لتجنب زيادة الضغط على المفصل أثناء المشي أو الجلوس.\n\n\\n\n- الانتظام في عمل جلسات العلاج الطبيعي.\n\n\\n\n- الالتزام بممارسة التمارين المنزلية التي يحددها الطبيب بانتظام للحفاظ على سلامة مفصل الركبة لأطول فترة ممكنة.\n\n\\n\n- تجنب ثني الركبة أثناء الجلوس أو القفز خلال الأسابيع الأولى من إجراء عملية تبديل مفصل الركبة.\n\n\\n\n- تجنب استخدام السلم لعدم الضغط علي الركبة التي تم إجراء العملية بها.\n\n\\n\n- تجنب قيادة السيارة نهائياً حتى تمام التعافي من العملية والقدرة على تحريك المفصل بشكل سليم.\n\n\\n\n- الالتزام بعمل الفحص الدوري لمفصل الركبة من خلال الأشعة للتأكد من أن المفصل يعمل بكفاءة وعدم وجود أي خلل في المفصل أو عظام الركبة.\n\n\\n\n- النوم على سرير مرتفع للقيام من عليه بسهولة وعدم الشعور بألم.\n\n\\n\n- الحفاظ على وزن الجسم لتجنب زيادة الضغط على مفصل الركبة.\n\n\\n\nومع الإلتزام بهذه النصائح وتعليمات الطبيب، يستعيد المفصل قوته وأداء وظيفته كاملة حيث يمكنك العودة لممارسة أنشطتك اليومية بسهولة ودون عناء.\n\n\\n\nتعرف ايضاً علي : \n\\n\nعلاج ارتفاع الكوليسترول\n\n\\n\nجلطة القلب و طرق التعامل معها.\n\n\\n\nعلاج اضطرابات النوم\n\n\\n\n\"سجل\n\n','posts\\February2020\\V8egCZUkNuLBg6CtuDwZ.jpg','عملية-تغيير-مفصل-الركبة','تعرف الان على عملية تغيير مفصل الركبة فى السعودية وعملية تغيير مفصل الفخذ وماهي النصائح وافضل طرق للوقاية من مضاعفاتها..','عملية تغيير مفصل الركبة','PUBLISHED',0,'2020-02-19 08:03:12','2020-02-26 13:33:00');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2020-04-08 00:06:02','2020-04-08 00:06:02'),(2,'user','Normal User','2020-04-08 00:06:02','2020-04-08 00:06:02');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seo_settings`
--

DROP TABLE IF EXISTS `seo_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seo_settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `details` text COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seo_settings`
--

LOCK TABLES `seo_settings` WRITE;
/*!40000 ALTER TABLE `seo_settings` DISABLE KEYS */;
INSERT INTO `seo_settings` VALUES (3,'title-meta.Title_Separator','Title Separator','|','\\n            {\\n    \"default\" : \"|\",\\n    \"options\" : {\\n        \"-\": \"-\",\\n        \"_\": \"_\",\\n        \"__\": \"__\",\\n        \".\": \".\",\\n        \"*\": \"*\",\\n        \"|\": \"|\",\\n        \"~\": \"~\",\\n        \"<\": \"<\",\\n        \">\": \">\",\\n        \"«\": \"«\",\\n        \"»\": \"»\"\\n    }\\n    }\\n            ','select_dropdown',2,'Title & Meta'),(4,'title-meta.Title_template','Title template',NULL,NULL,'text',1,'Title & Meta'),(5,'title-meta.meta_description_template','Meta description template',NULL,NULL,'text_area',3,'Title & Meta'),(9,'social.Facebook_page_uRL','Facebook Page URL','http://facebook.com',NULL,'text',5,'Social'),(10,'social.Twitter_username','Twitter Username','http://twitter.com',NULL,'text',6,'Social'),(11,'social.Instagram_uRL','Instagram URL','http://instagram.com',NULL,'text',7,'Social'),(12,'social.LinkedIn_uRL','LinkedIn URL','http://linkedin.com',NULL,'text',8,'Social'),(13,'social.YouTube_uRL','YouTube URL','http://youtube.com',NULL,'text',9,'Social'),(14,'open-graph.title','title',NULL,NULL,'text',10,'Open Graph'),(15,'open-graph.description','description',NULL,NULL,'text',11,'Open Graph'),(16,'open-graph.url','url',NULL,NULL,'text',12,'Open Graph'),(17,'open-graph.image','image','settings\\February2020\\7GifG2E3SPoOjatdYazK.jpg',NULL,'image',13,'Open Graph'),(19,'open-graph.image:secure_url','image:secure_url','settings\\February2020\\dfBs9bkLbAyjymF0AZ5J.jpg',NULL,'image',14,'Open Graph'),(20,'twitter.cart','cart',NULL,NULL,'text',15,'Twitter'),(21,'twitter.title','title',NULL,NULL,'text',16,'Twitter'),(22,'twitter.description','description',NULL,NULL,'text',17,'Twitter'),(23,'twitter.site','site',NULL,NULL,'text',18,'Twitter'),(24,'twitter.image','image','settings\\February2020\\BNMlDDtOFWtAWA76EuZF.jpg',NULL,'image',19,'Twitter');
/*!40000 ALTER TABLE `seo_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `small_description` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8_unicode_ci,
  `meta_description` longtext COLLATE utf8_unicode_ci,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'وحدة قسطرة القلب','The Cardiac Catheterization Unit','وحدة-قسطرة-القلب','the-cardiac-catheterization-unit','حرصاً من مستشفى حي الجامعة على تقديم أفضل الرعاية الطبية الدقيقة للمرضى، تشمل رعايتنا توفير وحدة خاصة بقسطرة القلب تم تأسيسها من أجل تقديم العناية والاهتمام المطلوبين للحالات التي تحتاج إلى قسطرة القلب، وذلك من خلال توفير عدد كافي من الأسرة بالمستشفى بالإضافة إلى أحدث وأدق الأجهزة والتقنيات اللازمة لرعاية المريض ومتابعته أثناء وبعد إجراء القسطرة.','\n\nحرصاً من مستشفى حي الجامعة على تقديم أفضل الرعاية الطبية الدقيقة للمرضى، تشمل رعايتنا توفير وحدة خاصة بقسطرة القلب تم تأسيسها من أجل تقديم العناية والاهتمام المطلوبين للحالات التي تحتاج إلى قسطرة القلب، وذلك من خلال توفير عدد كافي من الأسرة بالمستشفى بالإضافة إلى أحدث وأدق الأجهزة والتقنيات اللازمة لرعاية المريض ومتابعته أثناء وبعد إجراء القسطرة.\n\n\\n\nوتوفر مستشفى حي الجامعة أيضاً العناية والرعاية اللازمة للمريض بعد إجراء قسطرة القلب، حيث يجب نقل المريض بعدها إلى غرفة رعاية مركزة ليخضع للملاحظة لمدة من الزمن يحددها الطبيب الخاص، يتم ملاحظة معدل ضربات القلب وقياس ضغط الدم بانتظام، وتوفير مراقبة مستمرة للمؤشرات الحيوية للقلب حتى يتعافى المريض.\n\n','services/10Cardiology.jpg','','',1,'2020-01-29 06:10:00','2020-02-05 11:48:04');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `details` text COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (5,'admin.bg_image','Admin Background Image','settings\\December2019\\uwHa7tePgQ7T8DsDm1VO.jpg','','image',5,'Admin'),(8,'admin.loader','Admin Loader','settings\\December2019\\aoMDezpMVFGX2Xfj4AvD.png','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','settings\\December2019\\TA2m2BERw1japFLiKb0S.png','','image',4,'Admin'),(12,'site.address_ar','Address Arabic','Elmhafza',NULL,'text',7,'Site'),(13,'site.address_en','Address English','aa',NULL,'text',9,'Site'),(14,'site.phone','phone','01126697538',NULL,'text',8,'Site'),(15,'site.facebook','FaceBook','asaswww',NULL,'text',10,'Site'),(22,'home.Planning','Planning','settings\\January2020\\NJQ1neyWoaqGQ1UjQzE1.png',NULL,'image',16,'home'),(23,'home.Build','Build','settings\\January2020\\LexhiWNqEE9ZhWGrJ8A4.png',NULL,'image',17,'home'),(24,'home.Our_Work_1','Our Work 1','settings\\January2020\\Szv9f79pN5hMK0Iu2mai.jpg',NULL,'image',18,'home'),(25,'home.Our_Work_2','Our Work 2','settings\\January2020\\UmD0BeZQfn3cGeNbwLKm.jpg',NULL,'image',19,'home'),(26,'home.Our_Work_3','Our Work 3','settings\\January2020\\v9ZiHGxNC4XZumvUqkU8.jpg',NULL,'image',20,'home'),(34,'site.title_ar','title Ar','www',NULL,'text',21,'Site'),(35,'site.title_en','title EN','www',NULL,'text',22,'Site'),(36,'site.description_ar','description Ar','www',NULL,'text_area',23,'Site'),(37,'site.description_en','description En',NULL,NULL,'text_area',24,'Site'),(38,'site.logo','logo','settings\\January2020\\TvNmuG4QHsS2wSfN2iiN.jpg',NULL,'image',25,'Site'),(39,'site.ahmed','ahmed',NULL,NULL,'text',26,'Site'),(41,'site.fav','fav','settings\\February2020\\2FZbQZs2EdsFgSzNgeVS.jpg',NULL,'image',27,'Site'),(42,'site.title_meta_data','Meta Data',NULL,NULL,'text',28,'Site'),(43,'site.desc','123123',NULL,NULL,'text_area',29,'Site'),(44,'.description Ar','description Ar',NULL,NULL,'text_area',30,NULL),(46,'site.terms','terms','<p>Welcome to Website Name! \\r\\n These terms and conditions outline the rules and regulations for the use of Company Name\'s Website, located at Website.com. \\r\\n By accessing this website we assume you accept these terms and conditions. Do not continue to use Website Name if you do not agree to take all of the terms and conditions stated on this page. \\r\\n The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: &ldquo;Client&rdquo;, &ldquo;You&rdquo; and &ldquo;Your&rdquo; refers to you, the person log on this website and compliant to the Company\'s terms and conditions. &ldquo;The Company&rdquo;, &ldquo;Ourselves&rdquo;, &ldquo;We&rdquo;, &ldquo;Our&rdquo; and &ldquo;Us&rdquo;, refers to our Company. &ldquo;Party&rdquo;, &ldquo;Parties&rdquo;, or &ldquo;Us&rdquo;, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client\'s needs in respect of provision of the Company\'s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same. \\r\\n Cookies \\r\\n We employ the use of cookies. By accessing Website Name, you agreed to use cookies in agreement with the Company Name\'s Privacy Policy. \\r\\n Most interactive websites use cookies to let us retrieve the user\'s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies. \\r\\n License \\r\\n Unless otherwise stated, Company Name and/or its licensors own the intellectual property rights for all material on Website Name. All intellectual property rights are reserved. You may access this from Website Name for your own personal use subjected to restrictions set in these terms and conditions. \\r\\n You must not: \\r\\n \\r\\n Republish material from Website Name \\r\\n Sell, rent or sub-license material from Website Name \\r\\n Reproduce, duplicate or copy material from Website Name \\r\\n Redistribute content from Website Name \\r\\n \\r\\n This Agreement shall begin on the date hereof. \\r\\n Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Company Name does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Company Name,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Company Name shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website. \\r\\n Company Name reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions. \\r\\n You warrant and represent that: \\r\\n \\r\\n You are entitled to post the Comments on our website and have all necessary licenses and consents to do so; \\r\\n The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party; \\r\\n The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy \\r\\n The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity. \\r\\n \\r\\n You hereby grant Company Name a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media. \\r\\n Hyperlinking to our Content \\r\\n The following organizations may link to our Website without prior written approval: \\r\\n \\r\\n Government agencies; \\r\\n Search engines; \\r\\n News organizations; \\r\\n Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and \\r\\n System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site. \\r\\n \\r\\n These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party\'s site. \\r\\n We may consider and approve other link requests from the following types of organizations: \\r\\n \\r\\n commonly-known consumer and/or business information sources; \\r\\n dot.com community sites; \\r\\n associations or other groups representing charities; \\r\\n online directory distributors; \\r\\n internet portals; \\r\\n accounting, law and consulting firms; and \\r\\n educational institutions and trade associations. \\r\\n \\r\\n We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Company Name; and (d) the link is in the context of general resource information. \\r\\n These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site. \\r\\n If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Company Name. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response. \\r\\n Approved organizations may hyperlink to our Website as follows: \\r\\n \\r\\n By use of our corporate name; or \\r\\n By use of the uniform resource locator being linked to; or \\r\\n By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party\'s site. \\r\\n \\r\\n No use of Company Name\'s logo or other artwork will be allowed for linking absent a trademark license agreement. \\r\\n iFrames \\r\\n Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website. \\r\\n Content Liability \\r\\n We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights. \\r\\n Reservation of Rights \\r\\n We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it\'s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions. \\r\\n Removal of links from our website \\r\\n If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly. \\r\\n We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date. \\r\\n Disclaimer \\r\\n To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will: \\r\\n \\r\\n limit or exclude our or your liability for death or personal injury; \\r\\n limit or exclude our or your liability for fraud or fraudulent misrepresentation; \\r\\n limit any of our or your liabilities in any way that is not permitted under applicable law; or \\r\\n exclude any of our or your liabilities that may not be excluded under applicable law. \\r\\n \\r\\n The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty. \\r\\n As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>',NULL,'rich_text_box',31,'Site'),(47,'site.consent','consent','<p>Welcome to Website Name! \\r\\n These terms and conditions outline the rules and regulations for the use of Company Name\'s Website, located at Website.com. \\r\\n By accessing this website we assume you accept these terms and conditions. Do not continue to use Website Name if you do not agree to take all of the terms and conditions stated on this page. \\r\\n The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: &ldquo;Client&rdquo;, &ldquo;You&rdquo; and &ldquo;Your&rdquo; refers to you, the person log on this website and compliant to the Company\'s terms and conditions. &ldquo;The Company&rdquo;, &ldquo;Ourselves&rdquo;, &ldquo;We&rdquo;, &ldquo;Our&rdquo; and &ldquo;Us&rdquo;, refers to our Company. &ldquo;Party&rdquo;, &ldquo;Parties&rdquo;, or &ldquo;Us&rdquo;, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client\'s needs in respect of provision of the Company\'s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same. \\r\\n Cookies \\r\\n We employ the use of cookies. By accessing Website Name, you agreed to use cookies in agreement with the Company Name\'s Privacy Policy. \\r\\n Most interactive websites use cookies to let us retrieve the user\'s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies. \\r\\n License \\r\\n Unless otherwise stated, Company Name and/or its licensors own the intellectual property rights for all material on Website Name. All intellectual property rights are reserved. You may access this from Website Name for your own personal use subjected to restrictions set in these terms and conditions. \\r\\n You must not: \\r\\n \\r\\n Republish material from Website Name \\r\\n Sell, rent or sub-license material from Website Name \\r\\n Reproduce, duplicate or copy material from Website Name \\r\\n Redistribute content from Website Name \\r\\n \\r\\n This Agreement shall begin on the date hereof. \\r\\n Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Company Name does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Company Name,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Company Name shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website. \\r\\n Company Name reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions. \\r\\n You warrant and represent that: \\r\\n \\r\\n You are entitled to post the Comments on our website and have all necessary licenses and consents to do so; \\r\\n The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party; \\r\\n The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy \\r\\n The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity. \\r\\n \\r\\n You hereby grant Company Name a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media. \\r\\n Hyperlinking to our Content \\r\\n The following organizations may link to our Website without prior written approval: \\r\\n \\r\\n Government agencies; \\r\\n Search engines; \\r\\n News organizations; \\r\\n Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and \\r\\n System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site. \\r\\n \\r\\n These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party\'s site. \\r\\n We may consider and approve other link requests from the following types of organizations: \\r\\n \\r\\n commonly-known consumer and/or business information sources; \\r\\n dot.com community sites; \\r\\n associations or other groups representing charities; \\r\\n online directory distributors; \\r\\n internet portals; \\r\\n accounting, law and consulting firms; and \\r\\n educational institutions and trade associations. \\r\\n \\r\\n We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Company Name; and (d) the link is in the context of general resource information. \\r\\n These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site. \\r\\n If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Company Name. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response. \\r\\n Approved organizations may hyperlink to our Website as follows: \\r\\n \\r\\n By use of our corporate name; or \\r\\n By use of the uniform resource locator being linked to; or \\r\\n By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party\'s site. \\r\\n \\r\\n No use of Company Name\'s logo or other artwork will be allowed for linking absent a trademark license agreement. \\r\\n iFrames \\r\\n Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website. \\r\\n Content Liability \\r\\n We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights. \\r\\n Reservation of Rights \\r\\n We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it\'s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions. \\r\\n Removal of links from our website \\r\\n If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly. \\r\\n We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date. \\r\\n Disclaimer \\r\\n To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will: \\r\\n \\r\\n limit or exclude our or your liability for death or personal injury; \\r\\n limit or exclude our or your liability for fraud or fraudulent misrepresentation; \\r\\n limit any of our or your liabilities in any way that is not permitted under applicable law; or \\r\\n exclude any of our or your liabilities that may not be excluded under applicable law. \\r\\n \\r\\n The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty. \\r\\n As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>',NULL,'rich_text_box',32,'Site'),(48,'notification.new','new','<p>\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"\" \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n success New Appointment \\r\\n \\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Create New Appointment with this data \\r\\n Name : [[user_name]] \\r\\n Email : [[user_email]] \\r\\n Doctor:[[doctor_name]] \\r\\n Doctor Email:[[doctor_email]] \\r\\n Appointment Time :[[Appointment_start]] \\r\\n Appointment Duration :[[Appointment_duration]] \\r\\n \\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"\" \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat. \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Claim yours! \\r\\n \\r\\n \\r\\n \"\" Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat. \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n &reg; Someone, somewhere 20XX Unsubscribe from this newsletter instantly \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"Facebook\" \"Twitter\" \\r\\n \\r\\n</p>',NULL,'rich_text_box',33,'Notification'),(49,'notification.confirmed','confirmed','<p>\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"\" \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n success Appointment Confirmed \\r\\n \\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Appointment Confirmed with this data \\r\\n Name : [[user_name]] \\r\\n Email : [[user_email]] \\r\\n Doctor:[[doctor_name]] \\r\\n Doctor Email:[[doctor_email]] \\r\\n Appointment Time :[[Appointment_start]] \\r\\n Appointment Duration :[[Appointment_duration]] \\r\\n \\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"\" \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat. \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Claim yours! \\r\\n \\r\\n \\r\\n \"\" Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat. \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n &reg; Someone, somewhere 20XX Unsubscribe from this newsletter instantly \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"Facebook\" \"Twitter\" \\r\\n \\r\\n</p>',NULL,'rich_text_box',34,'Notification'),(50,'notification.rejected','rejected','<p>\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"\" \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Sorry Appointment Rejected \\r\\n \\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Appointment Rejected with this data \\r\\n Name : [[user_name]] \\r\\n Email : [[user_email]] \\r\\n Doctor:[[doctor_name]] \\r\\n Doctor Email:[[doctor_email]] \\r\\n Appointment Time :[[Appointment_start]] \\r\\n Appointment Duration :[[Appointment_duration]] \\r\\n \\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"\" \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat. \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Claim yours! \\r\\n \\r\\n \\r\\n \"\" Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat. \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n &reg; Someone, somewhere 20XX Unsubscribe from this newsletter instantly \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"Facebook\" \"Twitter\" \\r\\n \\r\\n</p>',NULL,'rich_text_box',35,'Notification'),(51,'notification.payment','payment','<p>\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"\" \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n success Payment Confirmed \\r\\n \\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Payment Confirmed with this data \\r\\n Name : [[user_name]] \\r\\n Email : [[user_email]] \\r\\n Doctor:[[doctor_name]] \\r\\n Doctor Email:[[doctor_email]] \\r\\n Appointment Time :[[Appointment_start]] \\r\\n Appointment Duration :[[Appointment_duration]] \\r\\n \\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"\" \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat. \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n Claim yours! \\r\\n \\r\\n \\r\\n \"\" Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat. \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n &reg; Someone, somewhere 20XX Unsubscribe from this newsletter instantly \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n \"Facebook\" \"Twitter\" \\r\\n \\r\\n</p>',NULL,'rich_text_box',36,'Notification'),(52,'sms.new','new','hi [[user_name]] your appointment with [[doctor_name]] ( [[Appointment_start]] - [[Appointment_duration]] Minutes ) has been created!',NULL,'text_area',37,'sms'),(53,'sms.confirmed','confirmed','hi [[user_name]] your appointment with doctor [[doctor_name]] ( [[Appointment_start]] - [[Appointment_duration]] Minutes ) has been confirmed!',NULL,'text_area',38,'sms'),(54,'sms.rejected','rejected','hi [[user_name]] your appointment with doctor [[doctor_name]] ( [[Appointment_start]] - [[Appointment_duration]] Minutes ) has been rejected!',NULL,'text_area',39,'sms'),(55,'sms.payment','payment','hi [[user_name]] your appointment with doctor [[doctor_name]] ( [[Appointment_start]] - [[Appointment_duration]] Minutes ) has been marked as paid!',NULL,'text_area',40,'sms'),(56,'notification.user_new','new user',NULL,NULL,'rich_text_box',41,'Notification'),(57,'sms.user_new','new user','hi [[user_name]] You have registered successfully!',NULL,'text_area',42,'sms');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `photo_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8_unicode_ci,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'sliders\\January2020\\uZbTrqEKaRibB8S0LBjS.jpg','sliders\\January2020\\70Ow45LmLS8haYyyjKh9.jpg','http://tawfek.tk/ar',1,'2020-01-29 06:28:47','2020-01-29 06:30:18'),(2,'sliders\\January2020\\wtbx6osMEoLdtAYwj3f0.jpg','sliders\\January2020\\McXT73mj1asWVcINDlcF.jpg','http://tawfek.tk/arabic',1,'2020-01-29 06:29:34','2020-02-24 07:18:51'),(3,'sliders\\January2020\\IacT4Ln8tMPI0d581OAF.jpg','sliders\\January2020\\4kBBO0BLTEVNf6RKopds.jpg','http://tawfek.tk/test/ar',1,'2020-01-29 06:30:12','2020-02-24 07:18:50');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `social_accounts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `social_accounts_provider_user_id_provider_unique` (`provider_user_id`,`provider`),
  KEY `social_accounts_user_id_foreign` (`user_id`),
  CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_accounts`
--

LOCK TABLES `social_accounts` WRITE;
/*!40000 ALTER TABLE `social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialities`
--

DROP TABLE IF EXISTS `specialities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `specialities` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialities`
--

LOCK TABLES `specialities` WRITE;
/*!40000 ALTER TABLE `specialities` DISABLE KEYS */;
INSERT INTO `specialities` VALUES (1,'أخصائي طب الأسنان','2020-04-07 21:10:28','2020-04-07 21:10:28'),(2,'أخصائي امراض القلب والاوعية الدموية','2020-04-07 21:10:28','2020-04-07 21:10:28'),(3,'استشاري الجراحة العامة','2020-04-07 21:10:28','2020-04-07 21:10:28'),(4,'أخصائي الأمراض الجلدية','2020-04-07 21:10:28','2020-04-07 21:10:28'),(5,'أخصائى أنف وأذن وحنجرة','2020-04-07 21:10:28','2020-04-07 21:10:28'),(6,'أخصائي أمراض الباطنة وأمراض الكلى','2020-04-07 21:10:28','2020-04-07 21:10:28'),(7,'أخصائي أمراض الجهاز الهضمي والكلى','2020-04-07 21:10:28','2020-04-07 21:10:28'),(8,'أخصائي الامراض الباطنية','2020-04-07 21:10:28','2020-04-07 21:10:28'),(9,'استشارى أمراض المخ و الأعصاب','2020-04-07 21:10:28','2020-04-07 21:10:28'),(10,'أخصائي أمراض النساء و الولادة','2020-04-07 21:10:28','2020-04-07 21:10:28'),(11,'أخصائى أول نساء وولادة','2020-04-07 21:10:28','2020-04-07 21:10:28'),(12,'استشارى طب و جراحة العيون','2020-04-07 21:10:28','2020-04-07 21:10:28'),(13,'أخصائي أمراض العظام والمفاصل','2020-04-07 21:10:28','2020-04-07 21:10:28'),(14,'أخصائى طب الأطفال','2020-04-07 21:10:28','2020-04-07 21:10:28'),(15,'استشاري المسالك البولية','2020-04-07 21:10:28','2020-04-07 21:10:28'),(16,'استشارى أمراض النفسية','2020-04-07 21:10:28','2020-04-07 21:10:28'),(17,'استشارى الأمراض الصدرية','2020-04-07 21:10:28','2020-04-07 21:10:28');
/*!40000 ALTER TABLE `specialities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_answer`
--

DROP TABLE IF EXISTS `survey_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey_answer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint unsigned NOT NULL,
  `order` int unsigned DEFAULT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `points` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `survey_answer_question_id_foreign` (`question_id`),
  CONSTRAINT `survey_answer_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `survey_question` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_answer`
--

LOCK TABLES `survey_answer` WRITE;
/*!40000 ALTER TABLE `survey_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_question`
--

DROP TABLE IF EXISTS `survey_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey_question` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `survey_id` bigint unsigned NOT NULL,
  `order` int unsigned DEFAULT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `form_type` enum('text','textarea','menu','checkbox','radio') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `survey_question_survey_id_foreign` (`survey_id`),
  CONSTRAINT `survey_question_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_question`
--

LOCK TABLES `survey_question` WRITE;
/*!40000 ALTER TABLE `survey_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_user_answer`
--

DROP TABLE IF EXISTS `survey_user_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey_user_answer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_info_id` bigint unsigned NOT NULL,
  `answer_id` bigint unsigned DEFAULT NULL,
  `answer_text` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `survey_user_answer_user_info_id_foreign` (`user_info_id`),
  KEY `survey_user_answer_answer_id_foreign` (`answer_id`),
  CONSTRAINT `survey_user_answer_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `survey_answer` (`id`) ON DELETE CASCADE,
  CONSTRAINT `survey_user_answer_user_info_id_foreign` FOREIGN KEY (`user_info_id`) REFERENCES `survey_user_info` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_user_answer`
--

LOCK TABLES `survey_user_answer` WRITE;
/*!40000 ALTER TABLE `survey_user_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_user_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_user_info`
--

DROP TABLE IF EXISTS `survey_user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey_user_info` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `survey_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_survey_closed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `survey_user_info_survey_id_foreign` (`survey_id`),
  CONSTRAINT `survey_user_info_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_user_info`
--

LOCK TABLES `survey_user_info` WRITE;
/*!40000 ALTER TABLE `survey_user_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surveys`
--

DROP TABLE IF EXISTS `surveys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `surveys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `same_page` tinyint(1) NOT NULL,
  `popup_type` enum('small','big') COLLATE utf8_unicode_ci NOT NULL,
  `popup_timer` int unsigned NOT NULL DEFAULT '1',
  `number_of_questions_on_page` int unsigned DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `redirect_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `surveys_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surveys`
--

LOCK TABLES `surveys` WRITE;
/*!40000 ALTER TABLE `surveys` DISABLE KEYS */;
/*!40000 ALTER TABLE `surveys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'أسباب التشوهات الخلقية عند الجنين','أسباب-التشوهات-الخلقية-عند-الجنين','','2020-01-29 07:10:07','2020-01-29 07:10:07'),(2,'أعراض سرطان الثدى','أعراض-سرطان-الثدى','','2020-01-29 07:10:00','2020-01-29 09:06:14');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` VALUES (1,'data_types','display_name_singular',5,'pt','Post','2020-04-01 06:26:55','2020-04-01 06:26:55'),(2,'data_types','display_name_singular',6,'pt','Página','2020-04-01 06:26:55','2020-04-01 06:26:55'),(3,'data_types','display_name_singular',1,'pt','Utilizador','2020-04-01 06:26:55','2020-04-01 06:26:55'),(4,'data_types','display_name_singular',4,'pt','Categoria','2020-04-01 06:26:55','2020-04-01 06:26:55'),(5,'data_types','display_name_singular',2,'pt','Menu','2020-04-01 06:26:55','2020-04-01 06:26:55'),(6,'data_types','display_name_singular',3,'pt','Função','2020-04-01 06:26:55','2020-04-01 06:26:55'),(7,'data_types','display_name_plural',5,'pt','Posts','2020-04-01 06:26:55','2020-04-01 06:26:55'),(8,'data_types','display_name_plural',6,'pt','Páginas','2020-04-01 06:26:55','2020-04-01 06:26:55'),(9,'data_types','display_name_plural',1,'pt','Utilizadores','2020-04-01 06:26:55','2020-04-01 06:26:55'),(10,'data_types','display_name_plural',4,'pt','Categorias','2020-04-01 06:26:55','2020-04-01 06:26:55'),(11,'data_types','display_name_plural',2,'pt','Menus','2020-04-01 06:26:55','2020-04-01 06:26:55'),(12,'data_types','display_name_plural',3,'pt','Funções','2020-04-01 06:26:55','2020-04-01 06:26:55'),(13,'categories','slug',1,'pt','categoria-1','2020-04-01 06:26:55','2020-04-01 06:26:55'),(14,'categories','name',1,'pt','Categoria 1','2020-04-01 06:26:55','2020-04-01 06:26:55'),(15,'categories','slug',2,'pt','categoria-2','2020-04-01 06:26:55','2020-04-01 06:26:55'),(16,'categories','name',2,'pt','Categoria 2','2020-04-01 06:26:55','2020-04-01 06:26:55'),(17,'pages','title',1,'pt','Olá Mundo','2020-04-01 06:26:55','2020-04-01 06:26:55'),(18,'pages','slug',1,'pt','ola-mundo','2020-04-01 06:26:55','2020-04-01 06:26:55'),(19,'pages','body',1,'pt','\n\nOlá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.\n\n\\r\\n\nBallast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.\n\n','2020-04-01 06:26:55','2020-04-01 06:26:55'),(20,'menu_items','title',1,'pt','Painel de Controle','2020-04-01 06:26:55','2020-04-01 06:26:55'),(21,'menu_items','title',2,'pt','Media','2020-04-01 06:26:55','2020-04-01 06:26:55'),(22,'menu_items','title',12,'pt','Publicações','2020-04-01 06:26:55','2020-04-01 06:26:55'),(23,'menu_items','title',3,'pt','Utilizadores','2020-04-01 06:26:55','2020-04-01 06:26:55'),(24,'menu_items','title',11,'pt','Categorias','2020-04-01 06:26:55','2020-04-01 06:26:55'),(25,'menu_items','title',13,'pt','Páginas','2020-04-01 06:26:55','2020-04-01 06:26:55'),(26,'menu_items','title',4,'pt','Funções','2020-04-01 06:26:55','2020-04-01 06:26:55'),(27,'menu_items','title',5,'pt','Ferramentas','2020-04-01 06:26:55','2020-04-01 06:26:55'),(28,'menu_items','title',6,'pt','Menus','2020-04-01 06:26:55','2020-04-01 06:26:55'),(29,'menu_items','title',7,'pt','Base de dados','2020-04-01 06:26:55','2020-04-01 06:26:55'),(30,'menu_items','title',10,'pt','Configurações','2020-04-01 06:26:55','2020-04-01 06:26:55'),(34,'data_rows','display_name',229,'en','ID','2020-04-01 08:10:56','2020-04-01 08:10:56'),(35,'data_rows','display_name',234,'en','Title Ar','2020-04-01 08:10:56','2020-04-01 08:10:56'),(36,'data_rows','display_name',235,'en','Title En','2020-04-01 08:10:56','2020-04-01 08:10:56'),(37,'data_rows','display_name',236,'en','Description','2020-04-01 08:10:56','2020-04-01 08:10:56'),(38,'data_rows','display_name',237,'en','Position','2020-04-01 08:10:56','2020-04-01 08:10:56'),(39,'data_rows','display_name',238,'en','Speciality','2020-04-01 08:10:56','2020-04-01 08:10:56'),(40,'data_rows','display_name',239,'en','Photo','2020-04-01 08:10:56','2020-04-01 08:10:56'),(41,'data_rows','display_name',240,'en','Meta Keywords','2020-04-01 08:10:56','2020-04-01 08:10:56'),(42,'data_rows','display_name',241,'en','Meta Description','2020-04-01 08:10:56','2020-04-01 08:10:56'),(43,'data_rows','display_name',242,'en','Status','2020-04-01 08:10:56','2020-04-01 08:10:56'),(44,'data_rows','display_name',243,'en','Created At','2020-04-01 08:10:56','2020-04-01 08:10:56'),(45,'data_rows','display_name',244,'en','Updated At','2020-04-01 08:10:56','2020-04-01 08:10:56'),(46,'data_rows','display_name',232,'en','Clinic Id','2020-04-01 08:10:56','2020-04-01 08:10:56'),(47,'data_rows','display_name',230,'en','Speciality Id','2020-04-01 08:10:56','2020-04-01 08:10:56'),(48,'data_types','display_name_singular',29,'en','Doctor','2020-04-01 08:10:56','2020-04-01 08:10:56'),(49,'data_types','display_name_plural',29,'en','Doctors','2020-04-01 08:10:56','2020-04-01 08:10:56'),(50,'data_rows','display_name',270,'en','Slug Ar','2020-04-01 08:20:43','2020-04-01 08:20:43'),(51,'data_rows','display_name',271,'en','Slug En','2020-04-01 08:20:43','2020-04-01 08:20:43'),(52,'data_rows','display_name',272,'en','Email','2020-04-01 08:20:43','2020-04-01 08:20:43'),(53,'data_rows','display_name',273,'en','Phone','2020-04-01 08:20:43','2020-04-01 08:20:43'),(54,'data_rows','display_name',274,'en','Price','2020-04-01 08:20:43','2020-04-01 08:20:43'),(55,'data_rows','display_name',275,'en','Duration By Min','2020-04-01 08:20:43','2020-04-01 08:20:43'),(56,'data_rows','display_name',276,'en','Gender','2020-04-01 08:20:43','2020-04-01 08:20:43'),(127,'data_rows','display_name',254,'en','ID','2020-04-04 19:11:42','2020-04-04 19:11:42'),(128,'data_rows','display_name',255,'en','Doctor Id','2020-04-04 19:11:42','2020-04-04 19:11:42'),(129,'data_rows','display_name',257,'en','User Id','2020-04-04 19:11:42','2020-04-04 19:11:42'),(130,'data_rows','display_name',259,'en','Start','2020-04-04 19:11:42','2020-04-04 19:11:42'),(131,'data_rows','display_name',260,'en','Duration','2020-04-04 19:11:42','2020-04-04 19:11:42'),(132,'data_rows','display_name',261,'en','Comments','2020-04-04 19:11:42','2020-04-04 19:11:42'),(133,'data_rows','display_name',262,'en','Confirmed','2020-04-04 19:11:42','2020-04-04 19:11:42'),(134,'data_rows','display_name',263,'en','Payment Confirmed','2020-04-04 19:11:42','2020-04-04 19:11:42'),(135,'data_rows','display_name',264,'en','Created At','2020-04-04 19:11:42','2020-04-04 19:11:42'),(136,'data_rows','display_name',265,'en','Updated At','2020-04-04 19:11:42','2020-04-04 19:11:42'),(137,'data_types','display_name_singular',31,'en','Appointment','2020-04-04 19:11:42','2020-04-04 19:11:42'),(138,'data_types','display_name_plural',31,'en','Appointments','2020-04-04 19:11:42','2020-04-04 19:11:42'),(194,'doctors','description',33,'en','\n\nDescription en\n\n','2020-04-06 13:48:29','2020-04-06 13:48:29'),(195,'posts','title',1,'en','عملية تغيير مفصل الركبة','2020-04-06 14:01:20','2020-04-06 14:01:20'),(196,'posts','excerpt',1,'en','تعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد','2020-04-06 14:01:20','2020-04-06 14:01:20'),(197,'posts','body',1,'en','\n\nعملية تغيير مفصل الركبة\n\n\\n\nعملية تغيير مفصل الركبة\n\\n\nتعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد أو للتآكل مما يسبب آلام قوية يصعب تحملها وتؤدي لصعوبة في الحركة، وهنا العملية هي الحل الأمثل للتخلص من هذه الآلام المزعجة وامتلاك القدرة على ممارسة الأنشطة اليومية بسهولة.\n\n\\n\nتحتاج هذة العملية لإجراء الكثير من الفحوصات والتحاليل قبل العملية للتأكد من أنها الحل المناسب والأخير للقضاء على آلام الركبة والقدرة على الحركة بشكل سليم.\n\n\\n\nوفي العملية يتم استبدال المفصل الطبيعي بآخر صناعي مصنوع من التيتانيوم أو البلاستيك القوي، ويتم إجراءها تحت تأثير التخدير الموضعي أو الكلي حسب ما يحدده الطبيب.\n\n\\n\nتنقسم عملية تغيير المفصل إلى نوعين وهما :-\n\\n\n- تغيير كلي لمفصل الركبة.\n\n\\n\nحيث يتم تغيير المفصل بالكامل نتيجة حدوث تضرر أو تآكل المفصل بالكامل.\n\n\\n\n- تغيير جزئي لمفصل الركبة.\n\n\\n\nحيث يتم تغيير الجزء المتضرر فقط من المفصل، وذلك ضمن شروط معينة وهي:-\n\n\\n\n- أن يكون الرباط الصليبي الأمامي سليمًا.\n\n\\n\n- وأن يكون النصف الخارجي من المفصل سليمًا.\n\n\\n\n- أن يكون مقدار الاعوجاج أقل من 15 درجة.\n\n\\n\n6 أسباب لإجراء عملية مفصل الركبة :\n\\n\nيلجأ الطبيب لإجراء تغيير المفصل الركبة للحالات التي لا تتحمل الآلام والضغط على الركبة ومن هذه الحالات:-\n\n\\n\n1- هشاشة العظام:\n\n\\n\nوتعتبر هشاشة العظام من الأسباب الرئيسية لإجراء العملية حيث يصبح المفصل ضعيف وهش غير قادر على تحمل المزيد من الضغط عليه.\n\n\\n\n2- خشونة الركبة:\n\n\\n\nالخشونة هي تآكل لغضروف الركبة ومن ثم تآكل المفصل نفسه وفي الحالات المتقدمة يصبح المفصل غير قادر على امتصاص الصدمات مما يعوق الحركة بشكل كبير أو يمنعها نسبياً.\n\n\\n\n3- زيادة الوزن:\n\n\\n\nتشكل السمنة خطراً  كبيراً على مفصل الركبة لأن الوزن الزائد يؤدي إلى زيادة الضغط على المفصل و\n\n\\n\nتآكل الغضروف.\n\n\\n\n4- الإصابات الخارجية:\n\n\\n\nكالإصابات التي تحدث في الملاعب أو إصابات الحوادث والكسور.\n\n\\n\n5- الاستئصال الجزئي للغضروف المفصلي للركبة:\n\n\\n\nبعد هذا الاستئصال يفقد المفصل قدرته على امتصاص الصدمات فقد تحتاج بعض الحالات حينها لاستبدال المفصل.\n\n\\n\n6- التهاب المفاصل الروماتويدي:\n\n\\n\nتسبب الالتهابات الروماتويدية آلام شديدة لا تُحتمل في المفاصل وقد تؤدي في النهاية إلى تشوه كامل في المفصل فيضطر الطبيب لإجراء عملية تبديل مفصل الركبة.\n\n\\n\nعلامات تستدعي إجراء عملية تغيير مفصل الركبة :-\n\\n\n- حدوث تآكل في مفصل أو غضروف الركبة.\n\n\\n\n- آلام شديدة في الركبة وتظهر خاصة في أوقات الراحة وأثناء النوم ليلاً.\n\n\\n\n- التيبس والتصلب في مفصل الركبة لأنه يسبب صعوبة في ممارسة الأنشطة اليومية كصعوبة في ارتداء الملابس أو الأحذية وغيرها من الأنشطة اليومية المعتادة.\n\n\\n\n- صعوبة في المشي.\n\n\\n\n- محدودية الحركة وعدم قيام المفصل بأداء وظيفته كاملة. \"عملية\n\n\\n\n4 خطوات هامة قبل عـملية تغيير مـفصل الركبة:-\n\\n\nقبل إجراء عملية تبديل مفصل الركبة يقوم الطبيب بتحديد الفحوصات والتحاليل التي يحتاجها المريض وهي:-\n\n\\n\n- إجراء أشعة رنين مغناطيسي أو أشعة سينية على الركبة.\n\n\\n\n- إجراء تحاليل للدم كصورة دم كاملة، وتخثر الدم، وكيمياء الدم، ووظائف الكلى والكبد.\n\n\\n\n- إجراء فحص البول.\n\n\\n\n- إجراء تخطيط كهربية القلب (رسم القلب).\n\n\\n\nوإذا كان المريض يتناول أدوية معينة يحدد الطبيب الأدوية التي يجب التوقف عن تناولها قبل العملية.\n\n\\n\nهل تظهر مضاعفات بعد عملية تغيير مفصل الركبة\n\\n\nفي بعض الحالات قد تظهر بعض المضاعفات مثل:\n\n\\n\n- حدوث تورم والتهابات وآلام في المفصل.\n\n\\n\n- التعرض لكسور في عظام الركبة.\n\n\\n\n- حدوث تصلب في مفصل الركبة.\n\n\\n\n- حدوث ضرر في العصب أو العضلات.\n\n\\n\nولكن هناك بعض الشروط التي قد تحميك من هذه المضاعفات وتساعد في نجاح عملية تبديل مفصل الركبة وهي..\n\n\\n\n- إجراء العملية تحت إشراف طبيب عظام ماهر ومتخصص وله خبرة في إجراء عملية تبديل مفصل الركبة لمرات عديدة.\n\n\\n\n- التأكد من جودة نوع المفصل المستخدم.\n\n\\n\n- التخلص من الوزن الزائد قبل إجراء الجراحة.\n\n\\n\n- عمل جلسات علاج طبيعي بعد إجراء الجراحة.\n\n\\n\n-اتباع تعليمات الطبيب للحفاظ على المفصل لأطول فترة ممكنة.\n\n\\n\nأهمية العلاج الطبيعي بعد عملية تغيير مفصل الركبة :-\n\\n\n- يعد العلاج الطبيعي من أهم خطوات التعافي بعد عملية تبديل مفصل الركبة، وللحفاظ على مفصل الركبة الذي تم استبداله.\n\n\\n\n- يعمل العلاج الطبيعي على تقوية عضلات الساق الضعيفة، لأن قوة العضلات تساعد في تخفيف ضغط وزن الجسم على مفاصل الركبة.\n\n\\n\nبعد عملية تبديل مفصل الركبة تعرف على أنواع تمارين العلاج الطبيعي\n\\n\nتتنوع تمارين العلاج الطبيعي لتناسب تفاصيل كل حالة ومن هذه التمارين..\n\n\\n\n- العلاج المائي، لعلاج آلام العضلات الناتجة عن إجراء الجراحة، والشعور بالراحة والاسترخاء.\n\n\\n\n- تمارين التوازن والإطالة والتقوية.\n\n\\n\n- استخدام النبضات الكهربائية لتنشيط وتقوية العضلات.\n\n\\n\n- استخدام الأشعة تحت الحمراء لتخفيف الألم والالتهابات، حيث أن حرارتها تساعد على توسيع الأوعية الدموية التي تخفف من الشعور بالألم بشكل كبير.\n\n\\n\n- تدليك الأنسجة العميقة للتخفيف من تشنجات العضلات وتقليل الالتهابات.\n\n\\n\n- العلاج بالترددات الاهتزازية لتقوية العضلات وزيادة نشاط الأعصاب.\n\n\\n\nنصائح هامة بعد العملية :-\n\\n\n- الراحة التامة في الفراش ووضع الساق في خط مستقيم لتسهيل تدفق الدم والتخفيف من الألم.\n\n\\n\n- الانتظام في تناول الأدوية كما يصفها الطبيب لتمام التعافي من آثار العملية.\n\n\\n\n- استخدام كمادات الثلج على مفصل الركبة في البداية بعد إجراء عملية تبديل مفصل الركبة، فالثلج يساعد على تخدير منطقة المفصل وبالتالي تقليل الشعور بالألم والتخفيف من الالتهابات.\n\n\\n\n- بعد التئام الجرح يمكن استخدام كمادات المياه الساخنة للتخفيف من الألم وزيادة الشعور بالراحة والاسترخاء.\n\n\\n\n- يمكن استخدام العكاز أو الكرسي المتحرك مؤقتاً خلال الأيام الأولى من إجراء الجراحة عند القيام بأي نشاط معين، وذلك لتجنب زيادة الضغط على المفصل أثناء المشي أو الجلوس.\n\n\\n\n- الانتظام في عمل جلسات العلاج الطبيعي.\n\n\\n\n- الالتزام بممارسة التمارين المنزلية التي يحددها الطبيب بانتظام للحفاظ على سلامة مفصل الركبة لأطول فترة ممكنة.\n\n\\n\n- تجنب ثني الركبة أثناء الجلوس أو القفز خلال الأسابيع الأولى من إجراء عملية تبديل مفصل الركبة.\n\n\\n\n- تجنب استخدام السلم لعدم الضغط علي الركبة التي تم إجراء العملية بها.\n\n\\n\n- تجنب قيادة السيارة نهائياً حتى تمام التعافي من العملية والقدرة على تحريك المفصل بشكل سليم.\n\n\\n\n- الالتزام بعمل الفحص الدوري لمفصل الركبة من خلال الأشعة للتأكد من أن المفصل يعمل بكفاءة وعدم وجود أي خلل في المفصل أو عظام الركبة.\n\n\\n\n- النوم على سرير مرتفع للقيام من عليه بسهولة وعدم الشعور بألم.\n\n\\n\n- الحفاظ على وزن الجسم لتجنب زيادة الضغط على مفصل الركبة.\n\n\\n\nومع الإلتزام بهذه النصائح وتعليمات الطبيب، يستعيد المفصل قوته وأداء وظيفته كاملة حيث يمكنك العودة لممارسة أنشطتك اليومية بسهولة ودون عناء.\n\n\\n\nتعرف ايضاً علي : \n\\n\nعلاج ارتفاع الكوليسترول\n\n\\n\nجلطة القلب و طرق التعامل معها.\n\n\\n\nعلاج اضطرابات النوم\n\n\\n\n\"سجل\n\n','2020-04-06 14:01:20','2020-04-06 14:01:20'),(198,'posts','slug',1,'en','عملية-تغيير-مفصل-الركبة','2020-04-06 14:01:20','2020-04-06 14:01:20'),(199,'posts','meta_description',1,'en','تعرف الان على عملية تغيير مفصل الركبة فى السعودية وعملية تغيير مفصل الفخذ وماهي النصائح وافضل طرق للوقاية من مضاعفاتها..','2020-04-06 14:01:20','2020-04-06 14:01:20'),(200,'posts','meta_keywords',1,'en','عملية تغيير مفصل الركبة','2020-04-06 14:01:20','2020-04-06 14:01:20'),(201,'posts','seo_title',1,'en','عملية تغيير مفصل الركبة','2020-04-06 14:01:20','2020-04-06 14:01:20'),(202,'doctors','description',34,'en','\n\nوصف\n\n','2020-04-06 16:01:40','2020-04-06 16:01:40'),(203,'doctors','position',34,'en','جدة','2020-04-06 16:01:40','2020-04-06 16:01:40'),(204,'doctors','speciality',34,'en','اطفال','2020-04-06 16:01:40','2020-04-06 16:01:40'),(205,'doctors','meta_keywords',34,'en','تجربة 2','2020-04-06 16:01:40','2020-04-06 16:01:40'),(206,'doctors','meta_description',34,'en','وصف لتجربة الدكتور الجديد','2020-04-06 16:01:40','2020-04-06 16:01:40'),(211,'doctors','description',1,'en','Masters in oral and maxillofacial surgery - Dental checkup- Root canal treatment- Dental crowns- Bleaching- Panoramic X-ray- X-ray at Hai ElJamea Hospital','2020-04-07 21:10:27','2020-04-07 21:10:27'),(212,'doctors','description',2,'en','','2020-04-07 21:10:27','2020-04-07 21:10:27'),(213,'doctors','description',3,'en','','2020-04-07 21:10:27','2020-04-07 21:10:27'),(214,'doctors','description',4,'en','Masters in dermatology and venereal diseases - Skin inflammation and allergies-Acne-Skin and nails fungus-Hair related problems-Hairsutism-Skin ulcers-Urinary tract inflammation-Methotherapy treatment-PRP at Hai ElJamea Hospital','2020-04-07 21:10:27','2020-04-07 21:10:27'),(215,'doctors','description',5,'en','a Bachelor of Medicine from Alexandria University in 2005 and a Master in Dermatology and Venereal Diseases, as well as a Diploma in Aesthetic Medicine and Laser. at Hai ElJamea Hospital','2020-04-07 21:10:27','2020-04-07 21:10:27'),(216,'doctors','description',6,'en','Master degree in ENT - Treatment of Tonsillitis- Nose bleeding- Breath difficulties Sinusitis- Nose breaking- Vocal cords infection-Otis media- Hearing difficulties- Tympanic membrane rupture at Hai ElJamea Hospital','2020-04-07 21:10:27','2020-04-07 21:10:27'),(217,'doctors','description',7,'en','Masters of gastroenterology - Digestive system diseases - Esophageal varices treatment.- Digestive system endoscopy.- Diagnosis and treatment of inflammatory bowel diseases- Gallbladder and bile duct diseases- Fatty liver and liver hypertrophy.- Stomach and duodenal ulcers.- Early detection of digestive system tumors- Typhoid fever- Diabetes- Kidney diseases','2020-04-07 21:10:27','2020-04-07 21:10:27'),(218,'doctors','description',8,'en','Masters of gastroenterology - Digestive system diseases - Esophageal varies treatment.- Digestive system endoscopy.- Diagnosis and treatment of inflammatory bowel diseases- Gallbladder and bile duct diseases- Fatty liver and liver hypertrophy.- Stomach and duodenal ulcers.- Early detection of digestive system tumors- Typhoid fever- Diabetes- Kidney diseases at Hai ElJamea Hospital','2020-04-07 21:10:27','2020-04-07 21:10:27'),(219,'doctors','description',9,'en','Master of Internal Medicine - Digestive system diseases.- Mal-absorption and Maldigestion diseas, - Digestive system endoscopy.- Diagnosis and treatment of inflammatory bowel diseases.- Fatty liver and liver hypertrophy.- Stomach and duodenal ulcers. - Early detection of digestive system tumors.- Typhoid fever- Diabetes,Kidney diseases,Rheumatoid, immunological diseases- Colic and renal infections- Renal failure and its causes- Gastroscopy- Colonoscopy- Installation of stomach balloon- Connect and inject varicose veins and stomach- Expansion of the esophagus and colon- Laparoscopic cholecystectomy at Hai ElJamea Hospital','2020-04-07 21:10:27','2020-04-07 21:10:27'),(220,'doctors','description',10,'en','Ph.D in Neurology - Vertebral column surgeries.- Brain and spinal cord tumors.- Strokes and brain hemorrhage.- Vertebral column fractures.- Peripheral nerves pain.- Headache- Dimensia at Hai ElJamea Hospital','2020-04-07 21:10:27','2020-04-07 21:10:27'),(221,'doctors','description',11,'en','Master in Gynecology - Pregnancy and Delivery:- Critical pregnancy- Fertility clinic- Natural birth- Pregnancy poisoning (toxemia)- Repeated miscarriage- Ectopic pregnancy- Sterility (males and females)- Family planning- Complementary services:- 4D Ultrasound.- Menopause care and follow-up- Menstruation problems- Reproductive system problems- Uterine prolapse- Early detection of gynecologic cancers.- Cervical and ovarian cancer endoscopy','2020-04-07 21:10:27','2020-04-07 21:10:27'),(222,'doctors','description',12,'en','Masters in Gynecology - Pregnancy and Delivery:- Critical pregnancy- Fertility clinic- Natural birth- Pregnancy poisoning (toxemia)- Repeated miscarriage- Ectopic pregnancy- Sterility (males and females)- Family planning- Complementary services:- 4D Ultrasound.- Menopause care and follow-up- Menstruation problems- Reproductive system problems- Uterine prolapse- Early detection of gynecologic cancers.- Cervical and ovarian cancer endoscopy','2020-04-07 21:10:27','2020-04-07 21:10:27'),(223,'doctors','description',13,'en','5 years of experience in Obstetrics and Gynecology at Hai ElJamea Hospital','2020-04-07 21:10:27','2020-04-07 21:10:27'),(224,'doctors','description',14,'en','','2020-04-07 21:10:27','2020-04-07 21:10:27'),(225,'doctors','description',15,'en','Masters in orthopedic Surgery -Surgeries and Endoscopy:-Knee Arthroscopy.-Ligament tear and tendons inflammation.- Cruciform ligaments.-Joints replacement (primary and advanced).- Complicated fractures.-Bone cancer surgeries.-Hand surgeries.- Specialized Clinics:-Knee surgeries-Vertebral column surgeries-Shoulder  surgeries-Pediatric surgeries - Sports Clinic:- Knee, shoulder and ankle joints injuries.-Tendons and ligaments conservative treatment.-Recurrent shoulder dislocation - Diagnosis and Treatment for-Osteoporosis - All bones pain conditions -Fracture reduction and fixation without surgery.','2020-04-07 21:10:27','2020-04-07 21:10:27'),(226,'doctors','description',16,'en','14 years of experience in orthopedics, master\'s and doctorate in orthopedics, fractures and injuries, and German Orthopedic Fellowship at Hai ElJamea Hospital','2020-04-07 21:10:27','2020-04-07 21:10:27'),(227,'doctors','description',17,'en','Masters in pediatric medicine -New born Full checkup- Neonatal Jaundice- Respiratory and digestive diseases in newborn- Bronchoinflammation-Asthma-Chronic cough-Diarrhea or conistipation and vomiting-Hepatitis-Nephritis-Vaccination','2020-04-07 21:10:27','2020-04-07 21:10:27'),(228,'doctors','description',18,'en','Masters in pediatric medicine -New born Full checkup- Neonatal Jaundice- Respiratory and digestive diseases in newborn- Bronchoinflammation-Asthma-Chronic cough-Diarrhea or conistipation and vomiting-Hepatitis-Nephritis--Vaccination','2020-04-07 21:10:27','2020-04-07 21:10:27'),(229,'doctors','description',19,'en','Urology Specialist -Masters degree in urological -Kidney stones and urinary tract stones -Endoscopy of the urinary system (kidneys - ureter - bladder) -Congenital defects in the kidneys -ureters and bladder Tightness and obstruction of the urethra -Frequent renal colic Tumors of the genitourinary system Urinary -incontinence and bloody urine Menopause -infertility and disability of men -Treatment of prostate diseases and periodic detection-Crushing the stones through the collision-wave device-Laser kidney stones are dissected by renal endoscopy-Bladder stones dissection using the air diffuser and laser-Dissect the ureteral stones using the air splitter-Treatment of causes of renal failure-A diet for patients with renal failure-Repair of the urethra-Repair of penis warp-Narrow pelvic tubular repair-Repair of urinary bladder recovery of the ureter surgically and without surgery.at Hai ElJamea Hospital','2020-04-07 21:10:27','2020-04-07 21:10:27'),(230,'doctors','description',20,'en','Psychoneurosis Consultant -Psychiatry consultation -follow up patients of Depression -mood swings -Al zhahmir -Pregnancy and after delivery depression -Behavioral enhancement -social communication. at Hai ElJamea Hospital','2020-04-07 21:10:27','2020-04-07 21:10:27'),(231,'doctors','description',21,'en','','2020-04-07 21:10:27','2020-04-07 21:10:27'),(232,'doctors','description',22,'en','','2020-04-07 21:10:27','2020-04-07 21:10:27'),(233,'specialities','name',1,'en','Dental specialist','2020-04-07 21:10:28','2020-04-07 21:10:28'),(234,'specialities','name',2,'en','Specialist cardiovascular diseases','2020-04-07 21:10:28','2020-04-07 21:10:28'),(235,'specialities','name',3,'en','General Surgery Consultant','2020-04-07 21:10:28','2020-04-07 21:10:28'),(236,'specialities','name',4,'en','Dermatologist','2020-04-07 21:10:28','2020-04-07 21:10:28'),(237,'specialities','name',5,'en','Ear, Nose and Throat Specialist ','2020-04-07 21:10:28','2020-04-07 21:10:28'),(238,'specialities','name',6,'en','Internal medicine and kidney disease specialist','2020-04-07 21:10:28','2020-04-07 21:10:28'),(239,'specialities','name',7,'en','Gastroenterologist and kidney specialist','2020-04-07 21:10:28','2020-04-07 21:10:28'),(240,'specialities','name',8,'en','Internal medicine specialist','2020-04-07 21:10:28','2020-04-07 21:10:28'),(241,'specialities','name',9,'en','Consultant of brain and nerve diseases','2020-04-07 21:10:28','2020-04-07 21:10:28'),(242,'specialities','name',10,'en','Obstetrician and Gynecologist','2020-04-07 21:10:28','2020-04-07 21:10:28'),(243,'specialities','name',11,'en','The first obstetrician and gynecologist','2020-04-07 21:10:28','2020-04-07 21:10:28'),(244,'specialities','name',12,'en','Consultant ophthalmology','2020-04-07 21:10:28','2020-04-07 21:10:28'),(245,'specialities','name',13,'en','Bone and joint pathologist','2020-04-07 21:10:28','2020-04-07 21:10:28'),(246,'specialities','name',14,'en','Pediatrician','2020-04-07 21:10:28','2020-04-07 21:10:28'),(247,'specialities','name',15,'en','Urology consultant','2020-04-07 21:10:28','2020-04-07 21:10:28'),(248,'specialities','name',16,'en','Consultant of mental illness','2020-04-07 21:10:28','2020-04-07 21:10:28'),(249,'specialities','name',17,'en','Consultant of chest diseases','2020-04-07 21:10:28','2020-04-07 21:10:28'),(250,'doctors','position',1,'en','استشاري','2020-04-08 01:19:40','2020-04-08 01:19:40'),(251,'doctors','speciality',1,'en','أخصائي طب الأسنان','2020-04-08 01:19:40','2020-04-08 01:19:40');
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci,
  `doctor_id` int DEFAULT '0',
  `reset_token` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Hamza Mostafa','hmza.mostafa@gmail.com','/users/default.jpg',NULL,'$2y$10$D88BFS3BksddxMesVnJ/R.R.aleZfgexRW1LHZdtv7eqQ1eSlb3Mq',NULL,NULL,'2020-04-08 00:10:34','2020-04-08 00:10:34','male','s',0,NULL,'00000000',NULL),(2,NULL,'Akram Maged','akram.maged@andalusiagroup.net','doctors\\Appdoctorphotos\\Akram-Maged.jpg',NULL,'$2y$10$P.NBMvmclGX1d70tFrx7G.qqEQtR2TiHXwnkLUChdAidS4Zm7renW',NULL,NULL,'2020-04-08 01:27:00','2020-04-08 01:27:00','',NULL,1,NULL,'51234567',NULL),(3,NULL,'test','noxateg788@smlmail.com','/users/default.jpg',NULL,'$2y$10$QCoQsYGBwXOpOG.paBIKa.hWhINJaafahiLUXfeatosIy.XPEOai.',NULL,NULL,'2020-04-08 01:35:10','2020-04-08 01:35:10','male','s',0,NULL,'62622277',NULL),(4,NULL,'Hamza Mostafa','h@m.com','/users/default.jpg',NULL,'$2y$10$g7EOkt2lBWvXN24sNMOPkO5aCxlNnpg6WKXCeHDKpnjX6jTzQinsi',NULL,NULL,'2020-04-08 01:40:28','2020-04-08 01:40:28','male','s',0,NULL,'00000100',NULL),(5,NULL,'Test','test@example.com','/users/default.jpg',NULL,'$2y$10$UEl2LOuW40ff.5pEhRzkquEMMQClhQBfWJNBrwlwzaAgS/RoAtKTO',NULL,NULL,'2020-04-08 01:46:10','2020-04-08 01:46:10','male','s',0,NULL,'00000001',NULL),(6,NULL,'Ayagamal','aouia2008@hotmail.com','/users/default.jpg',NULL,'$2y$10$/6zWu9fh.3xGXtUBPmgTsOZCDks7wZoWVm/AYFBlispIocPDK8ysq',NULL,NULL,'2020-04-08 09:04:22','2020-04-08 09:04:22','male','s',0,NULL,'90334331',NULL),(7,NULL,'huohuih','shehabiojioh@UOhuoh.com','/users/default.jpg',NULL,'$2y$10$toruEfTVAOx27ZUFApo0D.UonLXV/SJZEZrOR19CalhWf8RlM7Kt.',NULL,NULL,'2020-04-08 09:17:53','2020-04-08 09:17:53','male','s',0,NULL,'88948948',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workinghours`
--

DROP TABLE IF EXISTS `workinghours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workinghours` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_id` int DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workinghours`
--

LOCK TABLES `workinghours` WRITE;
/*!40000 ALTER TABLE `workinghours` DISABLE KEYS */;
INSERT INTO `workinghours` VALUES (1,'Sunday','08:00','11:00',1,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(2,'Tuesday','08:00','11:00',1,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(3,'Thursday','08:00','11:00',1,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(4,'Saturday','10:00','14:00',2,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(5,'Sunday','10:00','14:00',2,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(6,'Monday','10:00','14:00',2,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(7,'Tuesday','10:00','14:00',2,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(8,'Wednesday','10:00','14:00',2,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(9,'Thursday','10:00','14:00',2,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(10,'Saturday','10:00','14:00',3,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(11,'Sunday','10:00','14:00',3,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(12,'Monday','08:00','12:00',3,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(13,'Tuesday','10:00','14:00',3,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(14,'Wednesday','10:00','14:00',3,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(15,'Thursday','08:00','12:00',3,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(16,'Saturday','10:00','14:00',4,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(17,'Monday','10:00','14:00',4,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(18,'Tuesday','10:00','14:00',5,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(19,'Wednesday','10:00','14:00',5,'Working','2020-04-07 21:10:28','2020-04-07 21:10:28'),(20,'Wednesday','00:00','05:00',1,'Working','2020-04-08 00:12:41','2020-04-08 00:12:41');
/*!40000 ALTER TABLE `workinghours` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-08  7:18:36
