-- MySQL dump 10.13  Distrib 8.0.19, for Linux (x86_64)
--
-- Host: localhost    Database: doctordb
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
INSERT INTO `admins` VALUES (1,1,'Admin','admin@admin.com','/admins/December2019/gXs9H7sAYpOqDxw8fzRE.png',NULL,'$2y$10$u6221pfo0lqlIoheiAA41uZDfGdl9dzEyylgIkUDhEQQVW2G7.pCO','qnl8D0BqLOzafh62Bg7rn4Rp2N4a2VfjMpxKAvWRRxiCOZMrbeJvJ29cxbFa','{\"locale\":\"en\"}','2020-03-29 10:01:13','2020-03-30 08:02:36');
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
INSERT INTO `appointments` VALUES (1,1,1,'2020-03-30 14:23:00','15','Ay Comment',1,1,'2020-03-29 12:24:00','2020-03-30 08:22:25'),(2,1,1,'2020-04-01 10:30:00','30',NULL,1,1,'2020-03-30 08:19:34','2020-03-30 08:19:34'),(3,1,1,'2020-04-01 14:37:00','2','test comment',1,0,'2020-03-30 12:37:39','2020-03-30 12:37:39');
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
INSERT INTO `categories` VALUES (1,NULL,1,'Category 1','category-1','2020-03-29 10:01:13','2020-03-29 10:01:13'),(2,NULL,1,'Category 2','category-2','2020-03-29 10:01:13','2020-03-29 10:01:13');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clinics`
--

LOCK TABLES `clinics` WRITE;
/*!40000 ALTER TABLE `clinics` DISABLE KEYS */;
INSERT INTO `clinics` VALUES (1,'عيادة أمراض القلب','Cardiac Diseases Clinic','ayadh-amradh-alqlb','cardiac-diseases-clinic','تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج، حيث ساعدت عيادة أمراض القلب في علاج ما يزيد على 2000 مريض، وأعادت لهم الأمل في حياة سعيدة وآمنة من جديد.','<p>تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج، حيث ساعدت عيادة أمراض القلب في علاج ما يزيد على 2000 مريض، وأعادت لهم الأمل في حياة سعيدة وآمنة من جديد.</p>\n<p>وتتميز العيادة بخدمات استثنائية تساعد على أن تكون رحلة العلاج رحلة آمنة وبأقصى درجات الرعاية للمرضى، مثل:-</p>\n<p>&nbsp;</p>\n<ul>\n<li>خدمة طوارئ القلب متوفرة 24 ساعة يومياً طوال أيام الأسبوع.</li>\n<li>وجود استشاري قلب عند الطلب 24 ساعة يومياً طوال أيام الأسبوع.</li>\n<li>وحدة رعاية القلب تعمل على مدار 24 ساعة يومياً.</li>\n</ul>\n<p>&nbsp;</p>\n<h2 style=\"text-align: right;\">الخدمات التي تقدمها عيادة أمراض القلب:-</h2>\n<ul>\n<li>إجراء قسطرة القلب التشخيصية والعلاجية.</li>\n<li>علاج أمراض القلب الروماتيزمية والوراثية.</li>\n<li>فشل وتضخم عضلة القلب.</li>\n<li>تركيب صمامات ودعامات القلب.</li>\n<li>علاج عدم انتظام ضربات القلب.</li>\n<li>علاج أمراض الشرايين التاجية.</li>\n<li>الذبحة الصدرية وجلطة القلب.</li>\n<li>تصلب الشرايين.</li>\n<li>رسم القلب العادي وبالمجهود.</li>\n<li>فحص القلب بالموجات الصوتية (إيكو).</li>\n<li>رسم القلب لمدة 24 ساعة (هولتر).</li>\n</ul>','حي الجامعة - شارع السيرة العطرة','0126806666','hjh.info@andalusiagroup.net','21.58323','29.953463','clinics/March2020/DmXnKwY19f7Vng9JvEvx.png','عيادة أمراض القلب،امراض القلب،دكتور امراض القلب','تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج',1,'2020-01-29 06:34:00','2020-03-30 08:13:07');
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
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,'{}',1),(2,1,'name','text','First Name',1,1,1,1,1,1,'{}',2),(3,1,'email','text','Email',1,1,1,1,1,1,'{}',4),(4,1,'password','password','Password',1,0,0,1,1,0,'{}',5),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,'{}',6),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,'{}',7),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',9),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,'{}',10),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,'{}',12),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',0,0,0,0,0,0,'{}',11),(22,4,'id','number','ID',1,0,0,0,0,0,NULL,1),(23,4,'parent_id','select_dropdown','Parent',0,0,1,1,1,1,'{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',2),(24,4,'order','text','Order',1,1,1,1,1,1,'{\"default\":1}',3),(25,4,'name','text','Name',1,1,1,1,1,1,NULL,4),(26,4,'slug','text','Slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\"}}',5),(27,4,'created_at','timestamp','Created At',0,0,1,0,0,0,NULL,6),(28,4,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(29,5,'id','number','ID',1,0,0,0,0,0,'{}',1),(30,5,'author_id','text','Author',1,0,1,1,0,1,'{}',2),(31,5,'category_id','text','Category',0,0,1,1,1,0,'{}',3),(32,5,'title','text','Title',1,1,1,1,1,1,'{}',4),(33,5,'excerpt','text_area','Excerpt',0,0,1,1,1,1,'{}',5),(34,5,'body','rich_text_box','Body',1,0,1,1,1,1,'{}',6),(35,5,'image','image','Post Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',7),(36,5,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}',8),(37,5,'meta_description','text_area','Meta Description',0,0,1,1,1,1,'{}',9),(38,5,'meta_keywords','text_area','Meta Keywords',0,0,1,1,1,1,'{}',10),(39,5,'status','select_dropdown','Status',1,1,1,1,1,1,'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',11),(40,5,'created_at','timestamp','Created At',0,1,1,0,0,0,'{}',12),(41,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',13),(42,5,'seo_title','text','SEO Title',0,1,1,1,1,1,'{}',14),(43,5,'featured','checkbox','Featured',1,1,1,1,1,1,'{}',15),(44,6,'id','number','ID',1,0,0,0,0,0,NULL,1),(45,6,'author_id','text','Author',1,0,0,0,0,0,NULL,2),(46,6,'title','text','Title',1,1,1,1,1,1,NULL,3),(47,6,'excerpt','text_area','Excerpt',1,0,1,1,1,1,NULL,4),(48,6,'body','rich_text_box','Body',1,0,1,1,1,1,NULL,5),(49,6,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}',6),(50,6,'meta_description','text','Meta Description',1,0,1,1,1,1,NULL,7),(51,6,'meta_keywords','text','Meta Keywords',1,0,1,1,1,1,NULL,8),(52,6,'status','select_dropdown','Status',1,1,1,1,1,1,'{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}',9),(53,6,'created_at','timestamp','Created At',1,1,1,0,0,0,NULL,10),(54,6,'updated_at','timestamp','Updated At',1,0,0,0,0,0,NULL,11),(55,6,'image','image','Page Image',0,1,1,1,1,1,NULL,12),(56,1,'email_verified_at','timestamp','',0,0,1,1,1,1,'{}',8),(57,9,'id','number','Id',1,0,0,0,0,0,'{}',1),(58,9,'role_id','text','Role Id',0,1,1,1,1,1,'{}',10),(59,9,'name','text','Name',1,1,1,1,1,1,'{}',2),(60,9,'email','text','Email',1,1,1,1,1,1,'{}',3),(61,9,'avatar','image','Avatar',0,1,1,1,1,1,'{}',9),(62,9,'email_verified_at','timestamp','Email Verified At',0,0,0,0,0,0,'{}',7),(63,9,'password','password','Password',1,0,0,1,1,0,'{}',4),(64,9,'remember_token','text','Remember Token',0,0,0,0,0,0,'{}',5),(65,9,'settings','hidden','Settings',0,0,0,0,0,0,'{}',11),(66,9,'created_at','timestamp','Created At',0,1,1,0,0,0,'{}',6),(67,9,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8),(68,9,'admin_belongsto_role_relationship','relationship','roles',0,1,1,1,1,1,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":\"0\"}',12),(103,16,'id','text','Id',1,0,0,0,0,0,'{}',1),(104,16,'photo_ar','image','Photo Ar',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(105,16,'photo_en','image','Photo En',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',3),(106,16,'link','text','Link',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(107,16,'created_at','timestamp','Created_at',0,1,0,0,0,0,'{}',6),(108,16,'updated_at','timestamp','',0,0,0,0,0,0,'{}',7),(109,16,'status','hidden','',0,0,0,0,0,0,'{}',5),(110,16,'deleted_at','timestamp','',0,0,0,0,0,0,'{}',8),(125,18,'id','text','Id',1,0,0,0,0,0,'{}',1),(126,18,'name_ar','text','Name Ar',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(127,18,'name_en','text','Name En',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(128,18,'small_description','text_area','Small Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(129,18,'description','rich_text_box','Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',7),(130,18,'address','text','Address',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',8),(131,18,'phone','text','Phone',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',9),(132,18,'email','text','Email',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',10),(133,18,'map_x','text','Map X',0,0,1,1,1,1,'{}',11),(134,18,'map_y','text','Map Y',0,0,1,1,1,1,'{}',12),(135,18,'photo','image','Photo',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',13),(136,18,'meta_keywords','text','Meta Keywords',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',14),(137,18,'meta_description','text_area','Meta Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',15),(138,18,'created_at','timestamp','Created At',0,0,1,1,0,1,'{}',16),(139,18,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',17),(140,18,'status','text','',0,0,0,0,0,0,'{}',18),(141,19,'id','text','Id',1,0,0,0,0,0,'{}',1),(142,19,'name_ar','text','Name Ar',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(143,19,'name_en','text','Name En',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(144,19,'small_description','text_area','Small Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(145,19,'description','rich_text_box','Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',7),(146,19,'photo','image','Photo',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',8),(147,19,'meta_keywords','text','Meta Keywords',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',9),(148,19,'meta_description','text_area','Meta Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',10),(149,19,'status','text','Status',0,0,0,0,0,0,'{}',11),(150,19,'created_at','timestamp','Created At',0,0,1,1,0,1,'{}',12),(151,19,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',13),(152,20,'id','text','Id',1,0,0,0,0,0,'{}',1),(153,20,'title_ar','text','Title Ar',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(154,20,'title_en','text','Title En',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(155,20,'description','rich_text_box','Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',8),(156,20,'position','text','Position',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',9),(157,20,'speciality','text','Speciality',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',10),(158,20,'photo','image','Photo',0,1,1,1,1,1,'{}',11),(159,20,'meta_keywords','text','Meta Keywords',0,0,1,1,1,1,'null',12),(160,20,'meta_description','text_area','Meta Description',0,0,1,1,1,1,'null',13),(161,20,'status','text','Status',0,0,0,0,0,0,'{}',14),(162,20,'created_at','timestamp','Created At',0,0,1,1,0,1,'{}',15),(163,20,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',16),(164,21,'id','text','Id',1,0,0,0,0,0,'{}',1),(167,21,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',4),(168,21,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),(169,21,'name','text','name',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(170,21,'slug','text','slug',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true}}',3),(171,21,'description','text_area','description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(173,5,'post_belongstomany_tag_relationship','relationship','tags',0,1,1,1,1,1,'{\"model\":\"App\\\\Tag\",\"table\":\"tags\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"post_tag\",\"pivot\":\"1\",\"taggable\":\"on\"}',16),(174,22,'id','text','Id',1,0,0,0,0,0,'{}',1),(176,22,'description','rich_text_box','Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(177,22,'start','timestamp','Start',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required|date\"}}',7),(178,22,'end','timestamp','End',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required|date|after_or_equal:start\"}}',8),(179,22,'img','image','Img',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',9),(180,22,'images','multiple_images','Images',0,0,1,1,1,1,'{}',10),(181,22,'map_x','text','Map X',0,0,1,1,1,1,'{}',11),(182,22,'map_y','text','Map Y',0,0,1,1,1,1,'{}',12),(183,22,'stock','number','Stock',0,0,1,1,1,1,'{}',13),(184,22,'status','number','Status',0,0,0,0,0,0,'{}',14),(185,22,'created_at','timestamp','Created At',0,0,1,1,0,1,'{}',17),(186,22,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',18),(187,22,'title_ar','text','Title Ar',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(188,22,'title_en','text','Title En',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',4),(189,22,'meta_keywords','text','meta Keywords',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',15),(190,22,'meta_description','text_area','meta Description',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',16),(191,1,'last_name','text','Last Name',0,1,1,1,1,1,'{}',3),(192,1,'phone','text','Phone',1,1,1,1,1,1,'{}',13),(193,1,'gender','text','Gender',1,1,1,1,1,1,'{}',14),(194,1,'address','text_area','',0,0,1,1,1,1,'{}',15),(195,5,'post_belongstomany_user_relationship','relationship','users',0,0,0,0,0,0,'{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"post_user\",\"pivot\":\"1\",\"taggable\":\"0\"}',17),(202,20,'slug_ar','text','Slug Ar',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"title_ar\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:doctors,slug_ar\"}}',3),(203,20,'slug_en','text','Slug En',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"title_en\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:doctors,slug_en\"}}',5),(204,19,'slug_ar','text','Slug Ar',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name_ar\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:services,slug_ar\"}}',3),(205,19,'slug_en','text','Slug En',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name_en\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:services,slug_en\"}}',5),(206,18,'slug_ar','text','Slug Ar',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name_ar\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:clinics,slug_ar\"}}',3),(207,18,'slug_en','text','Slug En',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name_en\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:clinics,slug_en\"}}',5),(208,22,'slug_ar','text','Slug Ar',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"title_ar\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:events,slug_ar\"}}',3),(209,22,'slug_en','text','Slug En',0,1,1,1,1,1,'{\"slugify\":{\"origin\":\"title_en\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:events,slug_en\"}}',5),(210,26,'id','text','Id',1,0,0,0,0,0,'{}',1),(211,26,'first_name','text','First Name',0,1,1,1,1,1,'{}',2),(212,26,'last_name','text','Last Name',0,1,1,1,1,1,'{}',3),(213,26,'email','text','Email',0,1,1,1,1,1,'{}',4),(214,26,'phone','text','Phone',0,1,1,1,1,1,'{}',5),(215,26,'gender','select_dropdown','Gender',0,1,1,1,1,1,'{\"default\":\"Male\",\"options\":{\"1\":\"Male\",\"2\":\"Female\"}}',6),(216,26,'clinic_id','text','Clinic Id',0,0,1,1,1,1,'{}',7),(217,26,'type','select_dropdown','Type',0,1,1,1,1,1,'{\"default\":\"clinic\",\"options\":{\"1\":\"clinic\",\"2\":\"doctor\",\"3\":\"service\",\"4\":\"post\"}}',8),(218,26,'url','text','Url',0,0,1,1,1,1,'{}',9),(219,26,'further_requirements','text_area','Further Requirements',0,1,1,1,1,1,'{}',10),(220,26,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',11),(221,26,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',12),(222,26,'clinic_request_belongsto_clinic_relationship','relationship','clinics',0,1,1,1,1,1,'{\"model\":\"App\\\\Clinic\",\"table\":\"clinics\",\"type\":\"belongsTo\",\"column\":\"clinic_id\",\"key\":\"id\",\"label\":\"name_ar\",\"pivot_table\":\"admins\",\"pivot\":\"0\",\"taggable\":\"0\"}',13),(223,28,'id','text','Id',1,0,0,0,0,0,'{}',1),(224,28,'title','text','Title',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',2),(225,28,'url','text','Url',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',3),(226,28,'status','text','Status',0,0,0,0,0,0,'{}',4),(227,28,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',5),(228,28,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(229,20,'clinic_id','select_dropdown','Clinic',0,0,1,1,1,1,'{\"default\":\"\",\"relationship\":{\"key\":\"id\",\"label\":\"name_ar\"}}',17),(230,20,'email','text','Email',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',6),(231,20,'phone','number','Phone',0,1,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',7),(232,20,'price','text','Price',0,0,1,1,1,1,'{}',18),(233,20,'duration','number','Duration By Min',0,0,1,1,1,1,'{\"validation\":{\"rule\":\"required\"}}',19),(234,29,'id','text','Id',1,0,0,0,0,0,'{}',1),(235,29,'day','select_dropdown','Day',0,1,1,1,1,1,'{\"default\":\"Saturday\",\"options\":{\"Saturday\":\"Saturday\",\"Sunday\":\"Sunday\",\"Monday\":\"Monday\",\"Tuesday\":\"Tuesday\",\"Wednesday\":\"Wednesday\",\"Thursday\":\"Thursday\",\"Friday\":\"Friday\"}}',2),(236,29,'start','time','Start',0,1,1,1,1,1,'{}',3),(237,29,'end','time','End',0,1,1,1,1,1,'{}',4),(238,29,'doctor_id','select_dropdown','Doctor Id',0,0,1,1,1,1,'{\"relationship\":{\"key\":\"id\",\"label\":\"title_en\"}}',5),(239,29,'type','select_dropdown','Type',0,1,1,1,1,1,'{\"default\":\"Working\",\"options\":{\"Working\":\"Working\",\"Break\":\"Break\"}}',6),(240,29,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',7),(241,29,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8),(242,30,'id','text','Id',1,0,0,0,0,0,'{}',1),(243,30,'doctor_id','select_dropdown','Doctor Id',0,1,1,1,1,1,'{\"relationship\":{\"key\":\"id\",\"label\":\"title_en\"}}',2),(244,30,'user_id','select_dropdown','User Id',0,1,1,1,1,1,'{\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',3),(245,30,'start','timestamp','Start',0,1,1,1,1,1,'{}',4),(246,30,'duration','text','Duration',0,1,1,1,1,1,'{}',5),(247,30,'comments','text_area','Comments',0,1,1,1,1,1,'{}',6),(248,30,'confirmed','select_dropdown','Confirmed',0,1,1,1,1,1,'{\"default\":\"No\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}',7),(249,30,'payment_confirmed','select_dropdown','Payment Confirmed',0,1,1,1,1,1,'{\"default\":\"No\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}',8),(250,30,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',9),(251,30,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',10);
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','App\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"desc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2019-11-10 09:05:36','2020-02-04 07:27:43'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,'null','2019-11-10 09:05:36','2019-11-10 09:05:36'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'','',1,0,'null','2019-11-10 09:05:36','2019-11-10 09:05:36'),(4,'categories','categories','Category','Categories','voyager-categories','TCG\\Voyager\\Models\\Category',NULL,'','',1,0,'null','2019-11-10 09:05:43','2019-11-10 09:05:43'),(5,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','TCG\\Voyager\\Policies\\PostPolicy',NULL,NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"desc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2019-11-10 09:05:44','2020-02-05 13:52:38'),(6,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page',NULL,'','',1,0,'null','2019-11-10 09:05:45','2019-11-10 09:05:45'),(9,'admins','admins','Admin','Admins','voyager-person','App\\Admin','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2019-11-11 05:35:32','2019-11-11 06:36:14'),(16,'sliders','sliders','Slider','Sliders','voyager-code','App\\Slider',NULL,'App\\Http\\Controllers\\SliderController',NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2020-01-26 11:49:00','2020-01-27 08:57:08'),(18,'clinics','clinics','Clinic','Clinics',NULL,'App\\Clinic',NULL,NULL,NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2020-01-27 13:07:26','2020-02-26 13:48:15'),(19,'services','services','Service','Services',NULL,'App\\Service',NULL,NULL,NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2020-01-28 06:29:40','2020-02-26 14:00:03'),(20,'doctors','doctors','Doctor','Doctors',NULL,'App\\Doctor',NULL,NULL,NULL,1,0,'{\"0\":\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\",\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2020-01-28 09:52:58','2020-03-30 08:43:08'),(21,'tags','tags','Tag','Tags',NULL,'App\\Tag',NULL,NULL,NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2020-01-29 05:58:30','2020-02-26 14:00:40'),(22,'events','events','Event','Events',NULL,'App\\Event',NULL,'App\\Http\\Controllers\\EventController',NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2020-02-02 07:38:18','2020-02-26 13:39:36'),(26,'clinic_requests','clinic-requests','Clinic Request','Clinic Requests',NULL,'App\\ClinicRequest',NULL,NULL,NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2020-02-09 08:45:13','2020-02-09 14:16:55'),(28,'andalusia_groups','andalusia-groups','Andalusia Group','Andalusia Groups',NULL,'App\\AndalusiaGroup',NULL,NULL,NULL,1,0,'\"{\\\\\\\"order_column\\\\\\\":null,\\\\\\\"order_display_column\\\\\\\":null,\\\\\\\"order_direction\\\\\\\":\\\\\\\"asc\\\\\\\",\\\\\\\"default_search_key\\\\\\\":null,\\\\\\\"scope\\\\\\\":null}\"','2020-02-09 12:51:57','2020-03-01 15:22:52'),(29,'workinghours','workinghours','Workinghour','Workinghours',NULL,'App\\Workinghour',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-03-29 11:36:52','2020-03-30 09:17:17'),(30,'appointments','appointments','Appointment','Appointments',NULL,'App\\Appointment',NULL,'\\App\\Http\\Controllers\\AppointmentController',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-03-29 11:40:21','2020-03-30 12:08:17');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,'د. محمد المراغي','Dr. Mohamed El Maraghy','d-mhmd-almraghy','dr-mohamed-el-maraghy','<h6 style=\"text-align: right;\">حاصل على درجة الدكتوراه في أمراض القلب والأوعية الدموية.</h6>\n<p>&nbsp;</p>\n<p style=\"text-align: right;\">الحالات التي يعالجها الطبيب:-</p>\n<p>&nbsp;</p>\n<ul>\n<li style=\"text-align: right;\">ضغط الدم وتصلب الشرايين.</li>\n<li style=\"text-align: right;\">عدم انتظام ضربات القلب.</li>\n<li style=\"text-align: right;\">أمراض القلب الروماتيزمية.</li>\n<li style=\"text-align: right;\">أمراض صمامات القلب.</li>\n<li style=\"text-align: right;\">أمراض الشرايين التاجية (جلطة القلب - الذبحة الصدرية).</li>\n<li style=\"text-align: right;\">فشل عضلة القلب وتضخم عضلة القلب.</li>\n<li style=\"text-align: right;\">جلطات الشرايين التاجية الحادة بالقسطرة.</li>\n<li style=\"text-align: right;\">إجراء رسم القلب العادي وبالمجهود.</li>\n<li style=\"text-align: right;\">رسم قلب لمدة 24 ساعة (هولتر).</li>\n<li style=\"text-align: right;\">متابعة قياس الضغط 24 ساعة.</li>\n<li style=\"text-align: right;\">إجراء القسطرة التشخيصية والعلاجية.</li>\n</ul>','استشاري أمراض القلب','أمراض القلب والأوعية الدموية','doctors\\January2020\\ViY69IHVYwAqem6d4xQo.jpg','د. محمد المراغي ','د. محمد المراغي استشاري أمراض القلب والأوعية الدموية',1,'2020-01-29 06:37:00','2020-02-05 14:31:02',NULL,NULL,NULL,NULL,NULL),(2,'د. سعيد رفعت','Dr. Saeed Refaat','d-sayd-rfat','dr-saeed-refaat','<h6 style=\"text-align: right;\">حاصل على دكتوراه في جراحة القلب والصدر.</h6>\n<p style=\"text-align: right;\">الحالات التي يعالجها الطبيب:-</p>\n<ul>\n<li style=\"text-align: right;\">عمليات ترقيع الشرايين التاجية بالقلب المفتوح.</li>\n<li style=\"text-align: right;\">ترقيع الشرايين التاجية بالقلب النابض.</li>\n<li style=\"text-align: right;\">تغيير الصمام الميترالي.</li>\n<li style=\"text-align: right;\">إصلاح ارتجاع الصمام الميترالي.</li>\n<li style=\"text-align: right;\">تغيير الصمام الأورطي.</li>\n<li style=\"text-align: right;\">ضيق وتمدد الشريان الأورطي.</li>\n<li style=\"text-align: right;\">حالات الارتشاح البلوري.</li>\n<li style=\"text-align: right;\">أورام الرئة والجهاز التنفسي.</li>\n<li style=\"text-align: right;\">كسر الضلوع.</li>\n<li style=\"text-align: right;\">ثقب القلب الوراثي.</li>\n</ul>','استشاري جراحة القلب والصدر','جراحة القلب والصدر','doctors\\January2020\\xkWJnCnPNZx8lDoQuIqh.jpg','','دكتور قلب',1,'2020-01-29 06:40:00','2020-02-07 18:35:01',NULL,NULL,NULL,NULL,NULL),(3,'د. إيمان عبد العزيز','Dr. Eman Abdel Aziz','د-ايمان-عبد-العزيز','dr-eman-abdel-aziz','<h6 style=\"text-align: right;\">حاصلة على ماجستير الأمراض الجلدية والتناسلية وطب الذكورة.</h6>\n<p>الحالات التي تعالجها الطبيبة:-</p>\n<ul>\n<li style=\"text-align: right;\">التهاب الجلد والحكة والحساسية.</li>\n<li style=\"text-align: right;\">البقع الجلدية البيضاء والملونة والهالات السوداء.</li>\n<li style=\"text-align: right;\">السنطات والزوائد الجلدية.</li>\n<li style=\"text-align: right;\">حب الشباب وآثاره.</li>\n<li style=\"text-align: right;\">فطريات الجلد والأظافر.</li>\n<li style=\"text-align: right;\">الصدفية والسمكية والبهاق.</li>\n<li style=\"text-align: right;\">مشاكل الشعر من ضعف وسقوط وقشور.</li>\n<li style=\"text-align: right;\">الصلع وعلاج الشعر الزائد، والقرح والأورام الجلدية.</li>\n<li style=\"text-align: right;\">التهابات الجهاز التناسلي.</li>\n<li style=\"text-align: right;\">العلاجات التجميلية للجلد.</li>\n<li style=\"text-align: right;\">جلسات الميزوثيرابي.</li>\n<li style=\"text-align: right;\">حقن البلازما للبشرة (PRP).</li>\n<li style=\"text-align: right;\">تحليل الفطريات.</li>\n<li style=\"text-align: right;\">مزرعة جلد وأظافر وشعر.</li>\n<li style=\"text-align: right;\">أخذ مسحة من الجلد.</li>\n<li style=\"text-align: right;\">جميع التحاليل الخاصة بالذكورة والعقم والضعف الجنسي والأمراض الجلدية المزمنة.</li>\n<li style=\"text-align: right;\">تحاليل ما قبل الزواج للذكور.</li>\n</ul>','أخصائي الأمراض الجلدية','الأمراض الجلدية','doctors\\January2020\\2PoIKG1NnZibdwklOnJW.jpg','','',1,'2020-01-29 06:45:00','2020-03-30 08:13:51',NULL,NULL,NULL,NULL,NULL),(4,'إيهاب أنور طه أبو الوفا','Ehab Anwer Taha Abo Elwafa','إيهاب -أنور- طه- أبو الوفا','ehab-anwer-taha-abo-elwafa','<table dir=\"RTL\" style=\"border-collapse: collapse; width: 239pt;\" border=\"0\" width=\"319\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr style=\"height: 45.0pt;\">\n<td class=\"xl63\" dir=\"RTL\" style=\"height: 45.0pt; width: 239pt;\" width=\"319\" height=\"60\">دكتوراة فى امراض القلب والاوعية الدموية&nbsp;</td>\n</tr>\n</tbody>\n</table>','استشاري امراض القلب والاوعية الدموية ','عيلدة القلب و الأوعية الدموية ',NULL,'','',1,'2020-03-30 09:39:58','2020-03-30 09:40:32',1,'Ihab.Taha@Andalusiagroup.net','5454545',NULL,'20');
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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-dashboard','#000000',NULL,1,'2019-11-10 09:05:37','2019-11-10 09:19:52','voyager.dashboard','null'),(2,1,'Media','','_self','voyager-images','#000000',NULL,12,'2019-11-10 09:05:37','2020-03-29 11:45:18','voyager.media.index','null'),(3,1,'Users','','_self','voyager-person','#000000',16,2,'2019-11-10 09:05:37','2019-11-11 06:34:16','voyager.users.index','null'),(4,1,'Roles','','_self','voyager-lock','#000000',NULL,11,'2019-11-10 09:05:37','2020-03-29 11:45:18','voyager.roles.index','null'),(5,1,'Tools','','_self','voyager-tools','#000000',NULL,14,'2019-11-10 09:05:37','2020-03-29 11:45:18',NULL,''),(6,1,'Menu Builder','','_self','voyager-list','#000000',5,1,'2019-11-10 09:05:37','2020-03-29 11:45:05','voyager.menus.index','null'),(7,1,'Database','','_self','voyager-data','#000000',5,2,'2019-11-10 09:05:37','2020-03-29 11:45:05','voyager.database.index','null'),(8,1,'Compass','','_self','voyager-compass','#000000',5,3,'2019-11-10 09:05:37','2020-03-29 11:45:05','voyager.compass.index','null'),(9,1,'BREAD','','_self','voyager-bread','#000000',5,4,'2019-11-10 09:05:37','2020-03-29 11:45:05','voyager.bread.index','null'),(10,1,'Settings','','_self','voyager-settings','#000000',17,3,'2019-11-10 09:05:37','2020-03-29 11:45:07','voyager.settings.index','null'),(11,1,'Categories','','_self','voyager-categories','#000000',43,2,'2019-11-10 09:05:43','2020-01-29 08:36:31','voyager.categories.index','null'),(12,1,'Posts','','_self','voyager-news','#000000',43,1,'2019-11-10 09:05:44','2020-01-29 08:36:31','voyager.posts.index','null'),(13,1,'Pages','','_self','voyager-file-text','#000000',NULL,13,'2019-11-10 09:05:46','2020-03-29 11:45:18','voyager.pages.index','null'),(14,1,'Hooks','','_self','voyager-hook','#000000',5,5,'2019-11-10 09:05:48','2020-03-29 11:45:05','voyager.hooks','null'),(15,1,'Admins','','_self','voyager-person','#000000',16,1,'2019-11-11 05:35:32','2019-11-11 06:34:30','voyager.admins.index','null'),(16,1,'All Users','','_self','voyager-people','#000000',NULL,10,'2019-11-11 06:33:43','2020-03-29 11:45:18',NULL,''),(17,1,'Site Settings','','_self','voyager-settings','#000000',NULL,9,'2019-11-11 06:43:15','2020-03-29 11:45:18',NULL,''),(31,1,'Sliders','','_self','voyager-code',NULL,17,1,'2020-01-26 11:49:00','2020-01-29 09:11:45','voyager.sliders.index',NULL),(33,1,'Clinics','','_self','voyager-home','#000000',NULL,2,'2020-01-27 13:07:26','2020-02-09 14:03:00','voyager.clinics.index','null'),(34,1,'Services','','_self','voyager-puzzle','#000000',NULL,4,'2020-01-28 06:29:40','2020-03-29 11:45:18','voyager.services.index','null'),(35,1,'Doctors','','_self','voyager-activity','#000000',69,1,'2020-01-28 09:52:58','2020-03-29 11:45:18','voyager.doctors.index','null'),(36,2,'الصفحة الرئيسية','الصفحة-الرئيسية','_self',NULL,'#000000',NULL,1,'2020-01-28 11:23:39','2020-02-03 10:27:15',NULL,''),(37,2,'خدماتنا','/services','_self',NULL,'#000000',NULL,2,'2020-01-28 11:28:49','2020-02-03 10:19:31',NULL,''),(38,2,'اطبائنا','/اطبائنا','_self',NULL,'#000000',NULL,3,'2020-01-28 11:30:44','2020-02-03 10:19:31',NULL,''),(39,2,'تواصل معنا','/','_self',NULL,'#000000',NULL,5,'2020-01-28 11:31:22','2020-02-03 10:19:31',NULL,''),(40,2,'من نحن','من-نحن','_self',NULL,'#000000',NULL,7,'2020-01-28 11:31:54','2020-02-03 15:19:33',NULL,''),(41,2,'عيادتنا','/عيادتنا','_self',NULL,'#000000',NULL,4,'2020-01-28 11:33:04','2020-02-03 10:19:31',NULL,''),(42,1,'Tags','','_self','voyager-tag','#000000',43,3,'2020-01-29 05:58:30','2020-01-29 08:36:31','voyager.tags.index','null'),(43,1,'Posts','','_self','voyager-file-text','#000000',NULL,8,'2020-01-29 08:35:05','2020-03-29 11:45:18',NULL,''),(46,1,'Yaost','','_self','voyager-megaphone','#000000',NULL,7,'2020-01-30 09:29:54','2020-03-29 11:45:18','voyager.sitesettings.index','null'),(47,1,'Events','','_self','voyager-group','#000000',NULL,6,'2020-02-02 07:38:18','2020-03-29 11:45:18','voyager.events.index','null'),(49,2,'المجموعات','/المجموعات','_self',NULL,'#000000',NULL,6,'2020-02-02 15:34:43','2020-02-03 15:19:33',NULL,''),(50,2,'دكاتره','\\دكاتره','_self',NULL,'#000000',NULL,9,'2020-02-02 16:05:57','2020-02-03 15:19:31',NULL,''),(52,2,'عن الويبسايت','https://www.andalusiahjh.com/ar','_self',NULL,'#000000',NULL,10,'2020-02-03 07:03:04','2020-02-03 15:19:30',NULL,''),(54,2,'تمام','/تم__ام','_self',NULL,'#000000',NULL,8,'2020-02-03 10:19:21','2020-02-03 15:19:31',NULL,''),(58,1,'Clinic Requests','','_self','voyager-bell','#000000',59,1,'2020-02-09 08:45:13','2020-02-09 14:03:00','voyager.clinic-requests.index','null'),(61,1,'Doctors Requests','','_self','voyager-bell','#000000',60,1,'2020-02-09 08:52:35','2020-02-09 14:03:08','voyager.clinic-requests.index',NULL),(63,1,'Services Requests','voyager.clinic-requests.index','_self','voyager-bell','#000000',62,1,'2020-02-09 08:56:52','2020-02-09 14:03:18',NULL,''),(64,1,'Clinic requests','','_self','voyager-bell','#000000',NULL,5,'2020-02-09 09:08:49','2020-03-29 11:45:18','voyager.clinic-requests.index','null'),(66,1,'Andalusia Groups','','_self','voyager-documentation','#000000',17,2,'2020-02-09 12:51:57','2020-03-29 11:45:07','voyager.andalusia-groups.index','null'),(67,1,'Workinghours','','_self','voyager-receipt','#000000',69,2,'2020-03-29 11:36:52','2020-03-29 11:45:18','voyager.workinghours.index','null'),(68,1,'Appointments','','_self','voyager-alarm-clock','#000000',69,3,'2020-03-29 11:40:21','2020-03-29 11:45:18','voyager.appointments.index','null'),(69,1,'Doctors','','_self','voyager-group','#000000',NULL,3,'2020-03-29 11:44:45','2020-03-29 11:45:12',NULL,'');
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
INSERT INTO `menus` VALUES (1,'admin','2020-03-29 10:01:12','2020-03-29 10:01:12'),(2,'site','2020-03-29 10:01:12','2020-03-29 10:01:12');
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
) ENGINE=InnoDB AUTO_INCREMENT=563 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (505,'2014_10_12_000000_create_users_table',1),(506,'2014_10_12_100000_create_password_resets_table',1),(507,'2016_01_01_000000_add_voyager_user_fields',1),(508,'2016_01_01_000000_create_data_types_table',1),(509,'2016_01_01_000000_create_pages_table',1),(510,'2016_01_01_000000_create_posts_table',1),(511,'2016_02_15_204651_create_categories_table',1),(512,'2016_05_19_173453_create_menu_table',1),(513,'2016_10_21_190000_create_roles_table',1),(514,'2016_10_21_190000_create_settings_table',1),(515,'2016_11_30_135954_create_permission_table',1),(516,'2016_11_30_141208_create_permission_role_table',1),(517,'2016_12_26_201236_data_types__add__server_side',1),(518,'2017_01_13_000000_add_route_to_menu_items_table',1),(519,'2017_01_14_005015_create_translations_table',1),(520,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(521,'2017_03_06_000000_add_controller_to_data_types_table',1),(522,'2017_04_11_000000_alter_post_nullable_fields_table',1),(523,'2017_04_21_000000_add_order_to_data_rows_table',1),(524,'2017_07_05_210000_add_policyname_to_data_types_table',1),(525,'2017_08_05_000000_add_group_to_settings_table',1),(526,'2017_11_26_013050_add_user_role_relationship',1),(527,'2017_11_26_015000_create_user_roles_table',1),(528,'2018_03_11_000000_add_user_settings',1),(529,'2018_03_14_000000_add_details_to_data_types_table',1),(530,'2018_03_16_000000_make_settings_value_nullable',1),(531,'2019_08_19_000000_create_failed_jobs_table',1),(532,'2020_01_26_1580046377_create_sliders_table',1),(533,'2020_01_27_1580130832_create_clinics_table',1),(534,'2020_01_28_082126_create_services_table',1),(535,'2020_01_28_1580202864_create_doctors_table',1),(536,'2020_01_29_1580284673_create_Tags_table',1),(537,'2020_01_29_1580284853_create_post_tag_table',1),(538,'2020_02_02_1580636169_create_events_table',1),(539,'2020_02_03_154301_create_social_accounts_table',1),(540,'2020_02_04_1580806341_add_last_name_phone_gender_address_to_users_table',1),(541,'2020_02_04_1580831332_create_post_user_table',1),(542,'2020_02_05_1580893135_create_andl_groups_table',1),(543,'2020_02_05_162605_create_notifications_table',1),(544,'2020_02_05_162605_create_surveys_table',1),(545,'2020_02_05_162606_create_survey_question_table',1),(546,'2020_02_05_162607_create_survey_answer_table',1),(547,'2020_02_05_162608_create_survey_user_info_table',1),(548,'2020_02_05_162609_create_survey_user_answer_table',1),(549,'2020_02_09_1581244986_create_clinic_requests_table',1),(550,'2020_03_01_1580284853_create_user_event_table',1),(551,'2020_03_02_1583140464_create_adminss_table',1),(552,'2020_03_02_1583140841_create_seo_settingss_table',1),(553,'2020_03_28_1585412097_add_doctor_id_to_users_table',1),(554,'2020_03_28_1585412144_add_clinic_id_to_doctors_table',1),(555,'2020_03_28_1585426557_add_email_to_doctors_table',1),(556,'2020_03_28_1585426751_add_phone_to_doctors_table',1),(557,'2020_03_28_1585434667_create_workinghours_table',1),(558,'2020_03_28_1585437347_create_appointments_table',1),(559,'2020_03_28_1585437491_add_price_duration_to_doctors_table',1),(560,'2020_03_28_1585437756_add_created_at_updated_at_to_appointments_table',1),(561,'2020_03_29_1585483432_add_last_name_to_users_table',2),(562,'2020_03_29_1585483652_add_phone_to_users_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
INSERT INTO `pages` VALUES (1,0,'Hello World','Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.','<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','pages/page1.jpg','hello-world','Yar Meta Description','Keyword1, Keyword2','ACTIVE','2020-03-29 10:01:13','2020-03-29 10:01:13');
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
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2020-03-29 10:01:12','2020-03-29 10:01:12'),(2,'browse_bread',NULL,'2020-03-29 10:01:12','2020-03-29 10:01:12'),(3,'browse_database',NULL,'2020-03-29 10:01:12','2020-03-29 10:01:12'),(4,'browse_media',NULL,'2020-03-29 10:01:12','2020-03-29 10:01:12'),(5,'browse_compass',NULL,'2020-03-29 10:01:12','2020-03-29 10:01:12'),(6,'browse_menus','menus','2020-03-29 10:01:12','2020-03-29 10:01:12'),(7,'read_menus','menus','2020-03-29 10:01:12','2020-03-29 10:01:12'),(8,'edit_menus','menus','2020-03-29 10:01:12','2020-03-29 10:01:12'),(9,'add_menus','menus','2020-03-29 10:01:12','2020-03-29 10:01:12'),(10,'delete_menus','menus','2020-03-29 10:01:12','2020-03-29 10:01:12'),(11,'browse_roles','roles','2020-03-29 10:01:12','2020-03-29 10:01:12'),(12,'read_roles','roles','2020-03-29 10:01:12','2020-03-29 10:01:12'),(13,'edit_roles','roles','2020-03-29 10:01:12','2020-03-29 10:01:12'),(14,'add_roles','roles','2020-03-29 10:01:12','2020-03-29 10:01:12'),(15,'delete_roles','roles','2020-03-29 10:01:12','2020-03-29 10:01:12'),(16,'browse_users','users','2020-03-29 10:01:12','2020-03-29 10:01:12'),(17,'read_users','users','2020-03-29 10:01:12','2020-03-29 10:01:12'),(18,'edit_users','users','2020-03-29 10:01:12','2020-03-29 10:01:12'),(19,'add_users','users','2020-03-29 10:01:12','2020-03-29 10:01:12'),(20,'delete_users','users','2020-03-29 10:01:12','2020-03-29 10:01:12'),(21,'browse_settings','settings','2020-03-29 10:01:12','2020-03-29 10:01:12'),(22,'read_settings','settings','2020-03-29 10:01:12','2020-03-29 10:01:12'),(23,'edit_settings','settings','2020-03-29 10:01:12','2020-03-29 10:01:12'),(24,'add_settings','settings','2020-03-29 10:01:12','2020-03-29 10:01:12'),(25,'delete_settings','settings','2020-03-29 10:01:12','2020-03-29 10:01:12'),(26,'browse_categories','categories','2020-03-29 10:01:12','2020-03-29 10:01:12'),(27,'read_categories','categories','2020-03-29 10:01:12','2020-03-29 10:01:12'),(28,'edit_categories','categories','2020-03-29 10:01:12','2020-03-29 10:01:12'),(29,'add_categories','categories','2020-03-29 10:01:12','2020-03-29 10:01:12'),(30,'delete_categories','categories','2020-03-29 10:01:12','2020-03-29 10:01:12'),(31,'browse_posts','posts','2020-03-29 10:01:12','2020-03-29 10:01:12'),(32,'read_posts','posts','2020-03-29 10:01:13','2020-03-29 10:01:13'),(33,'edit_posts','posts','2020-03-29 10:01:13','2020-03-29 10:01:13'),(34,'add_posts','posts','2020-03-29 10:01:13','2020-03-29 10:01:13'),(35,'delete_posts','posts','2020-03-29 10:01:13','2020-03-29 10:01:13'),(36,'browse_pages','pages','2020-03-29 10:01:13','2020-03-29 10:01:13'),(37,'read_pages','pages','2020-03-29 10:01:13','2020-03-29 10:01:13'),(38,'edit_pages','pages','2020-03-29 10:01:13','2020-03-29 10:01:13'),(39,'add_pages','pages','2020-03-29 10:01:13','2020-03-29 10:01:13'),(40,'delete_pages','pages','2020-03-29 10:01:13','2020-03-29 10:01:13'),(41,'browse_admins','admins','2020-03-29 10:01:13','2020-03-29 10:01:13'),(42,'read_admins','admins','2020-03-29 10:01:13','2020-03-29 10:01:13'),(43,'edit_admins','admins','2020-03-29 10:01:13','2020-03-29 10:01:13'),(44,'add_admins','admins','2020-03-29 10:01:13','2020-03-29 10:01:13'),(45,'delete_admins','admins','2020-03-29 10:01:13','2020-03-29 10:01:13'),(46,'browse_sliders','sliders','2020-03-29 10:01:13','2020-03-29 10:01:13'),(47,'read_sliders','sliders','2020-03-29 10:01:13','2020-03-29 10:01:13'),(48,'edit_sliders','sliders','2020-03-29 10:01:13','2020-03-29 10:01:13'),(49,'add_sliders','sliders','2020-03-29 10:01:13','2020-03-29 10:01:13'),(50,'delete_sliders','sliders','2020-03-29 10:01:13','2020-03-29 10:01:13'),(51,'browse_clinics','clinics','2020-03-29 10:01:13','2020-03-29 10:01:13'),(52,'read_clinics','clinics','2020-03-29 10:01:13','2020-03-29 10:01:13'),(53,'edit_clinics','clinics','2020-03-29 10:01:13','2020-03-29 10:01:13'),(54,'add_clinics','clinics','2020-03-29 10:01:13','2020-03-29 10:01:13'),(55,'delete_clinics','clinics','2020-03-29 10:01:13','2020-03-29 10:01:13'),(56,'browse_services','services','2020-03-29 10:01:13','2020-03-29 10:01:13'),(57,'read_services','services','2020-03-29 10:01:13','2020-03-29 10:01:13'),(58,'edit_services','services','2020-03-29 10:01:13','2020-03-29 10:01:13'),(59,'add_services','services','2020-03-29 10:01:13','2020-03-29 10:01:13'),(60,'delete_services','services','2020-03-29 10:01:13','2020-03-29 10:01:13'),(61,'browse_doctors','doctors','2020-03-29 10:01:13','2020-03-29 10:01:13'),(62,'read_doctors','doctors','2020-03-29 10:01:13','2020-03-29 10:01:13'),(63,'edit_doctors','doctors','2020-03-29 10:01:13','2020-03-29 10:01:13'),(64,'add_doctors','doctors','2020-03-29 10:01:13','2020-03-29 10:01:13'),(65,'delete_doctors','doctors','2020-03-29 10:01:13','2020-03-29 10:01:13'),(66,'browse_tags','tags','2020-03-29 10:01:13','2020-03-29 10:01:13'),(67,'read_tags','tags','2020-03-29 10:01:13','2020-03-29 10:01:13'),(68,'edit_tags','tags','2020-03-29 10:01:13','2020-03-29 10:01:13'),(69,'add_tags','tags','2020-03-29 10:01:13','2020-03-29 10:01:13'),(70,'delete_tags','tags','2020-03-29 10:01:13','2020-03-29 10:01:13'),(71,'browse_sitesettings','sitesettings','2020-03-29 10:01:13','2020-03-29 10:01:13'),(72,'read_sitesettings','sitesettings','2020-03-29 10:01:13','2020-03-29 10:01:13'),(73,'edit_sitesettings','sitesettings','2020-03-29 10:01:13','2020-03-29 10:01:13'),(74,'add_sitesettings','sitesettings','2020-03-29 10:01:13','2020-03-29 10:01:13'),(75,'delete_sitesettings','sitesettings','2020-03-29 10:01:13','2020-03-29 10:01:13'),(76,'browse_events','events','2020-03-29 10:01:13','2020-03-29 10:01:13'),(77,'read_events','events','2020-03-29 10:01:13','2020-03-29 10:01:13'),(78,'edit_events','events','2020-03-29 10:01:13','2020-03-29 10:01:13'),(79,'add_events','events','2020-03-29 10:01:13','2020-03-29 10:01:13'),(80,'delete_events','events','2020-03-29 10:01:13','2020-03-29 10:01:13'),(81,'browse_clinic_requests','clinic_requests','2020-03-29 10:01:13','2020-03-29 10:01:13'),(82,'read_clinic_requests','clinic_requests','2020-03-29 10:01:13','2020-03-29 10:01:13'),(83,'edit_clinic_requests','clinic_requests','2020-03-29 10:01:13','2020-03-29 10:01:13'),(84,'add_clinic_requests','clinic_requests','2020-03-29 10:01:13','2020-03-29 10:01:13'),(85,'delete_clinic_requests','clinic_requests','2020-03-29 10:01:13','2020-03-29 10:01:13'),(86,'browse_andalusia_groups','andalusia_groups','2020-03-29 10:01:13','2020-03-29 10:01:13'),(87,'read_andalusia_groups','andalusia_groups','2020-03-29 10:01:13','2020-03-29 10:01:13'),(88,'edit_andalusia_groups','andalusia_groups','2020-03-29 10:01:13','2020-03-29 10:01:13'),(89,'add_andalusia_groups','andalusia_groups','2020-03-29 10:01:13','2020-03-29 10:01:13'),(90,'delete_andalusia_groups','andalusia_groups','2020-03-29 10:01:13','2020-03-29 10:01:13'),(91,'browse_workinghours','workinghours','2020-03-29 11:36:52','2020-03-29 11:36:52'),(92,'read_workinghours','workinghours','2020-03-29 11:36:52','2020-03-29 11:36:52'),(93,'edit_workinghours','workinghours','2020-03-29 11:36:52','2020-03-29 11:36:52'),(94,'add_workinghours','workinghours','2020-03-29 11:36:52','2020-03-29 11:36:52'),(95,'delete_workinghours','workinghours','2020-03-29 11:36:52','2020-03-29 11:36:52'),(96,'browse_appointments','appointments','2020-03-29 11:40:21','2020-03-29 11:40:21'),(97,'read_appointments','appointments','2020-03-29 11:40:21','2020-03-29 11:40:21'),(98,'edit_appointments','appointments','2020-03-29 11:40:21','2020-03-29 11:40:21'),(99,'add_appointments','appointments','2020-03-29 11:40:21','2020-03-29 11:40:21'),(100,'delete_appointments','appointments','2020-03-29 11:40:21','2020-03-29 11:40:21');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
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
INSERT INTO `posts` VALUES (1,1,2,'عملية تغيير مفصل الركبة','عملية تغيير مفصل الركبة','تعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد','<p style=\"text-align: right;\"><strong>عملية تغيير مفصل الركبة</strong></p>\n<h2 style=\"direction: rtl;\"><strong>عملية تغيير مفصل الركبة</strong></h2>\n<p style=\"text-align: right;\">تعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد أو للتآكل مما يسبب آلام قوية يصعب تحملها وتؤدي لصعوبة في الحركة، وهنا العملية هي الحل الأمثل للتخلص من هذه الآلام المزعجة وامتلاك القدرة على ممارسة الأنشطة اليومية بسهولة.</p>\n<p style=\"direction: rtl;\">تحتاج هذة العملية لإجراء الكثير من الفحوصات والتحاليل قبل العملية للتأكد من أنها الحل المناسب والأخير للقضاء على آلام الركبة والقدرة على الحركة بشكل سليم.</p>\n<p style=\"direction: rtl;\">وفي العملية يتم استبدال المفصل الطبيعي بآخر صناعي مصنوع من التيتانيوم أو البلاستيك القوي، ويتم إجراءها تحت تأثير التخدير الموضعي أو الكلي حسب ما يحدده الطبيب.</p>\n<h3 style=\"direction: rtl;\"><strong><u>تنقسم </u></strong><strong><u>عملية تغيير المفصل </u></strong><strong><u>إلى نوعين وهما :-</u></strong></h3>\n<p style=\"direction: rtl;\"><strong>- تغيير كلي لمفصل الركبة.</strong></p>\n<p style=\"direction: rtl;\">حيث يتم تغيير المفصل بالكامل نتيجة حدوث تضرر أو تآكل المفصل بالكامل.</p>\n<p style=\"direction: rtl;\"><strong>- تغيير جزئي لمفصل الركبة.</strong></p>\n<p style=\"direction: rtl;\">حيث يتم تغيير الجزء المتضرر فقط من المفصل، <u>وذلك ضمن شروط معينة وهي:-</u></p>\n<p style=\"direction: rtl;\">- أن يكون الرباط الصليبي الأمامي سليمًا.</p>\n<p style=\"direction: rtl;\">- وأن يكون النصف الخارجي من المفصل سليمًا.</p>\n<p style=\"direction: rtl;\">- أن يكون مقدار الاعوجاج أقل من 15 درجة.</p>\n<h3 style=\"direction: rtl;\"><strong><u>6 أسباب لإجراء </u></strong><strong><u>عملية مفصل الركبة&nbsp;</u></strong><strong><u>:</u></strong></h3>\n<p style=\"direction: rtl;\">يلجأ الطبيب لإجراء تغيير المفصل الركبة للحالات التي لا تتحمل الآلام والضغط على الركبة ومن هذه الحالات:-</p>\n<p style=\"direction: rtl;\"><strong>1- هشاشة العظام</strong>:</p>\n<p style=\"direction: rtl;\">وتعتبر هشاشة العظام من الأسباب الرئيسية لإجراء العملية حيث يصبح المفصل ضعيف وهش غير قادر على تحمل المزيد من الضغط عليه.</p>\n<p style=\"direction: rtl;\"><strong>2- خشونة الركبة</strong>:</p>\n<p style=\"direction: rtl;\">الخشونة هي تآكل لغضروف الركبة ومن ثم تآكل المفصل نفسه وفي الحالات المتقدمة يصبح المفصل غير قادر على امتصاص الصدمات مما يعوق الحركة بشكل كبير أو يمنعها نسبياً.</p>\n<p style=\"direction: rtl;\"><strong>3- زيادة الوزن</strong>:</p>\n<p style=\"direction: rtl;\">تشكل السمنة خطراً &nbsp;كبيراً على مفصل الركبة لأن الوزن الزائد يؤدي إلى زيادة الضغط على المفصل و</p>\n<p style=\"direction: rtl;\">تآكل الغضروف.</p>\n<p style=\"direction: rtl;\"><strong>4- الإصابات الخارجية</strong>:</p>\n<p style=\"direction: rtl;\">كالإصابات التي تحدث في الملاعب أو إصابات الحوادث والكسور.</p>\n<p style=\"direction: rtl;\"><strong>5- الاستئصال الجزئي للغضروف المفصلي للركبة</strong>:</p>\n<p style=\"direction: rtl;\">بعد هذا الاستئصال يفقد المفصل قدرته على امتصاص الصدمات فقد تحتاج بعض الحالات حينها لاستبدال المفصل.</p>\n<p style=\"direction: rtl;\"><strong>6- التهاب المفاصل الروماتويدي</strong>:</p>\n<p style=\"direction: rtl;\">تسبب الالتهابات الروماتويدية آلام شديدة لا تُحتمل في المفاصل وقد تؤدي في النهاية إلى تشوه كامل في المفصل فيضطر الطبيب لإجراء عملية تبديل مفصل الركبة.</p>\n<h3 style=\"direction: rtl;\"><strong><u>علامات تستدعي إجراء </u></strong><strong><u>عملية تغيير مفصل الركبة&nbsp;</u></strong><strong><u>:-</u></strong></h3>\n<p style=\"direction: rtl;\">- حدوث تآكل في مفصل أو غضروف الركبة.</p>\n<p style=\"direction: rtl;\">- آلام شديدة في الركبة وتظهر خاصة في أوقات الراحة وأثناء النوم ليلاً.</p>\n<p style=\"direction: rtl;\">- التيبس والتصلب في مفصل الركبة لأنه يسبب صعوبة في ممارسة الأنشطة اليومية كصعوبة في ارتداء الملابس أو الأحذية وغيرها من الأنشطة اليومية المعتادة.</p>\n<p style=\"direction: rtl;\">- صعوبة في المشي.</p>\n<p style=\"direction: rtl;\">- محدودية الحركة وعدم قيام المفصل بأداء وظيفته كاملة. <img class=\"aligncenter wp-image-2948 size-medium\" src=\"https://www.andalusiahjh.com/wp-content/uploads/2020/01/عملية-تغيير-مفصل-الركبة-فى-السعودية-300x200.jpg\" alt=\"عملية تغيير مفصل الركبة فى السعودية\" width=\"300\" height=\"200\" /></p>\n<h3 style=\"direction: rtl;\"><strong><u>4 خطوات هامة قبل </u></strong><strong><u>عـملية تغيير مـفصل الركبة</u></strong><strong><u>:-</u></strong></h3>\n<p style=\"direction: rtl;\">قبل إجراء عملية تبديل مفصل الركبة يقوم الطبيب بتحديد الفحوصات والتحاليل التي يحتاجها المريض وهي:-</p>\n<p style=\"direction: rtl;\">- إجراء أشعة رنين مغناطيسي أو أشعة سينية على الركبة.</p>\n<p style=\"direction: rtl;\">- إجراء تحاليل للدم كصورة دم كاملة، وتخثر الدم، وكيمياء الدم، ووظائف الكلى والكبد.</p>\n<p style=\"direction: rtl;\">- إجراء فحص البول.</p>\n<p style=\"direction: rtl;\">- إجراء تخطيط كهربية القلب (رسم القلب).</p>\n<p style=\"direction: rtl;\">وإذا كان المريض يتناول أدوية معينة يحدد الطبيب الأدوية التي يجب التوقف عن تناولها قبل العملية.</p>\n<h3 style=\"direction: rtl;\"><strong><u>هل تظهر مضاعفات بعد </u></strong><strong><u>عملية تغيير مفصل الركبة</u></strong></h3>\n<p style=\"direction: rtl;\">في بعض الحالات قد تظهر بعض المضاعفات مثل:</p>\n<p style=\"direction: rtl;\">- حدوث تورم والتهابات وآلام في المفصل.</p>\n<p style=\"direction: rtl;\">- التعرض لكسور في عظام الركبة.</p>\n<p style=\"direction: rtl;\">- حدوث تصلب في مفصل الركبة.</p>\n<p style=\"direction: rtl;\">- حدوث ضرر في العصب أو العضلات.</p>\n<p style=\"direction: rtl;\">ولكن هناك بعض الشروط التي قد تحميك من هذه المضاعفات وتساعد في نجاح عملية تبديل مفصل الركبة وهي..</p>\n<p style=\"direction: rtl;\">- إجراء العملية تحت إشراف طبيب عظام ماهر ومتخصص وله خبرة في إجراء عملية تبديل مفصل الركبة لمرات عديدة.</p>\n<p style=\"direction: rtl;\">- التأكد من جودة نوع المفصل المستخدم.</p>\n<p style=\"direction: rtl;\">- التخلص من الوزن الزائد قبل إجراء الجراحة.</p>\n<p style=\"direction: rtl;\">- عمل جلسات علاج طبيعي بعد إجراء الجراحة.</p>\n<p style=\"direction: rtl;\">-اتباع تعليمات الطبيب للحفاظ على المفصل لأطول فترة ممكنة.</p>\n<h3 style=\"direction: rtl;\"><strong><u>أهمية العلاج الطبيعي بعد </u></strong><strong><u>عملية تغيير مفصل الركبة&nbsp;</u></strong><strong><u>:-</u></strong></h3>\n<p style=\"direction: rtl;\">- يعد العلاج الطبيعي من أهم خطوات التعافي بعد عملية تبديل مفصل الركبة، وللحفاظ على مفصل الركبة الذي تم استبداله.</p>\n<p style=\"direction: rtl;\">- يعمل العلاج الطبيعي على تقوية عضلات الساق الضعيفة، لأن قوة العضلات تساعد في تخفيف ضغط وزن الجسم على مفاصل الركبة.</p>\n<h3 style=\"direction: rtl;\"><strong><u>بعد </u></strong><strong><u>عملية تبديل مفصل الركبة</u></strong><strong><u> تعرف على أنواع تمارين العلاج الطبيعي</u></strong></h3>\n<p style=\"direction: rtl;\">تتنوع تمارين العلاج الطبيعي لتناسب تفاصيل كل حالة ومن هذه التمارين..</p>\n<p style=\"direction: rtl;\">- العلاج المائي، لعلاج آلام العضلات الناتجة عن إجراء الجراحة، والشعور بالراحة والاسترخاء.</p>\n<p style=\"direction: rtl;\">- تمارين التوازن والإطالة والتقوية.</p>\n<p style=\"direction: rtl;\">- استخدام النبضات الكهربائية لتنشيط وتقوية العضلات.</p>\n<p style=\"direction: rtl;\">- استخدام الأشعة تحت الحمراء لتخفيف الألم والالتهابات، حيث أن حرارتها تساعد على توسيع الأوعية الدموية التي تخفف من الشعور بالألم بشكل كبير.</p>\n<p style=\"direction: rtl;\">- تدليك الأنسجة العميقة للتخفيف من تشنجات العضلات وتقليل الالتهابات.</p>\n<p style=\"direction: rtl;\">- العلاج بالترددات الاهتزازية لتقوية العضلات وزيادة نشاط الأعصاب.</p>\n<h4 style=\"direction: rtl;\"><strong><u>نصائح هامة بعد العملية&nbsp;</u></strong><strong><u>:-</u></strong></h4>\n<p style=\"direction: rtl;\">- الراحة التامة في الفراش ووضع الساق في خط مستقيم لتسهيل تدفق الدم والتخفيف من الألم.</p>\n<p style=\"direction: rtl;\">- الانتظام في تناول الأدوية كما يصفها الطبيب لتمام التعافي من آثار العملية.</p>\n<p style=\"direction: rtl;\">- استخدام كمادات الثلج على مفصل الركبة في البداية بعد إجراء عملية تبديل مفصل الركبة، فالثلج يساعد على تخدير منطقة المفصل وبالتالي تقليل الشعور بالألم والتخفيف من الالتهابات.</p>\n<p style=\"direction: rtl;\">- بعد التئام الجرح يمكن استخدام كمادات المياه الساخنة للتخفيف من الألم وزيادة الشعور بالراحة والاسترخاء.</p>\n<p style=\"direction: rtl;\">- يمكن استخدام العكاز أو الكرسي المتحرك مؤقتاً خلال الأيام الأولى من إجراء الجراحة عند القيام بأي نشاط معين، وذلك لتجنب زيادة الضغط على المفصل أثناء المشي أو الجلوس.</p>\n<p style=\"direction: rtl;\">- الانتظام في عمل جلسات العلاج الطبيعي.</p>\n<p style=\"direction: rtl;\">- الالتزام بممارسة التمارين المنزلية التي يحددها الطبيب بانتظام للحفاظ على سلامة مفصل الركبة لأطول فترة ممكنة.</p>\n<p style=\"direction: rtl;\">- تجنب ثني الركبة أثناء الجلوس أو القفز خلال الأسابيع الأولى من إجراء عملية تبديل مفصل الركبة.</p>\n<p style=\"direction: rtl;\">- تجنب استخدام السلم لعدم الضغط علي الركبة التي تم إجراء العملية بها.</p>\n<p style=\"direction: rtl;\">- تجنب قيادة السيارة نهائياً حتى تمام التعافي من العملية والقدرة على تحريك المفصل بشكل سليم.</p>\n<p style=\"direction: rtl;\">- الالتزام بعمل الفحص الدوري لمفصل الركبة من خلال الأشعة للتأكد من أن المفصل يعمل بكفاءة وعدم وجود أي خلل في المفصل أو عظام الركبة.</p>\n<p style=\"direction: rtl;\">- النوم على سرير مرتفع للقيام من عليه بسهولة وعدم الشعور بألم.</p>\n<p style=\"direction: rtl;\">- الحفاظ على وزن الجسم لتجنب زيادة الضغط على مفصل الركبة.</p>\n<p style=\"direction: rtl;\">ومع الإلتزام بهذه النصائح وتعليمات <a href=\"https://www.andalusiahjh.com/doctors/\">الطبيب</a>، يستعيد المفصل قوته وأداء وظيفته كاملة حيث يمكنك العودة لممارسة أنشطتك اليومية بسهولة ودون عناء.</p>\n<h3 style=\"direction: rtl;\"><strong>تعرف ايضاً علي :&nbsp;</strong></h3>\n<p style=\"direction: rtl;\"><a href=\"https://www.andalusiahjh.com/%d8%b9%d9%84%d8%a7%d8%ac-%d8%a7%d8%b1%d8%aa%d9%81%d8%a7%d8%b9-%d8%a7%d9%84%d9%83%d9%88%d9%84%d9%8a%d8%b3%d8%aa%d8%b1%d9%88%d9%84/\"><strong>علاج ارتفاع الكوليسترول</strong></a></p>\n<p style=\"direction: rtl;\"><strong><a href=\"https://www.andalusiahjh.com/%d8%ac%d9%84%d8%b7%d8%a9-%d8%a7%d9%84%d9%82%d9%84%d8%a8/\">جلطة القلب</a> و طرق التعامل معها.</strong></p>\n<p style=\"direction: rtl;\"><a href=\"https://www.andalusiahjh.com/%d8%b9%d9%84%d8%a7%d8%ac-%d8%a7%d8%b6%d8%b7%d8%b1%d8%a7%d8%a8%d8%a7%d8%aa-%d8%a7%d9%84%d9%86%d9%88%d9%85/\"><strong>علاج اضطرابات النوم</strong></a></p>\n<p><a href=\"https://www.andalusiahjh.com/clinic/q/%d8%b9%d9%8a%d8%a7%d8%af%d8%a9-%d8%a7%d9%84%d8%ac%d8%b1%d8%a7%d8%ad%d8%a9-%d8%a7%d9%84%d8%b9%d8%a7%d9%85%d8%a9\"><img class=\"aligncenter wp-image-2892 size-full\" src=\"https://www.andalusiahjh.com/wp-content/uploads/2019/08/sajil.png\" alt=\"سجل الان فى عيادات الجراحة العامة\" width=\"320\" height=\"101\" /></a></p>','posts\\February2020\\V8egCZUkNuLBg6CtuDwZ.jpg','عملية-تغيير-مفصل-الركبة','تعرف الان على عملية تغيير مفصل الركبة فى السعودية وعملية تغيير مفصل الفخذ وماهي النصائح وافضل طرق للوقاية من مضاعفاتها..','عملية تغيير مفصل الركبة','PUBLISHED',0,'2020-02-19 08:03:12','2020-02-26 13:33:00');
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
INSERT INTO `roles` VALUES (1,'admin','Administrator','2020-03-29 10:01:12','2020-03-29 10:01:12'),(2,'user','Normal User','2020-03-29 10:01:12','2020-03-29 10:01:12');
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
INSERT INTO `seo_settings` VALUES (3,'title-meta.Title_Separator','Title Separator','|','\n            {\n    \"default\" : \"|\",\n    \"options\" : {\n        \"-\": \"-\",\n        \"_\": \"_\",\n        \"__\": \"__\",\n        \".\": \".\",\n        \"*\": \"*\",\n        \"|\": \"|\",\n        \"~\": \"~\",\n        \"<\": \"<\",\n        \">\": \">\",\n        \"«\": \"«\",\n        \"»\": \"»\"\n    }\n    }\n            ','select_dropdown',2,'Title & Meta'),(4,'title-meta.Title_template','Title template','',NULL,'text',1,'Title & Meta'),(5,'title-meta.meta_description_template','Meta description template',NULL,NULL,'text_area',3,'Title & Meta'),(9,'social.Facebook_page_uRL','Facebook Page URL',NULL,NULL,'text',5,'Social'),(10,'social.Twitter_username','Twitter Username',NULL,NULL,'text',6,'Social'),(11,'social.Instagram_uRL','Instagram URL',NULL,NULL,'text',7,'Social'),(12,'social.LinkedIn_uRL','LinkedIn URL',NULL,NULL,'text',8,'Social'),(13,'social.YouTube_uRL','YouTube URL',NULL,NULL,'text',9,'Social'),(14,'open-graph.title','title',NULL,NULL,'text',10,'Open Graph'),(15,'open-graph.description','description',NULL,NULL,'text',11,'Open Graph'),(16,'open-graph.url','url',NULL,NULL,'text',12,'Open Graph'),(17,'open-graph.image','image','settings\\February2020\\7GifG2E3SPoOjatdYazK.jpg',NULL,'image',13,'Open Graph'),(19,'open-graph.image:secure_url','image:secure_url','settings\\February2020\\dfBs9bkLbAyjymF0AZ5J.jpg',NULL,'image',14,'Open Graph'),(20,'twitter.cart','cart',NULL,NULL,'text',15,'Twitter'),(21,'twitter.title','title',NULL,NULL,'text',16,'Twitter'),(22,'twitter.description','description',NULL,NULL,'text',17,'Twitter'),(23,'twitter.site','site',NULL,NULL,'text',18,'Twitter'),(24,'twitter.image','image','settings\\February2020\\BNMlDDtOFWtAWA76EuZF.jpg',NULL,'image',19,'Twitter');
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
INSERT INTO `services` VALUES (1,'وحدة قسطرة القلب','The Cardiac Catheterization Unit','وحدة-قسطرة-القلب','the-cardiac-catheterization-unit','حرصاً من مستشفى حي الجامعة على تقديم أفضل الرعاية الطبية الدقيقة للمرضى، تشمل رعايتنا توفير وحدة خاصة بقسطرة القلب تم تأسيسها من أجل تقديم العناية والاهتمام المطلوبين للحالات التي تحتاج إلى قسطرة القلب، وذلك من خلال توفير عدد كافي من الأسرة بالمستشفى بالإضافة إلى أحدث وأدق الأجهزة والتقنيات اللازمة لرعاية المريض ومتابعته أثناء وبعد إجراء القسطرة.','<p>حرصاً من مستشفى حي الجامعة على تقديم أفضل الرعاية الطبية الدقيقة للمرضى، تشمل رعايتنا توفير وحدة خاصة بقسطرة القلب تم تأسيسها من أجل تقديم العناية والاهتمام المطلوبين للحالات التي تحتاج إلى قسطرة القلب، وذلك من خلال توفير عدد كافي من الأسرة بالمستشفى بالإضافة إلى أحدث وأدق الأجهزة والتقنيات اللازمة لرعاية المريض ومتابعته أثناء وبعد إجراء القسطرة.</p>\n<p>وتوفر مستشفى حي الجامعة أيضاً العناية والرعاية اللازمة للمريض بعد إجراء قسطرة القلب، حيث يجب نقل المريض بعدها إلى غرفة رعاية مركزة ليخضع للملاحظة لمدة من الزمن يحددها الطبيب الخاص، يتم ملاحظة معدل ضربات القلب وقياس ضغط الدم بانتظام، وتوفير مراقبة مستمرة للمؤشرات الحيوية للقلب حتى يتعافى المريض.</p>','services/10Cardiology.jpg','','',1,'2020-01-29 06:10:00','2020-02-05 11:48:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (5,'admin.bg_image','Admin Background Image','settings/March2020/n8TyTLHyg7w2khoYqEZL.png','','image',5,'Admin'),(8,'admin.loader','Admin Loader','settings\\December2019\\aoMDezpMVFGX2Xfj4AvD.png','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','settings/March2020/TAcj8Zw2psBh00fASmqi.png','','image',4,'Admin'),(12,'site.address_ar','Address Arabic','Elmhafza',NULL,'text',7,'Site'),(13,'site.address_en','Address English','aa',NULL,'text',9,'Site'),(14,'site.phone','phone','01126697538',NULL,'text',8,'Site'),(15,'site.facebook','FaceBook','asaswww',NULL,'text',10,'Site'),(22,'home.Planning','Planning','settings\\January2020\\NJQ1neyWoaqGQ1UjQzE1.png',NULL,'image',16,'home'),(23,'home.Build','Build','settings\\January2020\\LexhiWNqEE9ZhWGrJ8A4.png',NULL,'image',17,'home'),(24,'home.Our_Work_1','Our Work 1','settings\\January2020\\Szv9f79pN5hMK0Iu2mai.jpg',NULL,'image',18,'home'),(25,'home.Our_Work_2','Our Work 2','settings\\January2020\\UmD0BeZQfn3cGeNbwLKm.jpg',NULL,'image',19,'home'),(26,'home.Our_Work_3','Our Work 3','settings\\January2020\\v9ZiHGxNC4XZumvUqkU8.jpg',NULL,'image',20,'home'),(34,'site.title_ar','title Ar','www',NULL,'text',21,'Site'),(35,'site.title_en','title EN','www',NULL,'text',22,'Site'),(36,'site.description_ar','description Ar','www',NULL,'text_area',23,'Site'),(37,'site.description_en','description En',NULL,NULL,'text_area',24,'Site'),(38,'site.logo','logo','settings\\January2020\\TvNmuG4QHsS2wSfN2iiN.jpg',NULL,'image',25,'Site'),(39,'site.ahmed','ahmed',NULL,NULL,'text',26,'Site'),(41,'site.fav','fav','settings\\February2020\\2FZbQZs2EdsFgSzNgeVS.jpg',NULL,'image',27,'Site'),(42,'site.title_meta_data','Meta Data',NULL,NULL,'text',28,'Site'),(43,'site.desc','123123',NULL,NULL,'text_area',29,'Site'),(44,'.description Ar','description Ar',NULL,NULL,'text_area',30,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` VALUES (15,'data_rows','display_name',152,'en','Id','2020-03-29 11:35:27','2020-03-29 11:35:27'),(16,'data_rows','display_name',153,'en','Title Ar','2020-03-29 11:35:27','2020-03-29 11:35:27'),(17,'data_rows','display_name',154,'en','Title En','2020-03-29 11:35:27','2020-03-29 11:35:27'),(18,'data_rows','display_name',202,'en','Slug Ar','2020-03-29 11:35:27','2020-03-29 11:35:27'),(19,'data_rows','display_name',203,'en','Slug En','2020-03-29 11:35:27','2020-03-29 11:35:27'),(20,'data_rows','display_name',155,'en','Description','2020-03-29 11:35:27','2020-03-29 11:35:27'),(21,'data_rows','display_name',156,'en','Position','2020-03-29 11:35:27','2020-03-29 11:35:27'),(22,'data_rows','display_name',157,'en','Speciality','2020-03-29 11:35:27','2020-03-29 11:35:27'),(23,'data_rows','display_name',158,'en','Photo','2020-03-29 11:35:27','2020-03-29 11:35:27'),(24,'data_rows','display_name',159,'en','Meta Keywords','2020-03-29 11:35:27','2020-03-29 11:35:27'),(25,'data_rows','display_name',160,'en','Meta Description','2020-03-29 11:35:27','2020-03-29 11:35:27'),(26,'data_rows','display_name',161,'en','Status','2020-03-29 11:35:27','2020-03-29 11:35:27'),(27,'data_rows','display_name',162,'en','Created At','2020-03-29 11:35:27','2020-03-29 11:35:27'),(28,'data_rows','display_name',163,'en','Updated At','2020-03-29 11:35:27','2020-03-29 11:35:27'),(29,'data_types','display_name_singular',20,'en','Doctor','2020-03-29 11:35:27','2020-03-29 11:35:27'),(30,'data_types','display_name_plural',20,'en','Doctors','2020-03-29 11:35:27','2020-03-29 11:35:27'),(31,'menu_items','title',67,'en','Workinghours','2020-03-29 11:41:29','2020-03-29 11:41:29'),(32,'menu_items','title',68,'en','Appointments','2020-03-29 11:42:02','2020-03-29 11:42:02'),(33,'data_rows','display_name',234,'en','Id','2020-03-29 11:48:46','2020-03-29 11:48:46'),(34,'data_rows','display_name',235,'en','Day','2020-03-29 11:48:46','2020-03-29 11:48:46'),(35,'data_rows','display_name',236,'en','Start','2020-03-29 11:48:46','2020-03-29 11:48:46'),(36,'data_rows','display_name',237,'en','End','2020-03-29 11:48:46','2020-03-29 11:48:46'),(37,'data_rows','display_name',238,'en','Doctor Id','2020-03-29 11:48:46','2020-03-29 11:48:46'),(38,'data_rows','display_name',239,'en','Type','2020-03-29 11:48:46','2020-03-29 11:48:46'),(39,'data_rows','display_name',240,'en','Created At','2020-03-29 11:48:46','2020-03-29 11:48:46'),(40,'data_rows','display_name',241,'en','Updated At','2020-03-29 11:48:46','2020-03-29 11:48:46'),(41,'data_types','display_name_singular',29,'en','Workinghour','2020-03-29 11:48:46','2020-03-29 11:48:46'),(42,'data_types','display_name_plural',29,'en','Workinghours','2020-03-29 11:48:46','2020-03-29 11:48:46'),(43,'data_rows','display_name',242,'en','Id','2020-03-29 11:49:05','2020-03-29 11:49:05'),(44,'data_rows','display_name',243,'en','Doctor Id','2020-03-29 11:49:05','2020-03-29 11:49:05'),(45,'data_rows','display_name',244,'en','User Id','2020-03-29 11:49:05','2020-03-29 11:49:05'),(46,'data_rows','display_name',245,'en','Start','2020-03-29 11:49:05','2020-03-29 11:49:05'),(47,'data_rows','display_name',246,'en','Duration','2020-03-29 11:49:05','2020-03-29 11:49:05'),(48,'data_rows','display_name',247,'en','Comments','2020-03-29 11:49:05','2020-03-29 11:49:05'),(49,'data_rows','display_name',248,'en','Confirmed','2020-03-29 11:49:05','2020-03-29 11:49:05'),(50,'data_rows','display_name',249,'en','Payment Confirmed','2020-03-29 11:49:05','2020-03-29 11:49:05'),(51,'data_rows','display_name',250,'en','Created At','2020-03-29 11:49:05','2020-03-29 11:49:05'),(52,'data_rows','display_name',251,'en','Updated At','2020-03-29 11:49:05','2020-03-29 11:49:05'),(53,'data_types','display_name_singular',30,'en','Appointment','2020-03-29 11:49:05','2020-03-29 11:49:05'),(54,'data_types','display_name_plural',30,'en','Appointments','2020-03-29 11:49:05','2020-03-29 11:49:05'),(55,'data_rows','display_name',229,'en','Clinic','2020-03-29 12:00:46','2020-03-29 12:00:46'),(56,'data_rows','display_name',230,'en','Email','2020-03-29 12:00:46','2020-03-29 12:00:46'),(57,'data_rows','display_name',231,'en','Phone','2020-03-29 12:00:46','2020-03-29 12:00:46'),(58,'data_rows','display_name',232,'en','Price','2020-03-29 12:00:46','2020-03-29 12:00:46'),(59,'data_rows','display_name',233,'en','Duration By Min','2020-03-29 12:00:46','2020-03-29 12:00:46'),(60,'clinics','small_description',1,'en','تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج، حيث ساعدت عيادة أمراض القلب في علاج ما يزيد على 2000 مريض، وأعادت لهم الأمل في حياة سعيدة وآمنة من جديد.','2020-03-30 08:12:43','2020-03-30 08:12:43'),(61,'clinics','description',1,'en','<p>تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج، حيث ساعدت عيادة أمراض القلب في علاج ما يزيد على 2000 مريض، وأعادت لهم الأمل في حياة سعيدة وآمنة من جديد.</p>\n<p>وتتميز العيادة بخدمات استثنائية تساعد على أن تكون رحلة العلاج رحلة آمنة وبأقصى درجات الرعاية للمرضى، مثل:-</p>\n<p>&nbsp;</p>\n<ul>\n<li>خدمة طوارئ القلب متوفرة 24 ساعة يومياً طوال أيام الأسبوع.</li>\n<li>وجود استشاري قلب عند الطلب 24 ساعة يومياً طوال أيام الأسبوع.</li>\n<li>وحدة رعاية القلب تعمل على مدار 24 ساعة يومياً.</li>\n</ul>\n<p>&nbsp;</p>\n<h2 style=\"text-align: right;\">الخدمات التي تقدمها عيادة أمراض القلب:-</h2>\n<ul>\n<li>إجراء قسطرة القلب التشخيصية والعلاجية.</li>\n<li>علاج أمراض القلب الروماتيزمية والوراثية.</li>\n<li>فشل وتضخم عضلة القلب.</li>\n<li>تركيب صمامات ودعامات القلب.</li>\n<li>علاج عدم انتظام ضربات القلب.</li>\n<li>علاج أمراض الشرايين التاجية.</li>\n<li>الذبحة الصدرية وجلطة القلب.</li>\n<li>تصلب الشرايين.</li>\n<li>رسم القلب العادي وبالمجهود.</li>\n<li>فحص القلب بالموجات الصوتية (إيكو).</li>\n<li>رسم القلب لمدة 24 ساعة (هولتر).</li>\n</ul>','2020-03-30 08:12:43','2020-03-30 08:12:43'),(62,'clinics','address',1,'en','حي الجامعة - شارع السيرة العطرة','2020-03-30 08:12:43','2020-03-30 08:12:43'),(63,'clinics','meta_keywords',1,'en','عيادة أمراض القلب،امراض القلب،دكتور امراض القلب','2020-03-30 08:12:43','2020-03-30 08:12:43'),(64,'clinics','meta_description',1,'en','تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج','2020-03-30 08:12:43','2020-03-30 08:12:43');
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
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Ahmed','user@user.com','users/March2020/aubeK4keAQlU21U5MGQu.png',NULL,'$2y$10$MCYYSMEE8Og3a0vRL8pkou4tvhgJYitRS.FbIalXEFggi7AHaJOZ2',NULL,NULL,'2020-03-29 12:07:40','2020-03-29 12:08:44','Male','Elmhafza',0,'Tawfek','55123456'),(2,NULL,'user','user@user2.com','/users/default.jpg',NULL,'$2y$10$1B0.4JwVrDon9PSwlBk7TuD2TVDaUhC0Qe/OJXojsO49DJIhOIpCm',NULL,NULL,'2020-03-30 13:36:56','2020-03-30 13:36:56','male','s',0,NULL,'12345672'),(3,NULL,'user','user2@user.com','/users/default.jpg',NULL,'$2y$10$Jr5/tRNPMFIn/RmmywWi/Ol9Zpxcoz63VZfeCNoPQZRzdiKJ9PFum',NULL,NULL,'2020-03-30 13:42:39','2020-03-30 13:42:39','male','s',0,NULL,'44444444'),(4,NULL,'shehab','sheab_shef@sdfsdf.com','/users/default.jpg',NULL,'$2y$10$rk2VGX4hUZ5vozyx6uWHPOxSv7dshtzMpA0aaXKvXEBLVA86oWR.S',NULL,NULL,'2020-03-30 14:03:53','2020-03-30 14:03:53','male','s',0,NULL,'51231231'),(5,NULL,'sheab_shef@sdfsdf.com','sheab_shef@sdf.com','/users/default.jpg',NULL,'$2y$10$Qr1qCUp/IJqpxwZcawkZI.Ctzc5hoVvgCmqLMRhvRfwC6lUAjbg4q',NULL,NULL,'2020-03-30 14:04:42','2020-03-30 14:04:42','male','s',0,NULL,'71234612'),(6,NULL,'sheab_shef@sdfsdf.com','sheab_shef@sd.com','/users/default.jpg',NULL,'$2y$10$yuAWzLMJSm5TXRt7OdJ4/.GLZ9Gz5iU2NxaICevRtCCt1EV6qNtAO',NULL,NULL,'2020-03-30 14:05:51','2020-03-30 14:05:51','male','s',0,NULL,'12345128'),(7,NULL,'asdfasdf','shehab_shehab@dsfsdf.com','/users/default.jpg',NULL,'$2y$10$/.rHm4Ut1197CIJZEdzLc.nhKLUs20uc4O3G/wi08ofrs8ZedJxla',NULL,NULL,'2020-03-30 14:07:51','2020-03-30 14:07:51','male','s',0,NULL,'12312311'),(8,NULL,'asdfasdf','shuihf@uiohui.com','/users/default.jpg',NULL,'$2y$10$oChtVuXdDccNc1wEoMsp/u1LWF3U9mgAd2uRbHubYYPTBD2F5ELKq',NULL,NULL,'2020-03-30 14:08:57','2020-03-30 14:08:57','male','s',0,NULL,'12312364');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workinghours`
--

LOCK TABLES `workinghours` WRITE;
/*!40000 ALTER TABLE `workinghours` DISABLE KEYS */;
INSERT INTO `workinghours` VALUES (1,'Tuesday','09:00','18:00',2,'Working','2020-03-30 08:00:03','2020-03-30 08:00:03'),(2,'Saturday','08:00','12:00',2,'Working','2020-03-30 08:01:00','2020-03-30 08:17:06'),(3,'Saturday','12:00','13:00',2,'Break','2020-03-30 08:17:29','2020-03-30 08:17:29'),(4,'Monday','13:00','17:00',1,'Working','2020-03-30 08:18:00','2020-03-30 14:29:36');
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

-- Dump completed on 2020-03-31 10:34:03
