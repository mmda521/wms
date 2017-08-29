# Host: localhost  (Version: 5.5.47)
# Date: 2017-02-27 11:06:51
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "access_token"
#

DROP TABLE IF EXISTS `access_token`;
CREATE TABLE `access_token` (
  `access_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'access_token的id',
  `access_token` varchar(270) CHARACTER SET gb2312 NOT NULL COMMENT 'access_token',
  `expires_in` int(10) NOT NULL COMMENT '时间限制',
  PRIMARY KEY (`access_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

#
# Data for table "access_token"
#

/*!40000 ALTER TABLE `access_token` DISABLE KEYS */;
INSERT INTO `access_token` VALUES (1,'xrIAIXmi_i63rtjQncpW88NFpXOY5RFgET1TPvirIUE6_gbfsh8FSk0xRUHluNKgSJ22gDWrcdJkiJkJKyqh2qU7pXOm0tRrPTxEdkv6nEaA0neBCnHNJ5ZBY4pjeNeaNQJjACAGJC',7200);
/*!40000 ALTER TABLE `access_token` ENABLE KEYS */;

#
# Structure for table "con_freightlot"
#

DROP TABLE IF EXISTS `con_freightlot`;
CREATE TABLE `con_freightlot` (
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

#
# Data for table "con_freightlot"
#

/*!40000 ALTER TABLE `con_freightlot` DISABLE KEYS */;
INSERT INTO `con_freightlot` VALUES ('118e798a-6fe3-0af2-1e8b-b1ac507e07cc',NULL,'645',NULL,'546','456',NULL,NULL,NULL,NULL,'2017-01-12 03:51:35','Y',NULL,NULL,NULL,NULL),('150d395f-3b2e-4575-8a07-66dcf40a2385',NULL,'06',NULL,'C1',NULL,'26','144',NULL,'NTZBQ','2015-09-15 15:33:58','Y','84','2015-12-23 10:02:25',NULL,NULL),('1e0e1949-e804-44d1-af42-f50d51c6a216',NULL,'02',NULL,'A2',NULL,'26','144',NULL,'NTZBQ','2015-09-15 15:32:13','Y','84','2015-10-11 09:23:39',NULL,NULL),('5877f390-751e-4a94-a33b-457bcf95fd8b',NULL,'07',NULL,'C2',NULL,'26','144',NULL,'NTZBQ','2015-09-15 15:34:18','Y','84','2015-12-23 10:02:36',NULL,NULL),('7ccc60e8-5495-43ad-8628-c08766bd3358',NULL,'04',NULL,'B2',NULL,'26','144',NULL,'NTZBQ','2015-09-15 15:32:40','Y','84','2015-10-11 09:23:27',NULL,NULL),('a064b443-04b4-4516-a53f-01a2ec5bcee4',NULL,'03',NULL,'B1',NULL,'26','144',NULL,'NTZBQ','2015-09-15 15:32:28','Y','84','2015-10-11 09:23:33',NULL,NULL),('aa92e6a5-9938-42f9-b65c-bba73ac8df68',NULL,'01',NULL,'A1',NULL,'26','144',NULL,'NTZBQ','2015-09-15 15:31:57','Y','84','2015-10-11 09:22:44',NULL,NULL),('ea12d89d-2160-4c84-922e-7b0e021d0dca',NULL,'05',NULL,'C4',NULL,'26','144',NULL,'NTZBQ','2015-09-15 15:34:55','Y','84','2015-12-23 10:03:09',NULL,NULL);
/*!40000 ALTER TABLE `con_freightlot` ENABLE KEYS */;

#
# Structure for table "eci_user"
#

DROP TABLE IF EXISTS `eci_user`;
CREATE TABLE `eci_user` (
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

#
# Data for table "eci_user"
#

/*!40000 ALTER TABLE `eci_user` DISABLE KEYS */;
INSERT INTO `eci_user` VALUES (26.00,'ADMIN','lgzih718','平台管理员','2011-11-25 13:40:25','NTZBQ','Y',NULL,'N','NA','Y','STS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NTSTS-ALL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'N',NULL,NULL,NULL,NULL),(84.00,'CANGCHU','yushijujin718','仓储','2015-09-16 12:30:45','NTZBQ','Y',NULL,'N','NA','N','STS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'N',NULL,NULL,NULL,NULL),(86.00,'YUANQU','yuanqu','园区','2015-09-16 13:57:09','NTZBQ','Y',NULL,'N','NA','N','STS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'N',NULL,NULL,NULL,NULL),(87.00,'GUEST','123456','GUEST','2016-03-05 13:33:17','NTZBQ','Y',NULL,'N','NA','N','STS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'N',NULL,NULL,NULL,NULL),(88.00,'KEFU','kefu','kefu','2016-03-21 10:21:24','NTZBQ','Y',NULL,'N','NA','Y','STS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'N',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `eci_user` ENABLE KEYS */;

#
# Structure for table "master"
#

DROP TABLE IF EXISTS `master`;
CREATE TABLE `master` (
  `QR_No` bigint(20) NOT NULL AUTO_INCREMENT,
  `QR_URL` varchar(200) DEFAULT NULL,
  `QR_FWID` varchar(20) DEFAULT NULL,
  `QR_Number` int(10) DEFAULT NULL,
  `QR_Active` varchar(2) NOT NULL DEFAULT 'N',
  `QR_FWTime` datetime DEFAULT NULL,
  `QR_ShopID_Ref` int(10) DEFAULT NULL,
  `QR_ItemID_Ref` bigint(20) DEFAULT NULL,
  `QR_TYPE` smallint(3) DEFAULT NULL COMMENT '0―方形码，1―圆形码',
  `QR_Money` int(10) DEFAULT NULL,
  `Openid` varchar(50) DEFAULT NULL,
  `QR_Receive` smallint(3) NOT NULL DEFAULT '0' COMMENT '0—未发放，1—已发放，2—已领取',
  `SH_mch_billno` varchar(50) DEFAULT NULL COMMENT '商户订单号',
  `QR_Scene_id` varchar(32) DEFAULT NULL COMMENT '场景id',
  `HB_TYPE` smallint(2) DEFAULT NULL,
  `WX_send_listid` varchar(32) DEFAULT NULL COMMENT '微信单号',
  `QR_Count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`QR_No`),
  UNIQUE KEY `QR_FWID` (`QR_FWID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=gbk;

#
# Data for table "master"
#

INSERT INTO `master` VALUES (1,NULL,'2993609067975',0,'N',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,0),(2,NULL,'1693609602598',0,'N',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,0),(3,NULL,'7493579285041',0,'N',NULL,NULL,NULL,1,NULL,NULL,1,NULL,NULL,NULL,NULL,0),(4,NULL,'3793579947957',0,'N',NULL,NULL,NULL,1,NULL,NULL,1,NULL,NULL,NULL,NULL,0),(5,NULL,'0992480564675',0,'N',NULL,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,NULL,0),(6,NULL,'3792480961067',0,'N',NULL,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,NULL,0),(7,'http://localhost:8080/index.php?qr_no=VDI=','0014864704971',0,'N',NULL,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,NULL,0),(8,'http://localhost:8080/index.php?qr_no=Vj8=','9514864604111',0,'N',NULL,NULL,NULL,0,NULL,NULL,1,'1',NULL,NULL,'1',0),(9,'http://localhost:8080/index.php?qr_no=AGg=','2814864704623',0,'N','2017-02-27 08:59:06',NULL,NULL,0,150,NULL,0,'1417986702201701202000372836',NULL,NULL,'1000041701201701203000146727092',1),(10,'http://localhost:8080/index.php?qr_no=CWlUZg==','2014864304527',0,'N',NULL,NULL,NULL,0,150,NULL,0,'1417986702201701201153068473',NULL,NULL,'1000041701201701203000043688034',0),(11,'http://localhost:8080/index.php?qr_no=UTFXZA==','7314864003461',0,'N',NULL,NULL,NULL,0,NULL,NULL,0,'1417986702201701191511543505',NULL,NULL,'1000041701201701193000051735034',0),(12,'http://localhost:8080/index.php?qr_no=AGAHNw==','4510119878606',1,'N','2017-02-27 09:08:03',NULL,NULL,0,201,NULL,1,'1417986702201701221705523382',NULL,NULL,'1000041701201701223000083652086',1),(13,'http://localhost:8080/index.php?qr_no=UTFXZg==','5810119978050',3,'N',NULL,NULL,NULL,1,300,NULL,1,'1417986702201701221415032753',NULL,1,'1000041701201701223000064713025',0);

#
# Structure for table "product_info"
#

DROP TABLE IF EXISTS `product_info`;
CREATE TABLE `product_info` (
  `product_ItemID` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_ItemName` varchar(400) NOT NULL,
  `product_ItemNo` varchar(40) DEFAULT NULL,
  `product_CountryOfOrigin` int(10) DEFAULT NULL,
  `product_PortOfShipment` int(10) DEFAULT NULL,
  `product_SalePlatform` int(10) DEFAULT NULL,
  `product_InspectionDate` date DEFAULT NULL,
  `product_InspectionNo` varchar(40) DEFAULT NULL,
  `product_DeclarationDate` date DEFAULT NULL,
  `product_DeclarationNo` varchar(40) DEFAULT NULL,
  `product_ShopID` int(10) DEFAULT NULL,
  `product_AddTime` datetime DEFAULT NULL,
  PRIMARY KEY (`product_ItemID`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=gbk;

#
# Data for table "product_info"
#

INSERT INTO `product_info` VALUES (1,'郑欧商城 波兰进口 乔杰克玛琪雅朵咖啡酱夹心饼干150g','5906812001547',2,2,1,'2016-01-01','123456789','2016-01-01','123456789',1,NULL),(2,'郑欧商城 越南进口麝香貂猫屎咖啡16条*20g、320g','DX8936101425188',4,4,1,'2016-01-05','123456789','2016-01-20','123465789',4,NULL),(3,'奶粉','1234567890',1,1,1,'2016-01-06','1234567890','2016-01-05','1234567890',3,NULL),(36,'哈哈哈','12435',1,1,NULL,'2016-12-14','123','2016-12-20','23455',1,NULL),(37,'1212','1212',2,2,NULL,'2016-12-04','1212','2016-12-04','1212',9,NULL),(62,'1234','1234',1,1,NULL,'2016-12-06','1234','2016-12-06','1234',1,NULL),(65,'4','4',4,4,NULL,'2017-02-13','4','2017-02-14','4',9,NULL);

#
# Structure for table "product_origininfo"
#

DROP TABLE IF EXISTS `product_origininfo`;
CREATE TABLE `product_origininfo` (
  `product_OriginID` int(10) NOT NULL,
  `product_OriginName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`product_OriginID`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

#
# Data for table "product_origininfo"
#

INSERT INTO `product_origininfo` VALUES (1,'德国'),(2,'波兰'),(3,'白俄罗斯'),(4,'越南'),(5,'韩国'),(6,'奥地利');

#
# Structure for table "product_portinfo"
#

DROP TABLE IF EXISTS `product_portinfo`;
CREATE TABLE `product_portinfo` (
  `product_PortID` int(10) NOT NULL,
  `product_PortName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`product_PortID`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

#
# Data for table "product_portinfo"
#

INSERT INTO `product_portinfo` VALUES (1,'汉堡'),(2,'华沙'),(3,'明斯克'),(4,'河内'),(5,'布列斯特'),(6,'波兹南'),(7,'仁川港'),(8,'马拉'),(9,'布列斯特'),(10,'波兰');

#
# Structure for table "product_shopinfo"
#

DROP TABLE IF EXISTS `product_shopinfo`;
CREATE TABLE `product_shopinfo` (
  `product_ShopID` int(10) NOT NULL AUTO_INCREMENT,
  `product_SellerName` varchar(200) NOT NULL,
  `product_ShopContactPerson` varchar(200) DEFAULT NULL,
  `product_ShopPhoneNo` varchar(200) DEFAULT NULL,
  `product_ShopEmail` varchar(200) DEFAULT NULL,
  `product_ShopAddTime` datetime DEFAULT NULL,
  PRIMARY KEY (`product_ShopID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=gbk;

#
# Data for table "product_shopinfo"
#

INSERT INTO `product_shopinfo` VALUES (1,'郑欧商城','张博','18237103205','zhangbo@zih718.com',NULL),(2,'万国优品','万国','12345678902','12345678901@163.com',NULL),(3,'洋洋臻品','张博','12345678901','zb@163.com',NULL),(4,'test','test','test','test',NULL),(5,'test2','test','test','test',NULL),(6,'test25','test','test','test',NULL),(9,'郑州国际陆港开发建设有限公司','张博','18237103205','zhangbo@zih718.com',NULL),(10,'1','1','1','1',NULL);

#
# Structure for table "rp_info"
#

DROP TABLE IF EXISTS `rp_info`;
CREATE TABLE `rp_info` (
  `rp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `mch_billno` varchar(50) NOT NULL COMMENT '商户订单号',
  `detail_id` varchar(50) NOT NULL COMMENT '红包单号',
  `status` varchar(50) NOT NULL DEFAULT '' COMMENT '红包状态  1—发放中，2—已发放待领取，3—发放失败，4—已领取，5—退款中，6—已退款',
  `send_type` varchar(32) NOT NULL DEFAULT 'API' COMMENT '发放类型',
  `total_num` int(11) NOT NULL COMMENT '红包个数',
  `total_amount` int(11) NOT NULL COMMENT '红包金额',
  `reason` varchar(50) NOT NULL COMMENT '失败原因',
  `send_time` varchar(50) NOT NULL COMMENT '红包发送时间',
  `refund_time` varchar(50) NOT NULL COMMENT '红包退款时间',
  `refund_amount` varchar(50) NOT NULL COMMENT '红包退款金额',
  `act_name` varchar(50) NOT NULL COMMENT '活动名称',
  `hblist` varchar(500) NOT NULL COMMENT '红包领取表',
  `hb_type` varchar(32) DEFAULT NULL COMMENT 'GROUP:裂变红包   NORMAL:普通红包',
  PRIMARY KEY (`rp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='红包详情';

#
# Data for table "rp_info"
#

/*!40000 ALTER TABLE `rp_info` DISABLE KEYS */;
INSERT INTO `rp_info` VALUES (9,'1417986702201701191510437267','1000041701201701193000051715054','RECEIVED','API',0,300,'','2017-01-19 15:10:44','','','','a:3:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynw_zzJh1k-z0MDjKxtKyJ52k\";s:6:\"amount\";s:2:\"21\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:19:39\";}i:1;a:3:{s:6:\"openid\";s:28:\"oyTynw2btbc5de4LeUV5oxTSWHqo\";s:6:\"amount\";s:2:\"90\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:14:31\";}i:2;a:3:{s:6:\"openid\";s:28:\"oyTynwyKWZA8ttUeKtrLHbkMqKEQ\";s:6:\"amount\";s:3:\"189\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:12:56\";}}',NULL),(10,'1417986702201701191510437267','1000041701201701193000051715054','RECEIVED','API',0,300,'','2017-01-19 15:10:44','','','','a:3:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynw_zzJh1k-z0MDjKxtKyJ52k\";s:6:\"amount\";s:2:\"21\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:19:39\";}i:1;a:3:{s:6:\"openid\";s:28:\"oyTynw2btbc5de4LeUV5oxTSWHqo\";s:6:\"amount\";s:2:\"90\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:14:31\";}i:2;a:3:{s:6:\"openid\";s:28:\"oyTynwyKWZA8ttUeKtrLHbkMqKEQ\";s:6:\"amount\";s:3:\"189\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:12:56\";}}',NULL),(11,'1417986702201701191510437267','1000041701201701193000051715054','RECEIVED','API',0,300,'','2017-01-19 15:10:44','','','','a:3:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynw_zzJh1k-z0MDjKxtKyJ52k\";s:6:\"amount\";s:2:\"21\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:19:39\";}i:1;a:3:{s:6:\"openid\";s:28:\"oyTynw2btbc5de4LeUV5oxTSWHqo\";s:6:\"amount\";s:2:\"90\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:14:31\";}i:2;a:3:{s:6:\"openid\";s:28:\"oyTynwyKWZA8ttUeKtrLHbkMqKEQ\";s:6:\"amount\";s:3:\"189\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:12:56\";}}',NULL),(12,'1417986702201701191510437267','1000041701201701193000051715054','RECEIVED','API',0,300,'','2017-01-19 15:10:44','','','','a:3:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynw_zzJh1k-z0MDjKxtKyJ52k\";s:6:\"amount\";s:2:\"21\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:19:39\";}i:1;a:3:{s:6:\"openid\";s:28:\"oyTynw2btbc5de4LeUV5oxTSWHqo\";s:6:\"amount\";s:2:\"90\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:14:31\";}i:2;a:3:{s:6:\"openid\";s:28:\"oyTynwyKWZA8ttUeKtrLHbkMqKEQ\";s:6:\"amount\";s:3:\"189\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:12:56\";}}',NULL),(13,'1417986702201701191510437267','1000041701201701193000051715054','RECEIVED','API',0,300,'','2017-01-19 15:10:44','','','','a:3:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynw_zzJh1k-z0MDjKxtKyJ52k\";s:6:\"amount\";s:2:\"21\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:19:39\";}i:1;a:3:{s:6:\"openid\";s:28:\"oyTynw2btbc5de4LeUV5oxTSWHqo\";s:6:\"amount\";s:2:\"90\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:14:31\";}i:2;a:3:{s:6:\"openid\";s:28:\"oyTynwyKWZA8ttUeKtrLHbkMqKEQ\";s:6:\"amount\";s:3:\"189\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:12:56\";}}',NULL),(14,'1417986702201701191510437267','1000041701201701193000051715054','RECEIVED','API',0,300,'','2017-01-19 15:10:44','','','','a:3:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynw_zzJh1k-z0MDjKxtKyJ52k\";s:6:\"amount\";s:2:\"21\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:19:39\";}i:1;a:3:{s:6:\"openid\";s:28:\"oyTynw2btbc5de4LeUV5oxTSWHqo\";s:6:\"amount\";s:2:\"90\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:14:31\";}i:2;a:3:{s:6:\"openid\";s:28:\"oyTynwyKWZA8ttUeKtrLHbkMqKEQ\";s:6:\"amount\";s:3:\"189\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:12:56\";}}',NULL),(15,'1417986702201701191510437267','1000041701201701193000051715054','RECEIVED','API',0,300,'','2017-01-19 15:10:44','','','','a:3:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynw_zzJh1k-z0MDjKxtKyJ52k\";s:6:\"amount\";s:2:\"21\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:19:39\";}i:1;a:3:{s:6:\"openid\";s:28:\"oyTynw2btbc5de4LeUV5oxTSWHqo\";s:6:\"amount\";s:2:\"90\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:14:31\";}i:2;a:3:{s:6:\"openid\";s:28:\"oyTynwyKWZA8ttUeKtrLHbkMqKEQ\";s:6:\"amount\";s:3:\"189\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:12:56\";}}',NULL),(16,'1417986702201701191510437267','1000041701201701193000051715054','RECEIVED','API',0,300,'','2017-01-19 15:10:44','','','','a:3:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynw_zzJh1k-z0MDjKxtKyJ52k\";s:6:\"amount\";s:2:\"21\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:19:39\";}i:1;a:3:{s:6:\"openid\";s:28:\"oyTynw2btbc5de4LeUV5oxTSWHqo\";s:6:\"amount\";s:2:\"90\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:14:31\";}i:2;a:3:{s:6:\"openid\";s:28:\"oyTynwyKWZA8ttUeKtrLHbkMqKEQ\";s:6:\"amount\";s:3:\"189\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:12:56\";}}',NULL),(17,'1417986702201701191510437267','1000041701201701193000051715054','RECEIVED','API',0,300,'','2017-01-19 15:10:44','','','','a:3:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynw_zzJh1k-z0MDjKxtKyJ52k\";s:6:\"amount\";s:2:\"21\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:19:39\";}i:1;a:3:{s:6:\"openid\";s:28:\"oyTynw2btbc5de4LeUV5oxTSWHqo\";s:6:\"amount\";s:2:\"90\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:14:31\";}i:2;a:3:{s:6:\"openid\";s:28:\"oyTynwyKWZA8ttUeKtrLHbkMqKEQ\";s:6:\"amount\";s:3:\"189\";s:8:\"rcv_time\";s:19:\"2017-01-19 15:12:56\";}}',NULL),(18,'1417986702201701182243135856','1000041701201701183000103634031','RECEIVED','API',0,300,'','2017-01-18 22:43:21','2017-01-19 23:09:17','186','','a:1:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynwycRH2y476VAp8R7E6Okx9c\";s:6:\"amount\";s:3:\"114\";s:8:\"rcv_time\";s:19:\"2017-01-18 22:44:46\";}}',NULL),(19,'1417986702201701182243135856','1000041701201701183000103634031','RECEIVED','API',0,300,'','2017-01-18 22:43:21','2017-01-19 23:09:17','186','','a:1:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynwycRH2y476VAp8R7E6Okx9c\";s:6:\"amount\";s:3:\"114\";s:8:\"rcv_time\";s:19:\"2017-01-18 22:44:46\";}}',NULL),(20,'1417986702201701182243135856','1000041701201701183000103634031','RECEIVED','API',0,300,'','2017-01-18 22:43:21','2017-01-19 23:09:17','186','','a:1:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynwycRH2y476VAp8R7E6Okx9c\";s:6:\"amount\";s:3:\"114\";s:8:\"rcv_time\";s:19:\"2017-01-18 22:44:46\";}}',NULL),(21,'1417986702201701182243135856','1000041701201701183000103634031','RECEIVED','API',0,300,'','2017-01-18 22:43:21','2017-01-19 23:09:17','186','','a:1:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynwycRH2y476VAp8R7E6Okx9c\";s:6:\"amount\";s:3:\"114\";s:8:\"rcv_time\";s:19:\"2017-01-18 22:44:46\";}}',NULL),(22,'1417986702201701182243135856','1000041701201701183000103634031','RECEIVED','API',0,300,'','2017-01-18 22:43:21','2017-01-19 23:09:17','186','','a:1:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynwycRH2y476VAp8R7E6Okx9c\";s:6:\"amount\";s:3:\"114\";s:8:\"rcv_time\";s:19:\"2017-01-18 22:44:46\";}}',NULL),(23,'1417986702201701182243135856','1000041701201701183000103634031','RECEIVED','API',0,300,'','2017-01-18 22:43:21','2017-01-19 23:09:17','186','','a:1:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynwycRH2y476VAp8R7E6Okx9c\";s:6:\"amount\";s:3:\"114\";s:8:\"rcv_time\";s:19:\"2017-01-18 22:44:46\";}}',NULL),(24,'1417986702201701182243135856','1000041701201701183000103634031','RECEIVED','API',0,300,'','2017-01-18 22:43:21','2017-01-19 23:09:17','186','','a:1:{i:0;a:3:{s:6:\"openid\";s:28:\"oyTynwycRH2y476VAp8R7E6Okx9c\";s:6:\"amount\";s:3:\"114\";s:8:\"rcv_time\";s:19:\"2017-01-18 22:44:46\";}}',NULL);
/*!40000 ALTER TABLE `rp_info` ENABLE KEYS */;

#
# Structure for table "user_info"
#

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `openid` varchar(150) NOT NULL COMMENT '微信会员openid',
  `nickname` varchar(150) CHARACTER SET gb2312 NOT NULL COMMENT '昵称',
  `headimgurl` varchar(150) CHARACTER SET gb2312 NOT NULL COMMENT '用户头像',
  `datetime` int(11) NOT NULL COMMENT '添加时间',
  `Error_time` datetime DEFAULT NULL,
  `Error_count` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=gbk;

#
# Data for table "user_info"
#

/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (2,'oyTynw89Gf5ZLL8EbTfXnZH-Ij6c','我.....你','http://wx.qlogo.cn/mmopen/PiajxSqBRaEKxgshMABuic4Me2HtpIJtnzAriasrPTC1uMA4JnBiaoW5icvhPACgwx208POzYAlicMzaficOo31LvicEbA/0',1486717601,NULL,0),(6,'oyTynw7B3_yrilhCYBiLg5fOrQ-M','霸气的狮子','http://wx.qlogo.cn/mmopen/6aw7fqRyYzGYIAxavUh26vBrxQpACXaGEhDp8ABjibIY2p5pJwe361szEeZibVRpnGAenR8aNzf2B29lgCIDtImsKUydqWic0eO/0',1485075945,NULL,0),(7,'oyTynww9GRx0muyYJ44uY4Bl9Okw','Zy','http://wx.qlogo.cn/mmopen/6aw7fqRyYzGYIAxavUh26n3erbeTDEs1L4MrQG42ey2qcIuLIsbh4qcoFzV6b6bXYDojFEcL5IdEjRDymkNs02HibrXpVVicQO/0',1484748128,NULL,0),(8,'oyTynwxmY6Tqd3NDyaj70NX4JAXY','尘埃落定','http://wx.qlogo.cn/mmopen/6aw7fqRyYzEETvub6qW1Ku5oibw520XjmhBNdKA82U9icicynfMyklxDwicmalgfy6MHicUrclmBiajxia973w4vEHfuKWRIBQ2O3wG/0',1486462660,NULL,0),(9,'oyTynwycRH2y476VAp8R7E6Okx9c','Admire','http://wx.qlogo.cn/mmopen/soicIViaC6LPNqhvW03YaXnsJtFIvMeL0kMBM4CU1aGR6uVia232T6AURqEicnY9OavlBvlHhuJ65ROfNjCVeoZUXItvHSCQViaE3/0',1484750566,NULL,0),(10,'oyTynw-DkAhdBJ0E41etgPT41DD4','张博','http://wx.qlogo.cn/mmopen/6aw7fqRyYzGYIAxavUh26rGHax1J6ia0Ku8eMib8xu2DgiavSKV9hsl9GiaY6KWjdvpiatPicoNg4yYCaCYqNp9rVibqjAe71um8E9l/0',1484876745,NULL,0),(11,'oyTynw7VuPBWoqdE7QUDdvgRZpP8','橙子','http://wx.qlogo.cn/mmopen/PiajxSqBRaELJCEIyRNl9ArSW3TkmcQOogz49xzT5BvnFBcJwtdjyqibfahuv42GDTqKF2beTwxuAIWeJRZobuSQ/0',1484873757,NULL,0),(12,'oyTynw-HENpX-RnbsMz08UTP5Y14','婷婷','http://wx.qlogo.cn/mmopen/sTJptKvBQLLglXkusdibbxnicGnsIkEOVDxyzbOWrSrDibR2k7oKicMqiabm31KGzMMt0wzEv0YFQTDQwjNDInjSnOJBoiaJfRdOx6/0',1484699515,NULL,0),(13,'oyTynw-jNiHhEAp7EzrrqARLThsI','kevinnee','http://wx.qlogo.cn/mmopen/soicIViaC6LPM2S6UXRxNibO0KLZ0ibiaibqdw9KwZbKibORF4zIicZGT4NGZ31DviboQT5zalICZohEUBSGnqSlaMm3nhb8HRqjaia6TK/0',1484700788,NULL,0),(14,'oyTynw_nqTWQLckAybTdjnHK2msY','Lxx? 张九龙','http://wx.qlogo.cn/mmopen/zEiaaCXBwXrrvzLFogZfMQwdryXkFSyqRTw1fk1eH8AHtKibEW8zgkrfK0tx68gpn7ibJ9gnBtRBa2XyuzuAsPttda9lyNV0Eca/0',1484728980,NULL,0),(15,'oyTynw0dsG2HHB6IzugQub6BapYo','阿伏','http://wx.qlogo.cn/mmopen/6aw7fqRyYzHdm5MI6LOribFW36TLO66nbVB13NRF3oADqGvft3rcu1OylzutC4OkWicHUhJTSNxXOrr485JrJA2K0ibusr7WDiaV/0',1484804079,NULL,0),(16,'oyTynw_ynko_2d2QJDQujRJZW9FE','蜗壳','http://wx.qlogo.cn/mmopen/ajNVdqHZLLB3Po2hQib88PZLSnnroCDzuUGiaz0fRYzE5dm5xicxoUr9tJ6ZNd4GHCZ45Xw5XQcckqRELzw3H0M4A/0',1484809963,NULL,0),(17,'oyTynwyKWZA8ttUeKtrLHbkMqKEQ','雅','http://wx.qlogo.cn/mmopen/soicIViaC6LPNqhvW03YaXnuqZtzWEZGFUcMAWjaWayTfkvmVb3xoEaFrp8juR119vas5tINlA0tuEOvzhicBSYicabric2QCPUHP/0',1484809730,NULL,0),(18,'oyTynw9UclbS0GIxcLgtekEGa77k','卜算子','http://wx.qlogo.cn/mmopen/zEiaaCXBwXroS60W0E4QNXcsXF58FKY0iaSoa3U9TiawZ023YuQBrDFJfghUtV5auHPVxC79eEfAiasO6QYYrNV75njMGzPykLUa/0',1484813146,NULL,0),(19,'oyTynw-tcSjEW0IZViQY0_l1HhRg','黄坤','http://wx.qlogo.cn/mmopen/6aw7fqRyYzHRSrYWrRCQj4Rku2DduLrYiaBfIgNic4TEibCPBCW1gkHQYlXyH98oicRfz8sAL77mynic4PsgsU3I0KBfiaWyH3KduH/0',1484875158,NULL,0),(20,'oyTynw1koXVikKmcSBb5RBA2zdKI','杨林凯','http://wx.qlogo.cn/mmopen/PiajxSqBRaELwgGXmichHj1PV4B13lDVgl3WT8QfRc7FMzCU1sq1cZS37MqlZNrPOtD9PfWgxAveMkIeT6UL0xsQ/0',1484818443,NULL,0),(21,'oyTynw1E9zhLbjDl_WA3hFOUOWyY','晨曦&&直航','http://wx.qlogo.cn/mmopen/zEiaaCXBwXrrvzLFogZfMQysy3kLIwa7v1F8M4iaYBv7IlxWrx7pPPZZ2oABehaicfJBouc0oI3PdIpQVWSLbxcYWoJngFvg27g/0',1484901085,NULL,0),(22,'oyTynw7-P5kPWaGU4uQ2k5OCzHrY','Eleven Yu','http://wx.qlogo.cn/mmopen/sTJptKvBQLLglXkusdibbxjf6M7CKGwSiakOjT4rgUgDrYV9iaoMef6Q3lRdwZjicsmKGG5mw2aWWibhXGWYEfWaiamVgLUvFnprOq/0',1484832552,NULL,0),(23,'oyTynw_XKiv-rWpvEyHmICKPRPbk','龚春杨','http://wx.qlogo.cn/mmopen/ajNVdqHZLLARdJjAkLAicMcI8WvK2FC4eqKJXbmqwJsLAAucHbh5eQ7Rd0BqSicRQubS6C2S00WtRBRhegsY07iapyXujS0q8tUSiaqSwrUNCoM/0',1484881610,NULL,0);
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
