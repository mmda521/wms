-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?01 �?19 �?17:56
-- 服务器版本: 5.5.47
-- PHP 版本: 5.5.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `1goods1code1`
--

-- --------------------------------------------------------

--
-- 表的结构 `access_token`
--

CREATE TABLE IF NOT EXISTS `access_token` (
  `access_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'access_token的id',
  `access_token` varchar(270) CHARACTER SET gb2312 NOT NULL COMMENT 'access_token',
  `expires_in` int(10) NOT NULL COMMENT '时间限制',
  PRIMARY KEY (`access_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `access_token`
--

INSERT INTO `access_token` (`access_id`, `access_token`, `expires_in`) VALUES
(1, 'WcqRgQWTYN1MlVZURrHoZs7uzAln0xKdTI7fTR3hc-kLDKarG3FOl46qamSWccADpZpp96HSrdY_3v0zTSlqGPLWYsojwjkch_Q9ft--BwgUFSgAHAHSF', 7200);

-- --------------------------------------------------------

--
-- 表的结构 `con_freightlot`
--

CREATE TABLE IF NOT EXISTS `con_freightlot` (
  `GUID` varchar(50) NOT NULL COMMENT 'GUID',
  `ID` varchar(50) DEFAULT NULL COMMENT '内部ID',
  `INDEX_NO` varchar(50) DEFAULT NULL COMMENT '检索号',
  `QUREY_CODE` varchar(50) DEFAULT NULL COMMENT '查询码',
  `GOODSSITE_NO` varchar(30) DEFAULT NULL COMMENT '货位号',
  `GOODSSITE_NOTE` varchar(100) DEFAULT NULL COMMENT '货位说明',
  `OPERUSER_ID` varchar(20) DEFAULT NULL COMMENT '操作人员ID',
  `OPERROLE_ID` varchar(20) DEFAULT NULL COMMENT '操作角色ID',
  `OPER_ID` varchar(20) DEFAULT NULL COMMENT '操作点ID',
  `OPERCOM_ID` varchar(20) DEFAULT NULL COMMENT '操作公司ID',
  `OPERDATE` datetime DEFAULT NULL COMMENT '操作时间',
  `STATUS` char(1) DEFAULT NULL COMMENT '状态',
  `UPDATEUSER_ID` varchar(20) DEFAULT NULL COMMENT '修改人员ID',
  `UPDATEDATE` datetime DEFAULT NULL COMMENT '修改时间',
  `REMARK1` varchar(100) DEFAULT NULL COMMENT '备注1',
  `REMARK2` varchar(100) DEFAULT NULL COMMENT '备注2',
  PRIMARY KEY (`GUID`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='货位';

--
-- 转存表中的数据 `con_freightlot`
--

INSERT INTO `con_freightlot` (`GUID`, `ID`, `INDEX_NO`, `QUREY_CODE`, `GOODSSITE_NO`, `GOODSSITE_NOTE`, `OPERUSER_ID`, `OPERROLE_ID`, `OPER_ID`, `OPERCOM_ID`, `OPERDATE`, `STATUS`, `UPDATEUSER_ID`, `UPDATEDATE`, `REMARK1`, `REMARK2`) VALUES
('118e798a-6fe3-0af2-1e8b-b1ac507e07cc', NULL, '645', NULL, '546', '456', NULL, NULL, NULL, NULL, '2017-01-12 03:51:35', 'Y', NULL, NULL, NULL, NULL),
('150d395f-3b2e-4575-8a07-66dcf40a2385', NULL, '06', NULL, 'C1', NULL, '26', '144', NULL, 'NTZBQ', '2015-09-15 15:33:58', 'Y', '84', '2015-12-23 10:02:25', NULL, NULL),
('1e0e1949-e804-44d1-af42-f50d51c6a216', NULL, '02', NULL, 'A2', NULL, '26', '144', NULL, 'NTZBQ', '2015-09-15 15:32:13', 'Y', '84', '2015-10-11 09:23:39', NULL, NULL),
('5877f390-751e-4a94-a33b-457bcf95fd8b', NULL, '07', NULL, 'C2', NULL, '26', '144', NULL, 'NTZBQ', '2015-09-15 15:34:18', 'Y', '84', '2015-12-23 10:02:36', NULL, NULL),
('7ccc60e8-5495-43ad-8628-c08766bd3358', NULL, '04', NULL, 'B2', NULL, '26', '144', NULL, 'NTZBQ', '2015-09-15 15:32:40', 'Y', '84', '2015-10-11 09:23:27', NULL, NULL),
('a064b443-04b4-4516-a53f-01a2ec5bcee4', NULL, '03', NULL, 'B1', NULL, '26', '144', NULL, 'NTZBQ', '2015-09-15 15:32:28', 'Y', '84', '2015-10-11 09:23:33', NULL, NULL),
('aa92e6a5-9938-42f9-b65c-bba73ac8df68', NULL, '01', NULL, 'A1', NULL, '26', '144', NULL, 'NTZBQ', '2015-09-15 15:31:57', 'Y', '84', '2015-10-11 09:22:44', NULL, NULL),
('ea12d89d-2160-4c84-922e-7b0e021d0dca', NULL, '05', NULL, 'C4', NULL, '26', '144', NULL, 'NTZBQ', '2015-09-15 15:34:55', 'Y', '84', '2015-12-23 10:03:09', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `eci_user`
--

CREATE TABLE IF NOT EXISTS `eci_user` (
  `USER_ID` decimal(13,2) NOT NULL DEFAULT '0.00' COMMENT '用户ID',
  `LOGIN_NO` varchar(100) NOT NULL COMMENT '登陆账号',
  `PASSWORD` varchar(100) DEFAULT NULL COMMENT '登陆密码',
  `USER_NAME` varchar(100) DEFAULT NULL COMMENT '用户名称',
  `CREATE_DATE` datetime DEFAULT NULL COMMENT '创建日期',
  `COMPANY_CODE` varchar(20) DEFAULT NULL COMMENT '公司',
  `STATUS` char(1) DEFAULT NULL COMMENT '是否启用',
  `GUID` varchar(100) DEFAULT NULL COMMENT '主键',
  `AUTO` char(1) DEFAULT NULL COMMENT '自动创建',
  `PASSWORD2` varchar(100) DEFAULT NULL COMMENT '2次密码',
  `EP_ADMIN` char(1) DEFAULT NULL COMMENT '机构管理员',
  `UDF1` varchar(100) DEFAULT NULL,
  `UDF2` varchar(100) DEFAULT NULL,
  `UDF3` varchar(100) DEFAULT NULL,
  `UDF4` varchar(100) DEFAULT NULL,
  `UDF5` varchar(100) DEFAULT NULL,
  `UDF6` varchar(100) DEFAULT NULL,
  `UDF7` varchar(100) DEFAULT NULL,
  `UDF8` varchar(100) DEFAULT NULL,
  `UDF9` varchar(100) DEFAULT NULL,
  `UDF10` varchar(100) DEFAULT NULL,
  `UDF11` varchar(100) DEFAULT NULL,
  `UDF12` varchar(100) DEFAULT NULL,
  `UDF13` varchar(100) DEFAULT NULL,
  `UDF14` varchar(100) DEFAULT NULL,
  `UDF15` varchar(100) DEFAULT NULL,
  `COMPANY_NAME` varchar(20) DEFAULT NULL COMMENT '公司名称(注册用户无公司代码)',
  `EMAIL` varchar(100) DEFAULT NULL COMMENT '邮件',
  `LINKER` varchar(50) DEFAULT NULL COMMENT '联系人',
  `TEL` varchar(50) DEFAULT NULL COMMENT '电话',
  `MOBILE` varchar(50) DEFAULT NULL COMMENT '手机',
  `SEX` char(1) DEFAULT NULL COMMENT '性别',
  `POSITION` varchar(50) DEFAULT NULL COMMENT '职位',
  `QQ` varchar(50) DEFAULT NULL COMMENT 'QQ',
  `MSN` varchar(50) DEFAULT NULL COMMENT 'MSN',
  `COMPANY_TRADE` varchar(50) DEFAULT NULL COMMENT '行业',
  `COMPANY_NATURE` varchar(50) DEFAULT NULL COMMENT '公司性质',
  `ADDRESS` varchar(100) DEFAULT NULL COMMENT '地址',
  `PROVINCE` varchar(20) DEFAULT NULL COMMENT '省份',
  `CITY` varchar(20) DEFAULT NULL COMMENT '城市',
  `USER_TYPE` char(1) DEFAULT NULL COMMENT '用户类别(0-系统用户1-注册用户)',
  `VERIFY_CODE` varchar(50) DEFAULT NULL COMMENT '验证码',
  `IS_VERIFY` char(1) DEFAULT NULL COMMENT '是否通过验证',
  `REMARK` varchar(100) DEFAULT NULL COMMENT '备注',
  `REMARK1` varchar(100) DEFAULT NULL COMMENT '备注1',
  `COMPANY_TYPE` varchar(100) DEFAULT NULL COMMENT '公司类型',
  `SECURITY_CODE` varchar(50) DEFAULT NULL COMMENT '安全码',
  PRIMARY KEY (`USER_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `eci_user`
--

INSERT INTO `eci_user` (`USER_ID`, `LOGIN_NO`, `PASSWORD`, `USER_NAME`, `CREATE_DATE`, `COMPANY_CODE`, `STATUS`, `GUID`, `AUTO`, `PASSWORD2`, `EP_ADMIN`, `UDF1`, `UDF2`, `UDF3`, `UDF4`, `UDF5`, `UDF6`, `UDF7`, `UDF8`, `UDF9`, `UDF10`, `UDF11`, `UDF12`, `UDF13`, `UDF14`, `UDF15`, `COMPANY_NAME`, `EMAIL`, `LINKER`, `TEL`, `MOBILE`, `SEX`, `POSITION`, `QQ`, `MSN`, `COMPANY_TRADE`, `COMPANY_NATURE`, `ADDRESS`, `PROVINCE`, `CITY`, `USER_TYPE`, `VERIFY_CODE`, `IS_VERIFY`, `REMARK`, `REMARK1`, `COMPANY_TYPE`, `SECURITY_CODE`) VALUES
('26.00', 'ADMIN', 'lgzih718', '平台管理员', '2011-11-25 13:40:25', 'NTZBQ', 'Y', NULL, 'N', 'NA', 'Y', 'STS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NTSTS-ALL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, 'N', NULL, NULL, NULL, NULL),
('84.00', 'CANGCHU', 'yushijujin718', '仓储', '2015-09-16 12:30:45', 'NTZBQ', 'Y', NULL, 'N', 'NA', 'N', 'STS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'N', NULL, NULL, NULL, NULL),
('86.00', 'YUANQU', 'yuanqu', '园区', '2015-09-16 13:57:09', 'NTZBQ', 'Y', NULL, 'N', 'NA', 'N', 'STS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'N', NULL, NULL, NULL, NULL),
('87.00', 'GUEST', '123456', 'GUEST', '2016-03-05 13:33:17', 'NTZBQ', 'Y', NULL, 'N', 'NA', 'N', 'STS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'N', NULL, NULL, NULL, NULL),
('88.00', 'KEFU', 'kefu', 'kefu', '2016-03-21 10:21:24', 'NTZBQ', 'Y', NULL, 'N', 'NA', 'Y', 'STS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'N', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `master`
--

CREATE TABLE IF NOT EXISTS `master` (
  `QR_No` bigint(20) NOT NULL AUTO_INCREMENT,
  `QR_URL` varchar(200) DEFAULT NULL,
  `QR_FWID` varchar(20) DEFAULT NULL,
  `QR_Number` int(10) DEFAULT NULL,
  `QR_Active` varchar(2) NOT NULL DEFAULT 'N',
  `QR_FWTime` datetime DEFAULT NULL,
  `QR_ShopID_Ref` int(10) DEFAULT NULL,
  `QR_ItemID_Ref` bigint(20) DEFAULT NULL,
  `QR_TYPE` smallint(3) DEFAULT NULL COMMENT '0―方形码，1―圆形码',
  `QR_Money` decimal(10,2) DEFAULT NULL,
  `Openid` varchar(50) DEFAULT NULL,
  `QR_Receive` smallint(3) NOT NULL DEFAULT '0' COMMENT '0—未发放，1—已发放，2—已领取',
  `SH_mch_billno` varchar(50) DEFAULT NULL COMMENT '商户订单号',
  `QR_Scene_id` varchar(32) DEFAULT NULL COMMENT '场景id',
  `HB_TYPE` smallint(2) DEFAULT NULL,
  `WX_send_listid` varchar(32) DEFAULT NULL COMMENT '微信单号',
  PRIMARY KEY (`QR_No`),
  UNIQUE KEY `QR_FWID` (`QR_FWID`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `master`
--

INSERT INTO `master` (`QR_No`, `QR_URL`, `QR_FWID`, `QR_Number`, `QR_Active`, `QR_FWTime`, `QR_ShopID_Ref`, `QR_ItemID_Ref`, `QR_TYPE`, `QR_Money`, `Openid`, `QR_Receive`, `SH_mch_billno`, `QR_Scene_id`, `HB_TYPE`, `WX_send_listid`) VALUES
(1, NULL, '2993609067975', 0, 'N', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(2, NULL, '1693609602598', 0, 'N', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(3, NULL, '7493579285041', 0, 'N', NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(4, NULL, '3793579947957', 0, 'N', NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(5, NULL, '0992480564675', 0, 'N', NULL, NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(6, NULL, '3792480961067', 0, 'N', NULL, NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(7, 'http://localhost:8080/index.php?qr_no=VDI=', '0014864704971', 0, 'N', NULL, NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(8, 'http://localhost:8080/index.php?qr_no=Vj8=', '9514864604111', 0, 'N', NULL, NULL, NULL, 0, NULL, NULL, 1, '1', NULL, NULL, '1'),
(9, 'http://localhost:8080/index.php?qr_no=AGg=', '2814864704623', 0, 'N', NULL, NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(10, 'http://localhost:8080/index.php?qr_no=CWlUZg==', '2014864304527', 0, 'N', NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(11, 'http://localhost:8080/index.php?qr_no=UTFXZA==', '7314864003461', 0, 'N', NULL, NULL, NULL, 0, NULL, NULL, 1, '1', NULL, NULL, '1'),
(12, 'http://localhost:8080/index.php?qr_no=AGAHNw==', '4510119878606', 0, 'N', NULL, NULL, NULL, 1, NULL, NULL, 1, '1417986702201701182243135856', NULL, NULL, '1000041701201701183000103634031'),
(13, 'http://localhost:8080/index.php?qr_no=UTFXZg==', '5810119978050', 0, 'N', NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `rp_info`
--

CREATE TABLE IF NOT EXISTS `rp_info` (
  `rp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `mch_billno` varchar(50) NOT NULL COMMENT '商户订单号',
  `detail_id` varchar(50) NOT NULL COMMENT '红包单号',
  `status` varchar(50) NOT NULL COMMENT '红包状态',
  `send_type` varchar(32) NOT NULL DEFAULT 'API' COMMENT '发放类型',
  `total_num` int(11) NOT NULL COMMENT '红包个数',
  `total_amount` int(11) NOT NULL COMMENT '红包金额',
  `reason` varchar(50) NOT NULL COMMENT '失败原因',
  `send_time` varchar(50) NOT NULL COMMENT '红包发送时间',
  `refund_time` varchar(50) NOT NULL COMMENT '红包退款时间',
  `refund_amount` varchar(50) NOT NULL COMMENT '红包退款金额',
  `act_name` varchar(50) NOT NULL COMMENT '活动名称',
  `hblist` varchar(64) NOT NULL COMMENT '裂变红包领取表',
  `openid` varchar(50) NOT NULL COMMENT '领取红包的openid',
  `amount` int(11) NOT NULL COMMENT '领取金额',
  `rcv_time` varchar(50) NOT NULL COMMENT '领取红包的时间',
  PRIMARY KEY (`rp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='红包详情' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `openid` varchar(150) NOT NULL COMMENT '微信会员openid',
  `nickname` varchar(150) CHARACTER SET gb2312 NOT NULL COMMENT '昵称',
  `headimgurl` varchar(150) CHARACTER SET gb2312 NOT NULL COMMENT '用户头像',
  `datetime` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `user_info`
--

INSERT INTO `user_info` (`id`, `openid`, `nickname`, `headimgurl`, `datetime`) VALUES
(2, 'oyTynw89Gf5ZLL8EbTfXnZH-Ij6c', '我.....你', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEKxgshMABuic4Me2HtpIJtnzAriasrPTC1uMA4JnBiaoW5icvhPACgwx208POzYAlicMzaficOo31LvicEbA/0', 1484746125),
(7, 'oyTynww9GRx0muyYJ44uY4Bl9Okw', 'Zy', 'http://wx.qlogo.cn/mmopen/6aw7fqRyYzGYIAxavUh26n3erbeTDEs1L4MrQG42ey2qcIuLIsbh4qcoFzV6b6bXYDojFEcL5IdEjRDymkNs02HibrXpVVicQO/0', 1484748128),
(6, 'oyTynw7B3_yrilhCYBiLg5fOrQ-M', '霸气的狮子', 'http://wx.qlogo.cn/mmopen/6aw7fqRyYzGYIAxavUh26vBrxQpACXaGEhDp8ABjibIY2p5pJwe361szEeZibVRpnGAenR8aNzf2B29lgCIDtImsKUydqWic0eO/0', 1484787085),
(8, 'oyTynwxmY6Tqd3NDyaj70NX4JAXY', '尘埃落定', 'http://wx.qlogo.cn/mmopen/6aw7fqRyYzEETvub6qW1Ku5oibw520XjmhBNdKA82U9icicynfMyklxDwicmalgfy6MHicUrclmBiajxia973w4vEHfuKWRIBQ2O3wG/0', 1484749404),
(9, 'oyTynwycRH2y476VAp8R7E6Okx9c', 'Admire', 'http://wx.qlogo.cn/mmopen/soicIViaC6LPNqhvW03YaXnsJtFIvMeL0kMBM4CU1aGR6uVia232T6AURqEicnY9OavlBvlHhuJ65ROfNjCVeoZUXItvHSCQViaE3/0', 1484750566),
(10, 'oyTynw-DkAhdBJ0E41etgPT41DD4', '张博', 'http://wx.qlogo.cn/mmopen/6aw7fqRyYzGYIAxavUh26rGHax1J6ia0Ku8eMib8xu2DgiavSKV9hsl9GiaY6KWjdvpiatPicoNg4yYCaCYqNp9rVibqjAe71um8E9l/0', 1484750376),
(11, 'oyTynw7VuPBWoqdE7QUDdvgRZpP8', '橙子', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaELJCEIyRNl9ArSW3TkmcQOogz49xzT5BvnFBcJwtdjyqibfahuv42GDTqKF2beTwxuAIWeJRZobuSQ/0', 1484707919),
(12, 'oyTynw-HENpX-RnbsMz08UTP5Y14', '婷婷', 'http://wx.qlogo.cn/mmopen/sTJptKvBQLLglXkusdibbxnicGnsIkEOVDxyzbOWrSrDibR2k7oKicMqiabm31KGzMMt0wzEv0YFQTDQwjNDInjSnOJBoiaJfRdOx6/0', 1484699515),
(13, 'oyTynw-jNiHhEAp7EzrrqARLThsI', 'kevinnee', 'http://wx.qlogo.cn/mmopen/soicIViaC6LPM2S6UXRxNibO0KLZ0ibiaibqdw9KwZbKibORF4zIicZGT4NGZ31DviboQT5zalICZohEUBSGnqSlaMm3nhb8HRqjaia6TK/0', 1484700788),
(14, 'oyTynw_nqTWQLckAybTdjnHK2msY', 'Lxx? 张九龙', 'http://wx.qlogo.cn/mmopen/zEiaaCXBwXrrvzLFogZfMQwdryXkFSyqRTw1fk1eH8AHtKibEW8zgkrfK0tx68gpn7ibJ9gnBtRBa2XyuzuAsPttda9lyNV0Eca/0', 1484728980);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
