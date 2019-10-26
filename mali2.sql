/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 80012
Source Host           : localhost:3306
Source Database       : mali2

Target Server Type    : MYSQL
Target Server Version : 80012
File Encoding         : 65001

Date: 2019-10-26 16:36:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ms_columns
-- ----------------------------
DROP TABLE IF EXISTS `ms_columns`;
CREATE TABLE `ms_columns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) unsigned DEFAULT '0' COMMENT '父ID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
  `title` varchar(140) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '标题',
  `keyword` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '关键词',
  `description` varchar(240) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '超连接',
  `status` smallint(5) unsigned DEFAULT '0' COMMENT '状态 0审核 1通过',
  `position` smallint(5) unsigned DEFAULT '1' COMMENT '位置',
  `sort` smallint(5) unsigned DEFAULT '99' COMMENT '排序',
  `model` smallint(5) unsigned DEFAULT NULL COMMENT '模型',
  `is_nav` smallint(5) unsigned DEFAULT '0' COMMENT '是否导航  0不是，1是',
  `detailed_template_id` smallint(5) unsigned DEFAULT NULL COMMENT '详情模板ID',
  `list_template_id` smallint(5) unsigned DEFAULT NULL COMMENT '列表模板ID',
  `channel_template_id` smallint(5) unsigned DEFAULT NULL COMMENT '频道模板ID',
  `single_template_id` smallint(5) unsigned DEFAULT NULL COMMENT '单页模板ID',
  `page` smallint(5) unsigned DEFAULT '12' COMMENT '分页',
  `priority` double(3,2) unsigned DEFAULT '0.80' COMMENT '权重',
  `rel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '图片',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '内容',
  `lang` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cn' COMMENT '语言',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ms_columns
-- ----------------------------
INSERT INTO `ms_columns` VALUES ('1', '0', '2019-10-20 18:00:04', '2019-10-26 14:34:32', null, '新闻', '新闻', '新闻', null, null, '1', '1', '1', '1', '0', '15', '1', '17', null, '8', '0.80', null, null, '/image/column/YguMZPOBV4iNOWx5ulOkyBeSrAVMgFSS0dqyO2c7.jpeg', '<p>123<br/></p>', 'cn');
INSERT INTO `ms_columns` VALUES ('2', '0', '2019-10-20 18:00:12', '2019-10-20 18:00:12', null, '产品中心', null, null, null, null, '1', '1', '99', '2', '0', null, '2', null, null, '8', '0.80', null, null, null, null, 'cn');
INSERT INTO `ms_columns` VALUES ('3', '0', '2019-10-20 18:00:25', '2019-10-26 16:04:28', null, '联系我们', '联系我们', null, null, null, '1', '1', '99', '5', '1', null, null, null, '4', '8', '0.80', null, null, '/image/column/QzJ5l8K95izIrTXVV1pS2mLnDOIf3iQCrUJe3HvA.jpeg', null, 'cn');
INSERT INTO `ms_columns` VALUES ('4', '1', '2019-10-24 18:23:28', '2019-10-26 14:42:36', null, '公司新闻', '新闻', '新闻', '新闻', null, '1', '2', '99', '1', '0', '15', '1', '17', null, '8', '0.80', 'nofollow', '新闻', '/image/column/5R6uiua7uGMctw9F6LxS130W7lXAEZdgAFz1oHaV.jpeg', '<p><img src=\"/ueditor/php/upload/image/20191026/1572072126845742.jpg\" alt=\"1572072126845742.jpg\"/></p>', 'cn');
INSERT INTO `ms_columns` VALUES ('5', '2', '2019-10-25 15:42:55', '2019-10-26 10:03:10', null, '测试设备', null, null, null, null, '1', '1', '99', '2', '0', '15', '1', '17', null, '8', '0.80', null, null, null, null, 'cn');
INSERT INTO `ms_columns` VALUES ('6', '0', '2019-10-26 14:53:09', '2019-10-26 14:53:20', null, 'new', null, null, null, null, '0', '1', '99', '1', '0', null, '16', null, null, '8', '0.80', null, null, '/image/column/IPFW4EqfTiBCv0ExhOB67daEoQP4xHdh7Kx1ZMlj.jpeg', null, 'en');

-- ----------------------------
-- Table structure for ms_configs
-- ----------------------------
DROP TABLE IF EXISTS `ms_configs`;
CREATE TABLE `ms_configs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `key` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '配置健值',
  `desc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `value` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '值',
  `remarks` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '备注',
  `style` smallint(5) unsigned DEFAULT NULL COMMENT '样式-文本、文本域、图片、布尔、JSON',
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'cn' COMMENT '类型',
  `lang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'cn' COMMENT '多语言',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ms_configs
-- ----------------------------
INSERT INTO `ms_configs` VALUES ('10', '2019-10-11 03:21:50', '2019-10-11 03:21:50', 'email', '邮箱', 'liao@seals-ins.com', null, '1', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('9', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'wechat', '公众号', '/image/system/nVexXbZrK1eCRZlyWa6W63EQDOMIQfzyM5bztaJ0.jpeg', null, '3', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('8', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'qq', 'QQ', '2391656270', null, '1', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('7', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'address', '地址', '深圳市光明新区公明北环大道世峰工业园B栋', null, '2', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('5', '2019-10-11 03:21:50', '2019-10-26 15:42:24', 'phone', '座机', '400-168-1023', null, '1', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('6', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'mobile', '手机', '13123705900', null, '1', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('4', '2019-10-11 03:21:50', '2019-10-26 15:42:24', 'site_description', '描述', '关于希立仪器设备有限公司', null, '2', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('3', '2019-10-11 03:21:50', '2019-10-26 15:42:24', 'site_keywords', '关键词', '气密性检测仪', null, '1', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('2', '2019-10-11 03:21:50', '2019-10-26 15:42:24', 'site_title', '网站标题', '希立仪器设备有限公司', null, '1', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('1', '2019-10-11 03:21:50', '2019-10-26 15:42:24', 'site_name', '网站名称', '希立仪器', null, '1', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('11', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'website', '官网', 'www.seals-ins.com', null, '1', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('12', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'case_number', '备案号', '粤ICP备18027543号', null, '1', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('13', '2019-10-11 03:21:50', '2019-10-11 03:58:52', 'logo', 'LOGO', '/system/1sjfS7Li1jeA6eWIPLkRfj9piBzNw7Lp7JD95ALF.png', null, '3', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('14', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'copyright', '版权', '流年如梦', null, '1', 'system', 'cn');
INSERT INTO `ms_configs` VALUES ('15', '2019-10-11 03:21:50', '2019-10-26 15:42:24', 'site_name', '网站名称', '希立仪器', null, '1', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('16', '2019-10-11 03:21:50', '2019-10-26 15:42:24', 'site_title', '网站标题', '希立仪器设备有限公司', null, '1', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('17', '2019-10-11 03:21:50', '2019-10-26 15:42:24', 'site_keywords', '关键词', '气密性检测仪', null, '1', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('18', '2019-10-11 03:21:50', '2019-10-26 15:42:24', 'site_description', '描述', '关于希立仪器设备有限公司', null, '2', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('19', '2019-10-11 03:21:50', '2019-10-26 15:42:24', 'phone', '座机', '400-168-1023', null, '1', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('20', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'mobile', '手机', '13123705900', null, '1', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('21', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'address', '地址', '深圳市光明新区公明北环大道世峰工业园B栋', null, '2', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('22', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'qq', 'QQ', '2391656270', null, '1', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('23', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'wechat', '公众号', '/image/system/nVexXbZrK1eCRZlyWa6W63EQDOMIQfzyM5bztaJ0.jpeg', null, '3', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('24', '2019-10-11 03:21:50', '2019-10-11 03:21:50', 'email', '邮箱', 'liao@seals-ins.com', null, '1', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('25', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'website', '官网', 'www.seals-ins.com', null, '1', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('26', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'case_number', '备案号', '粤ICP备18027543号', null, '1', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('27', '2019-10-11 03:21:50', '2019-10-11 03:58:52', 'logo', 'LOGO', '/system/1sjfS7Li1jeA6eWIPLkRfj9piBzNw7Lp7JD95ALF.png', null, '3', 'system', 'en');
INSERT INTO `ms_configs` VALUES ('28', '2019-10-11 03:21:50', '2019-10-26 15:42:25', 'copyright', '版权', '流年如梦', null, '1', 'system', 'en');

-- ----------------------------
-- Table structure for ms_failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `ms_failed_jobs`;
CREATE TABLE `ms_failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ms_failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for ms_migrations
-- ----------------------------
DROP TABLE IF EXISTS `ms_migrations`;
CREATE TABLE `ms_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ms_migrations
-- ----------------------------
INSERT INTO `ms_migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `ms_migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `ms_migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `ms_migrations` VALUES ('4', '2019_09_26_035519_config_table', '1');
INSERT INTO `ms_migrations` VALUES ('5', '2019_09_30_100456_template_table', '1');
INSERT INTO `ms_migrations` VALUES ('6', '2019_09_30_113148_column_table', '1');

-- ----------------------------
-- Table structure for ms_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `ms_password_resets`;
CREATE TABLE `ms_password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `ms_password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ms_password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for ms_templates
-- ----------------------------
DROP TABLE IF EXISTS `ms_templates`;
CREATE TABLE `ms_templates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
  `class` smallint(5) unsigned DEFAULT '0' COMMENT '类型',
  `model` smallint(5) unsigned DEFAULT '0' COMMENT '模型',
  `type` smallint(5) unsigned DEFAULT '0' COMMENT '类别',
  `theme` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default' COMMENT '主题',
  `path` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '路径',
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '备注',
  `lang` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'en' COMMENT '语言',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ms_templates
-- ----------------------------
INSERT INTO `ms_templates` VALUES ('1', 'list', '1', '1', '1', 'default', 'home/default/cn/article/list/list.blade.php', '默认文章列表-测试', 'cn', '2019-10-19 15:51:06', '2019-10-16 17:43:09', null);
INSERT INTO `ms_templates` VALUES ('2', 'list', '1', '2', '1', 'default', 'home/default/cn/product/list/list.blade.php', '默认产品列表', 'cn', '2019-10-19 15:51:06', '2019-10-17 13:45:26', null);
INSERT INTO `ms_templates` VALUES ('3', 'about_us', '0', '5', '1', 'default', 'home/default/cn/single/about_us.blade.php', '关于我们', 'cn', '2019-10-19 15:51:06', '2019-10-17 13:46:40', null);
INSERT INTO `ms_templates` VALUES ('4', 'contact_us', '0', '5', '1', 'default', 'home/default/cn/single/contact_us.blade.php', '联系我们', 'cn', '2019-10-19 15:51:06', '2019-10-17 13:50:15', null);
INSERT INTO `ms_templates` VALUES ('5', 'list', '1', '3', '1', 'default', 'home/default/cn/image/list/list.blade.php', '默认图片列表', 'cn', '2019-10-19 15:51:06', '2019-10-18 17:05:11', null);
INSERT INTO `ms_templates` VALUES ('6', 'public', '0', '0', '2', 'default', 'css/default/cn/public.css', '公共样式', 'cn', '2019-10-19 15:51:06', '2019-10-18 18:11:30', null);
INSERT INTO `ms_templates` VALUES ('7', 'index', '0', '0', '2', 'default', 'css/default/cn/index.css', '首页样式', 'cn', '2019-10-19 15:51:06', '2019-10-18 18:11:58', null);
INSERT INTO `ms_templates` VALUES ('8', 'list', '0', '0', '2', 'default', 'css/default/cn/list.css', '列表样式', 'cn', '2019-10-19 15:51:06', '2019-10-19 11:22:15', null);
INSERT INTO `ms_templates` VALUES ('11', 'public', '0', '0', '3', 'default', 'js/default/cn/public.js', null, 'cn', '2019-10-19 15:51:06', '2019-10-19 11:30:42', null);
INSERT INTO `ms_templates` VALUES ('12', 'index', '0', '0', '2', 'default', 'css/default/en/index.css', null, 'en', '2019-10-19 15:51:06', '2019-10-19 11:31:50', null);
INSERT INTO `ms_templates` VALUES ('13', 'public', '0', '0', '3', 'default', 'js/default/en/public.js', null, 'en', '2019-10-19 15:51:06', '2019-10-19 11:32:04', null);
INSERT INTO `ms_templates` VALUES ('14', 'new_list', '1', '1', '1', 'default', 'home/default/cn/article/list/new_list.blade.php', '新闻列表', 'cn', '2019-10-20 12:21:05', '2019-10-20 12:21:05', null);
INSERT INTO `ms_templates` VALUES ('15', 'details', '2', '1', '1', 'default', 'home/default/cn/article/details/details.blade.php', '默认详情', 'cn', '2019-10-20 13:46:50', '2019-10-20 13:46:50', null);
INSERT INTO `ms_templates` VALUES ('16', 'list', '1', '1', '1', 'default', 'home/default/en/article/list/list.blade.php', '文章列表', 'en', '2019-10-20 13:47:30', '2019-10-20 13:47:30', null);
INSERT INTO `ms_templates` VALUES ('17', 'channel', '3', '1', '1', 'default', 'home/default/cn/article/channel/channel.blade.php', '默认频道', 'cn', '2019-10-20 13:49:12', '2019-10-20 13:49:12', null);

-- ----------------------------
-- Table structure for ms_users
-- ----------------------------
DROP TABLE IF EXISTS `ms_users`;
CREATE TABLE `ms_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ms_users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ms_users
-- ----------------------------
INSERT INTO `ms_users` VALUES ('1', '459157537', '459157537@qq.com', null, '$2y$10$4rUVuznNOLNy3L42PIdRpOJChKlJ2LDcfrf.Nv6MFhGQZMcw4gAtW', 'lL2L0TDvDaHhjXo8ewUarkVo6AdZ7yV5m5kwhaQY1KvajXXhFYEfxGSDhrbl', '2016-12-20 12:49:00', '2016-12-20 12:49:00');
INSERT INTO `ms_users` VALUES ('2', 'marry', 'marry8512406@qq.com', null, '$2y$10$Vzc47ihxIsEpo5ZBC7skG.FoCoIwB9bt7msUdRALdeZ9YUrJ0R5L6', null, '2016-12-20 12:49:00', '2016-12-20 12:49:00');
