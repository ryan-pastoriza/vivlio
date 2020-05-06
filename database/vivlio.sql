/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.150_3306
Source Server Version : 50714
Source Host           : 192.168.1.150:3306
Source Database       : vivlio

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-09-06 09:42:09
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of auth_user
-- ----------------------------
INSERT INTO `auth_user` VALUES ('1', 'tomskie1995', '$2y$10$eQx7X0ShiXpIfeucNlP9ieJBGzPty6Rvzxp84n00wGGtnJbYhrl2K', '$2y$10$1S6C5u.DC/zjhaTz4QUgqel/WaVKjsIomD81tPPDoA8xpscwqlqri', 'nS3mUY9dXsIwkOUPHapsVMwOHefUkxx6TMGsA4Gy7SKY7xRUElVzsZjn5WyD', '2017-05-10 09:15:49', '2017-05-22 09:15:53', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of catalogue_record
-- ----------------------------
INSERT INTO `catalogue_record` VALUES ('16', '1', '005.115 f2471', null, null, '2017-08-23 15:57:25', '2017-08-23 15:57:25');
INSERT INTO `catalogue_record` VALUES ('17', '1', null, null, null, '2017-08-29 14:55:06', '2017-08-29 14:55:06');
INSERT INTO `catalogue_record` VALUES ('18', '1', null, 'this is a remark', null, '2017-08-30 15:59:23', '2017-08-30 15:59:23');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cat_templates
-- ----------------------------
INSERT INTO `cat_templates` VALUES ('8', 'quick add', 'basic cataloging');
INSERT INTO `cat_templates` VALUES ('9', 'book', 'monograph');

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
  PRIMARY KEY (`acc_num`),
  KEY `copies_idfk_ctr` (`catalogue_id`),
  CONSTRAINT `copies_idfk_ctr` FOREIGN KEY (`catalogue_id`) REFERENCES `catalogue_record` (`catalogue_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of copies
-- ----------------------------
INSERT INTO `copies` VALUES ('0001653-12', '17', '123456789', 'donation', 'available', 'this is a note', '005.2 c263 2009', null, '2017-08-29', null, '2017-09-04 12:06:24');
INSERT INTO `copies` VALUES ('0002314-16', '18', '2', 'donation', 'available', 'note', '005.131 r4495 2014', null, '2017-08-30', null, '2017-09-04 11:39:55');
INSERT INTO `copies` VALUES ('100199272', '16', '3', 'donation', 'available', null, '005.115 F2471 2015', null, '2017-08-24', null, '2017-09-04 11:39:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of field_value
-- ----------------------------
INSERT INTO `field_value` VALUES ('51', '14', '16', '_a978-1-285-84577-7', '2017-08-23 15:57:26', '2017-08-23 15:57:26');
INSERT INTO `field_value` VALUES ('52', '15', '16', '_ajoyce farrell_d2015', '2017-08-23 15:57:26', '2017-08-23 15:57:26');
INSERT INTO `field_value` VALUES ('53', '16', '16', '_aprogramming logic and design_bintroductory version_c', '2017-08-23 15:57:26', '2017-08-23 15:57:26');
INSERT INTO `field_value` VALUES ('54', '17', '16', '_aeighth', '2017-08-23 15:57:26', '2017-08-23 15:57:26');
INSERT INTO `field_value` VALUES ('55', '18', '16', '_a200 first stamford place, 4th floor stamford, CT 06902_bcengage learning_c2015', '2017-08-23 15:57:26', '2017-08-23 15:57:26');
INSERT INTO `field_value` VALUES ('56', '19', '16', '_a355_b_c', '2017-08-23 15:57:26', '2017-08-23 15:57:26');
INSERT INTO `field_value` VALUES ('57', '20', '16', '_v', '2017-08-23 15:57:26', '2017-08-23 15:57:26');
INSERT INTO `field_value` VALUES ('58', '14', '17', '_a2008019142', '2017-08-29 14:55:07', '2017-08-29 14:55:07');
INSERT INTO `field_value` VALUES ('59', '15', '17', '_ahenri casanova_d', '2017-08-29 14:55:07', '2017-08-29 14:55:07');
INSERT INTO `field_value` VALUES ('60', '16', '17', '_aparallel algorithms_bnumerical analysis and scientific computing_c', '2017-08-29 14:55:07', '2017-08-29 14:55:07');
INSERT INTO `field_value` VALUES ('61', '17', '17', '_a', '2017-08-29 14:55:07', '2017-08-29 14:55:07');
INSERT INTO `field_value` VALUES ('62', '18', '17', '_a4th, floor, albert house, 1-4 singer street london ec2a 4bq, uk_bcrc press, taylor and francis group_c', '2017-08-29 14:55:07', '2017-08-29 14:55:07');
INSERT INTO `field_value` VALUES ('63', '19', '17', '_a_b_c', '2017-08-29 14:55:07', '2017-08-29 14:55:07');
INSERT INTO `field_value` VALUES ('64', '20', '17', '_v', '2017-08-29 14:55:07', '2017-08-29 14:55:07');
INSERT INTO `field_value` VALUES ('65', '14', '18', '_a978-1-8421-615-0', '2017-08-30 15:59:23', '2017-08-30 15:59:23');
INSERT INTO `field_value` VALUES ('66', '15', '18', '_amichel rigo_d', '2017-08-30 15:59:23', '2017-08-30 15:59:23');
INSERT INTO `field_value` VALUES ('67', '16', '18', '_aformal languages, automata and numeration systems 1_bintroduction to combination n words_cnetworks and telecommunications series', '2017-08-30 15:59:23', '2017-08-30 15:59:23');
INSERT INTO `field_value` VALUES ('68', '17', '18', '_a', '2017-08-30 15:59:23', '2017-08-30 15:59:23');
INSERT INTO `field_value` VALUES ('69', '18', '18', '_alondon_biste ltd_c', '2017-08-30 15:59:23', '2017-08-30 15:59:23');
INSERT INTO `field_value` VALUES ('70', '19', '18', '_a303_b_c', '2017-08-30 15:59:23', '2017-08-30 15:59:23');
INSERT INTO `field_value` VALUES ('71', '20', '18', '_v2', '2017-08-30 15:59:23', '2017-08-30 15:59:23');

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
  `loan_id` int(10) unsigned NOT NULL,
  `patron_id` int(10) NOT NULL,
  `acc_num` varchar(200) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `returned` varchar(4) DEFAULT NULL,
  `returned_date` datetime DEFAULT NULL,
  `loaned_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`loan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of loans
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- ----------------------------
-- Table structure for marc_tag_structure
-- ----------------------------
DROP TABLE IF EXISTS `marc_tag_structure`;
CREATE TABLE `marc_tag_structure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagfield` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeatable` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tagfield` (`tagfield`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of marc_tag_structure
-- ----------------------------
INSERT INTO `marc_tag_structure` VALUES ('14', '020', 'International standard book number', 'none', 'bibliographic', '2017-06-28 13:20:34', '2017-06-28 13:20:34');
INSERT INTO `marc_tag_structure` VALUES ('15', '100', 'main entry', 'nr', 'bibliographic', '2017-06-28 13:37:43', '2017-06-28 13:37:43');
INSERT INTO `marc_tag_structure` VALUES ('16', '245', 'title statement', 'nr', 'bibliographic', '2017-06-28 13:47:19', '2017-06-28 13:47:19');
INSERT INTO `marc_tag_structure` VALUES ('17', '250', 'edition statement', 'nr', 'bibliographic', '2017-06-28 13:57:28', '2017-06-28 13:57:28');
INSERT INTO `marc_tag_structure` VALUES ('18', '264', 'publication, distribution, etc.', 'r', 'bibliographic', '2017-06-28 13:59:17', '2017-06-28 13:59:17');
INSERT INTO `marc_tag_structure` VALUES ('19', '300', 'physical description', 'r', 'bibliographic', '2017-06-28 14:11:38', '2017-06-28 14:11:38');
INSERT INTO `marc_tag_structure` VALUES ('20', '490', 'series statement', 'r', 'bibliographic', '2017-06-28 14:18:55', '2017-06-28 14:18:55');

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
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('14', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('15', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('16', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('17', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('18', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('19', '9');
INSERT INTO `marc_tag_structure_cat_templates` VALUES ('20', '9');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `status_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `expiration` datetime DEFAULT NULL,
  PRIMARY KEY (`patron_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `patrons_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patrons
-- ----------------------------
INSERT INTO `patrons` VALUES ('188', '1', '0', '', 'student', '1', '2017-07-17 11:37:59', '2017-09-04 09:51:10', '2017-10-29 09:51:10');
INSERT INTO `patrons` VALUES ('189', null, '0', '', 'student', '1', '2017-07-17 11:37:59', '2017-08-29 10:12:45', '2017-10-29 13:52:38');
INSERT INTO `patrons` VALUES ('190', 'S12345670', '0', '', 'student', '1', '2017-07-10 14:08:17', '2017-08-29 10:13:57', '2017-10-29 13:54:17');
INSERT INTO `patrons` VALUES ('204', null, '0', '', 'student', '1', '2017-07-17 11:38:00', '2017-08-29 10:12:45', '2017-10-29 14:55:41');
INSERT INTO `patrons` VALUES ('205', null, '0', '', 'student', '1', '2017-07-17 11:38:01', '2017-08-29 10:12:45', '2017-10-29 15:07:15');
INSERT INTO `patrons` VALUES ('206', null, '0', '', 'student', '1', '2017-07-17 11:38:01', '2017-08-29 10:12:45', '2017-10-29 15:08:51');
INSERT INTO `patrons` VALUES ('212', null, '1', '', 'student', '1', '2017-07-17 11:38:02', '2017-08-29 10:12:45', '2017-10-29 08:25:02');
INSERT INTO `patrons` VALUES ('213', null, '4', '', 'student', '1', '2017-07-13 08:29:15', '2017-08-29 10:12:45', '2017-10-29 08:26:30');
INSERT INTO `patrons` VALUES ('214', null, '3', '', 'student', '1', '2017-07-17 11:38:03', '2017-08-29 10:12:45', '2017-10-29 08:26:32');
INSERT INTO `patrons` VALUES ('215', null, '2', '', 'student', '1', '2017-07-18 08:50:09', '2017-08-29 10:12:45', '2017-10-29 08:26:34');
INSERT INTO `patrons` VALUES ('216', null, '0', '', 'student', '1', '2017-08-07 08:57:22', '2017-08-29 10:12:46', '2017-10-29 08:57:22');
INSERT INTO `patrons` VALUES ('217', 'S12345678', '621', '', 'student', '1', '2017-08-15 15:17:26', '2017-08-29 10:14:12', '2017-10-29 15:17:26');
INSERT INTO `patrons` VALUES ('218', null, '700', '', 'student', '1', '2017-08-15 15:17:28', '2017-08-29 10:12:46', '2017-10-29 15:17:28');
INSERT INTO `patrons` VALUES ('219', 'S12345679', '615', '', 'student', '1', '2017-08-15 15:17:31', '2017-08-29 10:14:21', '2017-10-29 15:17:31');
INSERT INTO `patrons` VALUES ('220', null, '671', '', 'student', '1', '2017-08-15 15:17:33', '2017-08-29 10:12:46', '2017-10-29 15:17:33');
INSERT INTO `patrons` VALUES ('221', null, '682', '', 'student', '1', '2017-08-15 15:17:37', '2017-08-29 10:12:46', '2017-10-29 15:17:37');
INSERT INTO `patrons` VALUES ('222', null, '623', '', 'student', '1', '2017-08-15 15:17:40', '2017-08-29 10:12:46', '2017-10-29 15:17:40');
INSERT INTO `patrons` VALUES ('223', null, '664', '', 'student', '1', '2017-08-15 15:17:44', '2017-08-29 10:12:46', '2017-10-29 15:17:44');
INSERT INTO `patrons` VALUES ('224', null, '670', '', 'student', '1', '2017-08-15 15:17:46', '2017-08-29 10:12:46', '2017-10-29 15:17:46');
INSERT INTO `patrons` VALUES ('225', null, '643', '', 'student', '1', '2017-08-15 15:17:48', '2017-09-04 09:46:54', '2017-10-29 09:46:54');
INSERT INTO `patrons` VALUES ('226', '777', '701', '', 'student', '1', '2017-08-15 15:17:53', '2017-08-24 10:00:07', '2017-10-29 15:17:53');
INSERT INTO `patrons` VALUES ('227', '43534', '653', '', 'student', '1', '2017-08-15 15:17:54', '2017-08-24 10:00:30', '2017-10-29 15:17:54');
INSERT INTO `patrons` VALUES ('228', '5464', '706', '', 'student', '1', '2017-08-15 15:17:56', '2017-08-24 10:00:29', '2017-10-29 15:17:56');

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
INSERT INTO `patron_information` VALUES ('189', 'Least Pad Com', 'Male', '12-302-11', '1994-02-01', 'Home Economics', '091282843', 'P6CM Silad M', '2017-07-10 13:52:38', '2017-07-10 13:52:38');
INSERT INTO `patron_information` VALUES ('190', 'asd asdads asdasd', 'Male', '0029-1234-66', '1994-04-02', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '1023912312', 'Maguindanao', '2017-07-10 13:54:17', '2017-07-10 13:54:17');
INSERT INTO `patron_information` VALUES ('204', 'Miguel asd Mal', 'Male', '12-019-23452', '1987-02-12', 'Science, Technology, Engineering and Mathematics', '09128274672', '123', '2017-07-11 14:55:41', '2017-07-11 14:55:41');
INSERT INTO `patron_information` VALUES ('205', 'Mime TER MA', 'Male', '12-01-33-2212', '2002-02-27', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '0192883212', 'asd213123', '2017-07-11 15:07:15', '2017-07-11 15:11:22');
INSERT INTO `patron_information` VALUES ('206', 'miking asd asd', 'female', '12-04848-28383', '1993-01-22', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '012939213', 'asdasdasd', '2017-07-11 15:08:51', '2017-07-11 15:09:23');
INSERT INTO `patron_information` VALUES ('212', 'RACHEL GALDO CURILAN', 'female', '13001998000', '2017-06-06', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-07-13 08:25:02', '2017-07-13 08:25:02');
INSERT INTO `patron_information` VALUES ('213', 'CHRISTIAN IVY B OLIVO', 'female', '13002405700', '1992-06-27', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-07-13 08:26:30', '2017-09-04 08:59:28');
INSERT INTO `patron_information` VALUES ('214', 'RUSTOM RAMOS PEDALES', 'male', '12-01-33-0013', '2017-06-06', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', null, 'MAHAY BUTUAN CITY AGUSAN DEL NORTE PHILIPPINES', '2017-07-13 08:26:32', '2017-07-13 08:26:32');
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
  `posistion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `user_profile_user_id_foreign` (`user_id`),
  CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_profile
-- ----------------------------
