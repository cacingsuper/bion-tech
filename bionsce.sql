/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : bionsce

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 03/07/2021 11:18:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_activation_attempts
-- ----------------------------
DROP TABLE IF EXISTS `auth_activation_attempts`;
CREATE TABLE `auth_activation_attempts`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_activation_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for auth_groups
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups`;
CREATE TABLE `auth_groups`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_groups
-- ----------------------------

-- ----------------------------
-- Table structure for auth_groups_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_permissions`;
CREATE TABLE `auth_groups_permissions`  (
  `group_id` int UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int UNSIGNED NOT NULL DEFAULT 0,
  INDEX `auth_groups_permissions_permission_id_foreign`(`permission_id`) USING BTREE,
  INDEX `group_id_permission_id`(`group_id`, `permission_id`) USING BTREE,
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_groups_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for auth_groups_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE `auth_groups_users`  (
  `group_id` int UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int UNSIGNED NOT NULL DEFAULT 0,
  INDEX `auth_groups_users_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `group_id_user_id`(`group_id`, `user_id`) USING BTREE,
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_groups_users
-- ----------------------------

-- ----------------------------
-- Table structure for auth_logins
-- ----------------------------
DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE `auth_logins`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` int UNSIGNED NULL DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `email`(`email`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_logins
-- ----------------------------
INSERT INTO `auth_logins` VALUES (1, '::1', 'lamtoro', NULL, '2021-06-20 21:07:07', 0);
INSERT INTO `auth_logins` VALUES (2, '::1', 'admin', NULL, '2021-06-20 22:34:31', 0);
INSERT INTO `auth_logins` VALUES (3, '::1', 'admin', NULL, '2021-06-20 22:36:10', 0);
INSERT INTO `auth_logins` VALUES (4, '::1', 'admin', NULL, '2021-06-20 22:36:19', 0);
INSERT INTO `auth_logins` VALUES (5, '::1', 'admin', NULL, '2021-06-20 22:38:49', 0);
INSERT INTO `auth_logins` VALUES (6, '::1', 'admin', NULL, '2021-06-20 22:38:58', 0);
INSERT INTO `auth_logins` VALUES (7, '::1', 'admin', NULL, '2021-06-20 22:39:04', 0);
INSERT INTO `auth_logins` VALUES (8, '::1', 'admin', NULL, '2021-06-20 22:39:05', 0);
INSERT INTO `auth_logins` VALUES (9, '::1', 'admin', NULL, '2021-06-20 22:39:12', 0);
INSERT INTO `auth_logins` VALUES (10, '::1', 'admin', NULL, '2021-06-20 22:39:27', 0);
INSERT INTO `auth_logins` VALUES (11, '::1', 'admin', NULL, '2021-06-20 22:39:27', 0);
INSERT INTO `auth_logins` VALUES (12, '::1', 'admin', NULL, '2021-06-20 22:39:29', 0);
INSERT INTO `auth_logins` VALUES (13, '::1', 'admin', NULL, '2021-06-20 22:45:43', 0);

-- ----------------------------
-- Table structure for auth_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_permissions`;
CREATE TABLE `auth_permissions`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for auth_reset_attempts
-- ----------------------------
DROP TABLE IF EXISTS `auth_reset_attempts`;
CREATE TABLE `auth_reset_attempts`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_reset_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for auth_tokens
-- ----------------------------
DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE `auth_tokens`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hashedValidator` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `auth_tokens_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `selector`(`selector`) USING BTREE,
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for auth_users_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_users_permissions`;
CREATE TABLE `auth_users_permissions`  (
  `user_id` int UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int UNSIGNED NOT NULL DEFAULT 0,
  INDEX `auth_users_permissions_permission_id_foreign`(`permission_id`) USING BTREE,
  INDEX `user_id_permission_id`(`user_id`, `permission_id`) USING BTREE,
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_users_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for board_directors
-- ----------------------------
DROP TABLE IF EXISTS `board_directors`;
CREATE TABLE `board_directors`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `email_perusahaan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `active` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of board_directors
-- ----------------------------
INSERT INTO `board_directors` VALUES (1, 'Datuk Syed Nazim Tuan Syed Faisal (D.P.S.M.)', 'Chief Executive Officer & Executive Director', 'He was appointed to the Board on 25 September 2018 to serve as an Executive Director and became Chief Executive Officer of BiON on 9 July 2020. He has over 15 years of experience in the accounting and banking sectors.\r\n\r\nPrior to becoming Chief Executive Officer of BiON, Datuk Syed Nazim was the Group Chief Financial Officer of Serba Dinamik Holdings Berhad – a Malaysian-based investment holding company that manages the Serba Dinamik Group of international energy services companies. Datuk Syed Nazim remains an Executive Director of Serba Dinamik.\r\n\r\nOther previous experience includes holding positions at Ibdar Bank in the Kingdom of Bahrain, RHB Islamic Bank in Malaysia and KPMG ', 'faisal@bionce.com', NULL, NULL, '/img/board-of-directors/EN-SYED-NAZIM-BIN-SYED-FAISAL-02.png', NULL);
INSERT INTO `board_directors` VALUES (2, 'Anonymous', 'Chief Executive', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non felis eget mauris aliquet ullamcorper. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac vulputate mauris, vitae mollis mi. Fusce feugiat odio eget ipsum tincidunt ullamcorper. Curabitur vulputate libero libero, vel vehicula mi placerat et. Quisque laoreet turpis ac quam finibus mattis. Quisque fermentum est non suscipit efficitur. Donec sit amet ante felis. Phasellus non erat in lectus finibus porttitor eu nec nisi. Praesent facilisis ac quam in dictum. Nulla facilisi. Sed metus ligula, ullamcorper nec est malesuada, placerat tincidunt dolor. Donec ultrices, mauris non scelerisque ullamcorper, arcu eros cursus magna, vitae sollicitudin dui felis ac orci. Nulla tempus, turpis vel elementum dapibus, lacus leo aliquet felis, at sollicitudin ante est quis urna. Quisque feugiat elit id enim interdum eleifend.', NULL, NULL, NULL, 'https://images.vexels.com/media/users/3/130212/isolated/preview/fcb8ecc2fa0622ecde0cc912a12e048f-executive-sitting-silhouette-by-vexels.png', NULL);

-- ----------------------------
-- Table structure for info
-- ----------------------------
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `visi_misi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ketua_ceo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `wakil_ceo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `address2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `fax` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `zip_code` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `since` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `employees` int NULL DEFAULT NULL,
  `embed_map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `operation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `work_location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of info
-- ----------------------------
INSERT INTO `info` VALUES (1, NULL, NULL, 'Datuk Syed Nazim Tuan Syed Faisal (D.P.S.M)', 'Darwin', 'jln. Venturas', 'jln. Los Blancos', NULL, '0218123123124,012312312312', 'admin@admin.com,user@user.com', NULL, 'Jakarta, 06 January 2018', 34, NULL, 'http://localhost:8080/img/1624615195_ec32517a5fc563642328.png', NULL, NULL);

-- ----------------------------
-- Table structure for media_upload
-- ----------------------------
DROP TABLE IF EXISTS `media_upload`;
CREATE TABLE `media_upload`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `size` int NULL DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of media_upload
-- ----------------------------
INSERT INTO `media_upload` VALUES (1, 'default.png', NULL, '/img/default.png', 'image/jpg', NULL, 'default', NULL, '2021-06-22 15:08:56', NULL, NULL);
INSERT INTO `media_upload` VALUES (2, 'logo.png', NULL, '/logo.png', 'image/png', NULL, 'logo', NULL, '2021-06-22 15:09:00', NULL, NULL);
INSERT INTO `media_upload` VALUES (3, 'Bion-Home-Hero-3-v2.jpg', NULL, '/img/Bion-Home-Hero-3-v2.jpg', 'image/jpg', NULL, NULL, NULL, '2021-06-22 15:49:30', NULL, NULL);
INSERT INTO `media_upload` VALUES (4, 'hero_banner_bion_002.jpg', NULL, '/img/hero_banner_bion_002.jpg', 'image/jpg', NULL, NULL, NULL, '2021-06-22 15:52:45', NULL, NULL);
INSERT INTO `media_upload` VALUES (5, 'hero_banner_bion_about.jpg', NULL, '/img/hero_banner_bion_about.jpg', 'image/jpg', NULL, NULL, NULL, '2021-06-22 15:53:34', NULL, NULL);
INSERT INTO `media_upload` VALUES (6, 'Bion-Home-Service-01.jpg', NULL, '/img/Bion-Home-Service-01.jpg', 'image/jpg', NULL, NULL, NULL, '2021-06-22 15:55:34', NULL, NULL);
INSERT INTO `media_upload` VALUES (7, 'Bion-Home-Service-02.jpg', NULL, '/img/Bion-Home-Service-02.jpg', 'image/jpg', NULL, NULL, NULL, '2021-06-24 09:04:50', NULL, NULL);
INSERT INTO `media_upload` VALUES (8, 'nor003.jpg', NULL, '/img/nor003.jpg', 'image/jpg', NULL, NULL, NULL, '2021-06-24 09:16:52', NULL, NULL);
INSERT INTO `media_upload` VALUES (9, 'pan002.jpg', NULL, '/img/pan002.jpg', 'image/jpg', NULL, NULL, NULL, '2021-06-24 09:17:31', NULL, NULL);
INSERT INTO `media_upload` VALUES (10, 'photo-1445140402314-ffd9630d0b19-v2.jpg', NULL, '/img/photo-1445140402314-ffd9630d0b19-v2.jpg', 'image/jpg', NULL, NULL, NULL, '2021-06-24 09:18:20', NULL, NULL);
INSERT INTO `media_upload` VALUES (27, '1625220455_7b879a8fbc71dcfc15c9.jpg', 116642, '/img/1625220455_7b879a8fbc71dcfc15c9.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `media_upload` VALUES (28, '1625220545_6a9d60e30d650f14e87e.jpg', 43800, '/img/1625220545_6a9d60e30d650f14e87e.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `media_upload` VALUES (29, '1625220601_bc48293d14689fc01435.jpg', 1919284, '/img/1625220601_bc48293d14689fc01435.jpg', 'image/jpeg', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `media_upload` VALUES (30, '1625220669_eab4f20a4d7354bce374.jpg', 116642, '/img/1625220669_eab4f20a4d7354bce374.jpg', 'image/jpeg', NULL, NULL, NULL, '2021-07-02 05:11:09', '2021-07-02 05:11:09', NULL);
INSERT INTO `media_upload` VALUES (31, '1625220740_43e924f7d071247c464c.jpg', 116642, '/img/1625220740_43e924f7d071247c464c.jpg', 'image/jpeg', NULL, NULL, NULL, '2021-07-02 05:12:20', '2021-07-02 05:12:20', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1624067718, 1);

-- ----------------------------
-- Table structure for our_business
-- ----------------------------
DROP TABLE IF EXISTS `our_business`;
CREATE TABLE `our_business`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_business` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `abbreviation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detail_business` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `detail_html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `since` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of our_business
-- ----------------------------
INSERT INTO `our_business` VALUES (1, 'POME-MAS™', 'Palm Oil Mill Effluent Mesophilic Anaerobic Treatment System', 'POME-MAS™ was borne through BiON’s in-house R&D capabilities and knowledge of 40 years in mesophilic anaerobic digestion for wastewater treatment.<br>\r\n<br>\r\nPOME-MAS™ is designed to provide higher yields of biogas production and greater reduction efficiency in the chemical oxygen demand (COD) of treated POME.</br>\r\n</br>\r\nA higher efficiency in the treated POME’s COD reduction enables greater amounts of biogas to be produced and increased power generation supply to the grid or palm oil mills.\r\n\r\nBiON continuously strives to progress its R&D efforts of innovating new techniques and methodologies to enhance the anaerobic processes in the treatment of POME.', '<b>Anaerobic Digestion in Waste Treatment</b>\n<br>\n<br>\nAnaerobic digestion is a sequence of processes where microorganisms (i.e. bacteria) break down and degrade organic materials in the absence of oxygen, resulting in the production of biogas which ultimately can be harnessed to generate power and heat.\n<br>\n<br>\nIn industrial processes such as wastewater treatment, anaerobic digesters are utilised to help manage these wastes and create renewable energy.\n<br>\n<br>\nPOME-to-energy applications utilise the anaerobic digestion process to produce biogas namely methane and pre-treated water that are abundant in nutrients such as phosphorus, nitrogen etc. which can be used for agricultural purposes.\n<br>\n<br>\nSystem Description and Features\n<br>\n<br>\nPOME-MAS™ utilises an enclosed digester tank reactor system for the anaerobic process within the POME to ensue.\n<br>\n<br>\nThe process flow commences with the channelling of POME from a palm oil mill’s final cooling pond into an equalisation holding tank, where it is equalised and homogenised accordingly.\n<br>\n<br>\nOnce the POME mixture is stabilised, it is directed into closed anaerobic reactor tanks which are operated under mesophilic settings at 30°C – 40°C in fully mixed conditions.\n<br>\n<br>\nThe biogas generated from the anaerobic digestion process in the reactor tanks are flowed through pipes into a moisture trap. The trap segregates the biogas from the moisture before it is channelled into a biogas scrubber.\n<br>\n<br>\nThe composition of biogas produced from POME contain various forms of gases such as methane (CH4), hydrogen sulphide (H2S), carbon dioxide (CO2), ammonia (NH3) and other substances.\n<br>\n<br>\nThe biogas scrubber utilises a biological process to remove any harmful gas elements (i.e. H2S, NH3 etc.) and further reduces the biogas’ moisture content through condensation.\n<br>\n<br>\nThe CH4 gas obtained during the scrubbing process is captured and stored into a storage tank. The stored CH4 is directed into a biogas engine generator set which converts it into electricity, then routed to a power utility sub-station for distribution to the grid.\n<br>\n<br>\nAny excess biogas produced from the anaerobic digestion process resides at the top part of the reactor tanks. and released through pipes into an automatic Clean Development Mechanism (CDM) compliant closed flaring system.\n<br>\n<br>\nAt all times, the exhaust temperature in this system is maintained above 550°C and any excess methane produced is extinguished before being flared out of the chimney.\n<br>\n<br>\nAny POME overflow produced from the reactor tanks is channelled through a pipeline into a settling tank and this supernatant liquid is flowed back into aeration ponds for further treatment.\n<br>\n<br>\nThe settled sludge residue derived from this process would either be recycled back into the reactor tanks or funnelled out through pipes and onto a sludge drying bed.\n<br>\n<br>\nThis bed of dried sludge is rich in nutrients and can be used by the nearby oil palm plantations as crop fertiliser.', NULL, NULL);
INSERT INTO `our_business` VALUES (2, NULL, 'POME-MAS™ APPLICATIONS FOR PONDS AND LAGOONS', 'The aerobic process is the most conventional wastewater process for sewage treatment.\r\n\r\nOxygen is required for bacteria to break down the organic waste materials resulting in high-energy requirements and large volumes of waste bacteria sludge is produced.\r\n\r\nGRASS™ was developed by BiON to counter and remove pollutants from the effluent and is a novel, innovative, energy efficient, space saving treatment compared to the conventional aerobic processes currently utilised in treating wastewater.\r\n\r\nGRASS™ is BiON’s very own in-house developed and patented system that has been successfully implemented in numerous sewage treatment plants throughout Malaysia.', 'Utilising the same anaerobic digestion principles, BiON has successfully adapted and applied the <b>POME-MAS™</b> technology to treat POME waste in ponds and lagoons directly.<br>\n<br>\nThis alternative application of <b>POME-MAS™</b> is targeted at palm oil mills with restricted space or insufficient land area that are unable to construct a digester reactor tank onsite.\n<br>\n<br>\nA protective membrane cover is laid across the surface of the pond or lagoon to enable biogas capture through anaerobic digestion.\n<br>\n<br>\nThe ponding or lagoon system is very popular and accounts for 85% of the waste treatment systems applied in Malaysia as it is a simple, low cost and easy to operate system.\n<br>\n<br>\nThis system has different stages of waste treatment: a cooling pond, an anaerobic pond, a facultative pond, an acidification pond, an aerobic pond, a stabilisation pond and others.\n<br>\n<br>\nThe final discharge of the treated wastewater’s biochemical oxygen demand (BOD) must comply with the standards set by the Department of Environment (DOE) Malaysia before it is released into the river or waterways.', NULL, NULL);
INSERT INTO `our_business` VALUES (3, 'GRASS™', 'Gas Releasing Anaerobic Sludge System', 'The aerobic process is the most conventional wastewater process for sewage treatment.\r\n\r\nOxygen is required for bacteria to break down the organic waste materials resulting in high-energy requirements and large volumes of waste bacteria sludge is produced.\r\n\r\n<b>GRASS™</b> was developed by <b>BiON</b> to counter and remove pollutants from the effluent and is a novel, innovative, energy efficient, space saving treatment compared to the conventional aerobic processes currently utilised in treating wastewater.\r\n\r\n<b>GRASS™</b> is BiON’s very own in-house developed and patented system that has been successfully implemented in numerous sewage treatment plants throughout Malaysia.', '<b>System Description and Features</b>\n<br>\n<br>\nThe sewage treatment processes utilised In Malaysia are mainly aerobic based. Alternatively, wastewater can also be treated utilising the anaerobic process.\n<br>\n<br>\nThe anaerobic process is cheaper and simpler to treat wastewater as sludge production is much less and the bacteria the presence of oxygen is not required.\n<br>\n<br>\nThe changes occurring during the digestion are complex and arise from activities of many different types of microorganisms.\n<br>\n<br>\nComplex organic matter is broken down to soluble compounds which are hydrolysed, mineralised and gasified.\n<br>\n<br>\nAnaerobic bacteria in the <b>GRASS™</> reactor reduces organic compounds in the wastewater to energy rich CH4 (60% – 70%), CO2 (30% – 40%), H2S and a small amount of cell material.\n<br>\n<br>\nBiogas is generated in this process and recovered to be utilised as an alternative fuel or flared into the atmosphere in a suitable manner (such as a CDM compliant closed flaring system), depending on the volume produced. Every kilogramme of COD reduced, provides around 0.5m3 of biogas.\n<br>\n<br>\nThe sludge produced in the GRASS™ reactor is only 10% equivalent of the sludge produced in an aerobic reactor.\n<br>\n<br>\nAs the anaerobic sludge is much easier to process further, its handling and disposal are more cost effective.', NULL, NULL);
INSERT INTO `our_business` VALUES (4, 'GREENPAK™', NULL, 'Wastewater and sewage from domestic households, municipals, agricultural and industrials are treated in various ways.\r\n\r\nThe organic wastes derived are treated by either anaerobic or aerobic processes or a combination of both and BiON has developed <b>GREENPAK™</b> to address the removal of these waste solids expediently.\r\n\r\n<b>GREENPAK™</b> is a patented system developed in-house by BiON’s scientific team to treat wastewater, namely sewage.\r\n\r\nThe GREENPAK™ system enables wastewater treatment to have an up-flow individual septic tank with anaerobic and aerobic treatments.\r\n\r\nThe system is relatively inexpensive and provides a simple, reliable and efficient process for treating organic wastes, digesting sludge and wastewater at a shortened residence time.', '<b>System Description and Features</b></br>\r\n</br>\r\nThere are various designs of septic tanks to treat primary organic wastes in solid, semi-solid and/or liquids to produce non-hazardous and sometimes beneficial products for release into the environment.</br>\r\n</br>\r\nHowever, some of the individual septic tanks do not meet the requirements and standards of DOE Malaysia for sewage discharge.\r\n\r\nBiON has developed <b>GREENPAK™</b> as a system for wastewater treatment containing organic matter.\r\n\r\n<b>GREENPAK™</b> effectively improves the treatment of sewage waste as the system has:</br>\r\n<br>\r\n<ul>\r\n<li>a COD removal efficiency of an average 75.1%;</li>\r\n<li>a BOD removal efficiency of 76.7%;</li>\r\n<li>a stable pH;</li>\r\n<li>less sludge production;</li>\r\n<li>moderately low suspended solids; and</li>\r\n<li>an aeration device to increase dissolved oxygen levels for the aeration section.</li>\r\n</ul>\r\n\r\n</br>\r\nBy utilising this system in the treatment process, the total amount of sludge solids is greatly reduced, and a much cleaner effluent is produced for release into the environment or for further processing prior to its discharge.\r\n\r\nOrganic wastes naturally contain microorganisms and under operating conditions, additional microorganisms for the anaerobic process are not required.\r\n\r\nBy utilising naturally occurring microorganisms and compartmentalisation of the anaerobic and aerobic treatments, the organic waste, sludge and wastewater are efficiently digested without the need of temperature controls.\r\n\r\nFurthermore, the <b>GREENPAK™</b> system does not require any mechanical effort or complex mechanism for content mixing, thus, it substantially saves electrical energy and greatly reduces operations and maintenance costs to manage and treat the wastes.', NULL, NULL);

-- ----------------------------
-- Table structure for tb_content
-- ----------------------------
DROP TABLE IF EXISTS `tb_content`;
CREATE TABLE `tb_content`  (
  `id` int NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `text_satu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `text_dua` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `text_tiga` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `image_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_content
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role` tinyint(1) NULL DEFAULT 0,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reset_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `reset_at` datetime NULL DEFAULT NULL,
  `reset_expires` datetime NULL DEFAULT NULL,
  `activate_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_message` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin@admin.com', 'admin', 0, '$2y$10$8qkI9r7ZfcIQsQYQxbM/7.BYcX6xih4fydWaq0SzUT4T.DS6aCTdq', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
