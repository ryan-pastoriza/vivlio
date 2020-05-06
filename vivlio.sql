/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : vivlio

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-12-02 14:02:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for announcement
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `status` varchar(200) DEFAULT NULL,
  `description` text,
  `ao_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`a_id`),
  KEY `ao_id` (`ao_id`),
  CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`ao_id`) REFERENCES `announcement_option` (`ao_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of announcement
-- ----------------------------
INSERT INTO `announcement` VALUES ('15', 'Book Changes', 'active', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '2017-08-11 10:56:40', '2017-08-30 11:20:04');
INSERT INTO `announcement` VALUES ('71', 'Announcement', 'active', 'rem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occae', '2', '2017-08-14 13:20:07', '2017-08-15 09:28:31');
INSERT INTO `announcement` VALUES ('72', 'Book Chang', 'active', 'em ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laboru', '1', '2017-08-14 13:37:50', '2017-08-30 11:20:06');
INSERT INTO `announcement` VALUES ('73', 'AA', 'active', 'em ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt m', '1', '2017-08-15 09:13:17', '2017-08-16 10:43:59');
INSERT INTO `announcement` VALUES ('74', 'AAAAAA', 'active', 'm ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim', '2', '2017-08-15 09:26:29', '2017-08-15 09:28:32');
INSERT INTO `announcement` VALUES ('75', 'asd', 'active', 'oris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occae', '2', '2017-08-15 09:31:15', '2017-08-15 09:31:15');
INSERT INTO `announcement` VALUES ('77', '123123', 'active', 'oris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', '2', '2017-08-15 09:31:31', '2017-08-15 09:31:31');

-- ----------------------------
-- Table structure for announcement_option
-- ----------------------------
DROP TABLE IF EXISTS `announcement_option`;
CREATE TABLE `announcement_option` (
  `ao_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ao_name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ao_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of announcement_option
-- ----------------------------
INSERT INTO `announcement_option` VALUES ('1', 'slide', '2017-08-09 08:53:20', '2017-08-09 08:53:22');
INSERT INTO `announcement_option` VALUES ('2', 'running', '2017-08-11 08:54:03', '2017-08-11 09:01:01');

-- ----------------------------
-- Table structure for auth_permission
-- ----------------------------
DROP TABLE IF EXISTS `auth_permission`;
CREATE TABLE `auth_permission` (
  `perm_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`perm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of auth_permission
-- ----------------------------

-- ----------------------------
-- Table structure for auth_role
-- ----------------------------
DROP TABLE IF EXISTS `auth_role`;
CREATE TABLE `auth_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of auth_role
-- ----------------------------

-- ----------------------------
-- Table structure for auth_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `auth_role_permission`;
CREATE TABLE `auth_role_permission` (
  `role_id` int(10) unsigned NOT NULL,
  `perm_id` int(10) unsigned NOT NULL,
  KEY `auth_role_permission_role_id_foreign` (`role_id`),
  KEY `auth_role_permission_perm_id_foreign` (`perm_id`),
  CONSTRAINT `auth_role_permission_perm_id_foreign` FOREIGN KEY (`perm_id`) REFERENCES `auth_permission` (`perm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `auth_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of auth_role_permission
-- ----------------------------

-- ----------------------------
-- Table structure for auth_user
-- ----------------------------
DROP TABLE IF EXISTS `auth_user`;
CREATE TABLE `auth_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `auth_user_status_id_foreign` (`status_id`),
  CONSTRAINT `auth_user_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of auth_user
-- ----------------------------
INSERT INTO `auth_user` VALUES ('1', 'tomskie1995', '$2y$10$eQx7X0ShiXpIfeucNlP9ieJBGzPty6Rvzxp84n00wGGtnJbYhrl2K', '$2y$10$1S6C5u.DC/zjhaTz4QUgqel/WaVKjsIomD81tPPDoA8xpscwqlqri', '7y7nZvZQtgmukbetmmsPV7hhGEWDX6OhsKgyI4G5fU7LdVx270ZXwnvid2C2', '2017-05-10 09:15:49', '2017-05-22 09:15:53', '1');
INSERT INTO `auth_user` VALUES ('2', 'admin123', '$2y$10$sCZ520LzEoHsKDxnoNMxr.tIT61qp8R78iPIgME93oEo/.MWqq9jK', '$2y$10$tZL2liZTnEz5ZTYam0u3neLxAo4ImADwrK.h9k4l8Y/1CkQmHxelq', 'WdR1NgPiOXljnBekwtd6Ah9GmpZYbFobXoDfGZdfhJNAMAYJzaGQ0U9WAXsH', '2018-06-21 09:58:22', '2018-06-21 09:58:22', '2');
INSERT INTO `auth_user` VALUES ('8', 'michelle', '$2y$10$AtecIm4NoxX2MGaLIHV6VuTBujT24sgZbsCFCIS.gSwigMUc7/YeS', '$2y$10$3kFjkpBGp7h6WsXPy/4mousqJT3cgAy9wTe8dCm67UoA5GulfyH9a', null, '2019-11-27 10:26:31', '2019-11-27 10:26:31', '1');

-- ----------------------------
-- Table structure for auth_user_role
-- ----------------------------
DROP TABLE IF EXISTS `auth_user_role`;
CREATE TABLE `auth_user_role` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  KEY `auth_user_role_role_id_foreign` (`role_id`),
  KEY `auth_user_role_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `auth_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of auth_user_role
-- ----------------------------

-- ----------------------------
-- Table structure for catalogue_record
-- ----------------------------
DROP TABLE IF EXISTS `catalogue_record`;
CREATE TABLE `catalogue_record` (
  `catalogue_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `material_type_id` int(10) unsigned DEFAULT NULL,
  `call_num` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `remarks` text CHARACTER SET latin1,
  `price` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`catalogue_id`),
  KEY `material` (`material_type_id`),
  CONSTRAINT `material` FOREIGN KEY (`material_type_id`) REFERENCES `lib_material_type` (`material_type_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of catalogue_record
-- ----------------------------
INSERT INTO `catalogue_record` VALUES ('5', '1', '4123', '123', '321', '2019-11-21 13:52:20', '2019-11-21 13:52:20');
INSERT INTO `catalogue_record` VALUES ('8', null, '4123', '123', '321', '2019-11-21 13:53:28', '2019-11-21 13:53:28');
INSERT INTO `catalogue_record` VALUES ('10', '5', '111', 'nice book', '123', '2019-11-21 14:12:19', '2019-11-21 14:12:19');
INSERT INTO `catalogue_record` VALUES ('11', '6', '1', null, '1231', '2019-11-21 14:14:12', '2019-11-21 14:14:12');
INSERT INTO `catalogue_record` VALUES ('12', '1', '123456', null, null, '2019-11-22 10:41:51', '2019-11-22 10:41:51');
INSERT INTO `catalogue_record` VALUES ('13', '1', null, null, null, '2019-11-21 15:30:29', '2019-11-21 15:30:29');
INSERT INTO `catalogue_record` VALUES ('14', null, null, null, null, '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `catalogue_record` VALUES ('15', null, null, null, null, '2019-03-08 10:39:12', '2019-03-08 10:39:12');
INSERT INTO `catalogue_record` VALUES ('16', null, null, null, null, '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `catalogue_record` VALUES ('17', '1', null, null, null, '2019-11-21 14:35:02', '2019-11-21 14:35:02');
INSERT INTO `catalogue_record` VALUES ('18', '1', null, null, null, '2019-11-04 16:46:38', '2019-11-04 16:46:38');
INSERT INTO `catalogue_record` VALUES ('19', null, '4', null, null, '2019-11-25 16:30:22', '2019-11-25 16:30:22');
INSERT INTO `catalogue_record` VALUES ('20', null, null, null, null, '2019-03-18 10:26:27', '2019-03-18 10:26:27');
INSERT INTO `catalogue_record` VALUES ('21', null, null, null, null, '2019-03-18 10:33:04', '2019-03-18 10:33:04');
INSERT INTO `catalogue_record` VALUES ('22', null, null, null, null, '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `catalogue_record` VALUES ('23', null, null, null, null, '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `catalogue_record` VALUES ('24', null, null, null, null, '2019-03-18 11:04:42', '2019-03-18 11:04:42');
INSERT INTO `catalogue_record` VALUES ('25', null, null, null, null, '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `catalogue_record` VALUES ('26', null, null, null, null, '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `catalogue_record` VALUES ('27', null, null, null, null, '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `catalogue_record` VALUES ('28', null, null, null, null, '2019-03-18 11:56:58', '2019-03-18 11:56:58');
INSERT INTO `catalogue_record` VALUES ('30', null, null, null, null, '2019-03-18 14:17:41', '2019-03-18 14:17:41');
INSERT INTO `catalogue_record` VALUES ('31', null, null, null, null, '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `catalogue_record` VALUES ('32', null, null, null, null, '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `catalogue_record` VALUES ('33', null, null, null, null, '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `catalogue_record` VALUES ('34', null, null, null, null, '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `catalogue_record` VALUES ('35', null, null, null, null, '2019-03-22 14:56:33', '2019-03-22 14:56:33');
INSERT INTO `catalogue_record` VALUES ('36', null, null, null, null, '2019-03-22 15:20:44', '2019-03-22 15:20:44');
INSERT INTO `catalogue_record` VALUES ('37', null, null, null, null, '2019-03-22 15:25:03', '2019-03-22 15:25:03');
INSERT INTO `catalogue_record` VALUES ('38', null, null, null, null, '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `catalogue_record` VALUES ('39', null, null, null, null, '2019-03-22 16:55:30', '2019-03-22 16:55:30');
INSERT INTO `catalogue_record` VALUES ('40', null, null, null, null, '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `catalogue_record` VALUES ('41', null, null, null, null, '2019-03-22 17:06:18', '2019-03-22 17:06:18');
INSERT INTO `catalogue_record` VALUES ('43', null, null, null, null, '2019-03-22 17:38:05', '2019-03-22 17:38:05');
INSERT INTO `catalogue_record` VALUES ('45', null, null, null, null, '2019-03-25 10:33:17', '2019-03-25 10:33:17');
INSERT INTO `catalogue_record` VALUES ('47', null, null, null, null, '2019-04-16 16:22:48', '2019-04-16 16:22:48');
INSERT INTO `catalogue_record` VALUES ('48', null, null, null, null, '2019-04-16 17:14:56', '2019-04-16 17:14:56');
INSERT INTO `catalogue_record` VALUES ('49', null, null, null, null, '2019-04-16 17:38:27', '2019-04-16 17:38:27');
INSERT INTO `catalogue_record` VALUES ('50', null, null, null, null, '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `catalogue_record` VALUES ('51', null, null, null, null, '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `catalogue_record` VALUES ('52', null, null, null, null, '2019-04-29 10:13:06', '2019-04-29 10:13:06');
INSERT INTO `catalogue_record` VALUES ('63', '8', '005.13 M7811 2018', null, null, '2019-11-11 10:21:47', '2019-11-11 10:21:47');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Library Logs', '2017-06-27 10:16:40', '2017-06-27 10:16:40');
INSERT INTO `category` VALUES ('2', 'Multimedia Logs', '2017-06-27 10:16:43', '2017-06-27 10:16:43');
INSERT INTO `category` VALUES ('3', 'Internet Logs', '2017-06-27 10:16:45', '2017-06-27 10:16:45');

-- ----------------------------
-- Table structure for cat_templates
-- ----------------------------
DROP TABLE IF EXISTS `cat_templates`;
CREATE TABLE `cat_templates` (
  `template_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `template_name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cat_templates
-- ----------------------------
INSERT INTO `cat_templates` VALUES ('8', 'quick add', 'basic cataloging');
INSERT INTO `cat_templates` VALUES ('9', 'book', 'monograph');
INSERT INTO `cat_templates` VALUES ('10', 'Serials', 'Journal, Newspaper, Periodical');

-- ----------------------------
-- Table structure for company
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` text,
  `c_description` text,
  `c_TIN` varchar(200) DEFAULT NULL,
  `c_postal` varchar(200) DEFAULT NULL,
  `c_contact` varchar(200) DEFAULT NULL,
  `c_email` varchar(200) DEFAULT NULL,
  `c_status` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('1', 'ACLC College Of Butuan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '214-1293-2828-12011', '8600', '0912837200', 'aclcbutuan123@gmail.com', 'active', '2017-08-15 10:54:04', '2017-08-17 10:40:10');

-- ----------------------------
-- Table structure for copies
-- ----------------------------
DROP TABLE IF EXISTS `copies`;
CREATE TABLE `copies` (
  `copy_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acc_num` varchar(200) CHARACTER SET latin1 NOT NULL,
  `catalogue_id` int(10) unsigned DEFAULT NULL,
  `barcode` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `source` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `call_num` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `issues` smallint(6) DEFAULT NULL,
  `date_received` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `price` double(10,0) DEFAULT NULL,
  `material_type_id` int(10) DEFAULT NULL,
  `copy_number` int(10) DEFAULT NULL,
  PRIMARY KEY (`copy_id`),
  UNIQUE KEY `accession_num` (`acc_num`),
  UNIQUE KEY `barcode` (`barcode`) USING BTREE,
  KEY `copies_idfk_ctr` (`catalogue_id`),
  CONSTRAINT `copies_idfk_ctr` FOREIGN KEY (`catalogue_id`) REFERENCES `catalogue_record` (`catalogue_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of copies
-- ----------------------------
INSERT INTO `copies` VALUES ('5', '0005889-19', '5', '0005889-19', null, 'available', null, '005.13/3 D74 2018', null, '2019-02-22', '2019-03-07 14:12:27', '2019-11-27 10:37:38', '4', '1', '1');
INSERT INTO `copies` VALUES ('8', '0005886-19', '8', '0005886-19', null, 'available', null, '005.1\'15 H3642 2017', null, '2019-02-21', '2019-03-07 14:48:22', '2019-11-26 15:40:13', '6', '8', '1');
INSERT INTO `copies` VALUES ('10', '0005888-19', '10', '0005888-19', null, 'available', null, '004/.01/51', null, '2019-02-21', '2019-03-08 09:43:43', '2019-11-27 10:37:48', '6', '8', '1');
INSERT INTO `copies` VALUES ('11', '0005875-19', '11', '0005875-19', null, 'unavailable', null, '005.1 K8119 2017', null, '2019-02-22', '2019-03-08 09:52:13', '2019-11-28 14:41:32', '8', '1', '1');
INSERT INTO `copies` VALUES ('12', '0005885-12', '12', '0005885-12', null, 'available', null, '005.133 F2471 2017', null, '2019-02-21', '2019-03-08 10:02:24', '2019-03-08 10:02:24', '10', '8', '1');
INSERT INTO `copies` VALUES ('13', '0005882-19', '13', '0005882-19', null, 'available', null, '006.31 G3196 2017', null, '2019-02-21', '2019-03-08 10:24:44', '2019-03-08 10:24:44', '5', '8', '1');
INSERT INTO `copies` VALUES ('14', '0005878-19', '14', '0005878-19', null, 'available', null, '006.31 T3424 2017', null, '2019-02-21', '2019-03-08 10:34:43', '2019-03-08 10:34:43', '3', '8', '1');
INSERT INTO `copies` VALUES ('15', '0005876-19', '15', '0005876-19', null, 'available', null, '621.3815 N654 2015', null, '2019-02-21', '2019-03-08 10:40:23', '2019-03-08 10:40:23', '6', '8', '1');
INSERT INTO `copies` VALUES ('16', '0005877-19', '16', '0005877-19', null, 'available', null, '005.1 Si647 2018', null, '2019-02-21', '2019-03-08 10:45:17', '2019-03-08 10:45:17', '4', '8', '1');
INSERT INTO `copies` VALUES ('17', '0005880-19', '17', '0005880-19', null, 'available', null, '006.31 Sl16', null, '2019-02-21', '2019-03-08 10:49:51', '2019-03-08 10:49:51', '4', '8', '1');

-- ----------------------------
-- Table structure for expiration_history
-- ----------------------------
DROP TABLE IF EXISTS `expiration_history`;
CREATE TABLE `expiration_history` (
  `expiration_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patron_id` int(10) DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`expiration_id`),
  KEY `patron_id` (`patron_id`) USING BTREE,
  CONSTRAINT `expiration_history_ibfk_1` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of expiration_history
-- ----------------------------
INSERT INTO `expiration_history` VALUES ('28', '188', '2017-10-29 13:48:12', '2017-07-10 13:48:13', '2017-07-10 13:48:13');
INSERT INTO `expiration_history` VALUES ('29', '189', '2017-10-29 13:52:38', '2017-07-10 13:52:38', '2017-07-10 13:52:38');
INSERT INTO `expiration_history` VALUES ('30', '190', '2017-10-29 13:54:17', '2017-07-10 13:54:17', '2017-07-10 13:54:17');
INSERT INTO `expiration_history` VALUES ('44', '204', '2017-10-29 14:55:41', '2017-07-11 14:55:41', '2017-07-11 14:55:41');
INSERT INTO `expiration_history` VALUES ('45', '205', '2017-10-29 15:07:15', '2017-07-11 15:07:15', '2017-07-11 15:07:15');
INSERT INTO `expiration_history` VALUES ('46', '206', '2017-10-29 15:08:51', '2017-07-11 15:08:51', '2017-07-11 15:08:51');
INSERT INTO `expiration_history` VALUES ('52', '212', '2017-10-29 08:25:02', '2017-07-13 08:25:02', '2017-07-13 08:25:02');
INSERT INTO `expiration_history` VALUES ('53', '213', '2017-10-29 08:26:30', '2017-07-13 08:26:30', '2017-07-13 08:26:30');
INSERT INTO `expiration_history` VALUES ('54', '214', '2017-10-29 08:26:32', '2017-07-13 08:26:32', '2017-07-13 08:26:32');
INSERT INTO `expiration_history` VALUES ('55', '215', '2017-10-29 08:26:34', '2017-07-13 08:26:35', '2017-07-13 08:26:35');
INSERT INTO `expiration_history` VALUES ('56', '188', '2017-10-29 16:40:41', '2017-09-04 09:51:22', '2017-09-04 09:51:22');
INSERT INTO `expiration_history` VALUES ('57', '216', '2017-10-29 08:57:22', '2017-08-07 08:57:22', '2017-08-07 08:57:22');
INSERT INTO `expiration_history` VALUES ('58', '217', '2017-10-29 15:17:26', '2017-08-15 15:17:26', '2017-08-15 15:17:26');
INSERT INTO `expiration_history` VALUES ('59', '218', '2017-10-29 15:17:28', '2017-08-15 15:17:28', '2017-08-15 15:17:28');
INSERT INTO `expiration_history` VALUES ('60', '219', '2017-10-29 15:17:31', '2017-08-15 15:17:31', '2017-08-15 15:17:31');
INSERT INTO `expiration_history` VALUES ('61', '220', '2017-10-29 15:17:33', '2017-08-15 15:17:34', '2017-08-15 15:17:34');
INSERT INTO `expiration_history` VALUES ('62', '221', '2017-10-29 15:17:37', '2017-08-15 15:17:38', '2017-08-15 15:17:38');
INSERT INTO `expiration_history` VALUES ('63', '222', '2017-10-29 15:17:40', '2017-08-15 15:17:40', '2017-08-15 15:17:40');
INSERT INTO `expiration_history` VALUES ('64', '223', '2017-10-29 15:17:44', '2017-08-15 15:17:44', '2017-08-15 15:17:44');
INSERT INTO `expiration_history` VALUES ('65', '224', '2017-10-29 15:17:46', '2017-08-15 15:17:46', '2017-08-15 15:17:46');
INSERT INTO `expiration_history` VALUES ('66', '225', '2017-10-29 15:17:48', '2017-08-15 15:17:48', '2017-08-15 15:17:48');
INSERT INTO `expiration_history` VALUES ('67', '226', '2017-10-29 15:17:53', '2017-08-15 15:17:53', '2017-08-15 15:17:53');
INSERT INTO `expiration_history` VALUES ('68', '227', '2017-10-29 15:17:54', '2017-08-15 15:17:54', '2017-08-15 15:17:54');
INSERT INTO `expiration_history` VALUES ('69', '228', '2017-10-29 15:17:56', '2017-08-15 15:17:56', '2017-08-15 15:17:56');
INSERT INTO `expiration_history` VALUES ('70', '188', '2017-10-29 09:37:14', '2017-09-04 09:51:20', '2017-09-04 09:51:20');
INSERT INTO `expiration_history` VALUES ('71', '188', '2017-10-29 09:46:54', '2017-09-04 09:51:20', '2017-09-04 09:51:20');
INSERT INTO `expiration_history` VALUES ('72', '188', '2017-10-29 09:48:06', '2017-09-04 09:51:20', '2017-09-04 09:51:20');
INSERT INTO `expiration_history` VALUES ('73', '188', '2017-10-29 09:51:10', '2017-09-04 09:51:10', '2017-09-04 09:51:10');
INSERT INTO `expiration_history` VALUES ('74', '229', '2017-10-29 16:58:46', '2017-09-06 16:58:46', '2017-09-06 16:58:46');
INSERT INTO `expiration_history` VALUES ('75', '230', '2017-10-29 10:11:04', '2017-09-11 10:11:04', '2017-09-11 10:11:04');
INSERT INTO `expiration_history` VALUES ('76', '189', '2017-10-29 09:01:10', '2017-09-12 09:01:10', '2017-09-12 09:01:10');
INSERT INTO `expiration_history` VALUES ('77', '231', '2017-10-29 14:25:52', '2017-09-12 14:25:52', '2017-09-12 14:25:52');
INSERT INTO `expiration_history` VALUES ('78', '232', '2017-10-29 10:26:23', '2017-09-26 10:26:24', '2017-09-26 10:26:24');
INSERT INTO `expiration_history` VALUES ('79', '189', '2017-10-29 08:58:37', '2017-11-02 08:58:37', '2017-11-02 08:58:37');
INSERT INTO `expiration_history` VALUES ('80', '213', '2017-10-29 13:34:41', '2017-11-02 13:34:41', '2017-11-02 13:34:41');
INSERT INTO `expiration_history` VALUES ('81', '205', '2017-10-29 14:53:14', '2017-11-08 14:53:14', '2017-11-08 14:53:14');
INSERT INTO `expiration_history` VALUES ('82', '231', '2017-10-29 14:25:52', '2017-09-12 14:25:52', '2017-09-12 14:25:52');
INSERT INTO `expiration_history` VALUES ('83', '232', '2017-10-29 10:26:23', '2017-09-26 10:26:24', '2017-09-26 10:26:24');
INSERT INTO `expiration_history` VALUES ('84', '189', '2017-10-29 08:58:37', '2017-11-02 08:58:37', '2017-11-02 08:58:37');
INSERT INTO `expiration_history` VALUES ('85', '213', '2017-10-29 13:34:41', '2017-11-02 13:34:41', '2017-11-02 13:34:41');
INSERT INTO `expiration_history` VALUES ('86', '205', '2017-10-29 14:53:14', '2017-11-08 14:53:14', '2017-11-08 14:53:14');
INSERT INTO `expiration_history` VALUES ('87', '231', '2017-10-29 14:25:52', '2017-09-12 14:25:52', '2017-09-12 14:25:52');
INSERT INTO `expiration_history` VALUES ('88', '232', '2017-10-29 10:26:23', '2017-09-26 10:26:24', '2017-09-26 10:26:24');
INSERT INTO `expiration_history` VALUES ('89', '189', '2017-10-29 08:58:37', '2017-11-02 08:58:37', '2017-11-02 08:58:37');
INSERT INTO `expiration_history` VALUES ('90', '213', '2017-10-29 13:34:41', '2017-11-02 13:34:41', '2017-11-02 13:34:41');
INSERT INTO `expiration_history` VALUES ('91', '205', '2017-10-29 14:53:14', '2017-11-08 14:53:14', '2017-11-08 14:53:14');
INSERT INTO `expiration_history` VALUES ('92', '204', '2018-10-29 13:09:25', '2018-01-16 13:09:25', '2018-01-16 13:09:25');
INSERT INTO `expiration_history` VALUES ('93', '189', '2018-10-29 10:28:59', '2018-04-16 10:29:00', '2018-04-16 10:29:00');
INSERT INTO `expiration_history` VALUES ('94', '233', null, '2018-05-09 10:51:54', '2018-05-09 10:51:54');
INSERT INTO `expiration_history` VALUES ('95', '189', '2019-10-29 08:56:51', '2019-11-26 08:56:51', '2019-11-26 08:56:51');
INSERT INTO `expiration_history` VALUES ('108', '188', '2019-10-29 14:45:47', '2019-11-26 14:45:47', '2019-11-26 14:45:47');

-- ----------------------------
-- Table structure for e_resources
-- ----------------------------
DROP TABLE IF EXISTS `e_resources`;
CREATE TABLE `e_resources` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `edition` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of e_resources
-- ----------------------------
INSERT INTO `e_resources` VALUES ('30', 'CHAPTER 3', 'CHAPTER #', 'docx', 'CHAPTER FOR UNITY', '2018-02-08 10:25:41', '2018-02-08 10:25:41');
INSERT INTO `e_resources` VALUES ('51', 'TIMELINE', 'TIME-LINE', 'xlsx', 'TIMELINE', '2018-02-09 13:43:56', '2018-02-09 13:43:56');
INSERT INTO `e_resources` VALUES ('52', 'TRANSMISSION', '2nd EDITION', 'pdf', 'sample', '2018-02-09 13:52:58', '2018-02-09 13:52:58');
INSERT INTO `e_resources` VALUES ('53', 'POWER POINT', 'PPT', 'pptx', '   Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate fuga accusantium laboriosam doloribus voluptates, est placeat repudiandae. Aut placeat delectus necessitatibus reprehenderit quis maiores magni, velit nam, quisquam, obcaecati rem?\r\n				     	 	 ', '2018-02-09 14:01:12', '2018-02-09 14:02:13');

-- ----------------------------
-- Table structure for field_value
-- ----------------------------
DROP TABLE IF EXISTS `field_value`;
CREATE TABLE `field_value` (
  `field_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(10) unsigned DEFAULT NULL,
  `catalogue_id` int(10) unsigned DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`field_id`),
  KEY `field_value_idfk_marc_id` (`id`),
  KEY `field_value_idfk_catalogue_id` (`catalogue_id`),
  CONSTRAINT `field_value_idfk_catalogue_id` FOREIGN KEY (`catalogue_id`) REFERENCES `catalogue_record` (`catalogue_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `field_value_idfk_marc_id` FOREIGN KEY (`id`) REFERENCES `marc_tag_structure` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1425 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of field_value
-- ----------------------------
INSERT INTO `field_value` VALUES ('98', '14', '5', '_a978-1977509208_c_z', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('99', '15', '5', '_aDos Reis, Anthony J._b_c_q_d', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('100', '16', '5', '_aWriting interpreters and compilers for raspberry Pi using python_p_basd_casd', '2019-03-07 14:02:13', '2019-11-21 13:49:03');
INSERT INTO `field_value` VALUES ('101', '17', '5', '_aasd', '2019-03-07 14:02:13', '2019-11-21 13:49:03');
INSERT INTO `field_value` VALUES ('102', '18', '5', '_a[s.l.]._bAnthony J. Dos Reis_c', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('103', '19', '5', '_aX, 225 p._bIllustrations_c_e', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('104', '20', '5', '_a_vasd', '2019-03-07 14:02:13', '2019-11-21 13:49:03');
INSERT INTO `field_value` VALUES ('105', '21', '5', '_a_c_D', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('106', '22', '5', '_a_n_d_c ', '2019-03-07 14:02:13', '2019-11-18 14:18:12');
INSERT INTO `field_value` VALUES ('107', '23', '5', '_a_p_l_s_f', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('108', '24', '5', '_a_l_f', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('109', '25', '5', '_a', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('110', '26', '5', '_aText_2Rdacontent', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('111', '27', '5', '_aUnmediated_2Rdamedia', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('112', '28', '5', '_aVolume_2Rdacarrier', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('113', '29', '5', '_aasd_vasd', '2019-03-07 14:02:13', '2019-11-18 09:25:12');
INSERT INTO `field_value` VALUES ('114', '30', '5', '_a', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('115', '31', '5', '_a', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('116', '32', '5', '_a', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('117', '33', '5', '_a', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('118', '34', '5', '_a_B', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('119', '35', '5', '_a', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('120', '36', '5', '_P_C_T', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('121', '37', '5', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-07 14:02:13', '2019-03-07 14:02:13');
INSERT INTO `field_value` VALUES ('122', '38', '5', '_A_B_V_X_Y_Z_2', '2019-03-07 14:02:14', '2019-03-07 14:02:14');
INSERT INTO `field_value` VALUES ('123', '39', '5', '_ARaspberry Pi (computer)_V_X_Y_Z_2', '2019-03-07 14:02:14', '2019-03-07 14:02:14');
INSERT INTO `field_value` VALUES ('124', '40', '5', '_A_V_X_Y_Z_2', '2019-03-07 14:02:14', '2019-03-07 14:02:14');
INSERT INTO `field_value` VALUES ('125', '41', '5', '_A_b_C_Q_d_E_4', '2019-03-07 14:02:14', '2019-03-07 14:02:14');
INSERT INTO `field_value` VALUES ('126', '42', '5', '_A_B', '2019-03-07 14:02:14', '2019-03-07 14:02:14');
INSERT INTO `field_value` VALUES ('127', '43', '5', '_A_B_C_Q_D_T_V', '2019-03-07 14:02:14', '2019-03-07 14:02:14');
INSERT INTO `field_value` VALUES ('188', '14', '8', '_a978-284-07040-8_c_z', '2019-03-07 14:46:55', '2019-03-07 14:46:55');
INSERT INTO `field_value` VALUES ('189', '15', '8', '_aHein, James L._b_c_q_d', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('190', '16', '8', '_aDiscrete structures, logic and computability_p_b_c', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('191', '17', '8', '_aFourth edition', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('192', '18', '8', '_aBurlington, MA:_bJones & Bartlett Learning,_c2017', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('193', '19', '8', '_aXiv, 1035 p._bIllustrations_c_e', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('194', '20', '8', '_a_v', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('195', '21', '8', '_a_c_D', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('196', '22', '8', '_a_n_d_c', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('197', '23', '8', '_a_p_l_s_f', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('198', '24', '8', '_a_l_f', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('199', '25', '8', '_a', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('200', '26', '8', '_aText_2Rdacontent', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('201', '27', '8', '_aUnmediated_2Rdamedia', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('202', '28', '8', '_aVolume_2Rdacarrier', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('203', '29', '8', '_a_v', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('204', '30', '8', '_aIncludes bibliographical references and index.', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('205', '31', '8', '_a', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('206', '32', '8', '_a', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('207', '33', '8', '_a', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('208', '34', '8', '_a_B', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('209', '35', '8', '_a', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('210', '36', '8', '_P_C_T', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('211', '37', '8', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('212', '38', '8', '_A_B_V_X_Y_Z_2', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('213', '39', '8', '_AComputer science--mathematics_V_X_Y_Z_2', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('214', '40', '8', '_A_V_X_Y_Z_2', '2019-03-07 14:46:56', '2019-03-07 14:46:56');
INSERT INTO `field_value` VALUES ('215', '41', '8', '_A_b_C_Q_d_E_4', '2019-03-07 14:46:57', '2019-03-07 14:46:57');
INSERT INTO `field_value` VALUES ('216', '42', '8', '_A_B', '2019-03-07 14:46:57', '2019-03-07 14:46:57');
INSERT INTO `field_value` VALUES ('217', '43', '8', '_A_B_C_Q_D_T_V', '2019-03-07 14:46:57', '2019-03-07 14:46:57');
INSERT INTO `field_value` VALUES ('248', '14', '10', '_a978-1-105-55929-7_c_z', '2019-03-08 09:42:23', '2019-03-08 09:42:23');
INSERT INTO `field_value` VALUES ('249', '15', '10', '_aLevasseur, Ken_b_c_q_d', '2019-03-08 09:42:23', '2019-03-08 09:42:23');
INSERT INTO `field_value` VALUES ('250', '16', '10', '_aApplied discrete structures_p_bFull version_cVersion 3.3', '2019-03-08 09:42:23', '2019-03-08 09:42:23');
INSERT INTO `field_value` VALUES ('251', '17', '10', '_aThird edition', '2019-03-08 09:42:23', '2019-03-08 09:42:23');
INSERT INTO `field_value` VALUES ('252', '18', '10', '_aMassachusetts_bUniversity of Massachusetts Lowell_c2017', '2019-03-08 09:42:23', '2019-03-08 09:42:23');
INSERT INTO `field_value` VALUES ('253', '19', '10', '_aXxiv, 563 p._bIllustrations_c_e', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('254', '20', '10', '_a_v2', '2019-03-08 09:42:24', '2019-11-21 14:12:19');
INSERT INTO `field_value` VALUES ('255', '21', '10', '_a_c_D', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('256', '22', '10', '_a_n_d_c', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('257', '23', '10', '_a_p_l_s_f', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('258', '24', '10', '_a_l_f', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('259', '25', '10', '_a', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('260', '26', '10', '_aText_2Rdacontent', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('261', '27', '10', '_aUnmediated_2Rdamedia', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('262', '28', '10', '_aVolume_2Rdacarrier', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('263', '29', '10', '_a_v', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('264', '30', '10', '_aIncludes index', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('265', '31', '10', '_a', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('266', '32', '10', '_a', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('267', '33', '10', '_a', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('268', '34', '10', '_a_B', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('269', '35', '10', '_a', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('270', '36', '10', '_P_C_T', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('271', '37', '10', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('272', '38', '10', '_A_B_V_X_Y_Z_2', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('273', '39', '10', '_AComputer science--mathematics_V_X_Y_Z_2', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('274', '40', '10', '_A_V_X_Y_Z_2', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('275', '41', '10', '_A_b_C_Q_d_E_4', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('276', '42', '10', '_A_B', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('277', '43', '10', '_A_B_C_Q_D_T_V', '2019-03-08 09:42:24', '2019-03-08 09:42:24');
INSERT INTO `field_value` VALUES ('278', '14', '11', '_a978-3-3330-65308-5_c_z', '2019-03-08 09:50:47', '2019-03-08 09:50:47');
INSERT INTO `field_value` VALUES ('279', '15', '11', '_aKochkarev, Bagram_b_c_q_d', '2019-03-08 09:50:47', '2019-03-08 09:50:47');
INSERT INTO `field_value` VALUES ('280', '16', '11', '_aComplexity of algorithms_p_bAnd their applications to different areas of mathematics_c', '2019-03-08 09:50:47', '2019-03-08 09:50:47');
INSERT INTO `field_value` VALUES ('281', '17', '11', '_a123', '2019-03-08 09:50:47', '2019-11-21 14:14:06');
INSERT INTO `field_value` VALUES ('282', '18', '11', '_aMoldova_bScholar\'s Press_c2017', '2019-03-08 09:50:47', '2019-03-08 09:50:47');
INSERT INTO `field_value` VALUES ('283', '19', '11', '_a42 p._b_c_e', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('284', '20', '11', '_a_v1232', '2019-03-08 09:50:48', '2019-11-21 14:14:07');
INSERT INTO `field_value` VALUES ('285', '21', '11', '_a_c_D', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('286', '22', '11', '_a_n_d_c', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('287', '23', '11', '_a_p_l_s_f', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('288', '24', '11', '_a_l_f', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('289', '25', '11', '_a', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('290', '26', '11', '_aText_2Rdacontent', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('291', '27', '11', '_aUnmediated_2Rdamedia', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('292', '28', '11', '_aVolume._2Rdacarrier', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('293', '29', '11', '_a_v', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('294', '30', '11', '_a', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('295', '31', '11', '_a', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('296', '32', '11', '_a', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('297', '33', '11', '_a', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('298', '34', '11', '_a_B', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('299', '35', '11', '_a', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('300', '36', '11', '_P_C_T', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('301', '37', '11', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('302', '38', '11', '_A_B_V_X_Y_Z_2', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('303', '39', '11', '_AComputer algorithms_V_X_Y_Z_2', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('304', '40', '11', '_A_V_X_Y_Z_2', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('305', '41', '11', '_A_b_C_Q_d_E_4', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('306', '42', '11', '_A_B', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('307', '43', '11', '_A_B_C_Q_D_T_V', '2019-03-08 09:50:48', '2019-03-08 09:50:48');
INSERT INTO `field_value` VALUES ('308', '14', '12', '_a978-1-337-10210-0_c_z', '2019-03-08 10:01:11', '2019-11-22 10:41:16');
INSERT INTO `field_value` VALUES ('309', '15', '12', '_aFarrel, Joyce_b_c_q_d', '2019-03-08 10:01:11', '2019-11-22 10:41:16');
INSERT INTO `field_value` VALUES ('310', '16', '12', '_aMicrosoft visual c#_p_bAn introduction to object-oriented programming_c', '2019-03-08 10:01:11', '2019-11-22 10:41:16');
INSERT INTO `field_value` VALUES ('311', '17', '12', '_aSeventh edition', '2019-03-08 10:01:11', '2019-11-22 10:41:16');
INSERT INTO `field_value` VALUES ('312', '18', '12', '_aClifton Park, New York:_bCengage Learning_c2017', '2019-03-08 10:01:11', '2019-11-22 10:41:16');
INSERT INTO `field_value` VALUES ('313', '19', '12', '_aXxv, 758 p._bIllustrations_c_e', '2019-03-08 10:01:11', '2019-11-22 10:41:16');
INSERT INTO `field_value` VALUES ('314', '20', '12', '_a_v5', '2019-03-08 10:01:11', '2019-11-22 10:41:16');
INSERT INTO `field_value` VALUES ('315', '21', '12', '_a_c_D', '2019-03-08 10:01:11', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('316', '22', '12', '_a_n_d_c', '2019-03-08 10:01:11', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('317', '23', '12', '_a_p_l_s_f', '2019-03-08 10:01:11', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('318', '24', '12', '_a_l_f', '2019-03-08 10:01:11', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('319', '25', '12', '_a', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('320', '26', '12', '_aText_2Rdacontent', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('321', '27', '12', '_aUnmediated_2Rdamedia', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('322', '28', '12', '_aVolume_2Rdacarrier', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('323', '29', '12', '_a_v24', '2019-03-08 10:01:12', '2019-11-22 11:32:25');
INSERT INTO `field_value` VALUES ('324', '30', '12', '_a', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('325', '31', '12', '_a', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('326', '32', '12', '_a', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('327', '33', '12', '_a', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('328', '34', '12', '_a_B', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('329', '35', '12', '_a', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('330', '36', '12', '_P_C_T', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('331', '37', '12', '_AWOW_B_C_Q_D_T_V_X_Y_z_2', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('332', '38', '12', '_A_B_V_X_Y_Z_2', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('333', '39', '12', '_AC# (Computer program language)_V_X_Y_Z_2', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('334', '40', '12', '_A_V_X_Y_Z_2', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('335', '41', '12', '_A_b_C_Q_d_E_4', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('336', '42', '12', '_A_B', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('337', '43', '12', '_A_B_C_Q_D_T_V5', '2019-03-08 10:01:12', '2019-11-22 10:41:17');
INSERT INTO `field_value` VALUES ('338', '14', '13', '_a978-149-1962-2_c_z', '2019-03-08 10:23:36', '2019-03-08 10:23:36');
INSERT INTO `field_value` VALUES ('339', '15', '13', '_aGeron, Aurelien_b_c_q_d', '2019-03-08 10:23:36', '2019-03-08 10:23:36');
INSERT INTO `field_value` VALUES ('340', '16', '13', '_aHands-on machine learning with scikit-learn and tensorflow_p_bConcepts, tools and techniques to build intelligent systems_c', '2019-03-08 10:23:36', '2019-03-08 10:23:36');
INSERT INTO `field_value` VALUES ('341', '17', '13', '_aFirst edition', '2019-03-08 10:23:36', '2019-03-08 10:23:36');
INSERT INTO `field_value` VALUES ('342', '18', '13', '_aBeijing_bO\'reilly_c2017', '2019-03-08 10:23:36', '2019-03-08 10:23:36');
INSERT INTO `field_value` VALUES ('343', '19', '13', '_aXx, 543 p._bIllustrations (black and white)_c24 cm_e', '2019-03-08 10:23:36', '2019-03-08 10:23:36');
INSERT INTO `field_value` VALUES ('344', '20', '13', '_a_vVOL NUMBER', '2019-03-08 10:23:36', '2019-11-22 11:06:26');
INSERT INTO `field_value` VALUES ('345', '21', '13', '_a_c_D', '2019-03-08 10:23:36', '2019-03-08 10:23:36');
INSERT INTO `field_value` VALUES ('346', '22', '13', '_a_n_d_c', '2019-03-08 10:23:36', '2019-03-08 10:23:36');
INSERT INTO `field_value` VALUES ('347', '23', '13', '_a_p_l_s_f', '2019-03-08 10:23:36', '2019-03-08 10:23:36');
INSERT INTO `field_value` VALUES ('348', '24', '13', '_a_l_f', '2019-03-08 10:23:36', '2019-03-08 10:23:36');
INSERT INTO `field_value` VALUES ('349', '25', '13', '_a', '2019-03-08 10:23:36', '2019-03-08 10:23:36');
INSERT INTO `field_value` VALUES ('350', '26', '13', '_aText_2Rdacontent', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('351', '27', '13', '_aUnmediated_2Rdamedia', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('352', '28', '13', '_aVolume_2Rdacarrier', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('353', '29', '13', '_a_vVOL NUMBER', '2019-03-08 10:23:37', '2019-11-22 11:38:57');
INSERT INTO `field_value` VALUES ('354', '30', '13', '_aIncludes bibliographical references and index', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('355', '31', '13', '_a', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('356', '32', '13', '_a', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('357', '33', '13', '_a', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('358', '34', '13', '_a_B', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('359', '35', '13', '_a', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('360', '36', '13', '_P_C_T', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('361', '37', '13', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('362', '38', '13', '_A_B_V_X_Y_Z_2', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('363', '39', '13', '_AMachine learning_V_X_Y_Z_2', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('364', '40', '13', '_A_V_X_Y_Z_2', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('365', '41', '13', '_A_b_C_Q_d_E_4', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('366', '42', '13', '_A_B', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('367', '43', '13', '_A_B_C_Q_D_T_V', '2019-03-08 10:23:37', '2019-03-08 10:23:37');
INSERT INTO `field_value` VALUES ('368', '14', '14', '_a978-15-4961-721-8_c_z', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('369', '15', '14', '_aTheobald, Oliver_b_c_q_d', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('370', '16', '14', '_aMachine learning_p_bFor absolute beginners_c', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('371', '17', '14', '_aSecond edition', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('372', '18', '14', '_a[s.l]._bOliver Theobald_c2017', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('373', '19', '14', '_a165 p._bIllustrations_c_e', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('374', '20', '14', '_a_v', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('375', '21', '14', '_a_c_D', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('376', '22', '14', '_a_n_d_c', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('377', '23', '14', '_a_p_l_s_f', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('378', '24', '14', '_a_l_f', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('379', '25', '14', '_a', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('380', '26', '14', '_aText_2Rdacontent', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('381', '27', '14', '_aUnmediated_2Rdamedia', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('382', '28', '14', '_aVolume_2Rdacarrier', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('383', '29', '14', '_a_v', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('384', '30', '14', '_a', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('385', '31', '14', '_a', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('386', '32', '14', '_a', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('387', '33', '14', '_a', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('388', '34', '14', '_a_B', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('389', '35', '14', '_a', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('390', '36', '14', '_P_C_T', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('391', '37', '14', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('392', '38', '14', '_A_B_V_X_Y_Z_2', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('393', '39', '14', '_AMachine learning_V_X_Y_Z_2', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('394', '40', '14', '_A_V_X_Y_Z_2', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('395', '41', '14', '_A_b_C_Q_d_E_4', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('396', '42', '14', '_A_B', '2019-03-08 10:33:28', '2019-03-08 10:33:28');
INSERT INTO `field_value` VALUES ('397', '43', '14', '_A_B_C_Q_D_T_V', '2019-03-08 10:33:29', '2019-03-08 10:33:29');
INSERT INTO `field_value` VALUES ('398', '14', '15', '_a978-1-78326-489-6_c_z', '2019-03-08 10:39:12', '2019-03-08 10:39:12');
INSERT INTO `field_value` VALUES ('399', '15', '15', '_aNixon, Mark_b_c_q_d', '2019-03-08 10:39:12', '2019-03-08 10:39:12');
INSERT INTO `field_value` VALUES ('400', '16', '15', '_aDigital electronics_p_bA primer- introductory logic circuit design_c', '2019-03-08 10:39:12', '2019-03-08 10:39:12');
INSERT INTO `field_value` VALUES ('401', '17', '15', '_a', '2019-03-08 10:39:12', '2019-03-08 10:39:12');
INSERT INTO `field_value` VALUES ('402', '18', '15', '_aLondon_bImperial College Press_c2015', '2019-03-08 10:39:12', '2019-03-08 10:39:12');
INSERT INTO `field_value` VALUES ('403', '19', '15', '_aXi, 222 p._bIllustrations_c24_e', '2019-03-08 10:39:12', '2019-03-08 10:39:12');
INSERT INTO `field_value` VALUES ('404', '20', '15', '_a_v', '2019-03-08 10:39:12', '2019-03-08 10:39:12');
INSERT INTO `field_value` VALUES ('405', '21', '15', '_a_c_D', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('406', '22', '15', '_a_n_d_c', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('407', '23', '15', '_a_p_l_s_f', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('408', '24', '15', '_a_l_f', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('409', '25', '15', '_a', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('410', '26', '15', '_aText_2Rdacontent', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('411', '27', '15', '_aUnmediated_2Rdamedia', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('412', '28', '15', '_aVolume_2Rdacarrier', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('413', '29', '15', '_aICP primers in electronics and computer science_v', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('414', '30', '15', '_aIncludes bibliographical references and index', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('415', '31', '15', '_a', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('416', '32', '15', '_a', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('417', '33', '15', '_a', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('418', '34', '15', '_a_B', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('419', '35', '15', '_a', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('420', '36', '15', '_P_C_T', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('421', '37', '15', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('422', '38', '15', '_A_B_V_X_Y_Z_2', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('423', '39', '15', '_ADigital electronics_V_X_Y_Z_2', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('424', '40', '15', '_A_V_X_Y_Z_2', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('425', '41', '15', '_A_b_C_Q_d_E_4', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('426', '42', '15', '_A_B', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('427', '43', '15', '_A_B_C_Q_D_T_V', '2019-03-08 10:39:13', '2019-03-08 10:39:13');
INSERT INTO `field_value` VALUES ('428', '14', '16', '_a978-93-8655-189-4_c_z', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('429', '15', '16', '_aSinghal, Shefali_b_c_q_d', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('430', '16', '16', '_aAnalysis and design of algorithms_p_bA beginner\'s hope_c', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('431', '17', '16', '_aFirst edition', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('432', '18', '16', '_aMumbai, India_bBPB Publications_c', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('433', '19', '16', '_aViii, 212 p._bIllustrations_c_e', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('434', '20', '16', '_a_v', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('435', '21', '16', '_a_c_D', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('436', '22', '16', '_a_n_d_c', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('437', '23', '16', '_a_p_l_s_f', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('438', '24', '16', '_a_l_f', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('439', '25', '16', '_a', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('440', '26', '16', '_aText_2Rdacontent', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('441', '27', '16', '_aUnmediated_2Rdamedia', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('442', '28', '16', '_aVolume_2Rdacarrier', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('443', '29', '16', '_a_v', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('444', '30', '16', '_a', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('445', '31', '16', '_a', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('446', '32', '16', '_a', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('447', '33', '16', '_a', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('448', '34', '16', '_a_B', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('449', '35', '16', '_a', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('450', '36', '16', '_P_C_T', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('451', '37', '16', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('452', '38', '16', '_A_B_V_X_Y_Z_2', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('453', '39', '16', '_AAlgorithms_V_X_Y_Z_2', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('454', '40', '16', '_A_V_X_Y_Z_2', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('455', '41', '16', '_A_b_C_Q_d_E_4', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('456', '42', '16', '_A_B', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('457', '43', '16', '_A_B_C_Q_D_T_V', '2019-03-08 10:44:14', '2019-03-08 10:44:14');
INSERT INTO `field_value` VALUES ('458', '14', '17', '_a1234511_c_z', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('459', '15', '17', '_aSlavio, John_b_c_q_d', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('460', '16', '17', '_aMachine learning for beginners:_p_bAn introduction to artificial intelligence and machine learning_c', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('461', '17', '17', '_a', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('462', '18', '17', '_aUnited States of America_b[s.n.]._c2018', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('463', '19', '17', '_a73 p._bIllustrations_c_e', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('464', '20', '17', '_a_v', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('465', '21', '17', '_a_c_D', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('466', '22', '17', '_a_n_d_c', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('467', '23', '17', '_a_p_l_s_f', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('468', '24', '17', '_a_l_f', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('469', '25', '17', '_a', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('470', '26', '17', '_aText_2Rdacontent', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('471', '27', '17', '_aUnmediated_2Rdamedia', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('472', '28', '17', '_aVolume_2Rdacarrier', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('473', '29', '17', '_a_v', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('474', '30', '17', '_a', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('475', '31', '17', '_a', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('476', '32', '17', '_a', '2019-03-08 10:48:26', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('477', '33', '17', '_a', '2019-03-08 10:48:27', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('478', '34', '17', '_a_B', '2019-03-08 10:48:27', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('479', '35', '17', '_a', '2019-03-08 10:48:27', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('480', '36', '17', '_P_C_T', '2019-03-08 10:48:27', '2019-11-21 14:35:01');
INSERT INTO `field_value` VALUES ('481', '37', '17', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-08 10:48:27', '2019-11-21 14:35:02');
INSERT INTO `field_value` VALUES ('482', '38', '17', '_A_B_V_X_Y_Z_2', '2019-03-08 10:48:27', '2019-11-21 14:35:02');
INSERT INTO `field_value` VALUES ('483', '39', '17', '_AMachine learning_V_X_Y_Z_2', '2019-03-08 10:48:27', '2019-11-21 14:35:02');
INSERT INTO `field_value` VALUES ('484', '40', '17', '_A_V_X_Y_Z_2', '2019-03-08 10:48:27', '2019-11-21 14:35:02');
INSERT INTO `field_value` VALUES ('485', '41', '17', '_A_b_C_Q_d_E_4', '2019-03-08 10:48:27', '2019-11-21 14:35:02');
INSERT INTO `field_value` VALUES ('486', '42', '17', '_A_B', '2019-03-08 10:48:27', '2019-11-21 14:35:02');
INSERT INTO `field_value` VALUES ('487', '43', '17', '_A_B_C_Q_D_T_V', '2019-03-08 10:48:27', '2019-11-21 14:35:02');
INSERT INTO `field_value` VALUES ('488', '14', '18', '_a978-93-5115-457-0_c_z', '2019-03-18 10:10:58', '2019-11-04 16:46:36');
INSERT INTO `field_value` VALUES ('489', '15', '18', '_a_b_c_q_d', '2019-03-18 10:10:58', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('490', '16', '18', '_aAdvertising And Sales Management_p_b_c', '2019-03-18 10:10:58', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('491', '17', '18', '_a', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('492', '18', '18', '_a[s.l]._b3G Elearning_c2015', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('493', '19', '18', '_aVii, 258 p._bIllustrations_c_e', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('494', '20', '18', '_a_v', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('495', '21', '18', '_a_c_D', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('496', '22', '18', '_a_n_d_c', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('497', '23', '18', '_a_p_l_s_f', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('498', '24', '18', '_a_l_f', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('499', '25', '18', '_a', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('500', '26', '18', '_aText_2Rdacontent', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('501', '27', '18', '_aUnmediated_2Rdamedia', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('502', '28', '18', '_aVolume_2Rdacarrier', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('503', '29', '18', '_a_v', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('504', '30', '18', '_a', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('505', '31', '18', '_a', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('506', '32', '18', '_a', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('507', '33', '18', '_a', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('508', '34', '18', '_a_B', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('509', '35', '18', '_a', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('510', '36', '18', '_P_C_T', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('511', '37', '18', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('512', '38', '18', '_A_B_V_X_Y_Z_2', '2019-03-18 10:10:59', '2019-11-04 16:46:37');
INSERT INTO `field_value` VALUES ('513', '39', '18', '_A_V_X_Y_Z_2', '2019-03-18 10:10:59', '2019-11-04 16:46:38');
INSERT INTO `field_value` VALUES ('514', '40', '18', '_A_V_X_Y_Z_2', '2019-03-18 10:10:59', '2019-11-04 16:46:38');
INSERT INTO `field_value` VALUES ('515', '41', '18', '_A_b_C_Q_d_E_4', '2019-03-18 10:10:59', '2019-11-04 16:46:38');
INSERT INTO `field_value` VALUES ('516', '42', '18', '_A_B', '2019-03-18 10:10:59', '2019-11-04 16:46:38');
INSERT INTO `field_value` VALUES ('517', '43', '18', '_A_B_C_Q_D_T_V', '2019-03-18 10:10:59', '2019-11-04 16:46:38');
INSERT INTO `field_value` VALUES ('518', '14', '19', '_a978-1-119-07633-9_c_z', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('519', '15', '19', '_aBiech, Elaine_b_c_q_d', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('520', '16', '19', '_aTraining and development for dummies_p_b_c', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('521', '17', '19', '_a123123', '2019-03-18 10:16:47', '2019-11-25 16:48:32');
INSERT INTO `field_value` VALUES ('522', '18', '19', '_aNew Jersey_bJohn Wiley & Sons, Inc._c2015', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('523', '19', '19', '_aXiii, 434 p._bIlustrations_c_e', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('524', '20', '19', '_a_v', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('525', '21', '19', '_a_c_D', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('526', '22', '19', '_a_n_d_c', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('527', '23', '19', '_a_p_l_s_f', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('528', '24', '19', '_a_l_f', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('529', '25', '19', '_a', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('530', '26', '19', '_aText_2Rdacontent', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('531', '27', '19', '_aUnmediated_2Rdamedia', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('532', '28', '19', '_aVolume_2Rdacarrier', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('533', '29', '19', '_a_v', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('534', '30', '19', '_aIncludes index', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('535', '31', '19', '_a', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('536', '32', '19', '_a', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('537', '33', '19', '_a', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('538', '34', '19', '_a_B', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('539', '35', '19', '_a', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('540', '36', '19', '_P_C_T', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('541', '37', '19', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('542', '38', '19', '_A_B_V_X_Y_Z_2', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('543', '39', '19', '_A_V_X_Y_Z_2', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('544', '40', '19', '_A_V_X_Y_Z_2', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('545', '41', '19', '_A_b_C_Q_d_E_4', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('546', '42', '19', '_A_B', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('547', '43', '19', '_A_B_C_Q_D_T_V', '2019-03-18 10:16:47', '2019-03-18 10:16:47');
INSERT INTO `field_value` VALUES ('548', '14', '20', '_a978-981-4628-45-7_c_z', '2019-03-18 10:26:27', '2019-03-18 10:26:27');
INSERT INTO `field_value` VALUES ('549', '15', '20', '_aMoriarty, Sandra_b_c_q_d', '2019-03-18 10:26:27', '2019-03-18 10:26:27');
INSERT INTO `field_value` VALUES ('550', '16', '20', '_aAdvertising & IMC _p_bPrinciples & practice_c', '2019-03-18 10:26:27', '2019-03-18 10:26:27');
INSERT INTO `field_value` VALUES ('551', '17', '20', '_a10th edition', '2019-03-18 10:26:27', '2019-03-18 10:26:27');
INSERT INTO `field_value` VALUES ('552', '18', '20', '_aSingapore_bPearson Education South Asia Pte Ltd_c2015', '2019-03-18 10:26:27', '2019-03-18 10:26:27');
INSERT INTO `field_value` VALUES ('553', '19', '20', '_a669 p._bIllustrations_c_e', '2019-03-18 10:26:27', '2019-03-18 10:26:27');
INSERT INTO `field_value` VALUES ('554', '20', '20', '_a_v', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('555', '21', '20', '_a_c_D', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('556', '22', '20', '_a_n_d_c', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('557', '23', '20', '_a_p_l_s_f', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('558', '24', '20', '_a_l_f', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('559', '25', '20', '_a', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('560', '26', '20', '_aText_2Rdacontent', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('561', '27', '20', '_aUnmediated_2Rdamedia', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('562', '28', '20', '_aVolume_2Rdacarrier', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('563', '29', '20', '_a_v', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('564', '30', '20', '_aIncludes index', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('565', '31', '20', '_a', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('566', '32', '20', '_a', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('567', '33', '20', '_a', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('568', '34', '20', '_a_B', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('569', '35', '20', '_a', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('570', '36', '20', '_P_C_T', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('571', '37', '20', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('572', '38', '20', '_A_B_V_X_Y_Z_2', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('573', '39', '20', '_A_V_X_Y_Z_2', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('574', '40', '20', '_A_V_X_Y_Z_2', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('575', '41', '20', '_A_b_C_Q_d_E_4', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('576', '42', '20', '_A_B', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('577', '43', '20', '_A_B_C_Q_D_T_V', '2019-03-18 10:26:28', '2019-03-18 10:26:28');
INSERT INTO `field_value` VALUES ('578', '14', '21', '_a978-1-4522-4223_c_z', '2019-03-18 10:33:04', '2019-03-18 10:33:04');
INSERT INTO `field_value` VALUES ('579', '15', '21', '_aMor Barak, Michalle E._b_c_q_d', '2019-03-18 10:33:04', '2019-03-18 10:33:04');
INSERT INTO `field_value` VALUES ('580', '16', '21', '_aManaging diversity_p_bToward a globally inclusive workplace_c', '2019-03-18 10:33:04', '2019-03-18 10:33:04');
INSERT INTO `field_value` VALUES ('581', '17', '21', '_a3rd edition', '2019-03-18 10:33:04', '2019-03-18 10:33:04');
INSERT INTO `field_value` VALUES ('582', '18', '21', '_aLondon_bSage_c2014', '2019-03-18 10:33:04', '2019-03-18 10:33:04');
INSERT INTO `field_value` VALUES ('583', '19', '21', '_aXiii, 391 p._bIllustrations_c_e', '2019-03-18 10:33:04', '2019-03-18 10:33:04');
INSERT INTO `field_value` VALUES ('584', '20', '21', '_a_v', '2019-03-18 10:33:04', '2019-03-18 10:33:04');
INSERT INTO `field_value` VALUES ('585', '21', '21', '_a_c_D', '2019-03-18 10:33:04', '2019-03-18 10:33:04');
INSERT INTO `field_value` VALUES ('586', '22', '21', '_a_n_d_c', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('587', '23', '21', '_a_p_l_s_f', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('588', '24', '21', '_a_l_f', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('589', '25', '21', '_a', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('590', '26', '21', '_aText_2Rdamedia', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('591', '27', '21', '_aUnmediated_2Rdamedia', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('592', '28', '21', '_aVolume_2Rdacarrier', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('593', '29', '21', '_a_v', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('594', '30', '21', '_aIncludes bibliographical references and indexes.', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('595', '31', '21', '_a', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('596', '32', '21', '_a', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('597', '33', '21', '_a', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('598', '34', '21', '_a_B', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('599', '35', '21', '_a', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('600', '36', '21', '_P_C_T', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('601', '37', '21', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('602', '38', '21', '_A_B_V_X_Y_Z_2', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('603', '39', '21', '_ADiversity in the workplace_V_X_Y_Z_2', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('604', '40', '21', '_A_V_X_Y_Z_2', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('605', '41', '21', '_A_b_C_Q_d_E_4', '2019-03-18 10:33:05', '2019-03-18 10:33:05');
INSERT INTO `field_value` VALUES ('606', '42', '21', '_A_B', '2019-03-18 10:33:06', '2019-03-18 10:33:06');
INSERT INTO `field_value` VALUES ('607', '43', '21', '_A_B_C_Q_D_T_V', '2019-03-18 10:33:06', '2019-03-18 10:33:06');
INSERT INTO `field_value` VALUES ('608', '14', '22', '_a978-0-7494-6222-2_c_z', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('609', '15', '22', '_aYeung, Rob_b_c_q_d', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('610', '16', '22', '_aSuccessful interviewing and recruitment_p_b_c', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('611', '17', '22', '_a', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('612', '18', '22', '_aLondon_bKogan Page_c2011', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('613', '19', '22', '_a192 p._b_c_e', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('614', '20', '22', '_a_v', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('615', '21', '22', '_a_c_D', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('616', '22', '22', '_a_n_d_c', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('617', '23', '22', '_a_p_l_s_f', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('618', '24', '22', '_a_l_f', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('619', '25', '22', '_a', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('620', '26', '22', '_aText_2Rdacontent', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('621', '27', '22', '_aUnmediated_2Rdamedia', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('622', '28', '22', '_aVolume_2Rdacarrier', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('623', '29', '22', '_a_v', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('624', '30', '22', '_aIncludes bibliographical references', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('625', '31', '22', '_a', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('626', '32', '22', '_a', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('627', '33', '22', '_a', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('628', '34', '22', '_a_B', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('629', '35', '22', '_a', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('630', '36', '22', '_P_C_T', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('631', '37', '22', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('632', '38', '22', '_A_B_V_X_Y_Z_2', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('633', '39', '22', '_AEmployment interviewing_V_X_Y_Z_2', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('634', '40', '22', '_A_V_X_Y_Z_2', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('635', '41', '22', '_A_b_C_Q_d_E_4', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('636', '42', '22', '_A_B', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('637', '43', '22', '_A_B_C_Q_D_T_V', '2019-03-18 10:47:09', '2019-03-18 10:47:09');
INSERT INTO `field_value` VALUES ('638', '14', '23', '_a978-0-7494-6394-6_c_z', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('639', '15', '23', '_aArmstrong, Michael_b_c_q_d', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('640', '16', '23', '_aArmstrong handbook of strategic human resource management_p_b_c', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('641', '17', '23', '_a5th edition', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('642', '18', '23', '_a_b_c', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('643', '19', '23', '_aIx, 313 p._b_c_e', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('644', '20', '23', '_a_v', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('645', '21', '23', '_a_c_D', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('646', '22', '23', '_a_n_d_c', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('647', '23', '23', '_a_p_l_s_f', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('648', '24', '23', '_a_l_f', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('649', '25', '23', '_a', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('650', '26', '23', '_aText_2Rdacontent', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('651', '27', '23', '_aUnmediated_2Rdamedia', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('652', '28', '23', '_aVolume_2Rdacarrier', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('653', '29', '23', '_a_v', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('654', '30', '23', '_a', '2019-03-18 10:57:35', '2019-03-18 10:57:35');
INSERT INTO `field_value` VALUES ('655', '31', '23', '_a', '2019-03-18 10:57:36', '2019-03-18 10:57:36');
INSERT INTO `field_value` VALUES ('656', '32', '23', '_a', '2019-03-18 10:57:36', '2019-03-18 10:57:36');
INSERT INTO `field_value` VALUES ('657', '33', '23', '_a', '2019-03-18 10:57:36', '2019-03-18 10:57:36');
INSERT INTO `field_value` VALUES ('658', '34', '23', '_a_B', '2019-03-18 10:57:36', '2019-03-18 10:57:36');
INSERT INTO `field_value` VALUES ('659', '35', '23', '_a', '2019-03-18 10:57:36', '2019-03-18 10:57:36');
INSERT INTO `field_value` VALUES ('660', '36', '23', '_P_C_T', '2019-03-18 10:57:36', '2019-03-18 10:57:36');
INSERT INTO `field_value` VALUES ('661', '37', '23', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 10:57:36', '2019-03-18 10:57:36');
INSERT INTO `field_value` VALUES ('662', '38', '23', '_A_B_V_X_Y_Z_2', '2019-03-18 10:57:36', '2019-03-18 10:57:36');
INSERT INTO `field_value` VALUES ('663', '39', '23', '_APersonal management_V_X_Y_Z_2', '2019-03-18 10:57:36', '2019-03-18 10:57:36');
INSERT INTO `field_value` VALUES ('664', '40', '23', '_A_V_X_Y_Z_2', '2019-03-18 10:57:36', '2019-03-18 10:57:36');
INSERT INTO `field_value` VALUES ('665', '41', '23', '_A_b_C_Q_d_E_4', '2019-03-18 10:57:36', '2019-03-18 10:57:36');
INSERT INTO `field_value` VALUES ('666', '42', '23', '_A_B', '2019-03-18 10:57:37', '2019-03-18 10:57:37');
INSERT INTO `field_value` VALUES ('667', '43', '23', '_A_B_C_Q_D_T_V', '2019-03-18 10:57:37', '2019-03-18 10:57:37');
INSERT INTO `field_value` VALUES ('668', '14', '24', '_a978-981-4633-94-9_c_z', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('669', '15', '24', '_aLusch, Robert F._b_c_q_d', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('670', '16', '24', '_aRetailing _p_bAn introduction_c', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('671', '17', '24', '_a8th edition', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('672', '18', '24', '_aTaguig City, Philippines_bCengage Learning Asia Pte Ltd (Philippine Branch)_c2015', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('673', '19', '24', '_aXxxi, 683 p._bIllustrations_c_e', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('674', '20', '24', '_a_v', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('675', '21', '24', '_a_c_D', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('676', '22', '24', '_a_n_d_c', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('677', '23', '24', '_a_p_l_s_f', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('678', '24', '24', '_a_l_f', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('679', '25', '24', '_a', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('680', '26', '24', '_aText_2Rdacontent', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('681', '27', '24', '_aUnmediated_2Rdamedia', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('682', '28', '24', '_aVolume_2Rdacarrier', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('683', '29', '24', '_a_v', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('684', '30', '24', '_aIncludes index', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('685', '31', '24', '_a', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('686', '32', '24', '_a', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('687', '33', '24', '_a', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('688', '34', '24', '_a_B', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('689', '35', '24', '_a', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('690', '36', '24', '_P_C_T', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('691', '37', '24', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('692', '38', '24', '_A_B_V_X_Y_Z_2', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('693', '39', '24', '_A_V_X_Y_Z_2', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('694', '40', '24', '_A_V_X_Y_Z_2', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('695', '41', '24', '_A_b_C_Q_d_E_4', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('696', '42', '24', '_A_B', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('697', '43', '24', '_A_B_C_Q_D_T_V', '2019-03-18 11:04:43', '2019-03-18 11:04:43');
INSERT INTO `field_value` VALUES ('698', '14', '25', '_a978-1-118-69151-9_c_z', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('699', '15', '25', '_aAlhabeeb, M.J._b_c_q_d', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('700', '16', '25', '_aEntreprenueral finance_p_bFundamentals of financial planning and management for small business_c', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('701', '17', '25', '_a', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('702', '18', '25', '_aNew Jersey_bJohn Wiley & Sons, Inc._c2015', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('703', '19', '25', '_aXvi, 458 p._bIllustrations_c_e', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('704', '20', '25', '_a_v', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('705', '21', '25', '_a_c_D', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('706', '22', '25', '_a_n_d_c', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('707', '23', '25', '_a_p_l_s_f', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('708', '24', '25', '_a_l_f', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('709', '25', '25', '_a', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('710', '26', '25', '_aText_2Rdacontent', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('711', '27', '25', '_aUnmediated_2Rdamedia', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('712', '28', '25', '_aVolume_2Rdacarrier', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('713', '29', '25', '_a_v', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('714', '30', '25', '_aIncludes index', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('715', '31', '25', '_a', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('716', '32', '25', '_a', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('717', '33', '25', '_a', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('718', '34', '25', '_a_B', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('719', '35', '25', '_a', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('720', '36', '25', '_P_C_T', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('721', '37', '25', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('722', '38', '25', '_A_B_V_X_Y_Z_2', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('723', '39', '25', '_ASmall business-- Finance_V_X_Y_Z_2', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('724', '40', '25', '_A_V_X_Y_Z_2', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('725', '41', '25', '_A_b_C_Q_d_E_4', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('726', '42', '25', '_A_B', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('727', '43', '25', '_A_B_C_Q_D_T_V', '2019-03-18 11:10:57', '2019-03-18 11:10:57');
INSERT INTO `field_value` VALUES ('728', '14', '26', '_a978-971-98-0717-9_c_z', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('729', '15', '26', '_aIngram, Thomas N. _b_c_q_d', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('730', '16', '26', '_aProfessional salesmanship_p_b_c', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('731', '17', '26', '_a', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('732', '18', '26', '_aQuezon City, Philippines_bC&E Publishing, Inc._c2017', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('733', '19', '26', '_a160 p._b_c_e', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('734', '20', '26', '_a_v', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('735', '21', '26', '_a_c_D', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('736', '22', '26', '_a_n_d_c', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('737', '23', '26', '_a_p_l_s_f', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('738', '24', '26', '_a_l_f', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('739', '25', '26', '_a', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('740', '26', '26', '_aText_2Rdacontent', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('741', '27', '26', '_aUnmediated_2Rdamedia', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('742', '28', '26', '_aVolume_2Rdacarrier', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('743', '29', '26', '_a_v', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('744', '30', '26', '_a', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('745', '31', '26', '_a', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('746', '32', '26', '_a', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('747', '33', '26', '_a', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('748', '34', '26', '_a_B', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('749', '35', '26', '_a', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('750', '36', '26', '_P_C_T', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('751', '37', '26', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('752', '38', '26', '_A_B_V_X_Y_Z_2', '2019-03-18 11:44:44', '2019-03-18 11:44:44');
INSERT INTO `field_value` VALUES ('753', '39', '26', '_A_V_X_Y_Z_2', '2019-03-18 11:44:45', '2019-03-18 11:44:45');
INSERT INTO `field_value` VALUES ('754', '40', '26', '_A_V_X_Y_Z_2', '2019-03-18 11:44:45', '2019-03-18 11:44:45');
INSERT INTO `field_value` VALUES ('755', '41', '26', '_A_b_C_Q_d_E_4', '2019-03-18 11:44:45', '2019-03-18 11:44:45');
INSERT INTO `field_value` VALUES ('756', '42', '26', '_A_B', '2019-03-18 11:44:45', '2019-03-18 11:44:45');
INSERT INTO `field_value` VALUES ('757', '43', '26', '_A_B_C_Q_D_T_V', '2019-03-18 11:44:45', '2019-03-18 11:44:45');
INSERT INTO `field_value` VALUES ('758', '14', '27', '_a978-981-4416-53-5_c_z', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('759', '15', '27', '_aIngram, Thomas N._b_c_q_d', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('760', '16', '27', '_aProfessional selling_p_b_c', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('761', '17', '27', '_a2nd edition', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('762', '18', '27', '_aPasig City, Philippines_bCengage Learning Asia Pte Ltd (Philippine Branch)_c658.85 In47 2012', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('763', '19', '27', '_a296 p._bIllustrations_c_e', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('764', '20', '27', '_a_v', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('765', '21', '27', '_a_c_D', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('766', '22', '27', '_a_n_d_c', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('767', '23', '27', '_a_p_l_s_f', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('768', '24', '27', '_a_l_f', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('769', '25', '27', '_a', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('770', '26', '27', '_aText_2Rdacontent', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('771', '27', '27', '_aUnmediated_2Rdamedia', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('772', '28', '27', '_aVolume_2Rdacarrier', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('773', '29', '27', '_a_v', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('774', '30', '27', '_aIncludes index', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('775', '31', '27', '_a', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('776', '32', '27', '_a', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('777', '33', '27', '_a', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('778', '34', '27', '_a_B', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('779', '35', '27', '_a', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('780', '36', '27', '_P_C_T', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('781', '37', '27', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('782', '38', '27', '_A_B_V_X_Y_Z_2', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('783', '39', '27', '_A_V_X_Y_Z_2', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('784', '40', '27', '_A_V_X_Y_Z_2', '2019-03-18 11:50:07', '2019-03-18 11:50:07');
INSERT INTO `field_value` VALUES ('785', '41', '27', '_A_b_C_Q_d_E_4', '2019-03-18 11:50:08', '2019-03-18 11:50:08');
INSERT INTO `field_value` VALUES ('786', '42', '27', '_A_B', '2019-03-18 11:50:08', '2019-03-18 11:50:08');
INSERT INTO `field_value` VALUES ('787', '43', '27', '_A_B_C_Q_D_T_V', '2019-03-18 11:50:08', '2019-03-18 11:50:08');
INSERT INTO `field_value` VALUES ('788', '14', '28', '_a9780170236027_c_z', '2019-03-18 11:56:58', '2019-03-18 11:56:58');
INSERT INTO `field_value` VALUES ('789', '15', '28', '_aZikmund, William_b_c_q_d', '2019-03-18 11:56:58', '2019-03-18 11:56:58');
INSERT INTO `field_value` VALUES ('790', '16', '28', '_aMarketing research_p_b_c', '2019-03-18 11:56:58', '2019-03-18 11:56:58');
INSERT INTO `field_value` VALUES ('791', '17', '28', '_aThird Edition', '2019-03-18 11:56:58', '2019-03-18 11:56:58');
INSERT INTO `field_value` VALUES ('792', '18', '28', '_aAustralia_bCengage Learning  Australia Pty Limited_c2014', '2019-03-18 11:56:58', '2019-03-18 11:56:58');
INSERT INTO `field_value` VALUES ('793', '19', '28', '_aXxiv, 624 p._bIllustrations_c_e', '2019-03-18 11:56:58', '2019-03-18 11:56:58');
INSERT INTO `field_value` VALUES ('794', '20', '28', '_a_v', '2019-03-18 11:56:58', '2019-03-18 11:56:58');
INSERT INTO `field_value` VALUES ('795', '21', '28', '_a_c_D', '2019-03-18 11:56:58', '2019-03-18 11:56:58');
INSERT INTO `field_value` VALUES ('796', '22', '28', '_a_n_d_c', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('797', '23', '28', '_a_p_l_s_f', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('798', '24', '28', '_a_l_f', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('799', '25', '28', '_a', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('800', '26', '28', '_aText_2Rdacontent', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('801', '27', '28', '_aUnmediated_2Rdamedia', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('802', '28', '28', '_aVolume_2Rdacarrier', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('803', '29', '28', '_a_v', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('804', '30', '28', '_aIncludes index', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('805', '31', '28', '_a', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('806', '32', '28', '_a', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('807', '33', '28', '_a', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('808', '34', '28', '_a_B', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('809', '35', '28', '_a', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('810', '36', '28', '_P_C_T', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('811', '37', '28', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('812', '38', '28', '_A_B_V_X_Y_Z_2', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('813', '39', '28', '_AMarketing research_V_X_Y_Z_2', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('814', '40', '28', '_A_V_X_Y_Z_2', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('815', '41', '28', '_A_b_C_Q_d_E_4', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('816', '42', '28', '_A_B', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('817', '43', '28', '_A_B_C_Q_D_T_V', '2019-03-18 11:56:59', '2019-03-18 11:56:59');
INSERT INTO `field_value` VALUES ('818', '14', '30', '_a978-971-9654-92-6_c_z', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('819', '15', '30', '_aAcierto, Marife A._b_c_q_d', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('820', '16', '30', '_aIn depth:  a guide to business planning_p_b_c', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('821', '17', '30', '_a', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('822', '18', '30', '_aManila, Philippines_bUnlimited Books Library Services & Publishing Inc._c2017', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('823', '19', '30', '_aXiii, 250 p._bIllustrations_c_e', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('824', '20', '30', '_a_v', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('825', '21', '30', '_a_c_D', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('826', '22', '30', '_a_n_d_c', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('827', '23', '30', '_a_p_l_s_f', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('828', '24', '30', '_a_l_f', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('829', '25', '30', '_a', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('830', '26', '30', '_aText_2Rdacontent', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('831', '27', '30', '_aUnmediated_2Rdamedia', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('832', '28', '30', '_aVolume_2Rdacarrier', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('833', '29', '30', '_a_v', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('834', '30', '30', '_aIncludes bibliographic references', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('835', '31', '30', '_a', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('836', '32', '30', '_a', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('837', '33', '30', '_a', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('838', '34', '30', '_a_B', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('839', '35', '30', '_a', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('840', '36', '30', '_P_C_T', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('841', '37', '30', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('842', '38', '30', '_A_B_V_X_Y_Z_2', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('843', '39', '30', '_A_V_X_Y_Z_2', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('844', '40', '30', '_A_V_X_Y_Z_2', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('845', '41', '30', '_A_b_C_Q_d_E_4', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('846', '42', '30', '_A_B', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('847', '43', '30', '_A_B_C_Q_D_T_V', '2019-03-18 14:17:42', '2019-03-18 14:17:42');
INSERT INTO `field_value` VALUES ('848', '14', '31', '_a978-3-8484-1961-6_c_z', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('849', '15', '31', '_aMbizi, Rangarirai_b_c_q_d', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('850', '16', '31', '_aPrinciples of innovation and technopreneurship_p_bInnovation and technology commercialisation_c', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('851', '17', '31', '_a', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('852', '18', '31', '_aGermany_bLAP LAMBERT Academic Publishing GmbH & Co. KG_c2012', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('853', '19', '31', '_a60 p._b_c_e', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('854', '20', '31', '_a_v', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('855', '21', '31', '_a_c_D', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('856', '22', '31', '_a_n_d_c', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('857', '23', '31', '_a_p_l_s_f', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('858', '24', '31', '_a_l_f', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('859', '25', '31', '_a', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('860', '26', '31', '_aText_2Rdacontent', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('861', '27', '31', '_aUnmediated_2Rdamedia', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('862', '28', '31', '_aVolume_2Rdacarrier', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('863', '29', '31', '_a_v', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('864', '30', '31', '_aIncludes bibliographic references', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('865', '31', '31', '_a', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('866', '32', '31', '_a', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('867', '33', '31', '_a', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('868', '34', '31', '_a_B', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('869', '35', '31', '_a', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('870', '36', '31', '_P_C_T', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('871', '37', '31', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('872', '38', '31', '_A_B_V_X_Y_Z_2', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('873', '39', '31', '_A_V_X_Y_Z_2', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('874', '40', '31', '_A_V_X_Y_Z_2', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('875', '41', '31', '_A_b_C_Q_d_E_4', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('876', '42', '31', '_A_B', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('877', '43', '31', '_A_B_C_Q_D_T_V', '2019-03-18 14:26:47', '2019-03-18 14:26:47');
INSERT INTO `field_value` VALUES ('878', '14', '32', '_a978-1-292-02233-8_c_z', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('879', '15', '32', '_aGoetsch, David L._b_c_q_d', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('880', '16', '32', '_aQuality management for organizational excellence_p_bIntroduction to total quality_c', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('881', '17', '32', '_aSeventh edition', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('882', '18', '32', '_aLondon_bPearson Education Limited_c2014', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('883', '19', '32', '_a467 p._bIllustrations_c_e', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('884', '20', '32', '_a_v', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('885', '21', '32', '_a_c_D', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('886', '22', '32', '_a_n_d_c', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('887', '23', '32', '_a_p_l_s_f', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('888', '24', '32', '_a_l_f', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('889', '25', '32', '_a', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('890', '26', '32', '_aText_2Rdacontent', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('891', '27', '32', '_aUnmediated_2Rdamedia', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('892', '28', '32', '_aVolume_2Rdacarrier', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('893', '29', '32', '_a_v', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('894', '30', '32', '_aIncludes index', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('895', '31', '32', '_a', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('896', '32', '32', '_a', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('897', '33', '32', '_a', '2019-03-18 14:55:24', '2019-03-18 14:55:24');
INSERT INTO `field_value` VALUES ('898', '34', '32', '_a_B', '2019-03-18 14:55:25', '2019-03-18 14:55:25');
INSERT INTO `field_value` VALUES ('899', '35', '32', '_a', '2019-03-18 14:55:25', '2019-03-18 14:55:25');
INSERT INTO `field_value` VALUES ('900', '36', '32', '_P_C_T', '2019-03-18 14:55:25', '2019-03-18 14:55:25');
INSERT INTO `field_value` VALUES ('901', '37', '32', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 14:55:25', '2019-03-18 14:55:25');
INSERT INTO `field_value` VALUES ('902', '38', '32', '_A_B_V_X_Y_Z_2', '2019-03-18 14:55:25', '2019-03-18 14:55:25');
INSERT INTO `field_value` VALUES ('903', '39', '32', '_AMarketing-- Management_V_X_Y_Z_2', '2019-03-18 14:55:25', '2019-03-18 14:55:25');
INSERT INTO `field_value` VALUES ('904', '40', '32', '_A_V_X_Y_Z_2', '2019-03-18 14:55:25', '2019-03-18 14:55:25');
INSERT INTO `field_value` VALUES ('905', '41', '32', '_A_b_C_Q_d_E_4', '2019-03-18 14:55:25', '2019-03-18 14:55:25');
INSERT INTO `field_value` VALUES ('906', '42', '32', '_A_B', '2019-03-18 14:55:25', '2019-03-18 14:55:25');
INSERT INTO `field_value` VALUES ('907', '43', '32', '_A_B_C_Q_D_T_V', '2019-03-18 14:55:25', '2019-03-18 14:55:25');
INSERT INTO `field_value` VALUES ('908', '14', '33', '_a978-981-4633-31-4_c_z', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('909', '15', '33', '_aEvans, James R._b_c_q_d', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('910', '16', '33', '_aTotal quality management_p_b_c', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('911', '17', '33', '_aNinth Edition', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('912', '18', '33', '_aTaguig City, Philippines_bCengage Learning Asia Pte Ltd._c2014', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('913', '19', '33', '_aXvi, 697 p._b_c_e', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('914', '20', '33', '_a_v', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('915', '21', '33', '_a_c_D', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('916', '22', '33', '_a_n_d_c', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('917', '23', '33', '_a_p_l_s_f', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('918', '24', '33', '_a_l_f', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('919', '25', '33', '_a', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('920', '26', '33', '_aText_2Rdacontent', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('921', '27', '33', '_aUnmediated_2Rdamedia', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('922', '28', '33', '_aVolume_2Rdacarrier', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('923', '29', '33', '_a_v', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('924', '30', '33', '_aIncludes bibliographical references and index', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('925', '31', '33', '_a', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('926', '32', '33', '_a', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('927', '33', '33', '_a', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('928', '34', '33', '_a_B', '2019-03-18 15:03:21', '2019-03-18 15:03:21');
INSERT INTO `field_value` VALUES ('929', '35', '33', '_a', '2019-03-18 15:03:22', '2019-03-18 15:03:22');
INSERT INTO `field_value` VALUES ('930', '36', '33', '_P_C_T', '2019-03-18 15:03:22', '2019-03-18 15:03:22');
INSERT INTO `field_value` VALUES ('931', '37', '33', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-18 15:03:22', '2019-03-18 15:03:22');
INSERT INTO `field_value` VALUES ('932', '38', '33', '_A_B_V_X_Y_Z_2', '2019-03-18 15:03:22', '2019-03-18 15:03:22');
INSERT INTO `field_value` VALUES ('933', '39', '33', '_A_V_X_Y_Z_2', '2019-03-18 15:03:22', '2019-03-18 15:03:22');
INSERT INTO `field_value` VALUES ('934', '40', '33', '_A_V_X_Y_Z_2', '2019-03-18 15:03:22', '2019-03-18 15:03:22');
INSERT INTO `field_value` VALUES ('935', '41', '33', '_AWilliam M. Lindsay_b_C_Q_d_E_4', '2019-03-18 15:03:22', '2019-03-18 15:03:22');
INSERT INTO `field_value` VALUES ('936', '42', '33', '_A_B', '2019-03-18 15:03:22', '2019-03-18 15:03:22');
INSERT INTO `field_value` VALUES ('937', '43', '33', '_A_B_C_Q_D_T_V', '2019-03-18 15:03:22', '2019-03-18 15:03:22');
INSERT INTO `field_value` VALUES ('938', '14', '34', '_a978-007-132623-0_c_z', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('939', '15', '34', '_aCravens, David W._b_c_q_d', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('940', '16', '34', '_aStrategic marketing_p_b_c', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('941', '17', '34', '_a10th edition', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('942', '18', '34', '_aNew York_bMcGraw-Hill_c2013', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('943', '19', '34', '_aXviii, 653 p._b_c_e', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('944', '20', '34', '_a_v', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('945', '21', '34', '_a_c_D', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('946', '22', '34', '_a_n_d_c', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('947', '23', '34', '_a_p_l_s_f', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('948', '24', '34', '_a_l_f', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('949', '25', '34', '_a', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('950', '26', '34', '_a_2', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('951', '27', '34', '_aText_2Rdamedia', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('952', '28', '34', '_aUnmediated_2Rdacarrier', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('953', '29', '34', '_a_v', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('954', '30', '34', '_aIncludes index', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('955', '31', '34', '_a', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('956', '32', '34', '_a', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('957', '33', '34', '_a', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('958', '34', '34', '_a_B', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('959', '35', '34', '_a', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('960', '36', '34', '_P_C_T', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('961', '37', '34', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('962', '38', '34', '_A_B_V_X_Y_Z_2', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('963', '39', '34', '_A_V_X_Y_Z_2', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('964', '40', '34', '_A_V_X_Y_Z_2', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('965', '41', '34', '_APiercy, Nigel F._b_C_Q_d_E_4', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('966', '42', '34', '_A_B', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('967', '43', '34', '_A_B_C_Q_D_T_V', '2019-03-22 14:42:29', '2019-03-22 14:42:29');
INSERT INTO `field_value` VALUES ('968', '14', '35', '_a978-1-133-58767-5_c_z', '2019-03-22 14:56:33', '2019-03-22 14:56:33');
INSERT INTO `field_value` VALUES ('969', '15', '35', '_aKardes, Frank R._b_c_q_d', '2019-03-22 14:56:33', '2019-03-22 14:56:33');
INSERT INTO `field_value` VALUES ('970', '16', '35', '_aConsumer behavior_p_b_c', '2019-03-22 14:56:33', '2019-03-22 14:56:33');
INSERT INTO `field_value` VALUES ('971', '17', '35', '_aSecond edition', '2019-03-22 14:56:33', '2019-03-22 14:56:33');
INSERT INTO `field_value` VALUES ('972', '18', '35', '_aUnited States of America_bCengage Learning_c2015', '2019-03-22 14:56:33', '2019-03-22 14:56:33');
INSERT INTO `field_value` VALUES ('973', '19', '35', '_aXxii, 550 p._bIllustrations_c_e', '2019-03-22 14:56:33', '2019-03-22 14:56:33');
INSERT INTO `field_value` VALUES ('974', '20', '35', '_a_v', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('975', '21', '35', '_a_c_D', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('976', '22', '35', '_a_n_d_c', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('977', '23', '35', '_a_p_l_s_f', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('978', '24', '35', '_a_l_f', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('979', '25', '35', '_a', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('980', '26', '35', '_aText_2', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('981', '27', '35', '_aUnmediated_2', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('982', '28', '35', '_aVolume_2', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('983', '29', '35', '_a_v', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('984', '30', '35', '_aIncludes index', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('985', '31', '35', '_a', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('986', '32', '35', '_a', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('987', '33', '35', '_a', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('988', '34', '35', '_a_B', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('989', '35', '35', '_a', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('990', '36', '35', '_P_C_T', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('991', '37', '35', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('992', '38', '35', '_A_B_V_X_Y_Z_2', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('993', '39', '35', '_AConsumer behavior_V_X_Y_Z_2', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('994', '40', '35', '_A_V_X_Y_Z_2', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('995', '41', '35', '_AMaria L. Cronley_b_C_Q_d_E_4', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('996', '42', '35', '_A_B', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('997', '43', '35', '_A_B_C_Q_D_T_V', '2019-03-22 14:56:34', '2019-03-22 14:56:34');
INSERT INTO `field_value` VALUES ('998', '14', '36', '_a978-1-25-902659-1_c_z', '2019-03-22 15:20:44', '2019-03-22 15:20:44');
INSERT INTO `field_value` VALUES ('999', '15', '36', '_aKale, Shailendra_b_c_q_d', '2019-03-22 15:20:44', '2019-03-22 15:20:44');
INSERT INTO `field_value` VALUES ('1000', '16', '36', '_aProduction and operations management_p_b_c', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1001', '17', '36', '_a', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1002', '18', '36', '_aNew Delhi, India_bMcGraw Hill Education (India) Private Limited_c2013', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1003', '19', '36', '_aXix, 607 p._bIllustrations_c_e', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1004', '20', '36', '_a_v', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1005', '21', '36', '_a_c_D', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1006', '22', '36', '_a_n_d_c', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1007', '23', '36', '_a_p_l_s_f', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1008', '24', '36', '_a_l_f', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1009', '25', '36', '_a', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1010', '26', '36', '_aText_2', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1011', '27', '36', '_aUnmediated_2', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1012', '28', '36', '_aVolume_2', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1013', '29', '36', '_a_v', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1014', '30', '36', '_aIncludes index', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1015', '31', '36', '_a', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1016', '32', '36', '_a', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1017', '33', '36', '_a', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1018', '34', '36', '_a_B', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1019', '35', '36', '_a', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1020', '36', '36', '_P_C_T', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1021', '37', '36', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1022', '38', '36', '_A_B_V_X_Y_Z_2', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1023', '39', '36', '_A_V_X_Y_Z_2', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1024', '40', '36', '_A_V_X_Y_Z_2', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1025', '41', '36', '_A_b_C_Q_d_E_4', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1026', '42', '36', '_A_B', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1027', '43', '36', '_A_B_C_Q_D_T_V', '2019-03-22 15:20:45', '2019-03-22 15:20:45');
INSERT INTO `field_value` VALUES ('1028', '14', '37', '_a978-93-5115-479-2_c_z', '2019-03-22 15:25:03', '2019-03-22 15:25:03');
INSERT INTO `field_value` VALUES ('1029', '15', '37', '_a3G Elearning_b_c_q_d', '2019-03-22 15:25:03', '2019-03-22 15:25:03');
INSERT INTO `field_value` VALUES ('1030', '16', '37', '_aBusiness to business marketing_p_b_c', '2019-03-22 15:25:03', '2019-03-22 15:25:03');
INSERT INTO `field_value` VALUES ('1031', '17', '37', '_a', '2019-03-22 15:25:04', '2019-03-22 15:25:04');
INSERT INTO `field_value` VALUES ('1032', '18', '37', '_a[s.l]._b3G Elearning_c2015', '2019-03-22 15:25:04', '2019-03-22 15:25:04');
INSERT INTO `field_value` VALUES ('1033', '19', '37', '_aVii, 277 p._bIllustrations_c_e', '2019-03-22 15:25:04', '2019-03-22 15:25:04');
INSERT INTO `field_value` VALUES ('1034', '20', '37', '_a_v', '2019-03-22 15:25:04', '2019-03-22 15:25:04');
INSERT INTO `field_value` VALUES ('1035', '21', '37', '_a_c_D', '2019-03-22 15:25:04', '2019-03-22 15:25:04');
INSERT INTO `field_value` VALUES ('1036', '22', '37', '_a_n_d_c', '2019-03-22 15:25:04', '2019-03-22 15:25:04');
INSERT INTO `field_value` VALUES ('1037', '23', '37', '_a_p_l_s_f', '2019-03-22 15:25:04', '2019-03-22 15:25:04');
INSERT INTO `field_value` VALUES ('1038', '24', '37', '_a_l_f', '2019-03-22 15:25:04', '2019-03-22 15:25:04');
INSERT INTO `field_value` VALUES ('1039', '25', '37', '_a', '2019-03-22 15:25:04', '2019-03-22 15:25:04');
INSERT INTO `field_value` VALUES ('1040', '26', '37', '_aText_2', '2019-03-22 15:25:05', '2019-03-22 15:25:05');
INSERT INTO `field_value` VALUES ('1041', '27', '37', '_aUnmediated_2', '2019-03-22 15:25:05', '2019-03-22 15:25:05');
INSERT INTO `field_value` VALUES ('1042', '28', '37', '_aVolume_2', '2019-03-22 15:25:05', '2019-03-22 15:25:05');
INSERT INTO `field_value` VALUES ('1043', '29', '37', '_a_v', '2019-03-22 15:25:05', '2019-03-22 15:25:05');
INSERT INTO `field_value` VALUES ('1044', '30', '37', '_a', '2019-03-22 15:25:06', '2019-03-22 15:25:06');
INSERT INTO `field_value` VALUES ('1045', '31', '37', '_a', '2019-03-22 15:25:06', '2019-03-22 15:25:06');
INSERT INTO `field_value` VALUES ('1046', '32', '37', '_a', '2019-03-22 15:25:06', '2019-03-22 15:25:06');
INSERT INTO `field_value` VALUES ('1047', '33', '37', '_a', '2019-03-22 15:25:07', '2019-03-22 15:25:07');
INSERT INTO `field_value` VALUES ('1048', '34', '37', '_a_B', '2019-03-22 15:25:07', '2019-03-22 15:25:07');
INSERT INTO `field_value` VALUES ('1049', '35', '37', '_a', '2019-03-22 15:25:07', '2019-03-22 15:25:07');
INSERT INTO `field_value` VALUES ('1050', '36', '37', '_P_C_T', '2019-03-22 15:25:07', '2019-03-22 15:25:07');
INSERT INTO `field_value` VALUES ('1051', '37', '37', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-22 15:25:07', '2019-03-22 15:25:07');
INSERT INTO `field_value` VALUES ('1052', '38', '37', '_A_B_V_X_Y_Z_2', '2019-03-22 15:25:07', '2019-03-22 15:25:07');
INSERT INTO `field_value` VALUES ('1053', '39', '37', '_A_V_X_Y_Z_2', '2019-03-22 15:25:07', '2019-03-22 15:25:07');
INSERT INTO `field_value` VALUES ('1054', '40', '37', '_A_V_X_Y_Z_2', '2019-03-22 15:25:07', '2019-03-22 15:25:07');
INSERT INTO `field_value` VALUES ('1055', '41', '37', '_A_b_C_Q_d_E_4', '2019-03-22 15:25:07', '2019-03-22 15:25:07');
INSERT INTO `field_value` VALUES ('1056', '42', '37', '_A_B', '2019-03-22 15:25:07', '2019-03-22 15:25:07');
INSERT INTO `field_value` VALUES ('1057', '43', '37', '_A_B_C_Q_D_T_V', '2019-03-22 15:25:07', '2019-03-22 15:25:07');
INSERT INTO `field_value` VALUES ('1058', '14', '38', '_a978-93-5115-475-4_c_z', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1059', '15', '38', '_a3G Elearning_b_c_q_d', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1060', '16', '38', '_aIntroduction to BPO_p_b_c', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1061', '17', '38', '_a', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1062', '18', '38', '_a[s.l]._b3G Learning_c2015', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1063', '19', '38', '_aVii, 230 p._bIllustrations_c_e', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1064', '20', '38', '_a_v', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1065', '21', '38', '_a_c_D', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1066', '22', '38', '_a_n_d_c', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1067', '23', '38', '_a_p_l_s_f', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1068', '24', '38', '_a_l_f', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1069', '25', '38', '_a', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1070', '26', '38', '_aText_2', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1071', '27', '38', '_aUnmediated_2', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1072', '28', '38', '_aVolume_2', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1073', '29', '38', '_a_v', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1074', '30', '38', '_a', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1075', '31', '38', '_a', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1076', '32', '38', '_a', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1077', '33', '38', '_a', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1078', '34', '38', '_a_B', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1079', '35', '38', '_a', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1080', '36', '38', '_P_C_T', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1081', '37', '38', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1082', '38', '38', '_A_B_V_X_Y_Z_2', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1083', '39', '38', '_A_V_X_Y_Z_2', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1084', '40', '38', '_A_V_X_Y_Z_2', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1085', '41', '38', '_A_b_C_Q_d_E_4', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1086', '42', '38', '_A_B', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1087', '43', '38', '_A_B_C_Q_D_T_V', '2019-03-22 15:55:11', '2019-03-22 15:55:11');
INSERT INTO `field_value` VALUES ('1088', '14', '39', '_a978-1-118-02775-2_c_z', '2019-03-22 16:55:30', '2019-03-22 16:55:30');
INSERT INTO `field_value` VALUES ('1089', '15', '39', '_aPoston, Leslie_b_c_q_d', '2019-03-22 16:55:30', '2019-03-22 16:55:30');
INSERT INTO `field_value` VALUES ('1090', '16', '39', '_aSocial media for dummies_p_b_c', '2019-03-22 16:55:30', '2019-03-22 16:55:30');
INSERT INTO `field_value` VALUES ('1091', '17', '39', '_a', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1092', '18', '39', '_aNew Jersey_bJohn Wiley & Sons, Inc._c', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1093', '19', '39', '_a_bIllustrations_c_e', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1094', '20', '39', '_a_v', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1095', '21', '39', '_a_c_D', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1096', '22', '39', '_a_n_d_c', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1097', '23', '39', '_a_p_l_s_f', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1098', '24', '39', '_a_l_f', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1099', '25', '39', '_a', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1100', '26', '39', '_aText_2', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1101', '27', '39', '_aUnmediated_2', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1102', '28', '39', '_aVolume_2', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1103', '29', '39', '_a_v', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1104', '30', '39', '_aIncludes index', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1105', '31', '39', '_a', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1106', '32', '39', '_a', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1107', '33', '39', '_a', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1108', '34', '39', '_a_B', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1109', '35', '39', '_a', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1110', '36', '39', '_P_C_T', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1111', '37', '39', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1112', '38', '39', '_A_B_V_X_Y_Z_2', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1113', '39', '39', '_A_V_X_Y_Z_2', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1114', '40', '39', '_A_V_X_Y_Z_2', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1115', '41', '39', '_A_b_C_Q_d_E_4', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1116', '42', '39', '_A_B', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1117', '43', '39', '_A_B_C_Q_D_T_V', '2019-03-22 16:55:31', '2019-03-22 16:55:31');
INSERT INTO `field_value` VALUES ('1118', '14', '40', '_a978-1-118-45747-4_c_z', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1119', '15', '40', '_aOnaindia, Carlos M._b_c_q_d', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1120', '16', '40', '_aDesigning B2B brands_p_bLessons from deloitte and 195, 000 brands managers_c', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1121', '17', '40', '_a', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1122', '18', '40', '_aNew Jersey, Canada_bJohn Wiley & Sons, Inc._c', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1123', '19', '40', '_aXiii, 206 p._bIllustrations_c_e', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1124', '20', '40', '_a_v', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1125', '21', '40', '_a_c_D', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1126', '22', '40', '_a_n_d_c', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1127', '23', '40', '_a_p_l_s_f', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1128', '24', '40', '_a_l_f', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1129', '25', '40', '_a', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1130', '26', '40', '_aText_2', '2019-03-22 17:00:43', '2019-03-22 17:00:43');
INSERT INTO `field_value` VALUES ('1131', '27', '40', '_aUnmediated_2', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1132', '28', '40', '_aVolume_2', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1133', '29', '40', '_a_v', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1134', '30', '40', '_aIncludes index', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1135', '31', '40', '_a', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1136', '32', '40', '_a', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1137', '33', '40', '_a', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1138', '34', '40', '_a_B', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1139', '35', '40', '_a', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1140', '36', '40', '_P_C_T', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1141', '37', '40', '_ABrian Resnick_B_C_Q_D_T_V_X_Y_z_2', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1142', '38', '40', '_A_B_V_X_Y_Z_2', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1143', '39', '40', '_ABranding (Marketing)-- Management_V_X_Y_Z_2', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1144', '40', '40', '_A_V_X_Y_Z_2', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1145', '41', '40', '_A_b_C_Q_d_E_4', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1146', '42', '40', '_A_B', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1147', '43', '40', '_A_B_C_Q_D_T_V', '2019-03-22 17:00:44', '2019-03-22 17:00:44');
INSERT INTO `field_value` VALUES ('1148', '14', '41', '_a978-981-3151-25-3_c_z', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1149', '15', '41', '_aDess, Gregory G._b_c_q_d', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1150', '16', '41', '_aStrategic management_p_b_c', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1151', '17', '41', '_aEight edition', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1152', '18', '41', '_aNew York_bMcGraw-Hill Education_c2016', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1153', '19', '41', '_aXxxviii_bIllustrations_c_e', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1154', '20', '41', '_a_v', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1155', '21', '41', '_a_c_D', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1156', '22', '41', '_a_n_d_c', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1157', '23', '41', '_a_p_l_s_f', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1158', '24', '41', '_a_l_f', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1159', '25', '41', '_a', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1160', '26', '41', '_aText_2', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1161', '27', '41', '_aUnmediated_2', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1162', '28', '41', '_aVolume_2', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1163', '29', '41', '_a_v', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1164', '30', '41', '_aIncludes index', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1165', '31', '41', '_a', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1166', '32', '41', '_a', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1167', '33', '41', '_a', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1168', '34', '41', '_a_B', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1169', '35', '41', '_a', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1170', '36', '41', '_P_C_T', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1171', '37', '41', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1172', '38', '41', '_A_B_V_X_Y_Z_2', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1173', '39', '41', '_A_V_X_Y_Z_2', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1174', '40', '41', '_A_V_X_Y_Z_2', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1175', '41', '41', '_A_b_C_Q_d_E_4', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1176', '42', '41', '_A_B', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1177', '43', '41', '_A_B_C_Q_D_T_V', '2019-03-22 17:06:19', '2019-03-22 17:06:19');
INSERT INTO `field_value` VALUES ('1178', '14', '43', '_a978-1-292-292-02160-7_c_z', '2019-03-22 17:38:05', '2019-03-22 17:38:05');
INSERT INTO `field_value` VALUES ('1179', '15', '43', '_aMartocchio, Joseph J._b_c_q_d', '2019-03-22 17:38:05', '2019-03-22 17:38:05');
INSERT INTO `field_value` VALUES ('1180', '16', '43', '_aStrategic compensation_pA human resource management approach_bA human resource management approach_c', '2019-03-22 17:38:05', '2019-03-22 17:38:05');
INSERT INTO `field_value` VALUES ('1181', '17', '43', '_aPearson New International Edition', '2019-03-22 17:38:05', '2019-03-22 17:38:05');
INSERT INTO `field_value` VALUES ('1182', '18', '43', '_aEngland_bPearson Education Limited_c2014', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1183', '19', '43', '_a370 p_bIllustrations_c_e', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1184', '20', '43', '_a_v', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1185', '21', '43', '_a_c_D', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1186', '22', '43', '_a_n_d_c', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1187', '23', '43', '_a_p_l_s_f', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1188', '24', '43', '_a_l_f', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1189', '25', '43', '_a', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1190', '26', '43', '_aText_2', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1191', '27', '43', '_aUnmediated_2', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1192', '28', '43', '_aVolume_2', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1193', '29', '43', '_a_v', '2019-03-22 17:38:06', '2019-03-22 17:38:06');
INSERT INTO `field_value` VALUES ('1194', '30', '43', '_aIncludes index', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1195', '31', '43', '_a', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1196', '32', '43', '_a', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1197', '33', '43', '_a', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1198', '34', '43', '_a_B', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1199', '35', '43', '_a', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1200', '36', '43', '_P_C_T', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1201', '37', '43', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1202', '38', '43', '_A_B_V_X_Y_Z_2', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1203', '39', '43', '_A_V_X_Y_Z_2', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1204', '40', '43', '_A_V_X_Y_Z_2', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1205', '41', '43', '_A_b_C_Q_d_E_4', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1206', '42', '43', '_A_B', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1207', '43', '43', '_A_B_C_Q_D_T_V', '2019-03-22 17:38:07', '2019-03-22 17:38:07');
INSERT INTO `field_value` VALUES ('1208', '14', '45', '_a978-0-12-799945-6_c_z', '2019-03-25 10:33:17', '2019-03-25 10:33:17');
INSERT INTO `field_value` VALUES ('1209', '15', '45', '_aMital, Anil_b_c_q_d', '2019-03-25 10:33:18', '2019-03-25 10:33:18');
INSERT INTO `field_value` VALUES ('1210', '16', '45', '_aProduct development_p_bA structured approach to consumer product development, design, and manufacture_c', '2019-03-25 10:33:18', '2019-03-25 10:33:18');
INSERT INTO `field_value` VALUES ('1211', '17', '45', '_aSecond Edition', '2019-03-25 10:33:18', '2019-03-25 10:33:18');
INSERT INTO `field_value` VALUES ('1212', '18', '45', '_aAmsterdam_bElsevier_c2014', '2019-03-25 10:33:18', '2019-03-25 10:33:18');
INSERT INTO `field_value` VALUES ('1213', '19', '45', '_aXv, 522 p._bIllustrations_c_e', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1214', '20', '45', '_a_v', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1215', '21', '45', '_a_c_D', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1216', '22', '45', '_a_n_d_c', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1217', '23', '45', '_a_p_l_s_f', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1218', '24', '45', '_a_l_f', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1219', '25', '45', '_a', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1220', '26', '45', '_aText_2', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1221', '27', '45', '_aUnmediated_2', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1222', '28', '45', '_aVolume_2', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1223', '29', '45', '_a_v', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1224', '30', '45', '_a', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1225', '31', '45', '_a', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1226', '32', '45', '_a', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1227', '33', '45', '_a', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1228', '34', '45', '_a_B', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1229', '35', '45', '_a', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1230', '36', '45', '_P_C_T', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1231', '37', '45', '_AAnoop Desal_B_C_Q_D_T_V_X_Y_z_2', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1232', '38', '45', '_A_B_V_X_Y_Z_2', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1233', '39', '45', '_A_V_X_Y_Z_2', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1234', '40', '45', '_A_V_X_Y_Z_2', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1235', '41', '45', '_A_b_C_Q_d_E_4', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1236', '42', '45', '_A_B', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1237', '43', '45', '_A_B_C_Q_D_T_V', '2019-03-25 10:33:19', '2019-03-25 10:33:19');
INSERT INTO `field_value` VALUES ('1238', '14', '47', '_a978-971-98-0603-5_c_z', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1239', '15', '47', '_aGarcia, Leonardo R._b_c_q_d', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1240', '16', '47', '_aServices marketing_p_bEra of engagement_c', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1241', '17', '47', '_a', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1242', '18', '47', '_aQuezon City, Philippines_b C & E Publishing Inc._c2017', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1243', '19', '47', '_aXx, 232 p._bIllustrations_c_e', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1244', '20', '47', '_a_v', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1245', '21', '47', '_a_c_D', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1246', '22', '47', '_a_n_d_c', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1247', '23', '47', '_a_p_l_s_f', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1248', '24', '47', '_a_l_f', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1249', '25', '47', '_a', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1250', '26', '47', '_a_2Text', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1251', '27', '47', '_a_2Unmediated', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1252', '28', '47', '_a_2Volume', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1253', '29', '47', '_a_v', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1254', '30', '47', '_a', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1255', '31', '47', '_a', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1256', '32', '47', '_a', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1257', '33', '47', '_a', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1258', '34', '47', '_a_B', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1259', '35', '47', '_a', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1260', '36', '47', '_P_C_T', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1261', '37', '47', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1262', '38', '47', '_A_B_V_X_Y_Z_2', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1263', '39', '47', '_AService industries-- marketing_V_X_Y_Z_2', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1264', '40', '47', '_A_V_X_Y_Z_2', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1265', '41', '47', '_AEnrique M. Soriano_b_C_Q_d_E_4', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1266', '42', '47', '_A_B', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1267', '43', '47', '_A_B_C_Q_D_T_V', '2019-04-16 16:22:49', '2019-04-16 16:22:49');
INSERT INTO `field_value` VALUES ('1268', '14', '48', '_a978-971-98-0303-4_c_z', '2019-04-16 17:14:56', '2019-04-16 17:14:56');
INSERT INTO `field_value` VALUES ('1269', '15', '48', '_aTimbang, Ferdinand L._b_c_q_d', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1270', '16', '48', '_aFinancial management_p_bPart 1_c', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1271', '17', '48', '_aFirst edition', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1272', '18', '48', '_aQuezon City, Philippines_bC & E Publishing Inc_c2015', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1273', '19', '48', '_aXii, 285 p._b26 cm_c_e', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1274', '20', '48', '_a_v', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1275', '21', '48', '_a_c_D', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1276', '22', '48', '_a_n_d_c', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1277', '23', '48', '_a_p_l_s_f', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1278', '24', '48', '_a_l_f', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1279', '25', '48', '_a', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1280', '26', '48', '_a_2Text', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1281', '27', '48', '_a_2Unmediated', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1282', '28', '48', '_a_2Includes bibliographic references and index', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1283', '29', '48', '_a_v', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1284', '30', '48', '_aIncludes bibliographic references and index', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1285', '31', '48', '_a', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1286', '32', '48', '_a', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1287', '33', '48', '_a', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1288', '34', '48', '_a_B', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1289', '35', '48', '_a', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1290', '36', '48', '_P_C_T', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1291', '37', '48', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1292', '38', '48', '_A_B_V_X_Y_Z_2', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1293', '39', '48', '_ABusiness enterprises-- Finance_V_X_Y_Z_2', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1294', '40', '48', '_A_V_X_Y_Z_2', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1295', '41', '48', '_A_b_C_Q_d_E_4', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1296', '42', '48', '_A_B', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1297', '43', '48', '_A_B_C_Q_D_T_V', '2019-04-16 17:14:57', '2019-04-16 17:14:57');
INSERT INTO `field_value` VALUES ('1298', '14', '49', '_a978-971-98-0457-4_c_z', '2019-04-16 17:38:27', '2019-04-16 17:38:27');
INSERT INTO `field_value` VALUES ('1299', '15', '49', '_aTimbang, Ferdinand L._b_c_q_d', '2019-04-16 17:38:27', '2019-04-16 17:38:27');
INSERT INTO `field_value` VALUES ('1300', '16', '49', '_aFinancial management_p_bPart II_c', '2019-04-16 17:38:27', '2019-04-16 17:38:27');
INSERT INTO `field_value` VALUES ('1301', '17', '49', '_aFirst Edition', '2019-04-16 17:38:27', '2019-04-16 17:38:27');
INSERT INTO `field_value` VALUES ('1302', '18', '49', '_aQuezon City, Philippines_bC & E Publishing Inc._c2016', '2019-04-16 17:38:27', '2019-04-16 17:38:27');
INSERT INTO `field_value` VALUES ('1303', '19', '49', '_aIx, 320 p._bIllustrations_c26 cm_e', '2019-04-16 17:38:27', '2019-04-16 17:38:27');
INSERT INTO `field_value` VALUES ('1304', '20', '49', '_a_v', '2019-04-16 17:38:27', '2019-04-16 17:38:27');
INSERT INTO `field_value` VALUES ('1305', '21', '49', '_a_c_D', '2019-04-16 17:38:27', '2019-04-16 17:38:27');
INSERT INTO `field_value` VALUES ('1306', '22', '49', '_a_n_d_c', '2019-04-16 17:38:27', '2019-04-16 17:38:27');
INSERT INTO `field_value` VALUES ('1307', '23', '49', '_a_p_l_s_f', '2019-04-16 17:38:27', '2019-04-16 17:38:27');
INSERT INTO `field_value` VALUES ('1308', '24', '49', '_a_l_f', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1309', '25', '49', '_a', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1310', '26', '49', '_a_2Text', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1311', '27', '49', '_a_2Unmediated', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1312', '28', '49', '_a_2Volume', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1313', '29', '49', '_a_v', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1314', '30', '49', '_aIncludes bibliography and index', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1315', '31', '49', '_a', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1316', '32', '49', '_a', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1317', '33', '49', '_a', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1318', '34', '49', '_a_B', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1319', '35', '49', '_a', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1320', '36', '49', '_P_C_T', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1321', '37', '49', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1322', '38', '49', '_A_B_V_X_Y_Z_2', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1323', '39', '49', '_A_V_X_Y_Z_2', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1324', '40', '49', '_A_V_X_Y_Z_2', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1325', '41', '49', '_A_b_C_Q_d_E_4', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1326', '42', '49', '_A_B', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1327', '43', '49', '_A_B_C_Q_D_T_V', '2019-04-16 17:38:28', '2019-04-16 17:38:28');
INSERT INTO `field_value` VALUES ('1328', '14', '50', '_a978-0-07-122116-0_c_z', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1329', '15', '50', '_aRoss, Stephen A._b_c_q_d', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1330', '16', '50', '_aCore principles and applications of corporate finance_p_b_c', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1331', '17', '50', '_aThird edition', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1332', '18', '50', '_aNew York_bMcGraw-Hill Irwin_c2011', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1333', '19', '50', '_a751 p._bIllustrations_c_e', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1334', '20', '50', '_a_v', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1335', '21', '50', '_a_c_D', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1336', '22', '50', '_a_n_d_c', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1337', '23', '50', '_a_p_l_s_f', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1338', '24', '50', '_a_l_f', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1339', '25', '50', '_a', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1340', '26', '50', '_a_2Text', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1341', '27', '50', '_a_2Unmediated', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1342', '28', '50', '_a_2Volume', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1343', '29', '50', '_a_v', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1344', '30', '50', '_aIncludes index', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1345', '31', '50', '_a', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1346', '32', '50', '_a', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1347', '33', '50', '_a', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1348', '34', '50', '_a_B', '2019-04-16 18:15:39', '2019-04-16 18:15:39');
INSERT INTO `field_value` VALUES ('1349', '35', '50', '_a', '2019-04-16 18:15:40', '2019-04-16 18:15:40');
INSERT INTO `field_value` VALUES ('1350', '36', '50', '_P_C_T', '2019-04-16 18:15:40', '2019-04-16 18:15:40');
INSERT INTO `field_value` VALUES ('1351', '37', '50', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-04-16 18:15:40', '2019-04-16 18:15:40');
INSERT INTO `field_value` VALUES ('1352', '38', '50', '_A_B_V_X_Y_Z_2', '2019-04-16 18:15:40', '2019-04-16 18:15:40');
INSERT INTO `field_value` VALUES ('1353', '39', '50', '_A_V_X_Y_Z_2', '2019-04-16 18:15:40', '2019-04-16 18:15:40');
INSERT INTO `field_value` VALUES ('1354', '40', '50', '_A_V_X_Y_Z_2', '2019-04-16 18:15:40', '2019-04-16 18:15:40');
INSERT INTO `field_value` VALUES ('1355', '41', '50', '_A_b_C_Q_d_E_4', '2019-04-16 18:15:40', '2019-04-16 18:15:40');
INSERT INTO `field_value` VALUES ('1356', '42', '50', '_A_B', '2019-04-16 18:15:40', '2019-04-16 18:15:40');
INSERT INTO `field_value` VALUES ('1357', '43', '50', '_A_B_C_Q_D_T_V', '2019-04-16 18:15:40', '2019-04-16 18:15:40');
INSERT INTO `field_value` VALUES ('1358', '14', '51', '_a978-971-23-7877-5_c_z', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1359', '15', '51', '_aAliling, Leonardo E._b_c_q_d', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1360', '16', '51', '_aManagement accounting 1_p_b_c', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1361', '17', '51', '_aFirst edition', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1362', '18', '51', '_aManila, Philippines_bRex Book Store_c2015', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1363', '19', '51', '_aXiii, 180 p._b_c_e', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1364', '20', '51', '_a_v', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1365', '21', '51', '_a_c_D', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1366', '22', '51', '_a_n_d_c', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1367', '23', '51', '_a_p_l_s_f', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1368', '24', '51', '_a_l_f', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1369', '25', '51', '_a', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1370', '26', '51', '_a_2Text', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1371', '27', '51', '_a_2Unmediated', '2019-04-16 18:25:41', '2019-04-16 18:25:41');
INSERT INTO `field_value` VALUES ('1372', '28', '51', '_a_2Volume', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1373', '29', '51', '_a_v', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1374', '30', '51', '_a', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1375', '31', '51', '_a', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1376', '32', '51', '_a', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1377', '33', '51', '_a', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1378', '34', '51', '_a_B', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1379', '35', '51', '_a', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1380', '36', '51', '_P_C_T', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1381', '37', '51', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1382', '38', '51', '_A_B_V_X_Y_Z_2', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1383', '39', '51', '_A_V_X_Y_Z_2', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1384', '40', '51', '_A_V_X_Y_Z_2', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1385', '41', '51', '_AMa. Flordeliza L. Anastacio_b_C_Q_d_E_4', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1386', '42', '51', '_A_B', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1387', '43', '51', '_A_B_C_Q_D_T_V', '2019-04-16 18:25:42', '2019-04-16 18:25:42');
INSERT INTO `field_value` VALUES ('1388', '14', '52', '_a9781118532454_c_z', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1389', '15', '52', '_aGirling, Philippa X._b_c_q_d', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1390', '16', '52', '_aOperation risk management_p_bA complete guide to a successful operational risk framework_c', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1391', '17', '52', '_a', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1392', '18', '52', '_aNew Jersey_bJohn Wiley & Sons, Inc._c', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1393', '19', '52', '_aXi, 328 p._b_c_e', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1394', '20', '52', '_a_v', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1395', '21', '52', '_a_c_D', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1396', '22', '52', '_a_n_d_c', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1397', '23', '52', '_a_p_l_s_f', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1398', '24', '52', '_a_l_f', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1399', '25', '52', '_a', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1400', '26', '52', '_a_2Text', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1401', '27', '52', '_a_2Unmediated', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1402', '28', '52', '_a_2Includes index', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1403', '29', '52', '_a_v', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1404', '30', '52', '_a', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1405', '31', '52', '_a', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1406', '32', '52', '_a', '2019-04-29 10:13:07', '2019-04-29 10:13:07');
INSERT INTO `field_value` VALUES ('1407', '33', '52', '_a', '2019-04-29 10:13:08', '2019-04-29 10:13:08');
INSERT INTO `field_value` VALUES ('1408', '34', '52', '_a_B', '2019-04-29 10:13:08', '2019-04-29 10:13:08');
INSERT INTO `field_value` VALUES ('1409', '35', '52', '_a', '2019-04-29 10:13:08', '2019-04-29 10:13:08');
INSERT INTO `field_value` VALUES ('1410', '36', '52', '_P_C_T', '2019-04-29 10:13:08', '2019-04-29 10:13:08');
INSERT INTO `field_value` VALUES ('1411', '37', '52', '_A_B_C_Q_D_T_V_X_Y_z_2', '2019-04-29 10:13:08', '2019-04-29 10:13:08');
INSERT INTO `field_value` VALUES ('1412', '38', '52', '_A_B_V_X_Y_Z_2', '2019-04-29 10:13:08', '2019-04-29 10:13:08');
INSERT INTO `field_value` VALUES ('1413', '39', '52', '_A_V_X_Y_Z_2', '2019-04-29 10:13:08', '2019-04-29 10:13:08');
INSERT INTO `field_value` VALUES ('1414', '40', '52', '_A_V_X_Y_Z_2', '2019-04-29 10:13:08', '2019-04-29 10:13:08');
INSERT INTO `field_value` VALUES ('1415', '41', '52', '_A_b_C_Q_d_E_4', '2019-04-29 10:13:08', '2019-04-29 10:13:08');
INSERT INTO `field_value` VALUES ('1416', '42', '52', '_A_B', '2019-04-29 10:13:08', '2019-04-29 10:13:08');
INSERT INTO `field_value` VALUES ('1417', '43', '52', '_A_B_C_Q_D_T_V', '2019-04-29 10:13:08', '2019-04-29 10:13:08');
INSERT INTO `field_value` VALUES ('1418', '16', '63', '_aProgramming a problem-oriented language_p_bhow the internals work_c', '2019-11-11 10:21:47', '2019-11-11 10:21:47');
INSERT INTO `field_value` VALUES ('1419', '15', '63', '_aMoore, Charles H._b_c_q_d', '2019-11-11 10:21:47', '2019-11-11 10:21:47');
INSERT INTO `field_value` VALUES ('1420', '17', '63', '_aFourth edition', '2019-11-11 10:21:47', '2019-11-11 10:21:47');
INSERT INTO `field_value` VALUES ('1421', '14', '63', '_a9781983362569_c_z', '2019-11-11 10:21:47', '2019-11-11 10:21:47');
INSERT INTO `field_value` VALUES ('1422', '20', '63', '_a_v', '2019-11-11 10:21:47', '2019-11-11 10:21:47');
INSERT INTO `field_value` VALUES ('1423', '18', '63', '_aSan Bernardino, California_bExmark_c2018', '2019-11-11 10:21:47', '2019-11-11 10:21:47');
INSERT INTO `field_value` VALUES ('1424', '19', '63', '_a181 p._b23 cm._cillustrations_e', '2019-11-11 10:21:47', '2019-11-11 10:21:47');

-- ----------------------------
-- Table structure for fines
-- ----------------------------
DROP TABLE IF EXISTS `fines`;
CREATE TABLE `fines` (
  `f_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patron_id` int(11) DEFAULT NULL,
  `loan_id` int(11) unsigned DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `remarks` text,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`f_id`),
  KEY `patron_id` (`patron_id`),
  KEY `loan_id` (`loan_id`),
  CONSTRAINT `fines_ibfk_1` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`),
  CONSTRAINT `fines_ibfk_2` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`loan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fines
-- ----------------------------

-- ----------------------------
-- Table structure for lib_material_type
-- ----------------------------
DROP TABLE IF EXISTS `lib_material_type`;
CREATE TABLE `lib_material_type` (
  `material_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  PRIMARY KEY (`material_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lib_material_type
-- ----------------------------
INSERT INTO `lib_material_type` VALUES ('1', 'photograph, print or drawing', null);
INSERT INTO `lib_material_type` VALUES ('2', 'rare book or manuscript', null);
INSERT INTO `lib_material_type` VALUES ('3', 'map', null);
INSERT INTO `lib_material_type` VALUES ('4', 'music and nonmusic recording', null);
INSERT INTO `lib_material_type` VALUES ('5', 'software or e-resource', null);
INSERT INTO `lib_material_type` VALUES ('6', 'film or video', null);
INSERT INTO `lib_material_type` VALUES ('7', 'periodical or newspaper', null);
INSERT INTO `lib_material_type` VALUES ('8', 'all text', null);

-- ----------------------------
-- Table structure for loans
-- ----------------------------
DROP TABLE IF EXISTS `loans`;
CREATE TABLE `loans` (
  `loan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patron_id` int(10) NOT NULL,
  `acc_num` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `returned` varchar(4) CHARACTER SET latin1 DEFAULT NULL,
  `returned_date` datetime DEFAULT NULL,
  `loaned_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`loan_id`),
  KEY `loans_idfk_patrons_patron_id` (`patron_id`),
  CONSTRAINT `loans_idfk_patrons_patron_id` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of loans
-- ----------------------------
INSERT INTO `loans` VALUES ('3', '189', '0005889-19', '2019-11-29 11:20:14', '1', '2019-11-26 11:21:08', '2019-11-26 11:20:14', '2019-11-26 11:20:14', '2019-11-26 11:21:08');
INSERT INTO `loans` VALUES ('4', '189', '0005886-19', '2019-11-29 11:20:14', '1', '2019-11-26 15:01:30', '2019-11-26 11:20:14', '2019-11-26 11:20:14', '2019-11-26 15:01:30');
INSERT INTO `loans` VALUES ('5', '189', '0005889-19', '2019-11-29 11:21:18', '1', '2019-11-26 14:50:55', '2019-11-26 11:21:18', '2019-11-26 11:21:18', '2019-11-26 14:50:55');
INSERT INTO `loans` VALUES ('6', '189', '0005889-19', '2019-11-29 15:00:14', '1', '2019-11-26 15:01:32', '2019-11-26 15:00:14', '2019-11-26 15:00:14', '2019-11-26 15:01:32');
INSERT INTO `loans` VALUES ('7', '189', '0005889-19', '2019-11-29 15:15:18', '1', '2019-11-27 10:37:38', '2019-11-26 15:15:18', '2019-11-26 15:15:18', '2019-11-27 10:37:38');
INSERT INTO `loans` VALUES ('8', '189', '0005886-19', '2019-11-29 15:15:18', '1', '2019-11-26 15:40:13', '2019-11-26 15:15:18', '2019-11-26 15:15:18', '2019-11-26 15:40:13');
INSERT INTO `loans` VALUES ('9', '189', '0005888-19', '2019-11-29 15:15:18', '1', '2019-11-27 10:37:48', '2019-11-26 15:15:18', '2019-11-26 15:15:18', '2019-11-27 10:37:48');
INSERT INTO `loans` VALUES ('10', '189', '0005875-19', '2019-11-29 15:40:22', '1', '2019-11-26 15:41:21', '2019-11-26 15:40:22', '2019-11-26 15:40:22', '2019-11-26 15:41:21');
INSERT INTO `loans` VALUES ('11', '189', '0005875-19', '2019-11-30 10:38:12', '1', '2019-11-28 14:34:36', '2019-11-27 10:38:12', '2019-11-27 10:38:12', '2019-11-28 14:34:36');
INSERT INTO `loans` VALUES ('12', '188', '0005875-19', '2019-12-01 14:41:32', '0', null, '2019-11-28 14:41:32', '2019-11-28 14:41:32', '2019-11-28 14:41:32');

-- ----------------------------
-- Table structure for loan_rules
-- ----------------------------
DROP TABLE IF EXISTS `loan_rules`;
CREATE TABLE `loan_rules` (
  `patron_category_id` int(10) unsigned NOT NULL,
  `fine` decimal(10,0) DEFAULT NULL,
  `max_loan_qty` int(5) DEFAULT NULL,
  `loan_length` int(11) DEFAULT NULL,
  PRIMARY KEY (`patron_category_id`),
  CONSTRAINT `lr_idfk_patron_categories_pcid` FOREIGN KEY (`patron_category_id`) REFERENCES `patron_categories` (`patron_category_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of loan_rules
-- ----------------------------
INSERT INTO `loan_rules` VALUES ('1', '20', '3', '3');
INSERT INTO `loan_rules` VALUES ('2', '43', '2', '3');

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `patron_id` int(11) DEFAULT NULL,
  `patron_ids` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`),
  KEY `cat_id` (`cat_id`),
  KEY `logs_ibfk_2` (`patron_id`),
  CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=306 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES ('117', null, '186', '3', '2017-06-22 18:14:17', '2017-06-29 10:53:04');
INSERT INTO `logs` VALUES ('118', null, '186', '2', '2017-06-27 18:13:55', '2017-06-27 18:13:55');
INSERT INTO `logs` VALUES ('119', null, '186', '2', '2017-06-27 18:14:11', '2017-06-27 18:14:11');
INSERT INTO `logs` VALUES ('120', null, '186', '2', '2017-06-27 18:14:13', '2017-06-27 18:14:13');
INSERT INTO `logs` VALUES ('121', null, '186', '2', '2017-06-27 18:14:14', '2017-06-27 18:14:14');
INSERT INTO `logs` VALUES ('122', null, '186', '2', '2017-06-27 18:14:15', '2017-06-27 18:14:15');
INSERT INTO `logs` VALUES ('123', null, '186', '2', '2017-06-22 18:14:17', '2017-06-29 10:52:59');
INSERT INTO `logs` VALUES ('124', null, '186', '2', '2017-06-22 18:14:17', '2017-06-29 10:52:56');
INSERT INTO `logs` VALUES ('125', null, '186', '2', '2017-06-27 18:14:17', '2017-06-27 18:14:17');
INSERT INTO `logs` VALUES ('126', null, '186', '2', '2017-06-22 18:14:17', '2017-06-29 10:53:02');
INSERT INTO `logs` VALUES ('127', null, '186', '2', '2017-06-27 18:14:19', '2017-06-27 18:14:19');
INSERT INTO `logs` VALUES ('128', null, '186', '2', '2017-06-27 18:14:19', '2017-06-27 18:14:19');
INSERT INTO `logs` VALUES ('129', null, '186', '2', '2017-06-27 18:14:20', '2017-06-27 18:14:20');
INSERT INTO `logs` VALUES ('130', null, '186', '2', '2017-06-27 18:14:21', '2017-06-27 18:14:21');
INSERT INTO `logs` VALUES ('131', null, '186', '1', '2017-06-27 18:14:53', '2017-06-27 18:14:53');
INSERT INTO `logs` VALUES ('132', null, '186', '1', '2017-06-22 18:14:17', '2017-06-29 10:53:07');
INSERT INTO `logs` VALUES ('133', null, '186', '1', '2017-06-23 18:14:17', '2017-06-29 10:53:22');
INSERT INTO `logs` VALUES ('134', null, '186', '1', '2017-06-27 18:14:56', '2017-06-27 18:14:56');
INSERT INTO `logs` VALUES ('135', null, '186', '1', '2017-06-27 18:14:57', '2017-06-27 18:14:57');
INSERT INTO `logs` VALUES ('136', null, '186', '2', '2017-06-29 11:00:14', '2017-06-29 11:00:14');
INSERT INTO `logs` VALUES ('137', null, '185', '2', '2017-06-29 11:00:16', '2017-06-29 11:00:16');
INSERT INTO `logs` VALUES ('138', null, '185', '1', '2017-06-29 10:52:28', '2017-06-29 10:52:28');
INSERT INTO `logs` VALUES ('139', null, '185', '1', '2017-06-29 10:53:36', '2017-06-29 10:53:36');
INSERT INTO `logs` VALUES ('140', null, '185', '1', '2017-06-29 10:53:37', '2017-06-29 10:53:37');
INSERT INTO `logs` VALUES ('141', null, '185', '1', '2017-06-29 10:53:38', '2017-06-29 10:53:38');
INSERT INTO `logs` VALUES ('142', null, '185', '1', '2017-06-29 10:53:38', '2017-06-29 10:53:38');
INSERT INTO `logs` VALUES ('143', null, '185', '1', '2017-06-29 10:53:39', '2017-06-29 10:53:39');
INSERT INTO `logs` VALUES ('144', null, '185', '2', '2017-06-29 10:53:46', '2017-06-29 10:53:46');
INSERT INTO `logs` VALUES ('145', null, '185', '2', '2017-06-29 10:53:47', '2017-06-29 10:53:47');
INSERT INTO `logs` VALUES ('146', null, '185', '2', '2017-06-29 10:53:48', '2017-06-29 10:53:48');
INSERT INTO `logs` VALUES ('147', null, '185', '2', '2017-06-29 10:53:49', '2017-06-29 10:53:49');
INSERT INTO `logs` VALUES ('148', null, '185', '3', '2017-06-29 11:00:19', '2017-06-29 11:00:19');
INSERT INTO `logs` VALUES ('149', null, '185', '3', '2017-06-29 10:54:07', '2017-06-29 10:54:07');
INSERT INTO `logs` VALUES ('150', null, '185', '1', '2017-06-29 11:00:21', '2017-06-29 11:00:21');
INSERT INTO `logs` VALUES ('151', null, '185', '3', '2017-06-28 10:54:09', '2017-06-29 10:54:38');
INSERT INTO `logs` VALUES ('152', null, '185', '2', '2017-06-29 11:00:24', '2017-06-29 11:00:24');
INSERT INTO `logs` VALUES ('153', null, '185', '1', '2017-06-29 11:02:35', '2017-06-29 11:02:35');
INSERT INTO `logs` VALUES ('154', null, '185', '1', '2017-06-29 11:02:36', '2017-06-29 11:02:36');
INSERT INTO `logs` VALUES ('155', null, '185', '1', '2017-06-29 11:02:37', '2017-06-29 11:02:37');
INSERT INTO `logs` VALUES ('156', null, '185', '1', '2017-06-29 11:02:38', '2017-06-29 11:02:38');
INSERT INTO `logs` VALUES ('157', null, '185', '1', '2017-06-29 11:02:39', '2017-06-29 11:02:39');
INSERT INTO `logs` VALUES ('158', null, '185', '1', '2017-06-29 11:02:40', '2017-06-29 11:02:40');
INSERT INTO `logs` VALUES ('159', null, '185', '1', '2017-06-29 11:02:41', '2017-06-29 11:02:41');
INSERT INTO `logs` VALUES ('160', null, '185', '1', '2017-06-29 11:02:42', '2017-06-29 11:02:42');
INSERT INTO `logs` VALUES ('161', null, '185', '1', '2017-06-29 11:02:59', '2017-06-29 11:02:59');
INSERT INTO `logs` VALUES ('162', null, '185', '1', '2017-06-29 11:03:00', '2017-06-29 11:03:00');
INSERT INTO `logs` VALUES ('163', null, '185', '1', '2017-06-29 11:03:01', '2017-06-29 11:03:01');
INSERT INTO `logs` VALUES ('164', null, '185', '1', '2017-06-29 11:03:02', '2017-06-29 11:03:02');
INSERT INTO `logs` VALUES ('165', null, '185', '1', '2017-06-29 11:03:02', '2017-06-29 11:03:02');
INSERT INTO `logs` VALUES ('166', null, '185', '1', '2017-06-29 11:03:03', '2017-06-29 11:03:03');
INSERT INTO `logs` VALUES ('167', null, '185', '1', '2017-06-29 11:03:04', '2017-06-29 11:03:04');
INSERT INTO `logs` VALUES ('168', null, '185', '1', '2017-06-29 11:03:04', '2017-06-29 11:03:04');
INSERT INTO `logs` VALUES ('169', null, '185', '1', '2017-06-29 11:03:05', '2017-06-29 11:03:05');
INSERT INTO `logs` VALUES ('170', null, '185', '1', '2017-06-29 11:03:06', '2017-06-29 11:03:06');
INSERT INTO `logs` VALUES ('171', null, '185', '1', '2017-06-29 11:03:06', '2017-06-29 11:03:06');
INSERT INTO `logs` VALUES ('172', null, '185', '1', '2017-06-29 11:03:07', '2017-06-29 11:03:07');
INSERT INTO `logs` VALUES ('173', null, '185', '1', '2017-06-29 11:03:07', '2017-06-29 11:03:07');
INSERT INTO `logs` VALUES ('174', null, '185', '1', '2017-06-29 11:03:08', '2017-06-29 11:03:08');
INSERT INTO `logs` VALUES ('175', null, '185', '1', '2017-06-29 11:03:09', '2017-06-29 11:03:09');
INSERT INTO `logs` VALUES ('176', null, '185', '1', '2017-06-29 11:03:09', '2017-06-29 11:03:09');
INSERT INTO `logs` VALUES ('177', null, '185', '1', '2017-06-29 11:03:10', '2017-06-29 11:03:10');
INSERT INTO `logs` VALUES ('178', null, '185', '1', '2017-06-29 11:03:11', '2017-06-29 11:03:11');
INSERT INTO `logs` VALUES ('179', null, '185', '1', '2017-06-29 11:03:12', '2017-06-29 11:03:12');
INSERT INTO `logs` VALUES ('180', null, '185', '1', '2017-06-29 11:03:12', '2017-06-29 11:03:12');
INSERT INTO `logs` VALUES ('181', null, '185', '1', '2017-06-29 11:03:13', '2017-06-29 11:03:13');
INSERT INTO `logs` VALUES ('182', null, '185', '1', '2017-06-29 11:04:07', '2017-06-29 11:04:07');
INSERT INTO `logs` VALUES ('183', null, '185', '1', '2017-06-29 11:04:07', '2017-06-29 11:04:07');
INSERT INTO `logs` VALUES ('184', null, '185', '1', '2017-06-29 11:04:07', '2017-06-29 11:04:07');
INSERT INTO `logs` VALUES ('185', null, '185', '2', '2017-06-29 11:04:16', '2017-06-29 11:04:16');
INSERT INTO `logs` VALUES ('186', null, '185', '2', '2017-06-29 11:04:16', '2017-06-29 11:04:16');
INSERT INTO `logs` VALUES ('187', null, '185', '2', '2017-06-29 11:04:17', '2017-06-29 11:04:17');
INSERT INTO `logs` VALUES ('188', null, '185', '2', '2017-06-29 11:04:17', '2017-06-29 11:04:17');
INSERT INTO `logs` VALUES ('189', null, '185', '2', '2017-06-29 11:04:18', '2017-06-29 11:04:18');
INSERT INTO `logs` VALUES ('190', null, '185', '2', '2017-06-29 11:04:19', '2017-06-29 11:04:19');
INSERT INTO `logs` VALUES ('191', null, '185', '2', '2017-06-29 11:04:19', '2017-06-29 11:04:19');
INSERT INTO `logs` VALUES ('192', null, '185', '2', '2017-06-29 11:04:20', '2017-06-29 11:04:20');
INSERT INTO `logs` VALUES ('193', null, '185', '2', '2017-06-29 11:04:21', '2017-06-29 11:04:21');
INSERT INTO `logs` VALUES ('194', null, '185', '2', '2017-06-29 11:04:22', '2017-06-29 11:04:22');
INSERT INTO `logs` VALUES ('195', null, '185', '2', '2017-06-29 11:04:23', '2017-06-29 11:04:23');
INSERT INTO `logs` VALUES ('196', null, '185', '2', '2017-06-29 11:04:23', '2017-06-29 11:04:23');
INSERT INTO `logs` VALUES ('197', null, '185', '2', '2017-06-29 11:04:24', '2017-06-29 11:04:24');
INSERT INTO `logs` VALUES ('198', null, '185', '2', '2017-06-29 11:04:25', '2017-06-29 11:04:25');
INSERT INTO `logs` VALUES ('199', null, '185', '2', '2017-06-29 11:04:25', '2017-06-29 11:04:25');
INSERT INTO `logs` VALUES ('200', null, '185', '2', '2017-06-29 11:04:26', '2017-06-29 11:04:26');
INSERT INTO `logs` VALUES ('201', null, '185', '2', '2017-06-29 11:04:26', '2017-06-29 11:04:26');
INSERT INTO `logs` VALUES ('202', null, '185', '2', '2017-06-29 11:04:27', '2017-06-29 11:04:27');
INSERT INTO `logs` VALUES ('203', '188', '188', '2', '2017-07-21 11:08:18', '2017-07-21 11:08:18');
INSERT INTO `logs` VALUES ('204', '188', '188', '2', '2017-07-21 11:08:22', '2017-07-21 11:08:22');
INSERT INTO `logs` VALUES ('205', '216', '216', '1', '2017-08-15 15:25:33', '2017-08-15 15:25:33');
INSERT INTO `logs` VALUES ('206', '216', '216', '1', '2017-08-15 15:25:34', '2017-08-15 15:25:34');
INSERT INTO `logs` VALUES ('207', '216', '216', '1', '2017-08-15 15:25:35', '2017-08-15 15:25:35');
INSERT INTO `logs` VALUES ('208', '216', '216', '1', '2017-08-15 15:25:36', '2017-08-15 15:25:36');
INSERT INTO `logs` VALUES ('209', '216', '216', '2', '2017-08-15 15:26:10', '2017-08-15 15:26:10');
INSERT INTO `logs` VALUES ('210', '216', '216', '2', '2017-08-15 15:26:11', '2017-08-15 15:26:11');
INSERT INTO `logs` VALUES ('211', '216', '216', '2', '2017-08-15 15:26:13', '2017-08-15 15:26:13');
INSERT INTO `logs` VALUES ('212', '216', '216', '2', '2017-08-15 15:26:14', '2017-08-15 15:26:14');
INSERT INTO `logs` VALUES ('213', '216', '216', '2', '2017-08-15 15:26:15', '2017-08-15 15:26:15');
INSERT INTO `logs` VALUES ('214', '216', '216', '2', '2017-08-15 15:26:16', '2017-08-15 15:26:16');
INSERT INTO `logs` VALUES ('215', '216', '216', '2', '2017-08-15 15:26:16', '2017-08-15 15:26:16');
INSERT INTO `logs` VALUES ('216', '216', '216', '2', '2017-08-15 15:26:17', '2017-08-15 15:26:17');
INSERT INTO `logs` VALUES ('217', '216', '216', '2', '2017-08-15 15:26:18', '2017-08-15 15:26:18');
INSERT INTO `logs` VALUES ('218', '216', '216', '2', '2017-08-15 15:26:19', '2017-08-15 15:26:19');
INSERT INTO `logs` VALUES ('219', '216', '216', '2', '2017-08-15 15:26:20', '2017-08-15 15:26:20');
INSERT INTO `logs` VALUES ('220', '217', '217', '2', '2017-08-15 15:27:04', '2017-08-15 15:27:04');
INSERT INTO `logs` VALUES ('221', '217', '217', '2', '2017-08-15 15:27:06', '2017-08-15 15:27:06');
INSERT INTO `logs` VALUES ('222', '217', '217', '2', '2017-08-15 15:27:08', '2017-08-15 15:27:08');
INSERT INTO `logs` VALUES ('223', '217', '217', '3', '2017-08-15 15:27:52', '2017-08-15 15:27:52');
INSERT INTO `logs` VALUES ('224', '217', '217', '3', '2017-08-15 15:27:53', '2017-08-15 15:27:53');
INSERT INTO `logs` VALUES ('225', '217', '217', '1', '2017-08-15 15:28:24', '2017-08-15 15:28:24');
INSERT INTO `logs` VALUES ('226', '217', '217', '1', '2017-08-15 15:28:25', '2017-08-15 15:28:25');
INSERT INTO `logs` VALUES ('227', '217', '217', '1', '2017-08-15 15:28:27', '2017-08-15 15:28:27');
INSERT INTO `logs` VALUES ('228', '217', '217', '1', '2017-08-15 15:28:28', '2017-08-15 15:28:28');
INSERT INTO `logs` VALUES ('229', '217', '217', '1', '2017-08-15 15:28:30', '2017-08-15 15:28:30');
INSERT INTO `logs` VALUES ('230', '217', '217', '1', '2017-08-15 15:28:31', '2017-08-15 15:28:31');
INSERT INTO `logs` VALUES ('231', '216', '216', '1', '2017-08-15 15:28:35', '2017-08-15 15:28:35');
INSERT INTO `logs` VALUES ('232', '216', '216', '1', '2017-08-15 15:28:36', '2017-08-15 15:28:36');
INSERT INTO `logs` VALUES ('233', '216', '216', '1', '2017-08-15 15:28:37', '2017-08-15 15:28:37');
INSERT INTO `logs` VALUES ('234', '216', '216', '1', '2017-08-15 15:28:37', '2017-08-15 15:28:37');
INSERT INTO `logs` VALUES ('235', '216', '216', '1', '2017-08-15 15:28:39', '2017-08-15 15:28:39');
INSERT INTO `logs` VALUES ('236', '216', '216', '1', '2017-08-15 15:29:00', '2017-08-15 15:29:00');
INSERT INTO `logs` VALUES ('237', '216', '216', '1', '2017-08-15 15:29:01', '2017-08-15 15:29:01');
INSERT INTO `logs` VALUES ('238', '216', '216', '1', '2017-08-15 15:29:02', '2017-08-15 15:29:02');
INSERT INTO `logs` VALUES ('239', '216', '216', '1', '2017-08-15 15:29:02', '2017-08-15 15:29:02');
INSERT INTO `logs` VALUES ('240', '216', '216', '1', '2017-08-15 15:29:03', '2017-08-15 15:29:03');
INSERT INTO `logs` VALUES ('241', '216', '216', '1', '2017-08-15 15:29:03', '2017-08-15 15:29:03');
INSERT INTO `logs` VALUES ('242', '216', '216', '1', '2017-08-15 15:29:04', '2017-08-15 15:29:04');
INSERT INTO `logs` VALUES ('243', '216', '216', '1', '2017-08-15 15:29:05', '2017-08-15 15:29:05');
INSERT INTO `logs` VALUES ('244', '216', '216', '1', '2017-08-15 15:29:06', '2017-08-15 15:29:06');
INSERT INTO `logs` VALUES ('245', '216', '216', '1', '2017-08-15 15:29:07', '2017-08-15 15:29:07');
INSERT INTO `logs` VALUES ('246', '216', '216', '1', '2017-08-15 15:29:07', '2017-08-15 15:29:07');
INSERT INTO `logs` VALUES ('247', '216', '216', '1', '2017-08-15 15:29:08', '2017-08-15 15:29:08');
INSERT INTO `logs` VALUES ('248', '216', '216', '1', '2017-08-15 15:29:08', '2017-08-15 15:29:08');
INSERT INTO `logs` VALUES ('249', '216', '216', '1', '2017-08-15 15:29:10', '2017-08-15 15:29:10');
INSERT INTO `logs` VALUES ('250', '216', '216', '1', '2017-08-15 15:29:11', '2017-08-15 15:29:11');
INSERT INTO `logs` VALUES ('251', '216', '216', '1', '2017-08-15 15:29:11', '2017-08-15 15:29:11');
INSERT INTO `logs` VALUES ('252', '216', '216', '1', '2017-08-15 15:29:12', '2017-08-15 15:29:12');
INSERT INTO `logs` VALUES ('253', '216', '216', '1', '2017-08-15 15:29:13', '2017-08-15 15:29:13');
INSERT INTO `logs` VALUES ('254', '216', '216', '1', '2017-08-15 15:29:14', '2017-08-15 15:29:14');
INSERT INTO `logs` VALUES ('255', '216', '216', '1', '2017-08-15 15:29:14', '2017-08-15 15:29:14');
INSERT INTO `logs` VALUES ('256', '216', '216', '1', '2017-08-15 15:29:15', '2017-08-15 15:29:15');
INSERT INTO `logs` VALUES ('257', '216', '216', '1', '2017-08-15 15:29:16', '2017-08-15 15:29:16');
INSERT INTO `logs` VALUES ('258', '217', '217', '1', '2017-08-15 15:29:19', '2017-08-15 15:29:19');
INSERT INTO `logs` VALUES ('259', '217', '217', '1', '2017-08-15 15:29:20', '2017-08-15 15:29:20');
INSERT INTO `logs` VALUES ('260', '217', '217', '1', '2017-08-15 15:29:25', '2017-08-15 15:29:25');
INSERT INTO `logs` VALUES ('261', '217', '217', '1', '2017-08-15 15:29:25', '2017-08-15 15:29:25');
INSERT INTO `logs` VALUES ('262', '217', '217', '1', '2017-08-15 15:29:25', '2017-08-15 15:29:25');
INSERT INTO `logs` VALUES ('263', '217', '217', '1', '2017-08-15 15:29:27', '2017-08-15 15:29:27');
INSERT INTO `logs` VALUES ('264', '217', '217', '1', '2017-08-15 15:29:30', '2017-08-15 15:29:30');
INSERT INTO `logs` VALUES ('265', '217', '217', '1', '2017-08-15 15:29:32', '2017-08-15 15:29:32');
INSERT INTO `logs` VALUES ('266', '217', '217', '1', '2017-08-15 15:29:33', '2017-08-15 15:29:33');
INSERT INTO `logs` VALUES ('267', '217', '217', '1', '2017-08-15 15:29:33', '2017-08-15 15:29:33');
INSERT INTO `logs` VALUES ('268', '217', '217', '1', '2017-08-15 15:29:34', '2017-08-15 15:29:34');
INSERT INTO `logs` VALUES ('269', '217', '217', '1', '2017-08-15 15:29:35', '2017-08-15 15:29:35');
INSERT INTO `logs` VALUES ('270', '217', '217', '1', '2017-08-15 15:29:36', '2017-08-15 15:29:36');
INSERT INTO `logs` VALUES ('271', '217', '217', '1', '2017-08-15 15:29:37', '2017-08-15 15:29:37');
INSERT INTO `logs` VALUES ('272', '217', '217', '1', '2017-08-15 15:29:37', '2017-08-15 15:29:37');
INSERT INTO `logs` VALUES ('273', '217', '217', '1', '2017-08-15 15:29:39', '2017-08-15 15:29:39');
INSERT INTO `logs` VALUES ('274', '217', '217', '1', '2017-08-15 15:29:40', '2017-08-15 15:29:40');
INSERT INTO `logs` VALUES ('275', '217', '217', '1', '2017-08-15 15:29:41', '2017-08-15 15:29:41');
INSERT INTO `logs` VALUES ('276', '217', '217', '1', '2017-08-15 15:29:42', '2017-08-15 15:29:42');
INSERT INTO `logs` VALUES ('277', '217', '217', '1', '2017-08-15 15:29:42', '2017-08-15 15:29:42');
INSERT INTO `logs` VALUES ('278', '217', '217', '1', '2017-08-15 15:29:49', '2017-08-15 15:29:49');
INSERT INTO `logs` VALUES ('279', '217', '217', '1', '2017-08-15 15:29:50', '2017-08-15 15:29:50');
INSERT INTO `logs` VALUES ('280', '217', '217', '1', '2017-08-15 15:29:52', '2017-08-15 15:29:52');
INSERT INTO `logs` VALUES ('281', '217', '217', '1', '2017-08-15 15:29:53', '2017-08-15 15:29:53');
INSERT INTO `logs` VALUES ('282', '217', '217', '1', '2017-08-15 15:29:54', '2017-08-15 15:29:54');
INSERT INTO `logs` VALUES ('283', '217', '217', '1', '2017-08-15 15:29:55', '2017-08-15 15:29:55');
INSERT INTO `logs` VALUES ('284', '217', '217', '1', '2017-08-15 15:29:57', '2017-08-15 15:29:57');
INSERT INTO `logs` VALUES ('285', '217', '217', '1', '2017-08-15 15:29:58', '2017-08-15 15:29:58');
INSERT INTO `logs` VALUES ('286', '217', '217', '1', '2017-08-15 15:29:59', '2017-08-15 15:29:59');
INSERT INTO `logs` VALUES ('287', '217', '217', '1', '2017-08-15 15:30:00', '2017-08-15 15:30:00');
INSERT INTO `logs` VALUES ('288', '217', '217', '1', '2017-08-15 15:30:01', '2017-08-15 15:30:01');
INSERT INTO `logs` VALUES ('289', '188', '188', '1', '2017-09-13 11:25:36', '2017-09-13 11:25:36');
INSERT INTO `logs` VALUES ('290', '204', '204', '1', '2017-09-13 11:25:38', '2017-09-13 11:25:38');
INSERT INTO `logs` VALUES ('291', '205', '205', '1', '2017-09-13 11:25:39', '2017-09-13 11:25:39');
INSERT INTO `logs` VALUES ('292', '206', '206', '1', '2017-09-13 11:25:41', '2017-09-13 11:25:41');
INSERT INTO `logs` VALUES ('293', '206', '206', '1', '2017-09-13 11:25:41', '2017-09-13 11:25:41');
INSERT INTO `logs` VALUES ('294', '206', '206', '1', '2017-09-13 11:25:42', '2017-09-13 11:25:42');
INSERT INTO `logs` VALUES ('295', '206', '206', '1', '2017-09-13 11:25:42', '2017-09-13 11:25:42');
INSERT INTO `logs` VALUES ('296', '204', '204', '2', '2017-09-13 11:25:48', '2017-09-13 11:25:48');
INSERT INTO `logs` VALUES ('297', '188', '188', '2', '2017-09-13 11:25:49', '2017-09-13 11:25:49');
INSERT INTO `logs` VALUES ('298', '204', '204', '2', '2017-09-13 11:25:50', '2017-09-13 11:25:50');
INSERT INTO `logs` VALUES ('299', '189', '189', '2', '2018-01-03 14:24:13', '2018-01-03 14:24:13');
INSERT INTO `logs` VALUES ('300', '188', '188', '2', '2018-01-03 14:24:18', '2018-01-03 14:24:18');
INSERT INTO `logs` VALUES ('301', '204', '204', '2', '2018-01-03 14:24:19', '2018-01-03 14:24:19');
INSERT INTO `logs` VALUES ('302', '225', '225', '2', '2018-01-03 14:24:25', '2018-01-03 14:24:25');
INSERT INTO `logs` VALUES ('303', '189', '189', '2', '2018-01-03 14:24:27', '2018-01-03 14:24:27');
INSERT INTO `logs` VALUES ('304', '188', '188', '2', '2018-01-03 14:24:59', '2018-01-03 14:24:59');
INSERT INTO `logs` VALUES ('305', '204', '204', '2', '2018-01-29 17:33:25', '2018-01-29 17:33:25');

-- ----------------------------
-- Table structure for marc_subfield_structure
-- ----------------------------
DROP TABLE IF EXISTS `marc_subfield_structure`;
CREATE TABLE `marc_subfield_structure` (
  `sub_id` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) unsigned NOT NULL,
  `tagsubfield` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `tagsubfieldname` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `repeatable` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sub_id`),
  KEY `mss_idfk_mts_id` (`id`),
  CONSTRAINT `mss_idfk_mts_id` FOREIGN KEY (`id`) REFERENCES `marc_tag_structure` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of marc_subfield_structure
-- ----------------------------
INSERT INTO `marc_subfield_structure` VALUES ('22', '14', 'a', 'international standard book number', 'none', '2017-06-28 13:21:05', '2017-06-28 13:21:05');
INSERT INTO `marc_subfield_structure` VALUES ('23', '14', 'c', 'terms of availability', 'none', '2017-06-28 13:21:23', '2017-06-28 13:21:23');
INSERT INTO `marc_subfield_structure` VALUES ('24', '14', 'z', 'cancelled/invalid ISBN', 'r', '2017-06-28 13:21:41', '2017-06-28 13:21:41');
INSERT INTO `marc_subfield_structure` VALUES ('25', '15', 'a', 'personal name', 'none', '2017-06-28 13:38:15', '2017-06-28 13:38:15');
INSERT INTO `marc_subfield_structure` VALUES ('26', '15', 'b', 'numeration', 'none', '2017-06-28 13:41:05', '2017-06-28 13:41:05');
INSERT INTO `marc_subfield_structure` VALUES ('27', '15', 'c', 'titles and other words associated with a name', 'r', '2017-06-28 13:44:04', '2017-06-28 13:44:04');
INSERT INTO `marc_subfield_structure` VALUES ('28', '15', 'q', 'fuller form of a name', 'none', '2017-06-28 13:44:31', '2017-06-28 13:44:31');
INSERT INTO `marc_subfield_structure` VALUES ('29', '15', 'd', 'dates associated with a name', 'none', '2017-06-28 13:46:44', '2017-06-28 13:46:44');
INSERT INTO `marc_subfield_structure` VALUES ('30', '16', 'a', 'title proper', 'none', '2017-06-28 13:49:52', '2017-06-28 13:49:52');
INSERT INTO `marc_subfield_structure` VALUES ('31', '16', 'p', 'name of part/section of a work', 'r', '2017-06-28 13:50:48', '2017-06-28 13:50:48');
INSERT INTO `marc_subfield_structure` VALUES ('32', '16', 'b', 'remainder of title', 'none', '2017-06-28 13:51:22', '2017-06-28 13:51:22');
INSERT INTO `marc_subfield_structure` VALUES ('33', '16', 'c', 'remainder of title page/statement of responsibility', 'none', '2017-06-28 13:51:47', '2017-06-28 13:51:47');
INSERT INTO `marc_subfield_structure` VALUES ('34', '17', 'a', 'edition statement', 'none', '2017-06-28 13:57:52', '2017-06-28 13:57:52');
INSERT INTO `marc_subfield_structure` VALUES ('35', '18', 'a', 'place of publication, distribution, etc.', 'r', '2017-06-28 14:06:56', '2017-06-28 14:06:56');
INSERT INTO `marc_subfield_structure` VALUES ('36', '18', 'b', 'name of publisher , distributor, etc.', 'r', '2017-06-28 14:07:22', '2017-06-28 14:07:22');
INSERT INTO `marc_subfield_structure` VALUES ('37', '18', 'c', 'date of publication, distribution, etc.', 'r', '2017-06-28 14:08:28', '2017-06-28 14:08:28');
INSERT INTO `marc_subfield_structure` VALUES ('38', '19', 'a', 'extent (number of pages)', 'none', '2017-06-28 14:12:02', '2017-06-28 14:12:02');
INSERT INTO `marc_subfield_structure` VALUES ('39', '19', 'b', 'other physical details', 'none', '2017-06-28 14:12:24', '2017-06-28 14:12:24');
INSERT INTO `marc_subfield_structure` VALUES ('40', '19', 'c', 'dimensions (cm)', 'r', '2017-06-28 14:12:37', '2017-06-28 14:12:37');
INSERT INTO `marc_subfield_structure` VALUES ('41', '19', 'e', 'accompanying material', 'none', '2017-06-28 14:12:52', '2017-06-28 14:12:52');
INSERT INTO `marc_subfield_structure` VALUES ('42', '20', 'a', 'series statement', 'r', '2017-06-28 14:19:18', '2017-06-28 14:19:18');
INSERT INTO `marc_subfield_structure` VALUES ('43', '20', 'v', 'volume number', 'r', '2017-06-28 14:19:31', '2017-06-28 14:19:31');
INSERT INTO `marc_subfield_structure` VALUES ('44', '21', 'a', 'ORIGINAL CATALOGING AGENCY', 'none', '2018-04-12 10:40:42', '2018-04-12 10:40:42');
INSERT INTO `marc_subfield_structure` VALUES ('45', '21', 'c', 'TRANSCRIBING AGENCY', 'none', '2018-04-12 10:41:20', '2018-04-12 10:41:20');
INSERT INTO `marc_subfield_structure` VALUES ('46', '21', 'D', 'MODIFYING AGENCY', 'r', '2018-04-12 10:41:55', '2018-04-12 10:41:55');
INSERT INTO `marc_subfield_structure` VALUES ('47', '22', 'a', 'MEETING/CONFERENCE OR JURISDICTION NAME', 'none', '2018-04-12 10:44:25', '2018-04-12 10:44:25');
INSERT INTO `marc_subfield_structure` VALUES ('48', '22', 'n', 'NUMBER OF MEETING', 'none', '2018-04-12 10:44:42', '2018-04-12 10:44:42');
INSERT INTO `marc_subfield_structure` VALUES ('49', '22', 'd', 'DATE OF MEETING', 'none', '2018-04-12 10:44:58', '2018-04-12 10:44:58');
INSERT INTO `marc_subfield_structure` VALUES ('50', '22', 'c', 'LOCATION OF MEETING /CONFERENCE', 'none', '2018-04-12 10:45:23', '2018-04-12 10:45:23');
INSERT INTO `marc_subfield_structure` VALUES ('51', '23', 'a', 'UNIFORM TITLE', 'none', '2018-04-12 10:46:43', '2018-04-12 10:46:43');
INSERT INTO `marc_subfield_structure` VALUES ('52', '23', 'p', 'NAME OF PART / SECTION OF WORK', 'r', '2018-04-12 10:47:11', '2018-04-12 10:47:11');
INSERT INTO `marc_subfield_structure` VALUES ('53', '23', 'l', 'LANGUAGE OF WORK', 'none', '2018-04-12 10:47:29', '2018-04-12 10:47:29');
INSERT INTO `marc_subfield_structure` VALUES ('54', '23', 's', 'VERSION', 'none', '2018-04-12 10:47:44', '2018-04-12 10:47:44');
INSERT INTO `marc_subfield_structure` VALUES ('55', '23', 'f', 'DATE OF A WORK', 'none', '2018-04-12 10:48:03', '2018-04-12 10:48:03');
INSERT INTO `marc_subfield_structure` VALUES ('56', '24', 'a', 'UNIFORM TITLE', 'none', '2018-04-12 10:50:18', '2018-04-12 10:50:18');
INSERT INTO `marc_subfield_structure` VALUES ('57', '24', 'l', 'LANGUAGE OF WORK', 'none', '2018-04-12 10:50:36', '2018-04-12 10:50:36');
INSERT INTO `marc_subfield_structure` VALUES ('58', '24', 'f', 'DATE OF A WORK', 'none', '2018-04-12 10:50:55', '2018-04-12 10:50:55');
INSERT INTO `marc_subfield_structure` VALUES ('59', '25', 'a', 'TITLE PROPER', 'none', '2018-04-12 10:52:39', '2018-04-12 10:52:39');
INSERT INTO `marc_subfield_structure` VALUES ('60', '26', 'a', 'CONTENT TYPE', 'none', '2018-04-12 10:53:47', '2018-04-12 10:53:47');
INSERT INTO `marc_subfield_structure` VALUES ('61', '26', '2', 'RDA CONTENT', 'none', '2018-04-12 10:54:34', '2018-04-12 10:54:34');
INSERT INTO `marc_subfield_structure` VALUES ('62', '27', 'a', 'MEDIA TYPE', 'none', '2018-04-12 10:55:14', '2018-04-12 10:55:14');
INSERT INTO `marc_subfield_structure` VALUES ('63', '27', '2', 'RDA MEDIA', 'none', '2018-04-12 10:55:26', '2018-04-12 10:55:26');
INSERT INTO `marc_subfield_structure` VALUES ('64', '28', 'a', 'CARRIER TYPE', 'none', '2018-04-12 10:56:11', '2018-04-12 10:56:11');
INSERT INTO `marc_subfield_structure` VALUES ('65', '28', '2', 'RDA CARRIER', 'none', '2018-04-12 10:56:29', '2018-04-12 10:56:29');
INSERT INTO `marc_subfield_structure` VALUES ('66', '29', 'a', 'TITLE', 'none', '2018-04-12 11:00:19', '2018-04-12 11:00:19');
INSERT INTO `marc_subfield_structure` VALUES ('67', '29', 'v', 'VOLUME NUMBER', 'none', '2018-04-12 11:00:38', '2018-04-12 11:00:38');
INSERT INTO `marc_subfield_structure` VALUES ('68', '30', 'a', 'GENERAL NOTE IS USED WHEN NO SPECIAL SPECIALIZED NOTE FIELD HAS BEEN DEFINED FOR THE INFORMATION', 'none', '2018-04-12 11:03:17', '2018-04-12 11:03:17');
INSERT INTO `marc_subfield_structure` VALUES ('69', '31', 'a', '\"WITH\" NOTE', 'none', '2018-04-12 13:18:19', '2018-04-12 13:18:19');
INSERT INTO `marc_subfield_structure` VALUES ('70', '32', 'a', 'BIBLIOGRAPHY , ETC. NOTE', 'none', '2018-04-12 13:19:13', '2018-04-12 13:19:13');
INSERT INTO `marc_subfield_structure` VALUES ('71', '33', 'a', 'FORMATTED CONTENTS NOTE', 'none', '2018-04-12 13:20:21', '2018-04-12 13:20:21');
INSERT INTO `marc_subfield_structure` VALUES ('72', '34', 'a', 'SUMMARY , ABSTRACT , OR ANNOTATION', 'none', '2018-04-12 13:22:08', '2018-04-12 13:22:08');
INSERT INTO `marc_subfield_structure` VALUES ('73', '34', 'B', 'EXPANSION OF SUMMARY NOTE', 'none', '2018-04-12 13:22:30', '2018-04-12 13:22:30');
INSERT INTO `marc_subfield_structure` VALUES ('74', '35', 'a', 'PERTAINS TO THE AGE LEVEL AT WHICH THE ITEM WILL MOST LIKELY BE OF INTEREST', 'none', '2018-04-12 13:23:51', '2018-04-12 13:23:51');
INSERT INTO `marc_subfield_structure` VALUES ('75', '36', 'P', 'INTRODUCTORY PHRASE', 'none', '2018-04-12 13:24:57', '2018-04-12 13:24:57');
INSERT INTO `marc_subfield_structure` VALUES ('76', '36', 'C', 'PUBLICATION OF THE ORIGINAL', 'none', '2018-04-12 13:25:13', '2018-04-12 13:25:13');
INSERT INTO `marc_subfield_structure` VALUES ('77', '36', 'T', 'TITLE OF THE ORIGINAL', 'none', '2018-04-12 13:25:25', '2018-04-12 13:25:25');
INSERT INTO `marc_subfield_structure` VALUES ('78', '37', 'A', 'PERSONAL NAME (SURNAME AND FORENAME)', 'none', '2018-06-13 14:40:45', '2018-06-13 14:40:45');
INSERT INTO `marc_subfield_structure` VALUES ('79', '37', 'B', 'NUMERATION', 'none', '2018-04-12 13:26:43', '2018-04-12 13:26:43');
INSERT INTO `marc_subfield_structure` VALUES ('80', '37', 'C', 'TITLE AND OTHER WORDS ASSOCIATE WITH THE NAME', 'r', '2018-04-12 13:27:02', '2018-04-12 13:27:02');
INSERT INTO `marc_subfield_structure` VALUES ('81', '37', 'Q', 'FULLER FORM OF NAME', 'none', '2018-04-12 13:27:24', '2018-04-12 13:27:24');
INSERT INTO `marc_subfield_structure` VALUES ('82', '37', 'D', 'DATES ASSOCIATE WITH A NAME (GENERALLY, YEAR OF BIRTH)', 'none', '2018-04-12 13:28:04', '2018-04-12 13:28:04');
INSERT INTO `marc_subfield_structure` VALUES ('83', '37', 'T', 'TITLE OF WORK', 'none', '2018-04-12 13:28:18', '2018-04-12 13:28:18');
INSERT INTO `marc_subfield_structure` VALUES ('84', '37', 'V', 'FORM SUBDIVISION', 'r', '2018-04-12 13:28:35', '2018-04-12 13:28:35');
INSERT INTO `marc_subfield_structure` VALUES ('85', '37', 'X', 'GENERAL SUBDIVISION', 'r', '2018-04-12 13:35:59', '2018-04-12 13:35:59');
INSERT INTO `marc_subfield_structure` VALUES ('86', '37', 'Y', 'CHRONOLOGICAL SUBDIVISION', 'r', '2018-04-12 13:39:28', '2018-04-12 13:39:28');
INSERT INTO `marc_subfield_structure` VALUES ('87', '37', 'z', 'GEOGRAPHIC SUBDIVISION', 'r', '2018-04-12 13:39:58', '2018-04-12 13:39:58');
INSERT INTO `marc_subfield_structure` VALUES ('88', '37', '2', 'SOURCE OF HEADING OR ITEM (USED WITH SECOND INDICATOR OF 7)', 'none', '2018-04-12 13:40:34', '2018-04-12 13:40:34');
INSERT INTO `marc_subfield_structure` VALUES ('89', '38', 'A', 'CORPORATE NAME OR JURISDICTION NAME AS ENTRY ELEMENT', 'none', '2018-04-12 13:43:56', '2018-04-12 13:43:56');
INSERT INTO `marc_subfield_structure` VALUES ('90', '38', 'B', 'SUBORDINATE UNIT', 'r', '2018-04-12 13:44:27', '2018-04-12 13:44:27');
INSERT INTO `marc_subfield_structure` VALUES ('91', '38', 'V', 'FORM SUBDIVISION', 'r', '2018-04-12 13:45:23', '2018-04-12 13:45:23');
INSERT INTO `marc_subfield_structure` VALUES ('92', '38', 'X', 'GENERAL SUBDIVISION', 'r', '2018-04-12 13:45:36', '2018-04-12 13:45:36');
INSERT INTO `marc_subfield_structure` VALUES ('93', '38', 'Y', 'CHRONOLOGICAL SUBDIVISION', 'r', '2018-04-12 13:45:52', '2018-04-12 13:45:52');
INSERT INTO `marc_subfield_structure` VALUES ('94', '38', 'Z', 'GEOGRAPHICAL SUBDIVISION R', 'r', '2018-04-12 13:46:14', '2018-04-12 13:46:14');
INSERT INTO `marc_subfield_structure` VALUES ('95', '38', '2', 'SOURCE OF HEADING OR TERM (USED WITH 2ND INDICATOR OF 7)', 'none', '2018-04-12 13:46:42', '2018-04-12 13:46:42');
INSERT INTO `marc_subfield_structure` VALUES ('96', '39', 'A', 'TOPICAL TERM', 'none', '2018-04-12 13:48:48', '2018-04-12 13:48:48');
INSERT INTO `marc_subfield_structure` VALUES ('97', '39', 'V', 'FORM SUBDIVISION', 'r', '2018-04-12 13:49:02', '2018-04-12 13:49:02');
INSERT INTO `marc_subfield_structure` VALUES ('98', '39', 'X', 'GENERAL SUBDIVISION', 'r', '2018-04-12 13:49:39', '2018-04-12 13:49:39');
INSERT INTO `marc_subfield_structure` VALUES ('99', '39', 'Y', 'CHRONOLOGICAL SUBDIVISION', 'r', '2018-04-12 13:50:00', '2018-04-12 13:50:00');
INSERT INTO `marc_subfield_structure` VALUES ('100', '39', 'Z', 'GEOGRAPHIC SUBDIVISION', 'r', '2018-04-12 13:50:45', '2018-04-12 13:50:45');
INSERT INTO `marc_subfield_structure` VALUES ('101', '39', '2', 'SOURCE OF HEADING OR TERM USED WITH 2ND INDICATOR OF 7', 'none', '2018-04-12 13:51:39', '2018-04-12 13:51:39');
INSERT INTO `marc_subfield_structure` VALUES ('102', '40', 'A', 'GEOGRAPHIC NAME', 'none', '2018-04-12 13:52:47', '2018-04-12 13:52:47');
INSERT INTO `marc_subfield_structure` VALUES ('103', '40', 'V', 'FORM SUBDIVISION', 'r', '2018-04-12 13:53:06', '2018-04-12 13:53:06');
INSERT INTO `marc_subfield_structure` VALUES ('104', '40', 'X', 'GENERAL SUBDIVISION', 'r', '2018-04-12 13:53:16', '2018-04-12 13:53:16');
INSERT INTO `marc_subfield_structure` VALUES ('105', '40', 'Y', 'CHRONOLOGICAL SUBDIVISION', 'r', '2018-04-12 13:53:37', '2018-04-12 13:53:37');
INSERT INTO `marc_subfield_structure` VALUES ('106', '40', 'Z', 'GEOGRAPHIC SUBDIVISION', 'r', '2018-04-12 13:53:51', '2018-04-12 13:53:51');
INSERT INTO `marc_subfield_structure` VALUES ('107', '40', '2', 'SOURCE OF HEADING OR TERM (USED WITH 2ND INDICATOR OF 7)', 'none', '2018-04-12 13:54:16', '2018-04-12 13:54:16');
INSERT INTO `marc_subfield_structure` VALUES ('108', '41', 'A', 'PERSONAL NAME', 'none', '2018-04-12 13:56:13', '2018-04-12 13:56:13');
INSERT INTO `marc_subfield_structure` VALUES ('109', '41', 'b', 'NUMERATION', 'none', '2018-04-12 13:56:43', '2018-04-12 13:56:43');
INSERT INTO `marc_subfield_structure` VALUES ('110', '41', 'C', 'TITLES AND OTHER WORDS ASSOCIATED WITH A NAME', 'r', '2018-04-12 13:57:21', '2018-04-12 13:57:21');
INSERT INTO `marc_subfield_structure` VALUES ('111', '41', 'Q', 'FULLER FORM OF NAME', 'none', '2018-04-12 13:57:56', '2018-04-12 13:57:56');
INSERT INTO `marc_subfield_structure` VALUES ('112', '41', 'd', 'DATES ASSOCIATED WITH A NAME (GENERALLY, YEAR OF BIRTH)', 'none', '2018-04-12 13:59:29', '2018-04-12 13:59:29');
INSERT INTO `marc_subfield_structure` VALUES ('113', '41', 'E', 'RELATOR TERM (SUCH AS ILLUSTRATOR)', 'r', '2018-04-12 14:00:48', '2018-04-12 14:00:48');
INSERT INTO `marc_subfield_structure` VALUES ('114', '41', '4', 'RELATOR', 'r', '2018-04-12 14:01:14', '2018-04-12 14:01:14');
INSERT INTO `marc_subfield_structure` VALUES ('115', '42', 'A', 'CORPORATE NAME OR JURISDICTION NAME AS ENTRY ELEMENT', 'none', '2018-04-12 14:03:06', '2018-04-12 14:03:06');
INSERT INTO `marc_subfield_structure` VALUES ('116', '42', 'B', 'SUBORDINATE UNIT', 'r', '2018-04-12 14:03:24', '2018-04-12 14:03:24');
INSERT INTO `marc_subfield_structure` VALUES ('117', '43', 'A', 'PERSONAL NAME', 'none', '2018-04-12 14:04:10', '2018-04-12 14:04:10');
INSERT INTO `marc_subfield_structure` VALUES ('118', '43', 'B', 'NUMERATION', 'none', '2018-04-12 14:04:20', '2018-04-12 14:04:20');
INSERT INTO `marc_subfield_structure` VALUES ('119', '43', 'C', 'TITLES AND OTHER WORDS ASSOCIATED WITH A NAME', 'r', '2018-04-12 14:04:39', '2018-04-12 14:04:39');
INSERT INTO `marc_subfield_structure` VALUES ('120', '43', 'Q', 'FULLER FORM OF NAME', 'none', '2018-04-12 14:04:58', '2018-04-12 14:04:58');
INSERT INTO `marc_subfield_structure` VALUES ('121', '43', 'D', 'DATES ASSOCIATED WITH A NAME  (GENERALLY , YEAR OF BIRTH)', 'none', '2018-04-12 14:05:31', '2018-04-12 14:05:31');
INSERT INTO `marc_subfield_structure` VALUES ('122', '43', 'T', 'TITLE OF A WORK', 'none', '2018-04-12 14:05:47', '2018-04-12 14:05:47');
INSERT INTO `marc_subfield_structure` VALUES ('123', '43', 'V', 'VOLUME NUMBER', 'none', '2018-04-12 14:06:00', '2018-04-12 14:06:00');
INSERT INTO `marc_subfield_structure` VALUES ('124', '44', 'a', 'Classification number', 'r', '2018-05-10 10:05:35', '2018-05-10 10:05:35');
INSERT INTO `marc_subfield_structure` VALUES ('125', '44', 'b', 'item number', 'nr', '2018-05-10 10:05:53', '2018-05-10 10:05:53');

-- ----------------------------
-- Table structure for marc_tag_structure
-- ----------------------------
DROP TABLE IF EXISTS `marc_tag_structure`;
CREATE TABLE `marc_tag_structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagfield` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeatable` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tagfield` (`tagfield`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of marc_tag_structure
-- ----------------------------
INSERT INTO `marc_tag_structure` VALUES ('14', '020', 'International standard book number', 'none', 'bibliographic', '2017-06-28 13:20:34', '2017-06-28 13:20:34');
INSERT INTO `marc_tag_structure` VALUES ('15', '100', 'MAIN ENTRY - PERSONAL NAME (PRIMARY AUTHOR)', 'nr', 'bibliographic', '2017-06-28 13:37:43', '2018-04-12 10:49:28');
INSERT INTO `marc_tag_structure` VALUES ('16', '245', 'title statement', 'nr', 'bibliographic', '2017-06-28 13:47:19', '2017-06-28 13:47:19');
INSERT INTO `marc_tag_structure` VALUES ('17', '250', 'edition statement', 'nr', 'bibliographic', '2017-06-28 13:57:28', '2017-06-28 13:57:28');
INSERT INTO `marc_tag_structure` VALUES ('18', '264', 'publication, distribution, etc.', 'r', 'bibliographic', '2017-06-28 13:59:17', '2017-06-28 13:59:17');
INSERT INTO `marc_tag_structure` VALUES ('19', '300', 'physical description', 'r', 'bibliographic', '2017-06-28 14:11:38', '2017-06-28 14:11:38');
INSERT INTO `marc_tag_structure` VALUES ('20', '490', 'SERIES STATEMENT - NO ADD ENTRY IS TRACED FROM FIELD', 'r', 'bibliographic', '2017-06-28 14:18:55', '2018-04-12 11:01:02');
INSERT INTO `marc_tag_structure` VALUES ('21', '040', 'CATALOGING SOURCE', 'nr', 'bibliographic', '2018-04-12 10:39:44', '2018-04-12 10:39:44');
INSERT INTO `marc_tag_structure` VALUES ('22', '111', 'MAIN ENTRY - CONFERENCES AND OTHER MEETINGS (PRIMARY AUTHOR)', 'none', 'bibliographic', '2018-04-12 10:43:43', '2018-04-12 10:43:43');
INSERT INTO `marc_tag_structure` VALUES ('23', '130', 'MAIN ENTRY - UNIFORM TITLE', 'nr', 'bibliographic', '2018-04-12 10:46:14', '2018-04-12 10:46:14');
INSERT INTO `marc_tag_structure` VALUES ('24', '240', 'UNIFORM TITLE', 'nr', 'bibliographic', '2018-04-12 10:48:40', '2018-04-12 10:48:40');
INSERT INTO `marc_tag_structure` VALUES ('25', '246', 'VERIFYING FORM OF TITLE', 'r', 'bibliographic', '2018-04-12 10:52:17', '2018-04-12 10:52:17');
INSERT INTO `marc_tag_structure` VALUES ('26', '336', 'CONTENT TYPE', 'none', 'bibliographic', '2018-04-12 10:53:21', '2018-04-12 10:53:21');
INSERT INTO `marc_tag_structure` VALUES ('27', '337', 'MEDIA TYPE', 'none', 'bibliographic', '2018-04-12 10:54:54', '2018-04-12 10:54:54');
INSERT INTO `marc_tag_structure` VALUES ('28', '338', 'CARRIER TYPE', 'none', 'bibliographic', '2018-04-12 10:55:51', '2018-04-12 10:55:51');
INSERT INTO `marc_tag_structure` VALUES ('29', '440', 'SERIES STATEMENT / ADD ENTRY - TITLE', 'r', 'bibliographic', '2018-04-12 10:59:54', '2018-04-12 10:59:54');
INSERT INTO `marc_tag_structure` VALUES ('30', '500', 'GENERAL NOTE', 'r', 'bibliographic', '2018-04-12 11:02:14', '2018-04-12 11:02:14');
INSERT INTO `marc_tag_structure` VALUES ('31', '501', '\"WITH\" NOTE', 'none', 'bibliographic', '2018-04-12 13:17:45', '2018-04-12 13:17:45');
INSERT INTO `marc_tag_structure` VALUES ('32', '504', 'BIBLIOGRAPHY , ETC . NOTE', 'r', 'bibliographic', '2018-04-12 13:18:44', '2018-04-12 13:18:44');
INSERT INTO `marc_tag_structure` VALUES ('33', '505', 'FORMATTED CONTENTS NOTE', 'r', 'bibliographic', '2018-04-12 13:19:56', '2018-04-12 13:19:56');
INSERT INTO `marc_tag_structure` VALUES ('34', '520', 'SUMMARY ETC. NOTE', 'r', 'bibliographic', '2018-04-12 13:21:23', '2018-04-12 13:21:23');
INSERT INTO `marc_tag_structure` VALUES ('35', '521', 'TARGET AUDIENCE NOTE', 'none', 'bibliographic', '2018-04-12 13:23:05', '2018-04-12 13:23:05');
INSERT INTO `marc_tag_structure` VALUES ('36', '534', 'ORIGINAL VERSION NOTE', 'none', 'bibliographic', '2018-04-12 13:24:21', '2018-04-12 13:24:21');
INSERT INTO `marc_tag_structure` VALUES ('37', '600', 'SUBJECT ADD ENTRY  (PERSONAL NAME)', 'r', 'bibliographic', '2018-04-12 13:25:57', '2018-04-12 13:25:57');
INSERT INTO `marc_tag_structure` VALUES ('38', '610', 'SUBJECT ADD ENTRY - CORPORATE NAME', 'r', 'bibliographic', '2018-04-12 13:42:59', '2018-04-12 13:42:59');
INSERT INTO `marc_tag_structure` VALUES ('39', '650', 'SUBJECT ADDED ENTRY - TROPICAL TERM', 'r', 'bibliographic', '2018-04-12 13:47:58', '2018-04-12 13:47:58');
INSERT INTO `marc_tag_structure` VALUES ('40', '651', 'SUBJECT ADDED ENTRY - GEOGRAPHIC NAME', 'r', 'bibliographic', '2018-04-12 13:51:56', '2018-04-12 13:52:17');
INSERT INTO `marc_tag_structure` VALUES ('41', '700', 'ADDED ENTRY - PERSONAL NAME', 'r', 'bibliographic', '2018-04-12 13:55:28', '2018-04-12 13:55:28');
INSERT INTO `marc_tag_structure` VALUES ('42', '710', 'ADDED ENTRY - CORPORATE NAME', 'r', 'bibliographic', '2018-04-12 14:02:02', '2018-04-12 14:02:11');
INSERT INTO `marc_tag_structure` VALUES ('43', '800', 'SERIES ADDED ENTRY - PERSONAL NAME', 'r', 'bibliographic', '2018-04-12 14:03:49', '2018-04-12 14:03:49');
INSERT INTO `marc_tag_structure` VALUES ('44', '050', 'Call Number', 'r', 'bibliographic', '2018-05-10 10:05:05', '2018-05-10 10:05:05');

-- ----------------------------
-- Table structure for marc_tag_structure_cat_templates
-- ----------------------------
DROP TABLE IF EXISTS `marc_tag_structure_cat_templates`;
CREATE TABLE `marc_tag_structure_cat_templates` (
  `id` int(11) unsigned DEFAULT NULL,
  `template_id` int(11) unsigned DEFAULT NULL,
  KEY `id` (`id`),
  KEY `template_id` (`template_id`),
  CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `marc_tag_structure` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `template_id` FOREIGN KEY (`template_id`) REFERENCES `cat_templates` (`template_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of marc_tag_structure_cat_templates
-- ----------------------------
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('14', '8');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('15', '8');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('16', '8');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('17', '8');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('18', '8');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('19', '8');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('20', '8');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('15', '10');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('14', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('15', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('16', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('17', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('18', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('19', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('20', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('21', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('22', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('23', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('24', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('25', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('26', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('27', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('28', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('29', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('30', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('31', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('32', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('33', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('34', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('35', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('36', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('37', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('38', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('39', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('40', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('41', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('42', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('43', '9');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('35', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('36', '2017_05_08_000001_status', '1');
INSERT INTO `migrations` VALUES ('37', '2017_05_08_000002_auth_user', '1');
INSERT INTO `migrations` VALUES ('38', '2017_05_08_000003_auth_permission', '1');
INSERT INTO `migrations` VALUES ('39', '2017_05_08_000004_auth_role', '1');
INSERT INTO `migrations` VALUES ('40', '2017_05_08_000005_auth_role_permission', '1');
INSERT INTO `migrations` VALUES ('41', '2017_05_08_000006_auth_user_role', '1');
INSERT INTO `migrations` VALUES ('42', '2017_05_08_000007_user_profile', '1');
INSERT INTO `migrations` VALUES ('43', '2017_05_08_000008_marc_tag_structure', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for patrons
-- ----------------------------
DROP TABLE IF EXISTS `patrons`;
CREATE TABLE `patrons` (
  `patron_id` int(10) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `sis_id` int(10) DEFAULT NULL,
  `card_number` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `patron_type` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `patron_category_id` int(10) unsigned DEFAULT NULL,
  `status_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `expiration` datetime DEFAULT NULL,
  PRIMARY KEY (`patron_id`),
  KEY `status_id` (`status_id`),
  KEY `patron_idfk_pc` (`patron_category_id`),
  CONSTRAINT `patron_idfk_pc` FOREIGN KEY (`patron_category_id`) REFERENCES `patron_categories` (`patron_category_id`) ON UPDATE CASCADE,
  CONSTRAINT `patrons_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patrons
-- ----------------------------
INSERT INTO `patrons` VALUES ('188', '1', '0', '', 'student', '1', '1', '2017-07-17 11:37:59', '2019-11-26 14:45:47', '2020-03-29 14:45:47');
INSERT INTO `patrons` VALUES ('189', '123', '0', '', 'student', '1', '1', '2017-07-17 11:37:59', '2019-11-26 08:56:51', '2020-03-29 08:56:51');
INSERT INTO `patrons` VALUES ('190', 'S12345670', '0', '', 'student', '1', '1', '2017-07-10 14:08:17', '2017-09-26 10:13:19', '2017-10-29 13:54:17');
INSERT INTO `patrons` VALUES ('204', '2', '0', '', 'faculty', '2', '1', '2017-07-17 11:38:00', '2018-01-16 13:09:25', '2018-10-29 13:09:25');
INSERT INTO `patrons` VALUES ('205', '3', '0', '', 'faculty', '2', '1', '2017-07-17 11:38:01', '2017-11-08 14:53:14', '2018-03-29 14:53:14');
INSERT INTO `patrons` VALUES ('206', '4', '0', '', 'faculty', '2', '1', '2017-07-17 11:38:01', '2017-09-26 10:13:37', '2017-10-29 15:08:51');
INSERT INTO `patrons` VALUES ('212', '455', '1', '', 'student', '1', '1', '2017-07-17 11:38:02', '2017-09-26 10:13:19', '2017-10-29 08:25:02');
INSERT INTO `patrons` VALUES ('213', '556', '4', '', 'student', '1', '1', '2017-07-13 08:29:15', '2017-11-02 13:34:41', '2018-03-29 13:34:41');
INSERT INTO `patrons` VALUES ('214', '222', '3', '', 'student', '1', '1', '2017-07-17 11:38:03', '2017-09-26 10:13:19', '2017-10-29 08:26:32');
INSERT INTO `patrons` VALUES ('215', '900', '2', '', 'student', '1', '1', '2017-07-18 08:50:09', '2017-09-26 10:13:19', '2017-10-29 08:26:34');
INSERT INTO `patrons` VALUES ('216', '78', '0', '', 'student', '1', '1', '2017-08-07 08:57:22', '2017-09-26 10:13:19', '2017-10-29 08:57:22');
INSERT INTO `patrons` VALUES ('217', 'S12345678', '621', '', 'student', '1', '1', '2017-08-15 15:17:26', '2017-09-26 10:13:19', '2017-10-29 15:17:26');
INSERT INTO `patrons` VALUES ('218', '00', '700', '', 'student', '1', '1', '2017-08-15 15:17:28', '2017-09-26 10:13:19', '2017-10-29 15:17:28');
INSERT INTO `patrons` VALUES ('219', 'S12345679', '615', '', 'student', '1', '1', '2017-08-15 15:17:31', '2017-09-26 10:13:19', '2017-10-29 15:17:31');
INSERT INTO `patrons` VALUES ('220', '89', '671', '', 'student', '1', '1', '2017-08-15 15:17:33', '2017-09-26 10:13:19', '2017-10-29 15:17:33');
INSERT INTO `patrons` VALUES ('221', '999', '682', '', 'student', '1', '1', '2017-08-15 15:17:37', '2017-09-26 10:13:19', '2017-10-29 15:17:37');
INSERT INTO `patrons` VALUES ('222', '90', '623', '', 'student', '1', '1', '2017-08-15 15:17:40', '2017-09-26 10:13:19', '2017-10-29 15:17:40');
INSERT INTO `patrons` VALUES ('223', '98', '664', '', 'student', '1', '1', '2017-08-15 15:17:44', '2017-09-26 10:13:20', '2017-10-29 15:17:44');
INSERT INTO `patrons` VALUES ('224', '345', '670', '', 'student', '1', '1', '2017-08-15 15:17:46', '2017-09-26 10:13:20', '2017-10-29 15:17:46');
INSERT INTO `patrons` VALUES ('225', '456', '643', '', 'student', '1', '1', '2017-08-15 15:17:48', '2017-09-26 10:13:20', '2017-10-29 09:46:54');
INSERT INTO `patrons` VALUES ('226', '777', '701', '', 'student', '1', '1', '2017-08-15 15:17:53', '2017-09-26 10:13:20', '2017-10-29 15:17:53');
INSERT INTO `patrons` VALUES ('227', '43534', '653', '', 'student', '1', '1', '2017-08-15 15:17:54', '2017-09-26 10:13:20', '2017-10-29 15:17:54');
INSERT INTO `patrons` VALUES ('228', '5464', '706', '', 'student', '1', '1', '2017-08-15 15:17:56', '2017-09-26 10:13:20', '2017-10-29 15:17:56');
INSERT INTO `patrons` VALUES ('229', '66', '0', '', 'faculty', '2', '1', '2017-09-06 16:58:46', '2017-09-26 10:13:41', '2017-10-29 16:58:46');
INSERT INTO `patrons` VALUES ('230', '111111111', '0', '', 'student', '1', '1', '2017-09-11 10:11:04', '2017-09-26 10:13:20', '2017-10-29 10:11:04');
INSERT INTO `patrons` VALUES ('231', '8888888888', '0', '', 'student', '1', '1', '2017-09-12 14:25:52', '2017-09-26 10:13:20', '2017-10-29 14:25:52');
INSERT INTO `patrons` VALUES ('232', '55', '0', '', 'student', '1', '1', '2018-12-02 10:26:23', '2018-02-05 13:53:08', '2017-10-29 10:26:23');
INSERT INTO `patrons` VALUES ('233', '123456', '0', '', 'student', '1', '1', '2018-05-09 10:51:54', '2018-05-09 10:52:08', null);

-- ----------------------------
-- Table structure for patron_categories
-- ----------------------------
DROP TABLE IF EXISTS `patron_categories`;
CREATE TABLE `patron_categories` (
  `patron_category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_type_id` int(10) unsigned DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `enrolment_period` int(10) DEFAULT NULL,
  `enrolment_period_date` date DEFAULT NULL,
  PRIMARY KEY (`patron_category_id`),
  UNIQUE KEY `category_type_id` (`category_type_id`) USING BTREE,
  CONSTRAINT `pc_idfk_pct_cti` FOREIGN KEY (`category_type_id`) REFERENCES `patron_category_type` (`category_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patron_categories
-- ----------------------------
INSERT INTO `patron_categories` VALUES ('1', '5', '3', '3', null);
INSERT INTO `patron_categories` VALUES ('2', '6', 'sample', null, '2017-09-30');
INSERT INTO `patron_categories` VALUES ('5', '7', 'sdad', '5', null);

-- ----------------------------
-- Table structure for patron_category_type
-- ----------------------------
DROP TABLE IF EXISTS `patron_category_type`;
CREATE TABLE `patron_category_type` (
  `category_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  PRIMARY KEY (`category_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patron_category_type
-- ----------------------------
INSERT INTO `patron_category_type` VALUES ('5', 'student', 'a person enrolled');
INSERT INTO `patron_category_type` VALUES ('6', 'staff', 'test');
INSERT INTO `patron_category_type` VALUES ('7', 'librarian', 'sample');
INSERT INTO `patron_category_type` VALUES ('8', 'adult', 'sample');

-- ----------------------------
-- Table structure for patron_information
-- ----------------------------
DROP TABLE IF EXISTS `patron_information`;
CREATE TABLE `patron_information` (
  `patron_id` int(10) NOT NULL,
  `full_name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `gender` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `student_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `course` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `address` text CHARACTER SET latin1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  KEY `patron_information_idfk_patrons_id` (`patron_id`) USING BTREE,
  CONSTRAINT `patron_information_ibfk_1` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patron_information
-- ----------------------------
INSERT INTO `patron_information` VALUES ('188', 'ZED ROB MED', 'Male', '12-5459-29298', '1994-02-12', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', '09129487473', 'P5 A Silad Mahogany Butuan City', '2017-07-10 13:48:12', '2017-07-10 13:48:28');
INSERT INTO `patron_information` VALUES ('189', 'Toomy Cruizz', 'Male', '12-302-11', '1994-02-01', 'Home Economics', '091282843', 'P6CM Silad M', '2017-07-10 13:52:38', '2017-11-02 11:18:08');
INSERT INTO `patron_information` VALUES ('190', 'asd asdads asdasd', 'Male', '0029-1234-66', '1994-04-02', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '1023912312', 'Maguindanao', '2017-07-10 13:54:17', '2017-07-10 13:54:17');
INSERT INTO `patron_information` VALUES ('204', 'Miguel asd Mal', 'Male', '12-019-23452', '1987-02-12', 'FACULTY', '09128274672', '123', '2017-07-11 14:55:41', '2017-09-06 16:59:11');
INSERT INTO `patron_information` VALUES ('205', 'Mime TER MA', 'Male', '12-01-33-2212', '2002-02-27', 'FACULTY', '0192883212', 'asd213123', '2017-07-11 15:07:15', '2017-09-06 16:59:10');
INSERT INTO `patron_information` VALUES ('206', 'miking asd asd', 'female', '12-04848-28383', '1993-01-22', 'FACULTY', '012939213', 'asdasdasd', '2017-07-11 15:08:51', '2017-09-06 16:59:08');
INSERT INTO `patron_information` VALUES ('212', 'RACHEL GALDO CURILAN', 'female', '13001998000', '2017-06-06', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-07-13 08:25:02', '2017-07-13 08:25:02');
INSERT INTO `patron_information` VALUES ('213', 'CHRISTIAN IVY B OLIVO', 'female', '13002405700', '1992-06-27', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-07-13 08:26:30', '2017-09-04 08:59:28');
INSERT INTO `patron_information` VALUES ('214', 'RUSTOM RAMOS PEDALES', 'male', '12-01-33-0013', '1995-02-12', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-07-13 08:26:32', '2017-09-11 14:04:36');
INSERT INTO `patron_information` VALUES ('215', 'SHIELA FLOR DALAPO CABALAN', 'female', '1003016300', '2017-06-06', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-07-13 08:26:35', '2017-07-13 08:26:35');
INSERT INTO `patron_information` VALUES ('216', 'BRADLY ASD A', 'Male', '123-222-0000', '1995-08-07', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '09128274627', 'T_BURGOS MAHGOAN', '2017-08-07 08:57:22', '2017-08-07 08:58:07');
INSERT INTO `patron_information` VALUES ('217', 'DEWITT ROOB KOSS', 'male', '73784107', '1995-08-04', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:26', '2017-09-04 08:59:47');
INSERT INTO `patron_information` VALUES ('218', 'EMILE BEIER BEER', 'male', '84816072', '1943-10-13', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:28', '2017-08-15 15:17:28');
INSERT INTO `patron_information` VALUES ('219', 'DYLAN WEIMANN LABADIE', 'male', '3896226', '1922-06-02', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:31', '2017-08-15 15:17:31');
INSERT INTO `patron_information` VALUES ('220', 'IRMA LUEILWITZ MOORE', 'female', '2317339', '1985-08-29', 'INFORMATION AND COMMUNICATIONS TECHNOLOGY', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:34', '2017-08-15 15:17:34');
INSERT INTO `patron_information` VALUES ('221', 'FRANCESCA RUNTE QUIGLEY', 'female', '37568468', '1985-08-29', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:38', '2017-08-15 15:17:38');
INSERT INTO `patron_information` VALUES ('222', 'LARON DONNELLY CUMMERATA', 'male', '49335045', '1978-05-28', 'ACCOUNTANCY, BUSINESS AND MANAGEMENT', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:40', '2017-08-15 15:17:40');
INSERT INTO `patron_information` VALUES ('223', 'KALE MCCULLOUGH STOLTENBERG', 'male', '19875880', '1985-08-29', 'INDUSTRIAL ARTS', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:44', '2017-08-15 15:17:44');
INSERT INTO `patron_information` VALUES ('224', 'MARIETTA MURAZIK KSHLERIN', 'female', '47965450', '1985-08-29', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:46', '2017-08-15 15:17:46');
INSERT INTO `patron_information` VALUES ('225', 'MATEO CHRISTIANSEN HARRIS', 'male', '32841163', '1985-08-29', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:48', '2017-08-15 15:17:48');
INSERT INTO `patron_information` VALUES ('226', 'SALMA JACOBSON O\'HARA', 'female', '34950301', '1985-08-29', 'COMPUTER-BASED ACCOUNTING', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:53', '2017-08-15 15:17:53');
INSERT INTO `patron_information` VALUES ('227', 'TANYA ZBONCAK CROOKS', 'female', '43026739', '1985-08-29', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:54', '2017-08-15 15:17:54');
INSERT INTO `patron_information` VALUES ('228', 'TITUS FEIL PROSACCO', 'male', '86304795', '1985-08-29', 'INFORMATION AND COMMUNICATIONS TECHNOLOGY', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-08-15 15:17:56', '2017-08-15 15:17:56');
INSERT INTO `patron_information` VALUES ('229', 'MEPO CARE MAN', 'Male', '12-302-11', '1983-02-23', 'FACULTY', '09128273646', 'PS PWEDE BA', '2017-09-06 16:58:46', '2017-09-06 16:59:38');
INSERT INTO `patron_information` VALUES ('230', 'jyde Kapunan Lacuesta', 'Male', '77-77-77-7777', '1995-06-15', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '09951291190', 'P-2 Antongalon', '2017-09-11 10:11:04', '2017-09-11 16:44:05');
INSERT INTO `patron_information` VALUES ('231', 'you know who', 'Male', '88-88-88-8888', '1995-06-15', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '99999999999', 'at', '2017-09-12 14:25:52', '2017-09-12 14:25:52');
INSERT INTO `patron_information` VALUES ('232', 'tim ariliano saw', 'Male', '123-33-23-2-2', '1997-02-12', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', '0909123034', 'asdad', '2017-09-26 10:26:24', '2017-09-26 10:26:24');
INSERT INTO `patron_information` VALUES ('233', 'Mot Mot2 Mot', 'Male', '89088908', '1994-12-21', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', '091282824322', 'PED BUTUAN CITY', '2018-05-09 10:51:54', '2018-05-09 10:51:54');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) DEFAULT NULL,
  `p_name` varchar(200) DEFAULT NULL,
  `p_creator` varchar(200) DEFAULT NULL,
  `p_description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`p_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '1', 'Vivlio V.1', 'Engtech Global Solutions', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-08-15 10:54:40', '2017-08-17 10:19:21');

-- ----------------------------
-- Table structure for renewal
-- ----------------------------
DROP TABLE IF EXISTS `renewal`;
CREATE TABLE `renewal` (
  `r_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `l_id` int(11) unsigned DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`r_id`),
  KEY `p_id` (`p_id`),
  KEY `l_id` (`l_id`),
  CONSTRAINT `renewal_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patrons` (`patron_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `renewal_ibfk_2` FOREIGN KEY (`l_id`) REFERENCES `loans` (`loan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of renewal
-- ----------------------------

-- ----------------------------
-- Table structure for reserves
-- ----------------------------
DROP TABLE IF EXISTS `reserves`;
CREATE TABLE `reserves` (
  `reserve_id` int(10) NOT NULL AUTO_INCREMENT,
  `patron_id` int(10) DEFAULT NULL,
  `reserved_date` datetime DEFAULT NULL,
  `catalogue_record_id` int(10) unsigned DEFAULT NULL,
  `copy_id` int(10) unsigned DEFAULT NULL,
  `cancel_date` datetime DEFAULT NULL,
  `remarks` text,
  `priority` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`reserve_id`),
  KEY `patron_id` (`patron_id`),
  KEY `catalogue_record_id` (`catalogue_record_id`),
  KEY `copy_id` (`copy_id`),
  CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`),
  CONSTRAINT `reserves_ibfk_2` FOREIGN KEY (`catalogue_record_id`) REFERENCES `catalogue_record` (`catalogue_id`),
  CONSTRAINT `reserves_ibfk_3` FOREIGN KEY (`copy_id`) REFERENCES `copies` (`copy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reserves
-- ----------------------------
INSERT INTO `reserves` VALUES ('1', '189', '2019-11-28 00:00:00', '5', '5', null, 'aaa', '2', 'borrowed', '2019-11-26 14:50:34', '2019-11-28 13:46:43');
INSERT INTO `reserves` VALUES ('2', '188', '2019-11-26 00:00:00', '11', '11', null, 'asd', '3', 'borrowed', '2019-11-26 15:41:02', '2019-11-28 14:41:32');
INSERT INTO `reserves` VALUES ('16', '189', '2019-11-28 14:17:34', '11', null, '2019-11-28 14:52:23', 'OPAC Reserved', '1', 'canceled', '2019-11-28 14:17:34', '2019-11-28 14:52:23');
INSERT INTO `reserves` VALUES ('17', '189', '2019-11-29 08:13:40', '40', null, '2019-11-29 08:31:04', 'OPAC Reserved', '2', 'canceled', '2019-11-29 08:13:40', '2019-11-29 08:31:04');
INSERT INTO `reserves` VALUES ('18', '189', '2019-11-29 08:37:53', '20', null, '2019-11-29 08:46:35', 'OPAC Reserved', '2', 'canceled', '2019-11-29 08:37:53', '2019-11-29 08:46:35');
INSERT INTO `reserves` VALUES ('19', '189', '2019-11-29 08:47:16', '20', null, '2019-11-29 09:24:13', 'OPAC Reserved', '2', 'canceled', '2019-11-29 08:47:16', '2019-11-29 09:24:13');
INSERT INTO `reserves` VALUES ('20', '189', '2019-11-29 08:48:27', '18', null, '2019-11-29 09:24:17', 'OPAC Reserved', '2', 'canceled', '2019-11-29 08:48:27', '2019-11-29 09:24:17');
INSERT INTO `reserves` VALUES ('21', '189', '2019-11-29 08:48:43', '23', null, '2019-11-29 09:39:13', 'OPAC Reserved', '2', 'canceled', '2019-11-29 08:48:43', '2019-11-29 09:39:13');
INSERT INTO `reserves` VALUES ('22', '189', '2019-11-29 09:22:46', '40', null, '2019-11-29 09:37:37', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:22:46', '2019-11-29 09:37:37');
INSERT INTO `reserves` VALUES ('23', '189', '2019-11-29 09:22:49', '40', null, '2019-11-29 09:35:00', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:22:49', '2019-11-29 09:35:00');
INSERT INTO `reserves` VALUES ('24', '189', '2019-11-29 09:23:47', '31', null, '2019-11-29 09:35:04', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:23:47', '2019-11-29 09:35:04');
INSERT INTO `reserves` VALUES ('25', '189', '2019-11-29 09:23:48', '31', null, '2019-11-29 09:35:08', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:23:48', '2019-11-29 09:35:08');
INSERT INTO `reserves` VALUES ('26', '189', '2019-11-29 09:23:48', '31', null, '2019-11-29 09:39:17', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:23:48', '2019-11-29 09:39:17');
INSERT INTO `reserves` VALUES ('27', '189', '2019-11-29 09:23:49', '31', null, '2019-11-29 09:35:14', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:23:49', '2019-11-29 09:35:14');
INSERT INTO `reserves` VALUES ('28', '189', '2019-11-29 09:24:19', '20', null, '2019-11-29 09:39:19', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:24:19', '2019-11-29 09:39:19');
INSERT INTO `reserves` VALUES ('29', '189', '2019-11-29 09:24:25', '20', null, '2019-11-29 09:39:21', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:24:25', '2019-11-29 09:39:21');
INSERT INTO `reserves` VALUES ('30', '189', '2019-11-29 09:34:14', '18', null, '2019-11-29 09:39:23', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:34:14', '2019-11-29 09:39:23');
INSERT INTO `reserves` VALUES ('31', '189', '2019-11-29 09:37:45', '40', null, '2019-11-29 09:39:26', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:37:45', '2019-11-29 09:39:26');
INSERT INTO `reserves` VALUES ('32', '189', '2019-11-29 09:43:18', '20', null, '2019-11-29 09:43:31', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:43:18', '2019-11-29 09:43:31');
INSERT INTO `reserves` VALUES ('33', '189', '2019-11-29 09:43:24', '20', null, '2019-11-29 09:43:28', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:43:25', '2019-11-29 09:43:28');
INSERT INTO `reserves` VALUES ('34', '189', '2019-11-29 09:44:30', '20', null, '2019-11-29 09:48:50', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:44:30', '2019-11-29 09:48:50');
INSERT INTO `reserves` VALUES ('35', '189', '2019-11-29 09:44:58', '18', null, '2019-11-29 09:50:14', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:44:58', '2019-11-29 09:50:14');
INSERT INTO `reserves` VALUES ('36', '189', '2019-11-29 09:50:46', '20', null, '2019-11-29 09:50:49', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:50:46', '2019-11-29 09:50:49');
INSERT INTO `reserves` VALUES ('37', '189', '2019-11-29 09:50:59', '20', null, '2019-11-29 09:51:01', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:50:59', '2019-11-29 09:51:01');
INSERT INTO `reserves` VALUES ('38', '189', '2019-11-29 09:51:17', '20', null, '2019-11-29 09:51:34', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:51:17', '2019-11-29 09:51:34');
INSERT INTO `reserves` VALUES ('39', '189', '2019-11-29 09:52:44', '20', null, '2019-11-29 09:52:46', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:52:44', '2019-11-29 09:52:46');
INSERT INTO `reserves` VALUES ('40', '189', '2019-11-29 09:52:47', '20', null, '2019-11-29 09:52:49', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:52:47', '2019-11-29 09:52:49');
INSERT INTO `reserves` VALUES ('41', '189', '2019-11-29 09:53:06', '20', null, '2019-11-29 11:32:53', 'OPAC Reserved', '2', 'canceled', '2019-11-29 09:53:06', '2019-11-29 11:32:53');
INSERT INTO `reserves` VALUES ('42', '189', '2019-11-29 10:16:21', '18', null, '2019-11-29 11:33:14', 'OPAC Reserved', '2', 'canceled', '2019-11-29 10:16:21', '2019-11-29 11:33:14');
INSERT INTO `reserves` VALUES ('43', '189', '2019-11-29 11:20:23', '11', null, '2019-11-29 11:33:17', 'OPAC Reserved', '2', 'canceled', '2019-11-29 11:20:23', '2019-11-29 11:33:17');
INSERT INTO `reserves` VALUES ('44', '189', '2019-11-29 11:34:06', '20', null, '2019-11-29 11:34:19', 'OPAC Reserved', '2', 'canceled', '2019-11-29 11:34:06', '2019-11-29 11:34:19');
INSERT INTO `reserves` VALUES ('45', '189', '2019-11-29 11:34:17', '20', null, '2019-11-29 11:35:08', 'OPAC Reserved', '2', 'canceled', '2019-11-29 11:34:17', '2019-11-29 11:35:08');
INSERT INTO `reserves` VALUES ('46', '189', '2019-11-29 11:35:05', '20', null, '2019-11-29 11:35:12', 'OPAC Reserved', '2', 'canceled', '2019-11-29 11:35:05', '2019-11-29 11:35:12');
INSERT INTO `reserves` VALUES ('47', '189', '2019-11-29 11:39:14', '20', null, '2019-11-29 11:39:18', 'OPAC Reserved', '2', 'canceled', '2019-11-29 11:39:14', '2019-11-29 11:39:18');
INSERT INTO `reserves` VALUES ('48', '189', '2019-11-29 11:39:15', '18', null, '2019-11-29 11:39:49', 'OPAC Reserved', '2', 'canceled', '2019-11-29 11:39:15', '2019-11-29 11:39:49');
INSERT INTO `reserves` VALUES ('49', '189', '2019-11-29 11:40:06', '20', null, '2019-11-29 11:40:12', 'OPAC Reserved', '2', 'canceled', '2019-11-29 11:40:06', '2019-11-29 11:40:12');
INSERT INTO `reserves` VALUES ('50', '189', '2019-11-29 11:40:31', '40', null, '2019-11-29 11:40:37', 'OPAC Reserved', '2', 'canceled', '2019-11-29 11:40:31', '2019-11-29 11:40:37');
INSERT INTO `reserves` VALUES ('51', '189', '2019-11-29 11:40:32', '25', null, '2019-11-29 11:41:38', 'OPAC Reserved', '2', 'canceled', '2019-11-29 11:40:32', '2019-11-29 11:41:38');
INSERT INTO `reserves` VALUES ('52', '189', '2019-11-29 11:42:27', '25', null, '2019-11-29 11:42:30', 'OPAC Reserved', '2', 'canceled', '2019-11-29 11:42:27', '2019-11-29 11:42:30');
INSERT INTO `reserves` VALUES ('53', '189', '2019-11-29 11:43:17', '40', null, '2019-11-29 11:44:48', 'OPAC Reserved', '2', 'canceled', '2019-11-29 11:43:17', '2019-11-29 11:44:48');
INSERT INTO `reserves` VALUES ('54', '189', '2019-11-29 12:34:06', '40', null, '2019-11-29 12:34:10', 'OPAC Reserved', '2', 'canceled', '2019-11-29 12:34:06', '2019-11-29 12:34:10');
INSERT INTO `reserves` VALUES ('55', '189', '2019-11-29 12:34:11', '25', null, '2019-11-29 14:10:03', 'OPAC Reserved', '2', 'canceled', '2019-11-29 12:34:11', '2019-11-29 14:10:03');
INSERT INTO `reserves` VALUES ('56', '189', '2019-11-29 12:34:21', '40', null, '2019-11-29 14:10:21', 'OPAC Reserved', '2', 'canceled', '2019-11-29 12:34:21', '2019-11-29 14:10:21');
INSERT INTO `reserves` VALUES ('57', '189', '2019-11-29 12:34:23', '39', null, '2019-11-29 14:10:24', 'OPAC Reserved', '2', 'canceled', '2019-11-29 12:34:23', '2019-11-29 14:10:24');
INSERT INTO `reserves` VALUES ('58', '189', '2019-11-29 12:34:29', '19', null, null, 'OPAC Reserved', '2', 'pending', '2019-11-29 12:34:29', '2019-11-29 12:34:29');
INSERT INTO `reserves` VALUES ('59', '189', '2019-11-29 14:02:46', '20', null, null, 'OPAC Reserved', '2', 'pending', '2019-11-29 14:02:46', '2019-11-29 14:02:46');
INSERT INTO `reserves` VALUES ('60', '189', '2019-11-29 14:32:50', '18', null, null, 'OPAC Reserved', '2', 'pending', '2019-11-29 14:32:50', '2019-11-29 14:32:50');
INSERT INTO `reserves` VALUES ('61', '188', '2019-11-29 14:33:02', '18', null, null, 'OPAC Reserved', '2', 'pending', '2019-11-29 14:33:02', '2019-11-29 14:33:02');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `status_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('1', 'active', 'active', '2017-05-11 09:16:22', '2017-05-15 09:16:25');
INSERT INTO `status` VALUES ('2', 'inactive', 'inactive', '2017-05-03 09:16:28', '2017-05-31 09:16:30');

-- ----------------------------
-- Table structure for user_profile
-- ----------------------------
DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `full_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `user_profile_user_id_foreign` (`user_id`),
  CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_profile
-- ----------------------------
INSERT INTO `user_profile` VALUES ('1', 'Tom Ramos Pedales', 'male', 'Developer', '09128274646');
INSERT INTO `user_profile` VALUES ('2', 'Admin', 'male', 'Developer', '09128274742');
INSERT INTO `user_profile` VALUES ('8', 'Michelle Elape', 'Female', 'Librarian', '09074511841');
