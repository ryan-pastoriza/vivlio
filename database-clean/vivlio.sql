/*
 Navicat Premium Data Transfer

 Source Server         : Local Connection
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : vivlio

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 18/03/2021 12:23:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for announcement
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement`  (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ao_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`a_id`) USING BTREE,
  INDEX `ao_id`(`ao_id`) USING BTREE,
  CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`ao_id`) REFERENCES `announcement_option` (`ao_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 79 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for announcement_option
-- ----------------------------
DROP TABLE IF EXISTS `announcement_option`;
CREATE TABLE `announcement_option`  (
  `ao_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ao_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`ao_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_permission
-- ----------------------------
DROP TABLE IF EXISTS `auth_permission`;
CREATE TABLE `auth_permission`  (
  `perm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`perm_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_role
-- ----------------------------
DROP TABLE IF EXISTS `auth_role`;
CREATE TABLE `auth_role`  (
  `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `auth_role_permission`;
CREATE TABLE `auth_role_permission`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `perm_id` int(10) UNSIGNED NOT NULL,
  INDEX `auth_role_permission_role_id_foreign`(`role_id`) USING BTREE,
  INDEX `auth_role_permission_perm_id_foreign`(`perm_id`) USING BTREE,
  CONSTRAINT `auth_role_permission_perm_id_foreign` FOREIGN KEY (`perm_id`) REFERENCES `auth_permission` (`perm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `auth_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_user
-- ----------------------------
DROP TABLE IF EXISTS `auth_user`;
CREATE TABLE `auth_user`  (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `auth_user_status_id_foreign`(`status_id`) USING BTREE,
  CONSTRAINT `auth_user_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_user_role
-- ----------------------------
DROP TABLE IF EXISTS `auth_user_role`;
CREATE TABLE `auth_user_role`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  INDEX `auth_user_role_role_id_foreign`(`role_id`) USING BTREE,
  INDEX `auth_user_role_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `auth_user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `auth_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for cat_templates
-- ----------------------------
DROP TABLE IF EXISTS `cat_templates`;
CREATE TABLE `cat_templates`  (
  `template_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `template_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`template_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for catalogue_record
-- ----------------------------
DROP TABLE IF EXISTS `catalogue_record`;
CREATE TABLE `catalogue_record`  (
  `catalogue_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `material_type_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `call_num` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `remarks` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `price` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `accession_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `up_acc` int(1) NULL DEFAULT 0,
  `opac_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `up_opac` int(1) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`catalogue_id`) USING BTREE,
  INDEX `material`(`material_type_id`) USING BTREE,
  CONSTRAINT `material` FOREIGN KEY (`material_type_id`) REFERENCES `lib_material_type` (`material_type_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2387 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`cat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for company
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company`  (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `c_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `c_TIN` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `c_postal` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `c_contact` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `c_email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `c_status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`c_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for copies
-- ----------------------------
DROP TABLE IF EXISTS `copies`;
CREATE TABLE `copies`  (
  `copy_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `acc_num` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `catalogue_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `barcode` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `source` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `call_num` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `issues` smallint(6) NULL DEFAULT NULL,
  `date_received` date NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `price` double(10, 0) NULL DEFAULT NULL,
  `material_type_id` int(10) NULL DEFAULT NULL,
  `copy_number` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`copy_id`) USING BTREE,
  UNIQUE INDEX `accession_num`(`acc_num`) USING BTREE,
  UNIQUE INDEX `barcode`(`barcode`) USING BTREE,
  INDEX `copies_idfk_ctr`(`catalogue_id`) USING BTREE,
  CONSTRAINT `copies_idfk_ctr` FOREIGN KEY (`catalogue_id`) REFERENCES `catalogue_record` (`catalogue_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14345 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for e_resources
-- ----------------------------
DROP TABLE IF EXISTS `e_resources`;
CREATE TABLE `e_resources`  (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `edition` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`res_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for expiration_history
-- ----------------------------
DROP TABLE IF EXISTS `expiration_history`;
CREATE TABLE `expiration_history`  (
  `expiration_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patron_id` int(10) NULL DEFAULT NULL,
  `expiration_date` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`expiration_id`) USING BTREE,
  INDEX `patron_id`(`patron_id`) USING BTREE,
  CONSTRAINT `expiration_history_ibfk_1` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 96 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for field_value
-- ----------------------------
DROP TABLE IF EXISTS `field_value`;
CREATE TABLE `field_value`  (
  `field_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id` int(10) UNSIGNED NULL DEFAULT NULL,
  `catalogue_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`field_id`) USING BTREE,
  INDEX `field_value_idfk_marc_id`(`id`) USING BTREE,
  INDEX `field_value_idfk_catalogue_id`(`catalogue_id`) USING BTREE,
  CONSTRAINT `field_value_idfk_catalogue_id` FOREIGN KEY (`catalogue_id`) REFERENCES `catalogue_record` (`catalogue_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `field_value_idfk_marc_id` FOREIGN KEY (`id`) REFERENCES `marc_tag_structure` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18083 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for fines
-- ----------------------------
DROP TABLE IF EXISTS `fines`;
CREATE TABLE `fines`  (
  `f_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patron_id` int(11) NULL DEFAULT NULL,
  `loan_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `remarks` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`f_id`) USING BTREE,
  INDEX `patron_id`(`patron_id`) USING BTREE,
  INDEX `loan_id`(`loan_id`) USING BTREE,
  CONSTRAINT `fines_ibfk_1` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fines_ibfk_2` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`loan_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for lib_material_type
-- ----------------------------
DROP TABLE IF EXISTS `lib_material_type`;
CREATE TABLE `lib_material_type`  (
  `material_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`material_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for loan_rules
-- ----------------------------
DROP TABLE IF EXISTS `loan_rules`;
CREATE TABLE `loan_rules`  (
  `patron_category_id` int(10) UNSIGNED NOT NULL,
  `fine` decimal(10, 0) NULL DEFAULT NULL,
  `max_loan_qty` int(5) NULL DEFAULT NULL,
  `loan_length` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`patron_category_id`) USING BTREE,
  CONSTRAINT `lr_idfk_patron_categories_pcid` FOREIGN KEY (`patron_category_id`) REFERENCES `patron_categories` (`patron_category_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for loans
-- ----------------------------
DROP TABLE IF EXISTS `loans`;
CREATE TABLE `loans`  (
  `loan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patron_id` int(10) NOT NULL,
  `acc_num` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `due_date` datetime(0) NULL DEFAULT NULL,
  `returned` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `returned_date` datetime(0) NULL DEFAULT NULL,
  `loaned_date` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`loan_id`) USING BTREE,
  INDEX `loans_idfk_patrons_patron_id`(`patron_id`) USING BTREE,
  CONSTRAINT `loans_idfk_patrons_patron_id` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs`  (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `patron_id` int(11) NULL DEFAULT NULL,
  `patron_ids` int(11) NULL DEFAULT NULL,
  `cat_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`log_id`) USING BTREE,
  INDEX `cat_id`(`cat_id`) USING BTREE,
  INDEX `logs_ibfk_2`(`patron_id`) USING BTREE,
  CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 306 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for marc_subfield_structure
-- ----------------------------
DROP TABLE IF EXISTS `marc_subfield_structure`;
CREATE TABLE `marc_subfield_structure`  (
  `sub_id` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) UNSIGNED NOT NULL,
  `tagsubfield` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tagsubfieldname` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `repeatable` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`sub_id`) USING BTREE,
  INDEX `mss_idfk_mts_id`(`id`) USING BTREE,
  CONSTRAINT `mss_idfk_mts_id` FOREIGN KEY (`id`) REFERENCES `marc_tag_structure` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 134 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for marc_tag_structure
-- ----------------------------
DROP TABLE IF EXISTS `marc_tag_structure`;
CREATE TABLE `marc_tag_structure`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tagfield` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeatable` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `tagfield`(`tagfield`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for marc_tag_structure_cat_templates
-- ----------------------------
DROP TABLE IF EXISTS `marc_tag_structure_cat_templates`;
CREATE TABLE `marc_tag_structure_cat_templates`  (
  `id` int(11) UNSIGNED NULL DEFAULT NULL,
  `template_id` int(11) UNSIGNED NULL DEFAULT NULL,
  INDEX `id`(`id`) USING BTREE,
  INDEX `template_id`(`template_id`) USING BTREE,
  CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `marc_tag_structure` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `template_id` FOREIGN KEY (`template_id`) REFERENCES `cat_templates` (`template_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for patron_categories
-- ----------------------------
DROP TABLE IF EXISTS `patron_categories`;
CREATE TABLE `patron_categories`  (
  `patron_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_type_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `enrolment_period` int(10) NULL DEFAULT NULL,
  `enrolment_period_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`patron_category_id`) USING BTREE,
  UNIQUE INDEX `category_type_id`(`category_type_id`) USING BTREE,
  CONSTRAINT `pc_idfk_pct_cti` FOREIGN KEY (`category_type_id`) REFERENCES `patron_category_type` (`category_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for patron_category_type
-- ----------------------------
DROP TABLE IF EXISTS `patron_category_type`;
CREATE TABLE `patron_category_type`  (
  `category_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`category_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for patron_information
-- ----------------------------
DROP TABLE IF EXISTS `patron_information`;
CREATE TABLE `patron_information`  (
  `patron_id` int(10) NOT NULL,
  `full_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gender` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `student_id` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dob` date NULL DEFAULT NULL,
  `course` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contact_no` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  INDEX `patron_information_idfk_patrons_id`(`patron_id`) USING BTREE,
  CONSTRAINT `patron_information_ibfk_1` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for patrons
-- ----------------------------
DROP TABLE IF EXISTS `patrons`;
CREATE TABLE `patrons`  (
  `patron_id` int(10) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sis_id` int(10) NULL DEFAULT NULL,
  `card_number` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `patron_type` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `patron_category_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `status_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `expiration` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`patron_id`) USING BTREE,
  INDEX `status_id`(`status_id`) USING BTREE,
  INDEX `patron_idfk_pc`(`patron_category_id`) USING BTREE,
  CONSTRAINT `patron_idfk_pc` FOREIGN KEY (`patron_category_id`) REFERENCES `patron_categories` (`patron_category_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `patrons_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 234 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NULL DEFAULT NULL,
  `p_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `p_creator` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `p_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`p_id`) USING BTREE,
  INDEX `c_id`(`c_id`) USING BTREE,
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for renewal
-- ----------------------------
DROP TABLE IF EXISTS `renewal`;
CREATE TABLE `renewal`  (
  `r_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NULL DEFAULT NULL,
  `l_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`r_id`) USING BTREE,
  INDEX `p_id`(`p_id`) USING BTREE,
  INDEX `l_id`(`l_id`) USING BTREE,
  CONSTRAINT `renewal_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patrons` (`patron_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `renewal_ibfk_2` FOREIGN KEY (`l_id`) REFERENCES `loans` (`loan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for reserves
-- ----------------------------
DROP TABLE IF EXISTS `reserves`;
CREATE TABLE `reserves`  (
  `reserve_id` int(10) NOT NULL AUTO_INCREMENT,
  `patron_id` int(10) NULL DEFAULT NULL,
  `reserved_date` datetime(0) NULL DEFAULT NULL,
  `catalogue_record_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `copy_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `cancel_date` datetime(0) NULL DEFAULT NULL,
  `remarks` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `priority` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`reserve_id`) USING BTREE,
  INDEX `patron_id`(`patron_id`) USING BTREE,
  INDEX `catalogue_record_id`(`catalogue_record_id`) USING BTREE,
  INDEX `copy_id`(`copy_id`) USING BTREE,
  CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`patron_id`) REFERENCES `patrons` (`patron_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `reserves_ibfk_2` FOREIGN KEY (`catalogue_record_id`) REFERENCES `catalogue_record` (`catalogue_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `reserves_ibfk_3` FOREIGN KEY (`copy_id`) REFERENCES `copies` (`copy_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `status_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`status_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user_profile
-- ----------------------------
DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile`  (
  `user_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  INDEX `user_profile_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
