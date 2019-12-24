<?php 
$sql="CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_addorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `openid` varchar(64) DEFAULT NULL,
  `orderid` varchar(64) DEFAULT '' COMMENT 'a',
  `uorderid` varchar(64) DEFAULT '' COMMENT 'a',
  `totalmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '总金额',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0待支付 2已支付',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
  `givemoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '赠送金额',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `userid` (`userid`),
  KEY `openid` (`openid`),
  KEY `orderid` (`orderid`),
  KEY `uorderid` (`uorderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_card` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `cardtype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '卡券扣券',
  `cardname` varchar(100) DEFAULT NULL COMMENT '卡券名称',
  `needcredit` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '兑分',
  `cardvalue` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '卡扣',
  `fullmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '订值',
  `totalnum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '优量',
  `takednum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '已量',
  `lastnum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '剩量',
  `usednum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '优惠加1',
  `limitnum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '限量',
  `expire` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '领效',
  `starttime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '可间',
  `endtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '可间',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状架',
  `time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最改',
  PRIMARY KEY (`id`),
  KEY `index` (`uniacid`,`cardtype`,`lastnum`,`endtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='优惠券';
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `idoforder` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '对应的order的id',
  `gid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '对应的商品id',
  `pic` varchar(1000) DEFAULT NULL COMMENT '图片',
  `text` varchar(800) DEFAULT NULL COMMENT '评价文字',
  `status` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示 0显示 1不显示',
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '评价等级 1好评 2中评 3差评',
  `commenttime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '评价时间',
  `headimg` varchar(255) DEFAULT NULL COMMENT '评价人头像',
  `nickname` varchar(32) DEFAULT NULL COMMENT '评价人昵称',
  PRIMARY KEY (`id`),
  KEY `index` (`idoforder`,`gid`,`status`,`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='价';
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_custom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `params` longtext NOT NULL COMMENT '其据',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '页页',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是页',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `basicparams` mediumtext COMMENT '页等',
  `pagename` varchar(200) DEFAULT '' COMMENT '页称',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`type`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_express` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(200) DEFAULT NULL COMMENT '模称',
  `expressarray` text COMMENT '运费等',
  `time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '编间',
  `defaultnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '件',
  `defaultmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '用',
  `defaultnumex` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '件',
  `defaultmoneyex` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='运费';
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_good` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(300) DEFAULT '' COMMENT '商题',
  `descrip` varchar(1000) DEFAULT NULL COMMENT '述',
  `oldprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '原',
  `nowprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `groupprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '价',
  `groupnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数',
  `groupendtime` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '团。',
  `stock` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '存',
  `sales` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '量',
  `realsales` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '量',
  `order` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '码',
  `ruletype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '格',
  `rulearray` text COMMENT '组',
  `inco` text COMMENT '签',
  `expresstype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '运板',
  `expressid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'd',
  `expressmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '单额',
  `iscredit` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是与',
  `maxcredit` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '分',
  `isfreeexpress` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是与',
  `fullmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '额',
  `isfirstcut` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '与',
  `firstcutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '额',
  `iscard` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '许',
  `limitbuy` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '购',
  `limittime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '限',
  `limitnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '限',
  `pic` text COMMENT '商品图片。取第一张作为封面图',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '架',
  `params` text COMMENT '商组',
  `detail` mediumtext COMMENT '情',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '间',
  `edittime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '间',
  `usercredit` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '分',
  `familycredit` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '分',
  `isdust` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '除',
  `isshowgroup` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `maxallow` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最',
  `isselftake` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0关闭上店自提 1开启',
  `ismaxexpress` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0叠加 1不叠加运费',
  `isexpress` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0叠加 1不叠加运费',
  PRIMARY KEY (`id`),
  KEY `index` (`uniacid`,`stock`,`status`,`isdust`,`isshowgroup`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_goodsort` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `gid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'd',
  `sortid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'd',
  PRIMARY KEY (`id`),
  KEY `index` (`uniacid`,`gid`,`sortid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='类';
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `gid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `status` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `fullnumber` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `lastnumber` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `overtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `createrid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `finishtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '间',
  `isrefund` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是款',
  PRIMARY KEY (`id`),
  KEY `index` (`gid`,`uniacid`,`status`,`overtime`,`createrid`,`lastnumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `openid` varchar(64) DEFAULT NULL,
  `orderid` varchar(64) DEFAULT '' COMMENT 'a',
  `uorderid` varchar(64) DEFAULT '' COMMENT 'a',
  `ordertype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `paytype` varchar(20) DEFAULT NULL COMMENT 'a',
  `groupid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `firstcutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `totalfreeexpress` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `totalexpress` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `cardcutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `cardid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `creditcut` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `credit` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `familycutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `totalmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `refundstatus` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `refundmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `name` varchar(20) DEFAULT NULL COMMENT 'a',
  `tel` varchar(20) DEFAULT NULL COMMENT 'a',
  `address` varchar(255) DEFAULT NULL COMMENT 'a',
  `message` varchar(255) DEFAULT NULL COMMENT 'a',
  `totalnum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `canceltime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `paytime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `sendtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `confirmtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `applyrefundtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `refundtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `cancelrefundtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `refuserefundtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `expressnumber` varchar(64) DEFAULT NULL COMMENT 'a',
  `expressname` varchar(30) DEFAULT '' COMMENT 'a',
  `isneedexpress` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `adminmark` varchar(200) DEFAULT NULL COMMENT 'a',
  `comfiretype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `isremind` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `iscomplete` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `sendtype` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0物流配送 1上店自提',
  PRIMARY KEY (`id`),
  KEY `index` (`uniacid`,`userid`,`openid`,`orderid`,`uorderid`,`cardid`,`status`,`name`,`tel`),
  KEY `uniacid` (`uniacid`),
  KEY `userid` (`userid`),
  KEY `openid` (`openid`),
  KEY `orderid` (`orderid`),
  KEY `uorderid` (`uorderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_ordergood` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `idoforder` int(11) NOT NULL DEFAULT '0' COMMENT 'a',
  `gid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `pic` varchar(500) DEFAULT NULL COMMENT 'a',
  `title` varchar(255) DEFAULT '' COMMENT 'a',
  `rule` varchar(200) DEFAULT '' COMMENT 'a',
  `buyprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `buynum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `buyexpressmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `buyfreeexpressmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `buycardcutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `buyfamilycutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `buyfirstcutflag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `buycreditflag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `buymoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a',
  `iscomment` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  PRIMARY KEY (`id`),
  KEY `index` (`uniacid`,`idoforder`,`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_sort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL DEFAULT '0' COMMENT 'a',
  `order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `class` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT 'a',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `pic` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index` (`uniacid`,`parentid`,`class`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `openid` varchar(64) NOT NULL DEFAULT '0',
  `nickname` varchar(64) NOT NULL DEFAULT '0',
  `headimgurl` varchar(255) NOT NULL DEFAULT '0',
  `logintime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `verify` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未审核 1审核中 1通过审核',
  `params` varchar(1500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index` (`uniacid`,`openid`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_usercard` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `cardid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `userid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a a',
  `openid` varchar(64) NOT NULL DEFAULT '' COMMENT 'a',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `overtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `taketime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `usetime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  PRIMARY KEY (`id`),
  KEY `index` (`uniacid`,`cardid`,`userid`,`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='a';
CREATE TABLE IF NOT EXISTS `ims_zofui_groupshop_waitmessage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a',
  `str` varchar(64) DEFAULT NULL COMMENT 'a',
  PRIMARY KEY (`id`),
  KEY `index` (`type`,`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='a';
";
pdo_run($sql);
if(!pdo_fieldexists("zofui_groupshop_addorder", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "userid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   `userid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "openid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   `openid` varchar(64) DEFAULT NULL;");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "orderid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   `orderid` varchar(64) DEFAULT '' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "uorderid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   `uorderid` varchar(64) DEFAULT '' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "totalmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   `totalmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '总金额';");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "status")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0待支付 2已支付';");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "createtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   `createtime` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "givemoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   `givemoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '赠送金额';");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   KEY `uniacid` (`uniacid`);");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "userid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   KEY `userid` (`userid`);");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "openid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   KEY `openid` (`openid`);");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "orderid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   KEY `orderid` (`orderid`);");
}
if(!pdo_fieldexists("zofui_groupshop_addorder", "uorderid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_addorder")." ADD   KEY `uorderid` (`uorderid`);");
}
if(!pdo_fieldexists("zofui_groupshop_card", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_card", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "cardtype")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `cardtype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '卡券扣券';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "cardname")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `cardname` varchar(100) DEFAULT NULL COMMENT '卡券名称';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "needcredit")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `needcredit` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '兑分';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "cardvalue")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `cardvalue` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '卡扣';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "fullmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `fullmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '订值';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "totalnum")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `totalnum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '优量';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "takednum")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `takednum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '已量';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "lastnum")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `lastnum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '剩量';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "usednum")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `usednum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '优惠加1';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "limitnum")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `limitnum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '限量';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "expire")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `expire` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '领效';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "starttime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `starttime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '可间';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "endtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `endtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '可间';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "status")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状架';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "time")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   `time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最改';");
}
if(!pdo_fieldexists("zofui_groupshop_card", "index")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_card")." ADD   KEY `index` (`uniacid`,`cardtype`,`lastnum`,`endtime`);");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "idoforder")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   `idoforder` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '对应的order的id';");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "gid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   `gid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '对应的商品id';");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "pic")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   `pic` varchar(1000) DEFAULT NULL COMMENT '图片';");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "text")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   `text` varchar(800) DEFAULT NULL COMMENT '评价文字';");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "status")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   `status` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示 0显示 1不显示';");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "level")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   `level` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '评价等级 1好评 2中评 3差评';");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "commenttime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   `commenttime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '评价时间';");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "headimg")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   `headimg` varchar(255) DEFAULT NULL COMMENT '评价人头像';");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "nickname")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   `nickname` varchar(32) DEFAULT NULL COMMENT '评价人昵称';");
}
if(!pdo_fieldexists("zofui_groupshop_comment", "index")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_comment")." ADD   KEY `index` (`idoforder`,`gid`,`status`,`uniacid`);");
}
if(!pdo_fieldexists("zofui_groupshop_custom", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_custom")." ADD   `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_custom", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_custom")." ADD   `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists("zofui_groupshop_custom", "params")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_custom")." ADD   `params` longtext NOT NULL COMMENT '其据';");
}
if(!pdo_fieldexists("zofui_groupshop_custom", "type")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_custom")." ADD   `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '页页';");
}
if(!pdo_fieldexists("zofui_groupshop_custom", "status")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_custom")." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是页';");
}
if(!pdo_fieldexists("zofui_groupshop_custom", "time")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_custom")." ADD   `time` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_custom", "basicparams")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_custom")." ADD   `basicparams` mediumtext COMMENT '页等';");
}
if(!pdo_fieldexists("zofui_groupshop_custom", "pagename")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_custom")." ADD   `pagename` varchar(200) DEFAULT '' COMMENT '页称';");
}
if(!pdo_fieldexists("zofui_groupshop_custom", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_custom")." ADD   KEY `uniacid` (`uniacid`,`type`,`status`);");
}
if(!pdo_fieldexists("zofui_groupshop_express", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_express")." ADD   `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_express", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_express")." ADD   `uniacid` int(10) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_express", "name")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_express")." ADD   `name` varchar(200) DEFAULT NULL COMMENT '模称';");
}
if(!pdo_fieldexists("zofui_groupshop_express", "expressarray")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_express")." ADD   `expressarray` text COMMENT '运费等';");
}
if(!pdo_fieldexists("zofui_groupshop_express", "time")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_express")." ADD   `time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '编间';");
}
if(!pdo_fieldexists("zofui_groupshop_express", "defaultnum")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_express")." ADD   `defaultnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '件';");
}
if(!pdo_fieldexists("zofui_groupshop_express", "defaultmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_express")." ADD   `defaultmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '用';");
}
if(!pdo_fieldexists("zofui_groupshop_express", "defaultnumex")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_express")." ADD   `defaultnumex` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '件';");
}
if(!pdo_fieldexists("zofui_groupshop_express", "defaultmoneyex")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_express")." ADD   `defaultmoneyex` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '用';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_good", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "title")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `title` varchar(300) DEFAULT '' COMMENT '商题';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "descrip")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `descrip` varchar(1000) DEFAULT NULL COMMENT '述';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "oldprice")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `oldprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '原';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "nowprice")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `nowprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "groupprice")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `groupprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '价';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "groupnum")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `groupnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "groupendtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `groupendtime` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '团。';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "stock")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `stock` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '存';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "sales")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `sales` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '量';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "realsales")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `realsales` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '量';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "order")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `order` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '码';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "ruletype")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `ruletype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '格';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "rulearray")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `rulearray` text COMMENT '组';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "inco")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `inco` text COMMENT '签';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "expresstype")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `expresstype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '运板';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "expressid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `expressid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'd';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "expressmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `expressmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '单额';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "iscredit")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `iscredit` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是与';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "maxcredit")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `maxcredit` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '分';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "isfreeexpress")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `isfreeexpress` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是与';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "fullmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `fullmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '额';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "isfirstcut")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `isfirstcut` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '与';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "firstcutmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `firstcutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '额';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "iscard")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `iscard` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '许';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "limitbuy")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `limitbuy` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '购';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "limittime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `limittime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '限';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "limitnum")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `limitnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '限';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "pic")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `pic` text COMMENT '商品图片。取第一张作为封面图';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "status")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '架';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "params")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `params` text COMMENT '商组';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "detail")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `detail` mediumtext COMMENT '情';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "createtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `createtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '间';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "edittime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `edittime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '间';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "usercredit")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `usercredit` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '分';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "familycredit")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `familycredit` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '分';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "isdust")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `isdust` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '除';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "isshowgroup")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `isshowgroup` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "maxallow")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `maxallow` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "isselftake")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `isselftake` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0关闭上店自提 1开启';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "ismaxexpress")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `ismaxexpress` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0叠加 1不叠加运费';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "isexpress")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   `isexpress` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0叠加 1不叠加运费';");
}
if(!pdo_fieldexists("zofui_groupshop_good", "index")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_good")." ADD   KEY `index` (`uniacid`,`stock`,`status`,`isdust`,`isshowgroup`);");
}
if(!pdo_fieldexists("zofui_groupshop_goodsort", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_goodsort")." ADD   `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_goodsort", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_goodsort")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_goodsort", "gid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_goodsort")." ADD   `gid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'd';");
}
if(!pdo_fieldexists("zofui_groupshop_goodsort", "sortid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_goodsort")." ADD   `sortid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'd';");
}
if(!pdo_fieldexists("zofui_groupshop_goodsort", "index")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_goodsort")." ADD   KEY `index` (`uniacid`,`gid`,`sortid`);");
}
if(!pdo_fieldexists("zofui_groupshop_group", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_group", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_group", "gid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   `gid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_group", "status")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   `status` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_group", "fullnumber")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   `fullnumber` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_group", "lastnumber")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   `lastnumber` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_group", "overtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   `overtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_group", "createtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   `createtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_group", "createrid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   `createrid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_group", "finishtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   `finishtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '间';");
}
if(!pdo_fieldexists("zofui_groupshop_group", "isrefund")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   `isrefund` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是款';");
}
if(!pdo_fieldexists("zofui_groupshop_group", "index")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_group")." ADD   KEY `index` (`gid`,`uniacid`,`status`,`overtime`,`createrid`,`lastnumber`);");
}
if(!pdo_fieldexists("zofui_groupshop_order", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_order", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "userid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `userid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "openid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `openid` varchar(64) DEFAULT NULL;");
}
if(!pdo_fieldexists("zofui_groupshop_order", "orderid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `orderid` varchar(64) DEFAULT '' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "uorderid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `uorderid` varchar(64) DEFAULT '' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "ordertype")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `ordertype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "paytype")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `paytype` varchar(20) DEFAULT NULL COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "groupid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `groupid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "firstcutmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `firstcutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "totalfreeexpress")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `totalfreeexpress` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "totalexpress")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `totalexpress` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "cardcutmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `cardcutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "cardid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `cardid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "creditcut")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `creditcut` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "credit")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `credit` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "familycutmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `familycutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "totalmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `totalmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "status")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "refundstatus")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `refundstatus` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "refundmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `refundmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "name")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `name` varchar(20) DEFAULT NULL COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "tel")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `tel` varchar(20) DEFAULT NULL COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "address")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `address` varchar(255) DEFAULT NULL COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "message")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `message` varchar(255) DEFAULT NULL COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "totalnum")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `totalnum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "createtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `createtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "canceltime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `canceltime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "paytime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `paytime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "sendtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `sendtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "confirmtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `confirmtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "applyrefundtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `applyrefundtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "refundtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `refundtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "cancelrefundtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `cancelrefundtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "refuserefundtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `refuserefundtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "expressnumber")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `expressnumber` varchar(64) DEFAULT NULL COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "expressname")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `expressname` varchar(30) DEFAULT '' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "isneedexpress")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `isneedexpress` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "adminmark")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `adminmark` varchar(200) DEFAULT NULL COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "comfiretype")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `comfiretype` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "isremind")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `isremind` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "iscomplete")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `iscomplete` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "sendtype")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   `sendtype` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0物流配送 1上店自提';");
}
if(!pdo_fieldexists("zofui_groupshop_order", "index")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   KEY `index` (`uniacid`,`userid`,`openid`,`orderid`,`uorderid`,`cardid`,`status`,`name`,`tel`);");
}
if(!pdo_fieldexists("zofui_groupshop_order", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   KEY `uniacid` (`uniacid`);");
}
if(!pdo_fieldexists("zofui_groupshop_order", "userid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   KEY `userid` (`userid`);");
}
if(!pdo_fieldexists("zofui_groupshop_order", "openid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   KEY `openid` (`openid`);");
}
if(!pdo_fieldexists("zofui_groupshop_order", "orderid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   KEY `orderid` (`orderid`);");
}
if(!pdo_fieldexists("zofui_groupshop_order", "uorderid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_order")." ADD   KEY `uorderid` (`uorderid`);");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "idoforder")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `idoforder` int(11) NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "gid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `gid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "pic")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `pic` varchar(500) DEFAULT NULL COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "title")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `title` varchar(255) DEFAULT '' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "rule")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `rule` varchar(200) DEFAULT '' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "buyprice")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `buyprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "buynum")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `buynum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "buyexpressmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `buyexpressmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "buyfreeexpressmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `buyfreeexpressmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "buycardcutmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `buycardcutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "buyfamilycutmoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `buyfamilycutmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "buyfirstcutflag")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `buyfirstcutflag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "buycreditflag")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `buycreditflag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "buymoney")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `buymoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "iscomment")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   `iscomment` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_ordergood", "index")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_ordergood")." ADD   KEY `index` (`uniacid`,`idoforder`,`gid`);");
}
if(!pdo_fieldexists("zofui_groupshop_sort", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_sort")." ADD   `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_sort", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_sort")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_sort", "name")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_sort")." ADD   `name` varchar(60) NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_sort", "order")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_sort")." ADD   `order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_sort", "time")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_sort")." ADD   `time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_sort", "class")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_sort")." ADD   `class` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_sort", "parentid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_sort")." ADD   `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_sort", "pic")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_sort")." ADD   `pic` varchar(350) DEFAULT NULL;");
}
if(!pdo_fieldexists("zofui_groupshop_sort", "index")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_sort")." ADD   KEY `index` (`uniacid`,`parentid`,`class`);");
}
if(!pdo_fieldexists("zofui_groupshop_user", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_user")." ADD   `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_user", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_user")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_user", "openid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_user")." ADD   `openid` varchar(64) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_user", "nickname")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_user")." ADD   `nickname` varchar(64) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_user", "headimgurl")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_user")." ADD   `headimgurl` varchar(255) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_user", "logintime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_user")." ADD   `logintime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_user", "status")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_user")." ADD   `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_user", "verify")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_user")." ADD   `verify` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未审核 1审核中 1通过审核';");
}
if(!pdo_fieldexists("zofui_groupshop_user", "params")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_user")." ADD   `params` varchar(1500) DEFAULT NULL;");
}
if(!pdo_fieldexists("zofui_groupshop_user", "index")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_user")." ADD   KEY `index` (`uniacid`,`openid`);");
}
if(!pdo_fieldexists("zofui_groupshop_user", "openid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_user")." ADD   KEY `openid` (`openid`);");
}
if(!pdo_fieldexists("zofui_groupshop_usercard", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_usercard")." ADD   `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_usercard", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_usercard")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_usercard", "cardid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_usercard")." ADD   `cardid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_usercard", "userid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_usercard")." ADD   `userid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a a';");
}
if(!pdo_fieldexists("zofui_groupshop_usercard", "openid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_usercard")." ADD   `openid` varchar(64) NOT NULL DEFAULT '' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_usercard", "status")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_usercard")." ADD   `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_usercard", "overtime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_usercard")." ADD   `overtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_usercard", "taketime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_usercard")." ADD   `taketime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_usercard", "usetime")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_usercard")." ADD   `usetime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_usercard", "index")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_usercard")." ADD   KEY `index` (`uniacid`,`cardid`,`userid`,`openid`);");
}
if(!pdo_fieldexists("zofui_groupshop_waitmessage", "id")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_waitmessage")." ADD   `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists("zofui_groupshop_waitmessage", "uniacid")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_waitmessage")." ADD   `uniacid` int(11) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists("zofui_groupshop_waitmessage", "type")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_waitmessage")." ADD   `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_waitmessage", "str")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_waitmessage")." ADD   `str` varchar(64) DEFAULT NULL COMMENT 'a';");
}
if(!pdo_fieldexists("zofui_groupshop_waitmessage", "index")) {
 pdo_query("ALTER TABLE ".tablename("zofui_groupshop_waitmessage")." ADD   KEY `index` (`type`,`uniacid`);");
}

 ?>