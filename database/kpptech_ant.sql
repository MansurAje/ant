/*
Navicat MySQL Data Transfer

Source Server         : kpptech_bosque
Source Server Version : 50635
Source Host           : newoperation.kpptechnology.co.id:3306
Source Database       : kpptech_ant

Target Server Type    : MYSQL
Target Server Version : 50635
File Encoding         : 65001

Date: 2017-07-19 14:17:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for depot
-- ----------------------------
DROP TABLE IF EXISTS `depot`;
CREATE TABLE `depot` (
  `depot_id` int(11) NOT NULL AUTO_INCREMENT,
  `depot_nama` varchar(255) DEFAULT NULL,
  `depot_alamat` varchar(50) DEFAULT NULL,
  `depot_pic` varchar(50) DEFAULT NULL,
  `depot_notlp` varchar(50) DEFAULT NULL,
  `depot_latlng` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`depot_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of depot
-- ----------------------------
INSERT INTO `depot` VALUES ('4', 'B', 'B', 'B', 'B', '-6.19029899911729, 106.83946195483395');
INSERT INTO `depot` VALUES ('3', 'A', 'A', 'A', 'A', '-6.17511, 106.86503949999997');
INSERT INTO `depot` VALUES ('5', 'C', 'C', 'C', 'C', '-6.1954187880969185, 106.87860074877926');
INSERT INTO `depot` VALUES ('6', 'D', 'D', 'D', 'D', '-6.238934985250859, 106.82933393359372');
INSERT INTO `depot` VALUES ('7', 'rabani', 'rabani', 'boy', '0897276353746', '-6.192816234902397, 106.88435140490719');

-- ----------------------------
-- Table structure for node
-- ----------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node` (
  `node_id` int(11) NOT NULL AUTO_INCREMENT,
  `node_name` varchar(50) DEFAULT NULL,
  `node_latlng` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`node_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of node
-- ----------------------------
INSERT INTO `node` VALUES ('2', 'a', '-6.17511, 106.86503949999997', 'a');
INSERT INTO `node` VALUES ('3', 'b', '-6.193370878462219, 106.85697141528317', 'b');
INSERT INTO `node` VALUES ('4', 'ace hardware', '-6.191371269059237, 106.84866070747375', 'lala');
INSERT INTO `node` VALUES ('5', 'boy', '-6.197978663966072, 106.82950559497067', 'boy');
INSERT INTO `node` VALUES ('6', 'monik', '-6.17016068140937, 106.83139387011715', 'mnik');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_alamat` varchar(255) DEFAULT NULL,
  `user_tlp` varchar(255) DEFAULT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Administrator', 'admin@gmail.com', null, null, 'admin', 'e10adc3949ba59abbe56e057f20f883e', null);
INSERT INTO `user` VALUES ('3', 'Yulia Fitriani', 'admin@gmail.com', 'Jakarta', '0812343433', 'yulia', 'e10adc3949ba59abbe56e057f20f883e', 'Customer Service');
