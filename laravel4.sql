/*
MySQL Data Transfer
Source Host: localhost
Source Database: laravel4
Target Host: localhost
Target Database: laravel4
Date: 2013-6-10 13:21:06
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for blogs
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `pictrue` varchar(280) NOT NULL,
  `tags` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(250) NOT NULL,
  `author_id` int(11) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `views` int(11) NOT NULL,
  `tags` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for events_user
-- ----------------------------
DROP TABLE IF EXISTS `events_user`;
CREATE TABLE `events_user` (
  `user_id` int(11) NOT NULL,
  `events_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for group_user
-- ----------------------------
DROP TABLE IF EXISTS `group_user`;
CREATE TABLE `group_user` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(250) NOT NULL,
  `author_id` int(11) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `views` int(11) NOT NULL,
  `tags` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for laravel_migrations
-- ----------------------------
DROP TABLE IF EXISTS `laravel_migrations`;
CREATE TABLE `laravel_migrations` (
  `bundle` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`bundle`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for photos
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` varchar(250) NOT NULL,
  `author_id` int(11) NOT NULL,
  `pictrue` varchar(250) NOT NULL,
  `views` int(11) NOT NULL,
  `tags` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `pictrue` varchar(280) NOT NULL,
  `test` varchar(280) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `blogs` VALUES ('1', '习近平首次到访 特多总统总理冒雨到机场迎接', '习近平首次到访 特多总统总理冒雨到机场迎接', '　中新网西班牙港5月31日电 (记者 张朔)当地时间5月31日晚7时许，中国国家主席习近平乘坐的专机平稳降落在西班牙港皮亚科国际机场，开始对特立尼达和多巴哥进行国事访问。\r\n　　这是中国最高领导人首次对特立尼达和多巴哥以及英语加勒比国家进行国事访问。特立尼达和多巴哥总统卡莫纳夫妇、总理比塞萨尔冒雨亲自到机场迎接习近平和夫人彭丽媛的到来。\r\n　　卡莫纳在机场举行隆重欢迎仪式。习近平登上检阅台。军乐队奏中特两国国歌，鸣礼炮21响。习近平在特立尼达和多巴哥国防军总参谋长马哈拉吉陪同下检阅了仪仗队。特立尼达和多巴哥大法官、内阁成员、主要政党领袖等政要也到机场欢迎。\r\n　　习近平代表中国人民向特立尼达和多巴哥人民致以诚挚问候和良好祝愿。习近平表示，特立尼达和多巴哥是加勒比地区具有重要影响的国家。巩固和发展中特关系，不仅造福两国人民，也有利于促进中国同加勒比地区国家乃至发展中国家团结合作。我期待着同卡莫纳总统、比塞萨尔总理等特方领导人就双边关系及共同关心的国际和地区问题交换意见。访问期间，我还将同其他一些加勒比国家领导人举行会晤，共商合作大计，将中加友好合作关系提升到新水平。\r\n王沪宁、栗战书、杨洁篪等陪同人员同机抵达。\r\n　　中国驻特立尼达和多巴哥大使黄星原也到机场迎接。\r\n　　访问特立尼达和多巴哥后，习近平还将访问哥斯达黎加、墨西哥并赴美国举行中美元首会晤。\r\n　　特立尼达和多巴哥位于加勒比海小安的列斯群岛东南端，与委内瑞拉隔海相望。尽管国土面积仅有五千多平方公里，但这个岛国可谓“地小物博”，不仅拥有储量巨大的天然气和石油、世界最大的天然沥青湖，还是世界最大的氨肥和甲醇出口国，是英语加勒比地区经济实力最强的国家。\r\n　　中特两国1974年6月20日建交，2005年建立互利发展的友好合作关系，政治、经贸、文化等各领域友好关系稳步发展。特别是，中特两国虽相距遥远，但人文交流可谓丰富多彩。中国人早在两百多年前就抵达特多，此后华侨华人和特多各民族民众相互融合、和谐共处，中华文化日益成为特多多元文化的一部分。\r\n　　中方近日表示，中国国家主席首次访问特多，体现了中国致力于发展与特多以及加勒比地区关系的意愿和决心，将推动中特两国间深厚的友谊转化为合作的动力。', '1', '4', '', '', '2013-06-02 02:01:35', '2013-06-03 20:28:16');
INSERT INTO `events` VALUES ('1', '周日深圳一日游', '周日深圳一日游', '1', '524f9206ad023e529010153a37d70d78.jpeg', '25', '', '2013-06-02 01:37:14', '2013-06-03 20:28:03');
INSERT INTO `events_user` VALUES ('1', '1');
INSERT INTO `group_user` VALUES ('2', '1');
INSERT INTO `group_user` VALUES ('3', '1');
INSERT INTO `group_user` VALUES ('1', '1');
INSERT INTO `groups` VALUES ('1', '深圳LAMP技术圈', '深圳LAMP技术圈', '2', '4f491794dd21e90d45f3dab0548350b4.jpeg', '47', 'LAMP', '2013-06-02 00:02:43', '2013-06-02 23:03:01');
INSERT INTO `groups` VALUES ('2', '深圳Django圈子', '深圳Django圈子', '1', '14f1fc5be9927f6a51a10ffbaa8d48e7.jpeg', '6', '深圳Django圈子', '2013-06-02 01:04:11', '2013-06-02 22:50:47');
INSERT INTO `laravel_migrations` VALUES ('application', '2012_09_21_111421_create_posts', '1');
INSERT INTO `laravel_migrations` VALUES ('application', '2012_09_21_114246_create_users', '1');
INSERT INTO `laravel_migrations` VALUES ('application', '2012_09_26_104000_create_blog', '1');
INSERT INTO `laravel_migrations` VALUES ('application', '2012_09_26_104012_create_events', '1');
INSERT INTO `laravel_migrations` VALUES ('application', '2012_09_26_104019_create_group', '1');
INSERT INTO `laravel_migrations` VALUES ('application', '2012_09_26_104030_create_photo', '1');
INSERT INTO `laravel_migrations` VALUES ('application', '2012_09_26_104743_create_category', '1');
INSERT INTO `laravel_migrations` VALUES ('application', '2012_09_27_094026_add_user_id_to_posts_table', '2');
INSERT INTO `laravel_migrations` VALUES ('application', '2012_09_27_200149_add_name_to_users_table', '3');
INSERT INTO `photos` VALUES ('1', '图片上传哦', '图片上传哦', '1', 'e91a200a67fe078cf2789ac29cb3a316.jpeg', '5', '图片上传哦', '2013-05-31 23:07:08', '2013-06-01 00:33:04');
INSERT INTO `photos` VALUES ('2', '嗖嗖嗖', '', '1', '95be472e7f4a92f37934785b6d6b4992.jpeg', '1', '', '2013-06-01 10:46:02', '2013-06-01 10:46:02');
INSERT INTO `photos` VALUES ('3', '嗖嗖嗖', '', '1', '0d9d92d9cf18e21da332eeead98a0c04.jpeg', '1', '', '2013-06-01 10:46:13', '2013-06-01 10:46:13');
INSERT INTO `photos` VALUES ('4', '嗖嗖嗖', '', '1', '4e4a84ee7b989c12bbec9a91cb114120.jpeg', '1', '', '2013-06-01 10:46:22', '2013-06-01 10:46:22');
INSERT INTO `photos` VALUES ('5', '嗖嗖嗖', '', '1', '060994b2f071ed146ef2b487ff9f087f.jpeg', '1', '', '2013-06-01 10:46:31', '2013-06-01 10:46:31');
INSERT INTO `photos` VALUES ('6', '嗖嗖嗖', '', '1', 'ad0c42268bd4650ab7c8713d745bb21b.jpeg', '3', '', '2013-06-01 10:46:46', '2013-06-01 10:48:39');
INSERT INTO `photos` VALUES ('7', '嗖嗖嗖', '', '1', 'df620a3fa7ccc6e0806d4f7624a5f3b9.jpeg', '1', '', '2013-06-01 10:46:55', '2013-06-01 10:46:55');
INSERT INTO `photos` VALUES ('8', '嗖嗖嗖', '', '1', 'f00a1f52a56c027e1349e92711d4173a.jpeg', '1', '', '2013-06-01 10:47:06', '2013-06-01 10:47:06');
INSERT INTO `photos` VALUES ('9', '嗖嗖嗖', '', '1', '79615d6ff1afe4d8352e92326073de18.jpeg', '1', '', '2013-06-01 10:47:17', '2013-06-01 10:47:17');
INSERT INTO `photos` VALUES ('10', '嗖嗖嗖', '', '1', '4adeab373fb4230ef285ae0b91b2e179.jpeg', '1', '', '2013-06-01 10:47:25', '2013-06-01 10:47:25');
INSERT INTO `photos` VALUES ('11', '嗖嗖嗖', '', '1', '46d51979b35a63b3f395a83f45328f7c.jpeg', '1', '', '2013-06-01 10:47:33', '2013-06-01 10:47:34');
INSERT INTO `photos` VALUES ('12', '嗖嗖嗖', '', '1', '791c2c52599ec7a77ca38ae6901b3c65.jpeg', '1', '', '2013-06-01 10:47:40', '2013-06-01 10:47:41');
INSERT INTO `photos` VALUES ('13', '嗖嗖嗖', '', '1', '05d8ccdf0c23d8f13dfcad69eb3a8fcc.jpeg', '2', '', '2013-06-01 10:47:48', '2013-06-03 20:28:21');
INSERT INTO `photos` VALUES ('14', '嗖嗖嗖', '', '1', 'd2412af2393556f35cf3ece388c4a22e.jpeg', '1', '', '2013-06-01 10:47:58', '2013-06-01 10:47:59');
INSERT INTO `photos` VALUES ('15', '嗖嗖嗖', '', '1', 'c33a55e8fcf035f40a2722f3a1ef17d2.jpeg', '1', '', '2013-06-01 10:48:07', '2013-06-01 10:48:07');
INSERT INTO `photos` VALUES ('16', '嗖嗖嗖', '', '1', '490ddad733c76a8da1aaff998348bde1.jpeg', '1', '', '2013-06-01 10:48:17', '2013-06-01 10:48:17');
INSERT INTO `photos` VALUES ('17', '嗖嗖嗖', '', '1', '16d11b94884be0eeff7140d4c1b8b851.jpeg', '1', '', '2013-06-01 11:15:59', '2013-06-01 11:15:59');
INSERT INTO `photos` VALUES ('18', '嗖嗖嗖', '', '1', 'c857c020140b45298d2b5f036fed87ab.jpeg', '1', '', '2013-06-01 11:16:06', '2013-06-01 11:16:06');
INSERT INTO `photos` VALUES ('19', '嗖嗖嗖', '', '1', '0f1bace5aafd144e67f5981aca9bbf5b.jpeg', '1', '', '2013-06-01 11:16:13', '2013-06-01 11:16:13');
INSERT INTO `photos` VALUES ('20', '嗖嗖嗖', '', '1', 'bad042bac84176085af2f24d3cae7289.jpeg', '1', '', '2013-06-01 11:16:19', '2013-06-01 11:16:20');
INSERT INTO `photos` VALUES ('21', '嗖嗖嗖', '', '1', '9c895d29450982d2ec4434c95b5e178f.jpeg', '1', '', '2013-06-01 11:16:27', '2013-06-01 11:16:28');
INSERT INTO `photos` VALUES ('22', '嗖嗖嗖', '', '1', '31b042d9c6ae7bf1a504008da4d3b53b.jpeg', '1', '', '2013-06-01 11:16:36', '2013-06-01 11:16:36');
INSERT INTO `photos` VALUES ('23', '嗖嗖嗖', '', '1', '4282d50b243dc87c00088178206895db.jpeg', '1', '', '2013-06-01 11:16:44', '2013-06-01 11:16:44');
INSERT INTO `photos` VALUES ('24', 'Bytoo', '', '1', 'a5913d2c4425e89031c6d4fe95ea5a6f.jpeg', '1', '', '2013-06-01 11:16:51', '2013-06-01 11:16:51');
INSERT INTO `photos` VALUES ('25', '嗖嗖嗖', '', '1', 'bfa15b063ce06bfd8ad52e53491f210c.jpeg', '1', '', '2013-06-01 11:16:58', '2013-06-01 11:16:58');
INSERT INTO `photos` VALUES ('26', '嗖嗖嗖', '', '1', 'cc6785a70460d71af6df2022a74033f3.jpeg', '1', '', '2013-06-01 11:17:06', '2013-06-01 11:17:06');
INSERT INTO `photos` VALUES ('27', '嗖嗖嗖', '', '1', 'e4b42fe74a37ff6340d2d8c5921a93c9.jpeg', '2', '', '2013-06-01 11:17:13', '2013-06-01 14:57:00');
INSERT INTO `photos` VALUES ('28', '嗖嗖嗖', '', '1', '9ecf57893f6c137386584cfd2370c495.jpeg', '5', '', '2013-06-01 11:17:19', '2013-06-04 20:39:43');
INSERT INTO `photos` VALUES ('29', '嗖嗖嗖', '', '1', '19a997398eb9d597a9d0fc2990bade03.jpeg', '4', '', '2013-06-01 11:17:26', '2013-06-03 20:28:06');
INSERT INTO `users` VALUES ('1', '岭南六少', 'nnair@qq.com', '$2a$08$VFdWTXFIbWFucGl0UnlsZuqCg6FKZBexXuaGUaPN2ASISgZzz75ti', '1', '1', '0000-00-00 00:00:00', '2013-06-01 21:55:05');
INSERT INTO `users` VALUES ('2', '六少', 'cecoo@126.com', '$2y$08$mHf6U8Pnp..yHBABWVam2..8.pA.Efc9WRGKC5Rr7oKUWPFXzND9u', '1', '1', '2013-05-31 09:50:29', '2013-06-01 21:58:59');
INSERT INTO `users` VALUES ('3', '堕落猪', 'lutenking@gmail.com', '$2y$08$2mzu9h9YSUsrtuRDu6ISkOLQYJA4.RsAuDFgYRZnRatGbIwE1I6ym', '1', '1', '2013-06-01 21:00:59', '2013-06-01 21:59:22');
