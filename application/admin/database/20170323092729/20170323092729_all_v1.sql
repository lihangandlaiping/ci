--
-- MySQL database dump
-- Created by DbManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: localhost
-- 生成日期: 2017 年  03 月 23 日 09:27
-- MySQL版本: 5.5.40
-- PHP 版本: 5.4.33

--
-- 数据库: `newadmin`
--

-- -------------------------------------------------------

--
-- 表的结构yanyu_admin_action_log
--

DROP TABLE IF EXISTS `yanyu_admin_action_log`;
CREATE TABLE `yanyu_admin_action_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT '0' COMMENT '后台用户id',
  `menu_id` int(11) DEFAULT '0' COMMENT '菜单id',
  `msg` varchar(255) DEFAULT '',
  `action` tinyint(1) DEFAULT '0' COMMENT '0浏览，1新增，2修改，3删除,4登录',
  `module` int(11) DEFAULT '0' COMMENT '模块id',
  `model` int(11) DEFAULT '0' COMMENT '数据库模型id',
  `model_name` varchar(255) DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `add_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 yanyu_admin_action_log
--

INSERT INTO `yanyu_admin_action_log` VALUES('1','11','0','','0','0','0','','admin_userrole_index','1475028178');
INSERT INTO `yanyu_admin_action_log` VALUES('2','11','0','','0','0','0','','admin_interfaced_index','1475028275');
INSERT INTO `yanyu_admin_action_log` VALUES('3','11','10','','0','0','0','','admin/interfaced/index','1475028313');
INSERT INTO `yanyu_admin_action_log` VALUES('4','11','2','','0','0','0','','admin/menu/index','1475030234');
INSERT INTO `yanyu_admin_action_log` VALUES('5','11','2','','0','0','0','','admin/menu/index','1475030236');
INSERT INTO `yanyu_admin_action_log` VALUES('6','11','1','','1','0','0','','','1475030253');
INSERT INTO `yanyu_admin_action_log` VALUES('7','11','2','','0','0','0','','admin/menu/index','1475030256');
INSERT INTO `yanyu_admin_action_log` VALUES('8','11','4','','0','0','0','','admin/adminuser/index','1475030260');
INSERT INTO `yanyu_admin_action_log` VALUES('9','11','2','','0','0','0','','admin/menu/index','1475030269');
INSERT INTO `yanyu_admin_action_log` VALUES('10','11','2','','0','0','0','','admin/menu/index','1475030271');
INSERT INTO `yanyu_admin_action_log` VALUES('11','11','1','','2','0','0','','','1475030291');
INSERT INTO `yanyu_admin_action_log` VALUES('12','11','2','','0','0','0','','admin/menu/index','1475030294');
INSERT INTO `yanyu_admin_action_log` VALUES('13','11','4','','0','0','0','','admin/adminuser/index','1475030297');
INSERT INTO `yanyu_admin_action_log` VALUES('14','11','13','','0','0','0','','admin/adminlog/index','1475030300');
INSERT INTO `yanyu_admin_action_log` VALUES('15','11','13','','0','0','0','','admin/adminlog/index','1475030650');
INSERT INTO `yanyu_admin_action_log` VALUES('16','11','13','','0','0','0','','admin/adminlog/index','1475030760');
INSERT INTO `yanyu_admin_action_log` VALUES('17','11','13','','0','0','0','','admin/adminlog/index','1475030782');
INSERT INTO `yanyu_admin_action_log` VALUES('18','11','13','','0','0','0','','admin/adminlog/index','1475030801');
INSERT INTO `yanyu_admin_action_log` VALUES('19','11','13','','0','0','0','','admin/adminlog/index','1475030812');
INSERT INTO `yanyu_admin_action_log` VALUES('20','11','13','','0','0','0','','admin/adminlog/index','1475031015');
INSERT INTO `yanyu_admin_action_log` VALUES('21','11','13','','0','0','0','','admin/adminlog/index','1475031448');
INSERT INTO `yanyu_admin_action_log` VALUES('22','11','13','','0','0','0','','admin/adminlog/index','1475031460');
INSERT INTO `yanyu_admin_action_log` VALUES('23','11','13','','0','0','0','','admin/adminlog/index','1475031474');
INSERT INTO `yanyu_admin_action_log` VALUES('24','11','13','','0','0','0','','admin/adminlog/index','1475031480');
INSERT INTO `yanyu_admin_action_log` VALUES('25','11','13','','0','0','0','','admin/adminlog/index','1475031490');
INSERT INTO `yanyu_admin_action_log` VALUES('26','11','13','','0','0','0','','admin/adminlog/index','1475031501');
INSERT INTO `yanyu_admin_action_log` VALUES('27','11','13','','0','0','0','','admin/adminlog/index','1475031633');
INSERT INTO `yanyu_admin_action_log` VALUES('28','11','13','','0','0','0','','admin/adminlog/index','1475031670');
INSERT INTO `yanyu_admin_action_log` VALUES('29','11','13','','0','0','0','','admin/adminlog/index','1475031679');
INSERT INTO `yanyu_admin_action_log` VALUES('30','11','13','','0','0','0','','admin/adminlog/index','1475031704');
INSERT INTO `yanyu_admin_action_log` VALUES('31','11','13','','0','0','0','','admin/adminlog/index','1475031715');
INSERT INTO `yanyu_admin_action_log` VALUES('32','11','13','','0','0','0','','admin/adminlog/index','1475031744');
INSERT INTO `yanyu_admin_action_log` VALUES('33','11','13','','0','0','0','','admin/adminlog/index','1475031760');
INSERT INTO `yanyu_admin_action_log` VALUES('34','11','4','','0','0','0','','admin/adminuser/index','1475031771');
INSERT INTO `yanyu_admin_action_log` VALUES('35','11','2','','0','0','0','','admin/menu/index','1475031777');
INSERT INTO `yanyu_admin_action_log` VALUES('36','11','13','','0','0','0','','admin/adminlog/index','1475031781');
INSERT INTO `yanyu_admin_action_log` VALUES('37','11','4','','0','0','0','','admin/adminuser/index','1475031821');
INSERT INTO `yanyu_admin_action_log` VALUES('38','11','1','','2','0','0','','','1475031834');
INSERT INTO `yanyu_admin_action_log` VALUES('39','11','4','','0','0','0','','admin/adminuser/index','1475031836');
INSERT INTO `yanyu_admin_action_log` VALUES('40','11','13','','0','0','0','','admin/adminlog/index','1475031839');
INSERT INTO `yanyu_admin_action_log` VALUES('41','11','4','','0','0','0','','admin/adminuser/index','1475031993');
INSERT INTO `yanyu_admin_action_log` VALUES('42','11','4','','0','0','0','','admin/adminuser/index','1475032274');
INSERT INTO `yanyu_admin_action_log` VALUES('43','11','4','','0','0','0','','admin/adminuser/index','1475032280');
INSERT INTO `yanyu_admin_action_log` VALUES('44','11','0','','2','0','0','','','1475032286');
INSERT INTO `yanyu_admin_action_log` VALUES('45','11','4','','0','0','0','','admin/adminuser/index','1475032288');
INSERT INTO `yanyu_admin_action_log` VALUES('46','11','13','','0','0','0','','admin/adminlog/index','1475032289');
INSERT INTO `yanyu_admin_action_log` VALUES('47','11','3','','0','0','0','','admin/userrole/index','1475032557');
INSERT INTO `yanyu_admin_action_log` VALUES('48','11','4','','0','0','0','','admin/adminuser/index','1475032557');
INSERT INTO `yanyu_admin_action_log` VALUES('49','11','0','','2','0','0','user','','1475032562');
INSERT INTO `yanyu_admin_action_log` VALUES('50','11','4','','0','0','0','','admin/adminuser/index','1475032564');
INSERT INTO `yanyu_admin_action_log` VALUES('51','11','2','','0','0','0','','admin/menu/index','1475032566');
INSERT INTO `yanyu_admin_action_log` VALUES('52','11','13','','0','0','0','','admin/adminlog/index','1475032568');
INSERT INTO `yanyu_admin_action_log` VALUES('53','11','13','','0','0','0','','admin/adminlog/index','1475032607');
INSERT INTO `yanyu_admin_action_log` VALUES('54','11','13','','0','0','0','','admin/adminlog/index','1475032611');
INSERT INTO `yanyu_admin_action_log` VALUES('55','11','12','','0','0','0','','admin/config/index','1475032640');
INSERT INTO `yanyu_admin_action_log` VALUES('56','11','13','','0','0','0','','admin/adminlog/index','1475032643');
INSERT INTO `yanyu_admin_action_log` VALUES('57','11','2','','0','0','0','','admin/menu/index','1475042538');
INSERT INTO `yanyu_admin_action_log` VALUES('58','11','2','','0','0','0','','admin/menu/index','1475042541');
INSERT INTO `yanyu_admin_action_log` VALUES('59','11','4','','0','0','0','','admin/adminuser/index','1475042645');
INSERT INTO `yanyu_admin_action_log` VALUES('60','11','5','','0','0','0','','admin/module/index','1475042647');
INSERT INTO `yanyu_admin_action_log` VALUES('61','11','9','','0','0','0','','admin/model/index','1475042649');
INSERT INTO `yanyu_admin_action_log` VALUES('62','11','9','','0','0','0','','admin/model/index','1475043094');
INSERT INTO `yanyu_admin_action_log` VALUES('63','11','9','','0','0','0','','admin/model/index','1475043099');
INSERT INTO `yanyu_admin_action_log` VALUES('64','11','9','','0','0','0','','admin/model/index','1475043122');
INSERT INTO `yanyu_admin_action_log` VALUES('65','11','9','','0','0','0','','admin/model/index','1475043252');
INSERT INTO `yanyu_admin_action_log` VALUES('66','11','9','','0','0','0','','admin/model/index','1475043375');
INSERT INTO `yanyu_admin_action_log` VALUES('67','11','9','','0','0','0','','admin/model/index','1475043445');
INSERT INTO `yanyu_admin_action_log` VALUES('68','11','9','','0','0','0','','admin/model/index','1475044068');
INSERT INTO `yanyu_admin_action_log` VALUES('69','11','9','','0','0','0','','admin/model/index','1475044101');
INSERT INTO `yanyu_admin_action_log` VALUES('70','11','9','','0','0','0','','admin/model/index','1475044150');
INSERT INTO `yanyu_admin_action_log` VALUES('71','11','2','','0','0','0','','admin/menu/index','1475045085');
INSERT INTO `yanyu_admin_action_log` VALUES('72','11','9','','0','0','0','','admin/model/index','1475045088');
INSERT INTO `yanyu_admin_action_log` VALUES('73','11','9','','0','0','0','','admin/model/index','1475045174');
INSERT INTO `yanyu_admin_action_log` VALUES('74','11','9','','0','0','0','','admin/model/index','1475045319');
INSERT INTO `yanyu_admin_action_log` VALUES('75','11','9','','0','0','0','','admin/model/index','1475045352');
INSERT INTO `yanyu_admin_action_log` VALUES('76','11','9','','0','0','0','','admin/model/index','1475045383');
INSERT INTO `yanyu_admin_action_log` VALUES('77','11','9','','0','0','0','','admin/model/index','1475045417');
INSERT INTO `yanyu_admin_action_log` VALUES('78','11','9','','0','0','0','','admin/model/index','1475045439');
INSERT INTO `yanyu_admin_action_log` VALUES('79','11','9','','0','0','0','','admin/model/index','1475045460');
INSERT INTO `yanyu_admin_action_log` VALUES('80','11','9','','0','0','0','','admin/model/index','1475045485');
INSERT INTO `yanyu_admin_action_log` VALUES('81','11','9','','0','0','0','','admin/model/index','1475045506');
INSERT INTO `yanyu_admin_action_log` VALUES('82','11','9','','0','0','0','','admin/model/index','1475045528');
INSERT INTO `yanyu_admin_action_log` VALUES('83','11','9','','0','0','0','','admin/model/index','1475045540');
INSERT INTO `yanyu_admin_action_log` VALUES('84','11','9','','0','0','0','','admin/model/index','1475045619');
INSERT INTO `yanyu_admin_action_log` VALUES('85','11','9','','0','0','0','','admin/model/index','1475045625');
INSERT INTO `yanyu_admin_action_log` VALUES('86','11','9','','0','0','0','','admin/model/index','1475045641');
INSERT INTO `yanyu_admin_action_log` VALUES('87','11','9','','0','0','0','','admin/model/index','1475046060');
INSERT INTO `yanyu_admin_action_log` VALUES('88','11','10','','0','0','0','','admin/interfaced/index','1475046797');
INSERT INTO `yanyu_admin_action_log` VALUES('89','11','0','','0','0','0','','admin/interfaceaction/index','1475046800');
INSERT INTO `yanyu_admin_action_log` VALUES('90','11','2','','0','0','0','','admin/menu/index','1475047337');
INSERT INTO `yanyu_admin_action_log` VALUES('91','11','9','','0','0','0','','admin/model/index','1475047347');
INSERT INTO `yanyu_admin_action_log` VALUES('92','11','5','','0','0','0','','admin/module/index','1475047348');
INSERT INTO `yanyu_admin_action_log` VALUES('93','11','5','','0','0','0','','admin/module/index','1475047504');
INSERT INTO `yanyu_admin_action_log` VALUES('94','11','9','','0','0','0','','admin/model/index','1475047508');
INSERT INTO `yanyu_admin_action_log` VALUES('95','11','5','','0','0','0','','admin/module/index','1475050558');
INSERT INTO `yanyu_admin_action_log` VALUES('96','11','9','','0','0','0','','admin/model/index','1475050562');
INSERT INTO `yanyu_admin_action_log` VALUES('97','11','9','','0','0','0','','admin/model/index','1475050583');
INSERT INTO `yanyu_admin_action_log` VALUES('98','11','12','','0','0','0','','admin/config/index','1475050876');
INSERT INTO `yanyu_admin_action_log` VALUES('99','11','12','','0','0','0','','admin/config/index','1475051991');
INSERT INTO `yanyu_admin_action_log` VALUES('100','11','13','','0','0','0','','admin/adminlog/index','1475051995');
INSERT INTO `yanyu_admin_action_log` VALUES('101','11','13','','0','0','0','','admin/adminlog/index','1475052002');
INSERT INTO `yanyu_admin_action_log` VALUES('102','11','12','','0','0','0','','admin/config/index','1475052153');
INSERT INTO `yanyu_admin_action_log` VALUES('103','11','12','','0','0','0','','admin/config/index','1475053466');
INSERT INTO `yanyu_admin_action_log` VALUES('104','11','2','','0','0','0','','admin/menu/index','1475053491');
INSERT INTO `yanyu_admin_action_log` VALUES('105','11','2','','0','0','0','','admin/menu/index','1475053493');
INSERT INTO `yanyu_admin_action_log` VALUES('106','11','2','','0','0','0','','admin/menu/index','1475053511');
INSERT INTO `yanyu_admin_action_log` VALUES('107','11','0','','2','0','0','menu','','1475053521');
INSERT INTO `yanyu_admin_action_log` VALUES('108','11','2','','0','0','0','','admin/menu/index','1475053523');
INSERT INTO `yanyu_admin_action_log` VALUES('109','11','2','','0','0','0','','admin/menu/index','1475053525');
INSERT INTO `yanyu_admin_action_log` VALUES('110','11','0','','1','0','0','menu','','1475053549');
INSERT INTO `yanyu_admin_action_log` VALUES('111','11','2','','0','0','0','','admin/menu/index','1475053552');
INSERT INTO `yanyu_admin_action_log` VALUES('112','11','2','','0','0','0','','admin/menu/index','1475053558');
INSERT INTO `yanyu_admin_action_log` VALUES('113','11','0','','2','0','0','menu','','1475053565');
INSERT INTO `yanyu_admin_action_log` VALUES('114','11','2','','0','0','0','','admin/menu/index','1475053568');
INSERT INTO `yanyu_admin_action_log` VALUES('115','11','4','','0','0','0','','admin/adminuser/index','1475053572');
INSERT INTO `yanyu_admin_action_log` VALUES('116','11','0','','2','0','0','config','','1475054599');
INSERT INTO `yanyu_admin_action_log` VALUES('117','11','0','','2','0','0','config','','1475054599');
INSERT INTO `yanyu_admin_action_log` VALUES('118','11','0','','2','0','0','config','','1475054599');
INSERT INTO `yanyu_admin_action_log` VALUES('119','11','0','','2','0','0','config','','1475054599');
INSERT INTO `yanyu_admin_action_log` VALUES('120','11','0','','2','0','0','config','','1475054630');
INSERT INTO `yanyu_admin_action_log` VALUES('121','11','0','','2','0','0','config','','1475054630');
INSERT INTO `yanyu_admin_action_log` VALUES('122','11','0','','2','0','0','config','','1475054630');
INSERT INTO `yanyu_admin_action_log` VALUES('123','11','0','','2','0','0','config','','1475054631');
INSERT INTO `yanyu_admin_action_log` VALUES('124','11','0','','2','0','0','config','','1475054648');
INSERT INTO `yanyu_admin_action_log` VALUES('125','11','0','','2','0','0','config','','1475054648');
INSERT INTO `yanyu_admin_action_log` VALUES('126','11','0','','2','0','0','config','','1475054648');
INSERT INTO `yanyu_admin_action_log` VALUES('127','11','0','','2','0','0','config','','1475054648');
INSERT INTO `yanyu_admin_action_log` VALUES('128','11','0','','2','0','0','config','','1475054656');
INSERT INTO `yanyu_admin_action_log` VALUES('129','11','0','','2','0','0','config','','1475054656');
INSERT INTO `yanyu_admin_action_log` VALUES('130','11','0','','2','0','0','config','','1475054656');
INSERT INTO `yanyu_admin_action_log` VALUES('131','11','0','','2','0','0','config','','1475054701');
INSERT INTO `yanyu_admin_action_log` VALUES('132','11','0','','2','0','0','config','','1475054701');
INSERT INTO `yanyu_admin_action_log` VALUES('133','11','5','','0','0','0','','admin/module/index','1475054916');
INSERT INTO `yanyu_admin_action_log` VALUES('134','11','10','','0','0','0','','admin/interfaced/index','1475054918');
INSERT INTO `yanyu_admin_action_log` VALUES('135','11','9','','0','0','0','','admin/model/index','1475054920');
INSERT INTO `yanyu_admin_action_log` VALUES('136','11','12','','0','0','0','','admin/config/index','1475054924');
INSERT INTO `yanyu_admin_action_log` VALUES('137','11','13','','0','0','0','','admin/adminlog/index','1475054926');
INSERT INTO `yanyu_admin_action_log` VALUES('138','11','13','','0','0','0','','admin/adminlog/index','1475054929');
INSERT INTO `yanyu_admin_action_log` VALUES('139','11','2','','0','0','0','','admin/menu/index','1475054945');
INSERT INTO `yanyu_admin_action_log` VALUES('140','11','9','','0','0','0','','admin/model/index','1475054952');
INSERT INTO `yanyu_admin_action_log` VALUES('141','11','9','','0','0','0','','admin/model/index','1475056587');
INSERT INTO `yanyu_admin_action_log` VALUES('142','11','9','','0','0','0','','admin/model/index','1475057219');
INSERT INTO `yanyu_admin_action_log` VALUES('143','11','9','','0','0','0','','admin/model/index','1475057250');
INSERT INTO `yanyu_admin_action_log` VALUES('144','11','9','','0','0','0','','admin/model/index','1475057288');
INSERT INTO `yanyu_admin_action_log` VALUES('145','11','4','','0','0','0','','admin/adminuser/index','1475057371');
INSERT INTO `yanyu_admin_action_log` VALUES('146','11','5','','0','0','0','','admin/module/index','1475057380');
INSERT INTO `yanyu_admin_action_log` VALUES('147','11','9','','0','0','0','','admin/model/index','1475057384');
INSERT INTO `yanyu_admin_action_log` VALUES('148','11','2','','0','0','0','','admin/menu/index','1475057460');
INSERT INTO `yanyu_admin_action_log` VALUES('149','11','4','','0','0','0','','admin/adminuser/index','1475057537');
INSERT INTO `yanyu_admin_action_log` VALUES('150','11','13','','0','0','0','','admin/adminlog/index','1475058130');
INSERT INTO `yanyu_admin_action_log` VALUES('151','11','4','','0','0','0','','admin/adminuser/index','1475058835');
INSERT INTO `yanyu_admin_action_log` VALUES('152','11','5','','0','0','0','','admin/module/index','1475058838');
INSERT INTO `yanyu_admin_action_log` VALUES('153','11','0','','2','0','0','config','','1475058852');
INSERT INTO `yanyu_admin_action_log` VALUES('154','11','0','','2','0','0','config','','1475058852');
INSERT INTO `yanyu_admin_action_log` VALUES('155','11','0','','2','0','0','config','','1475058852');
INSERT INTO `yanyu_admin_action_log` VALUES('156','11','13','','0','0','0','','admin/adminlog/index','1475058854');
INSERT INTO `yanyu_admin_action_log` VALUES('157','11','4','','0','0','0','','admin/adminuser/index','1475058873');
INSERT INTO `yanyu_admin_action_log` VALUES('158','11','13','','0','0','0','','admin/adminlog/index','1475058879');
INSERT INTO `yanyu_admin_action_log` VALUES('159','11','4','','0','0','0','','admin/adminuser/index','1475058885');
INSERT INTO `yanyu_admin_action_log` VALUES('160','11','13','','0','0','0','','admin/adminlog/index','1475058889');
INSERT INTO `yanyu_admin_action_log` VALUES('161','11','13','','0','0','0','','admin/adminlog/index','1475058932');
INSERT INTO `yanyu_admin_action_log` VALUES('162','11','0','','2','0','0','config','','1475058981');
INSERT INTO `yanyu_admin_action_log` VALUES('163','11','0','','2','0','0','config','','1475058981');
--
-- 表的结构yanyu_config
--

DROP TABLE IF EXISTS `yanyu_config`;
CREATE TABLE `yanyu_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `content` text,
  `is_show` tinyint(1) DEFAULT '1' COMMENT '1全局显示 2不显示，3后台显示，4前台显示',
  `sort` varchar(255) DEFAULT NULL,
  `module_id` int(11) DEFAULT '0' COMMENT '模块id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 yanyu_config
--

INSERT INTO `yanyu_config` VALUES('1','base_view_index','列表视图层模�\�','\r\n<div class=\"wrapper wrapper-content animated fadeInRight\">\r\n    <div class=\"row\">\r\n        <div class=\"col-sm-12\">\r\n            <div class=\"ibox float-e-margins\">\r\n                <div class=\"ibox-title\">\r\n                    <h5>{$menuTitle}</h5>\r\n                </div>\r\n                <div class=\"ibox-content\">\r\n                    <!--操作start-->\r\n                    <div class=\"row\">\r\n                        <div class=\"col-sm-9\">\r\n                            <button type=\"button\" class=\"btn btn-w-m btn-primary\" onClick=\"javascrtpt:window.location.href=\'{:url(\'edit\',array($cascade_field=>input($cascade_field,0)))}\'\">新增&nbsp;<span class=\"glyphicon glyphicon-plus\"></span></button>\r\n                            <button type=\"button\" class=\"btn btn-w-m btn-primary deleteall\">删除&nbsp;<span class=\"glyphicon glyphicon-remove\"></span></button>\r\n                        </div>\r\n\r\n                    </div>\r\n                    <!--操作end-->\r\n                    <div style=\"height:10px;\"></div>\r\n                    <!--搜索start-->\r\n                    <div class=\"\" id=\"searchform\">\r\n                        <form  class=\"form-horizontal\">\r\n                            <table class=\"table table-striped table1\">\r\n                                <thead>\r\n                                <tr>\r\n                                    <?php $is_search=false;?>\r\n                                    <?php foreach($field as $row):if($row[\'searchd\']==1):?>\r\n                                    <?php $is_search=true;?>\r\n                                    <th>{$row[\'name\']}</th>\r\n                                    <?php endif;endforeach;?>\r\n                                    <?php if($is_search):?>\r\n                                    <th>操作</th>\r\n                                    <?php endif;?>\r\n                                </tr>\r\n                                </thead>\r\n                                <tbody>\r\n                                <tr>\r\n                                    <?php foreach($field as $row):if($row[\'searchd\']==1):?>\r\n                                    <?php\r\n                                          switch ($row[\'type\']) {\r\n                                    case \'string\':\r\n                                        echo \'<td>\'.$form->inputform($row[\'field\'],input($row[\'field\'],\'\')).\'</td>\';\r\n                                    break;\r\n                                    case \'num\':\r\n                                    echo \'<td>\'.$form->inputform($row[\'field\'],input($row[\'field\'],\'\')).\'</td>\';\r\n                                    break;\r\n                                    case \'money\':\r\n                                    echo \'<td>\'.$form->inputform($row[\'field\'],input($row[\'field\'],\'\')).\'</td>\';\r\n                                    break;\r\n                                    case \'date\':\r\n                                    echo \'<td style=\"width: 260px;\"><div class=\"input-daterange input-group\" >\'.$form->timeform($row[\'field\'],input($row[\'field\'].\'start\',\'\').\',\'.input($row[\'field\'].\'end\',\'\'),1,2).\'</div></td>\';\r\n                                    break;\r\n                                    case \'datetime\':\r\n                                    echo \'<td style=\"width: 260px;\"><div class=\"input-daterange input-group\" >\'.$form->timeform($row[\'field\'],input($row[\'field\'].\'start\',\'\').\',\'.input($row[\'field\'].\'end\',\'\'),1).\'</div></td>\';\r\n                                    break;\r\n                                    case \'bool\':\r\n\r\n                                    case \'select\':\r\n\r\n                                    case \'radio\':\r\n\r\n                                    case \'checkbox\':\r\n                                    $vals = array_filter(preg_split(\'/[\\r\\n]+/s\', $row[\'extra\']));\r\n                                    foreach ($vals as &$v) {\r\n                                    $v = explode(\':\', $v);\r\n                                    }\r\n                                    echo  \'<td >\'.$form->selectform($row[\'field\'],$vals,input($row[\'field\'],\'\'),1).\'</td>\';\r\n                                    break;\r\n                                    case \'linkage\':\r\n                                    $valss = array_filter(preg_split(\'/[\\r\\n]+/s\', $row[\'extra\']));\r\n                                    $vals=array();\r\n                                    foreach ($valss as $v) {\r\n                                    $v = explode(\':\', $v);\r\n                                    $vals[trim($v[0])]=trim($v[1]);\r\n                                    }\r\n                                    echo  \'<td >\'.$form->linkPage($row,$vals,input($row[\'field\'],\'\')).\'</td>\';\r\n                                    break;\r\n                                    case \'tablefield\':\r\n                                    $newarray = array();\r\n                                    $vals = array_filter(preg_split(\'/[\\r\\n]+/s\', $row[\'extra\']));\r\n                                    foreach ($vals as &$v) {\r\n                                    $v = explode(\':\', $v);\r\n                                    $newarray[trim($v[0])] = $v[1];\r\n                                    }\r\n                                    $qlslist = \\My\\MasterModel::inIt($newarray[\'db_table\'])->field($newarray[\'primary_key\'].\',\'.$newarray[\'search_field\'])->getListData();\r\n                                    $valus = array();\r\n                                    foreach ($qlslist as $rows) {\r\n                                    $valus[] = array($rows[trim($newarray[\'primary_key\'])], $rows[$newarray[\'search_field\']]);\r\n                                    }\r\n                                    echo \'<td>\'.$form->selectform($row[\'field\'], $valus, input($row[\'field\'],\'\'),1).\'</td>\';\r\n                                    break;\r\n                                    default:\r\n                                    echo \'<td>\'.$form->inputform($row[\'field\'],input($row[\'field\'],\'\')).\'</td>\';\r\n                                    break;\r\n                                    }\r\n                                    ?>\r\n\r\n                                    <?php endif;endforeach;?>\r\n                                    <?php if($is_search):?>\r\n                                    <td><button type=\"submit\" class=\"btn btn-w-m btn-primary\">检�\�</button></td>\r\n                                    <?php endif;?>\r\n                                </tr>\r\n                                </tbody>\r\n                            </table>\r\n                        </form>\r\n                    </div>\r\n                    <!--搜索end-->\r\n                    <div style=\"height:10px;\"></div>\r\n                    <div class=\"table-responsive\">\r\n                        <table class=\"table table-striped\" style=\"border:1px solid #e7eaec\">\r\n                            <thead>\r\n                            <tr>\r\n                                <th width=\"30\"><input type=\"checkbox\" class=\"i-checks i-checksAll\" name=\"input[]\"></th>\r\n                                <?php foreach($field as $rows):?>\r\n                                <th>{$rows[\'name\']}</th>\r\n                                <?php endforeach;?>\r\n                                <th >操作</th>\r\n                            </tr>\r\n                            </thead>\r\n                            <tbody>\r\n                            <?php foreach($list as $key=>$row):?>\r\n                            <tr>\r\n                                <td><input type=\"checkbox\" value=\"{$row[\'id\']}\" class=\"i-checks\" name=\"input[]\"></td>\r\n                                <?php foreach($field as $val):?>\r\n                                <td><?php echo $row[$val[\'field\']];?></td>\r\n                                <?php endforeach;?>\r\n\r\n                                <td>\r\n                                    <a href=\"{:url(\'edit\',array(\'action\'=>\'edit\',\'id\'=>$row[\'id\']))}\">编辑</a>&nbsp;&nbsp;&nbsp;\r\n                                   <?php if($cascade_field):?> <a href=\"{:url(\'index\',array($cascade_field=>$row[\'id\']))}\">下级数据</a><?php endif;?>\r\n                                    &nbsp;&nbsp;&nbsp;<a href=\"javascript:void(0);\" onclick=\"sendGetAjax(\'{:url(\'delete\',array(\'id\'=>$row[\'id\']))}\')\">删除</a></td>\r\n                            </tr>\r\n                            <?php endforeach;?>\r\n\r\n                            </tbody>\r\n                        </table>\r\n                    </div>\r\n                    <?php echo $_p;?>\r\n                    <div style=\"clear:both\"></div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n<script src=\"__PUBLIC__/admin/js/demo/form-advanced-demo.min.js\"></script>\r\n<script>\r\n    /*$(function(){\r\n     qls.cascade(\'slecteds\',\'area\',\'parent_id\',0,{\"name\":\'area_name\',\"id\":\"area_id\"},\'15,16\');\r\n     })*/\r\n</script>','2','','0');
INSERT INTO `yanyu_config` VALUES('3','base_view_edit','表单视图模板','<style>\r\n    div.form-control{margin: 0px;padding: 0px; height: auto;}\r\n</style>\r\n        \r\n<div class=\"wrapper wrapper-content animated fadeInRight\">\r\n    <div class=\"row\">\r\n        <div class=\"col-sm-12\">\r\n            <div class=\"ibox float-e-margins\">\r\n                <div class=\"ibox-title\">\r\n                    <h5>{$menuTitle}</h5>\r\n                </div>\r\n                <div class=\"ibox-content\">\r\n                    <ul class=\"nav nav-tabs\">\r\n                        <li class=\"active\"><a data-toggle=\"tab\" href=\"#tab-1\" aria-expanded=\"true\">基本</a> </li>\r\n                        <!--  <li class=\"\"><a data-toggle=\"tab\" href=\"#tab-2\" aria-expanded=\"false\">扩展</a> </li>-->\r\n                    </ul>\r\n                    <div class=\"tab-content\">\r\n                        <!--基本配置-->\r\n                        <div id=\"tab-1\" class=\"tab-pane active\">\r\n                            <div class=\"panel-body\">\r\n                                <form class=\"form-horizontal\" method=\"post\" action=\"\">\r\n                                  {$formstr}\r\n                                    <div class=\"hr-line-dashed\"></div>\r\n                                    <input type=\"hidden\" name=\"action\" value=\"<?php echo $_GET[\'action\'];?>\"/>\r\n                                    <input type=\"hidden\" name=\"id\" value=\"<?php echo $info[\'id\'];?>\"/>\r\n                                    <div class=\"form-group\">\r\n                                        <div class=\"col-sm-4 col-sm-offset-1\">\r\n                                            <button class=\"btn btn-primary submitform\" type=\"button\">确定</button>\r\n                                            <button class=\"btn btn-white\" type=\"button\" onclick=\"javascript:window.history.go(-1);\">返回</button>\r\n                                        </div>\r\n                                    </div>\r\n                                </form>\r\n                            </div>\r\n                        </div>\r\n                        <!--基本配置 END-->\r\n\r\n                        <!--扩展-->\r\n                        <div id=\"tab-2\" class=\"tab-pane\">\r\n                            <div class=\"panel-body\">\r\n                                <form class=\"form-horizontal\">\r\n                                    <div class=\"form-group\">\r\n                                        <div class=\"col-sm-4 \">\r\n                                            <button class=\"btn btn-primary\" type=\"submit\">确定</button>\r\n                                            <button class=\"btn btn-white\" type=\"submit\">返回</button>\r\n                                        </div>\r\n                                    </div>\r\n                                </form>\r\n                            </div>\r\n                        </div>\r\n                        <!--扩展 END-->\r\n\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n\r\n\r\n<script src=\"__PUBLIC__/admin/js/demo/form-advanced-demo.min.js\"></script>\r\n','2','','0');
INSERT INTO `yanyu_config` VALUES('5','base_controller','控制器模�\�','   /**\r\n     * 删除\r\n     * @param string $id\r\n     */\r\n    function delete($id=\'\')\r\n    {\r\n        if(!$id)$this->error(\'缺少数据id\');\r\n        if(!$this->model_name)$this->error(\'缺少数据库模型名�\�\');\r\n        if(strpos($id,\',\')!==FALSE)\r\n        {\r\n            $line=MasterModel::inIt($this->model_name)->where(array(\'id\'=>array(\'in\',$id)))->delete();\r\n        }\r\n        else\r\n        {\r\n            $line=MasterModel::inIt($this->model_name)->where(array(\'id\'=>$id))->delete();\r\n        }\r\n\r\n        if($line)$this->success(\'删除成功\',url(\'index\'));\r\n        else $this->error(\'删除失败\');\r\n    }\r\n\r\n    /**\r\n     * 列表\r\n     * @return \\Illuminate\\Contracts\\View\\Factory|\\Illuminate\\View\\View|\\think\\response\\View\r\n     */\r\n    function index()\r\n    {\r\n        $fieldlist=$this->getFieldList();//获取显示字段\r\n        $where=$this->validSearch($fieldlist[\'showfield\']);\r\n        //判断如果是级联列�\�\r\n        $module=MasterModel::inIt(\'model\')->field(\'is_cascade,cascade_field\')->getOne(array(\'name\'=>$this->model_name));\r\n\r\n        if($module[\'is_cascade\']==1){\r\n            $where[$this->model_name.\'.\'.trim($module[\'cascade_field\'])]=input(trim($module[\'cascade_field\']),0);\r\n            $this->assign(\'cascade_field\',trim($module[\'cascade_field\']));\r\n        }\r\n        $order=\'\';\r\n        $group=\'\';\r\n        $field=\"{$this->model_name}.id,\".$fieldlist[\'fieldlist\'];\r\n        //搜索封装验证\r\n        $list=$this->getListData($this->model_name.\" {$this->model_name}\",$where,$field,$order,$group,tableRelation($this->model_name));\r\n        $list=$this->validDataList($list,$fieldlist[\'showfield\']);\r\n        $this->assign(\'list\',$list);\r\n        $this->assign(\'field\',$fieldlist[\'showfield\']);\r\n        //生成搜索相关数据\r\n        $this->assign(\'model_name\',$this->model_name);\r\n        $this->assign(\'form\',new Form());\r\n        return view(\'index\');\r\n\r\n    }\r\n\r\n    /**\r\n     * 编辑\r\n     * @return \\Illuminate\\Contracts\\View\\Factory|\\Illuminate\\View\\View|\\think\\response\\View\r\n     */\r\n    function edit()\r\n    {\r\n        $action=input(\'action\',\'add\');\r\n        $fieldlist=$this->getModelFromField($action);//获取表单字段\r\n        if(request()->isPost())\r\n        {\r\n            $data=$this->validform($fieldlist,$action);//验证表单数据\r\n            if($action==\'edit\')\r\n            {\r\n                $line=MasterModel::inIt($this->model_name)->updateData($data,array(\'id\'=>input(\'post.id\',\'\')));\r\n                if($line)$this->success(\'修改成功\',url(\'index\'));\r\n                else $this->error(\'修改失败\');\r\n            }\r\n            else\r\n            {\r\n                $id=MasterModel::inIt($this->model_name)->insertData($data);\r\n                if($id)$this->success(\'添加成功\',url(\'index\'));\r\n                else $this->error(\'添加失败\');\r\n            }\r\n        }\r\n        else\r\n        {\r\n            $_GET=input();\r\n            $_GET[\'action\']=$action;\r\n            $cascade_field=\'\';\r\n            $form=new Form();\r\n            $values=array();\r\n            if($action==\'edit\')\r\n            {\r\n                $values=MasterModel::inIt($this->model_name)->getOne(array(\'id\'=>$_GET[\'id\']));\r\n            }\r\n            else\r\n            {\r\n\r\n                $module=MasterModel::inIt(\'model\')->field(\'is_cascade,cascade_field\')->getOne(array(\'name\'=>$this->model_name));\r\n                if($module[\'is_cascade\']==1){\r\n                    $values[trim($module[\'cascade_field\'])]=input(trim($module[\'cascade_field\']),0);\r\n                    $cascade_field=trim($module[\'cascade_field\']);\r\n                }\r\n            }\r\n            $this->assign(\'info\',$values);\r\n            $this->assign(\'formstr\',$form->createFrom($fieldlist,$values,$cascade_field));\r\n            return view(\'edit\');\r\n        }\r\n    }','2','','0');
INSERT INTO `yanyu_config` VALUES('6','base_model','模型模板','    /**\r\n     * 获取数据条数\r\n     * @param $where 条件\r\n     * @param $group 分组\r\n     * @param array $join 二维数组\r\n     */\r\n    function getCount($where=null,$group=null,$join=array())\r\n    {\r\n        return parent::getCount($where,$group,$join);\r\n    }\r\n\r\n    /**\r\n     * 获取多条数据\r\n     * @param null $where\r\n     * @param null $order\r\n     * @param null $group\r\n     * @param array $join\r\n     */\r\n    public function getListData($where=null,$order=null,$group=null,$join=array(),$limit=\'\')\r\n    {\r\n        return parent::getListData($where,$order,$group,$join,$limit);\r\n    }\r\n\r\n    /**\r\n     * 获取一条数�\�\r\n     * @param null $where\r\n     * @param null $order\r\n     * @param null $group\r\n     * @param array $join\r\n     * @return mixed\r\n     */\r\n    function getOne($where=null,$order=null,$group=null,$join=array())\r\n    {\r\n       return parent::getOne($where,$order,$group,$join);\r\n    }\r\n    /**\r\n     * 插入\r\n     * @param $data\r\n     */\r\n    function insertData($data)\r\n    {\r\n        return parent::insertData($data);\r\n    }\r\n\r\n    /**\r\n     * 更新\r\n     * @param null $where\r\n     * @param $data\r\n     */\r\n    function updateData($data,$where=null)\r\n    {\r\n       return parent::updateData($data,$where);\r\n    }\r\n\r\n    /**\r\n     * 删除\r\n     * @param null $where\r\n     */\r\n    function deleteData($where)\r\n    {\r\n        return parent::deleteData($where);\r\n    }','2','','0');
INSERT INTO `yanyu_config` VALUES('7','admin_action_log','后台操作日志','0','3','','0');
INSERT INTO `yanyu_config` VALUES('8','web_seo_title','网站标题','12','4','','0');
INSERT INTO `yanyu_config` VALUES('9','web_seo_keyword','网站关键�\�','12','4','','0');
INSERT INTO `yanyu_config` VALUES('10','web_seo_describe','网站描述','12 ','4','','0');
INSERT INTO `yanyu_config` VALUES('16','push_appKey','极光推送appkey','','3','','0');
INSERT INTO `yanyu_config` VALUES('17','push_masterSecret','极光推送masterSecret','','3','','0');
INSERT INTO `yanyu_config` VALUES('11','web_url','网站链接','12','3','','0');
INSERT INTO `yanyu_config` VALUES('12','admin_footer','后台底部文字可用html','12','3','','0');
INSERT INTO `yanyu_config` VALUES('13','home_page_size','前台分页数量','20','4','','0');
INSERT INTO `yanyu_config` VALUES('14','admin_page_size','后台分页数量','10','3','','0');
INSERT INTO `yanyu_config` VALUES('15','backup_size','数据库备份分卷大�\�','12','2','','0');
--
-- 表的结构yanyu_field
--

DROP TABLE IF EXISTS `yanyu_field`;
CREATE TABLE `yanyu_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '字段名',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '字段注释',
  `field` varchar(100) NOT NULL DEFAULT '' COMMENT '字段定义',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '数据类型',
  `value` varchar(100) NOT NULL DEFAULT '' COMMENT '字段默认值',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示1 添加修改显示，2 添加显示，3 修改显示',
  `is_column` tinyint(2) unsigned NOT NULL DEFAULT '2' COMMENT '是否在列表显示1,不显示,2显示',
  `show_srot` int(10) DEFAULT '0',
  `column_srot` int(10) DEFAULT '0',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '参数',
  `model_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型id',
  `is_must` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否必填',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `validate_rule` varchar(255) NOT NULL DEFAULT '' COMMENT '验证规则',
  `error_info` varchar(100) NOT NULL DEFAULT '' COMMENT '错误时提示',
  `validate_type` tinyint(25) NOT NULL DEFAULT '1' COMMENT '验证类型 1不验证，2添加验证，3修改验证',
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='模型属性表';

--
-- 转存表中的数据 yanyu_field
--

INSERT INTO `yanyu_field` VALUES('1','推送标�\�','','title','string','','','2','2','0','0','                                                                                            ','1','0','0','','','1');
INSERT INTO `yanyu_field` VALUES('2','数据类型','','extras_type','bool','1','','2','2','0','0','1:url\r\n2:数字标识                                                                                           ','1','0','0','','','1');
INSERT INTO `yanyu_field` VALUES('3','�\�','','value','string','','','2','2','0','0','                                                                                            ','1','0','0','','','1');
INSERT INTO `yanyu_field` VALUES('4','发送类�\�','','type','radio','1','','2','2','0','0','1:及时发�\�\r\n2:定时发�\�                                                                         ','1','0','0','','','1');
INSERT INTO `yanyu_field` VALUES('5','定时发送时�\�','','push_time','datetime','','','2','2','0','0','                                                                                            ','1','0','0','','','1');
INSERT INTO `yanyu_field` VALUES('6','状�\�','','status','bool','1','','0','2','0','0','1:成功\r\n2:失败                                                                                           ','1','0','0','','','1');
INSERT INTO `yanyu_field` VALUES('7','添加时间','','add_time','datetime','0','','0','2','0','0','                                                                                            ','1','0','0','','','1');
INSERT INTO `yanyu_field` VALUES('8','test','','test','string','','','1','1','0','0','','1','0','0','','','1');
INSERT INTO `yanyu_field` VALUES('9','名字','','name','string','','','1','2','1','0','','10','0','0','','','1');
INSERT INTO `yanyu_field` VALUES('10','性别','','sex','bool','1','','0','2','0','0','1:�\�\r\n2:�\�','10','0','0','','','1');
INSERT INTO `yanyu_field` VALUES('11','年龄','','age','num','','','0','2','0','0','','10','0','0','','','1');
--
-- 表的结构yanyu_interface
--

DROP TABLE IF EXISTS `yanyu_interface`;
CREATE TABLE `yanyu_interface` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `face_name` varchar(255) DEFAULT '' COMMENT '接口标示',
  `face_title` varchar(255) DEFAULT '' COMMENT '接口名称',
  `is_token_valid` tinyint(1) DEFAULT '1' COMMENT '1需要token验证,2不需要token验证',
  `module_id` int(11) DEFAULT '0',
  `author` varchar(255) DEFAULT '' COMMENT '作者',
  `update_time` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 yanyu_interface
--

INSERT INTO `yanyu_interface` VALUES('1','getname','获取名称','1','79','qls2','1473955706');
--
-- 表的结构yanyu_interface_action
--

DROP TABLE IF EXISTS `yanyu_interface_action`;
CREATE TABLE `yanyu_interface_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_relation` text COMMENT '表操作 数组对象 可多表',
  `type` tinyint(1) DEFAULT '1' COMMENT '1自定义逻辑，2表查询关系，3表添加，4表修改,5查询一条，6查询分页',
  `custom` longtext COMMENT '自定义逻辑代码',
  `bianlian_name` varchar(255) DEFAULT '' COMMENT '变量名',
  `where` varchar(50) DEFAULT '' COMMENT '查询条件变量',
  `order` varchar(50) DEFAULT '',
  `group` varchar(50) DEFAULT '',
  `data_bianlian_name` text COMMENT '数据集变量名',
  `face_id` int(11) DEFAULT '0' COMMENT '接口id',
  `sort` int(10) DEFAULT '0' COMMENT '排序',
  `is_output` tinyint(1) DEFAULT '0' COMMENT '1输出该变量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 yanyu_interface_action
--

INSERT INTO `yanyu_interface_action` VALUES('7','','3','','b','','','','a:2:{s:9:\"tableName\";s:4:\"test\";s:4:\"data\";s:1:\"a\";}','1','2','1');
INSERT INTO `yanyu_interface_action` VALUES('6','','1','$a=array(\'id\'=>1);\r\n$a[\'name\']=\'qls\';','','','','','','1','1','0');
--
-- 表的结构yanyu_interface_paremater
--

DROP TABLE IF EXISTS `yanyu_interface_paremater`;
CREATE TABLE `yanyu_interface_paremater` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `face_id` int(11) DEFAULT '0' COMMENT '接口id',
  `name` varchar(50) DEFAULT '' COMMENT '参数标识',
  `title` varchar(100) DEFAULT '' COMMENT '参数名称',
  `default` varchar(255) DEFAULT '',
  `sy_vilid` tinyint(2) DEFAULT '0' COMMENT '2非空验证，3手机号验证，4邮箱验证，5数字验证，6json验证',
  `vilid` varchar(50) DEFAULT '' COMMENT '验证方法名',
  `error_tip` varchar(255) DEFAULT '' COMMENT '验证失败提示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 yanyu_interface_paremater
--

INSERT INTO `yanyu_interface_paremater` VALUES('3','1','name','名称','1','2','','字段不能为空');
--
-- 表的结构yanyu_menu
--

DROP TABLE IF EXISTS `yanyu_menu`;
CREATE TABLE `yanyu_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否隐藏 1显示 2隐藏',
  `module` char(30) NOT NULL COMMENT '所属模块',
  `log` varchar(255) DEFAULT '',
  `org` varchar(255) DEFAULT '' COMMENT '逗号隔开',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

--
-- 转存表中的数据 yanyu_menu
--

INSERT INTO `yanyu_menu` VALUES('1','系统管理','0','0','','1','','fa fa-sun-o','');
INSERT INTO `yanyu_menu` VALUES('2','菜单管理','1','0','admin/menu/index','1','','fa fa-bullhorn','1');
INSERT INTO `yanyu_menu` VALUES('3','角色','1','0','admin/userrole/index','1','','fa fa-user','1');
INSERT INTO `yanyu_menu` VALUES('4','管理�\�','1','0','admin/adminuser/index','1','','fa fa-group','1');
INSERT INTO `yanyu_menu` VALUES('5','模块管理','1','0','admin/module/index','1','','fa fa-cloud','1');
INSERT INTO `yanyu_menu` VALUES('9','模型管理','1','0','admin/model/index','1','','','1');
INSERT INTO `yanyu_menu` VALUES('16','接口管理','15','0','admin/Interfaced/index','1','','fa fa-share-square','1');
INSERT INTO `yanyu_menu` VALUES('12','配置管理','1','0','admin/Config/index','1','','','1');
INSERT INTO `yanyu_menu` VALUES('13','后台操作日志','1','0','admin/adminlog/index','1','','','1');
INSERT INTO `yanyu_menu` VALUES('14','系统配置','1','0','admin/sysconfig/edit','1','','','1');
INSERT INTO `yanyu_menu` VALUES('17','推送管�\�','15','0','app/Jpushadmin/index','1','','','1');
--
-- 表的结构yanyu_model
--

DROP TABLE IF EXISTS `yanyu_model`;
CREATE TABLE `yanyu_model` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '模型标识',
  `title` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `engine_type` varchar(25) NOT NULL DEFAULT 'MyISAM' COMMENT '数据库引擎',
  `modul_id` int(11) DEFAULT '0',
  `show_filed` text COMMENT '需要显示的字段',
  `is_cascade` tinyint(1) DEFAULT '0' COMMENT '1为级联表结构',
  `cascade_field` varchar(128) DEFAULT '' COMMENT '级联表关系字段',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='文档模型表';

--
-- 转存表中的数据 yanyu_model
--

INSERT INTO `yanyu_model` VALUES('10','qlstest','','InnoDB','8','a:2:{i:0;a:6:{s:5:\"field\";s:4:\"name\";s:4:\"name\";s:6:\"名字\";s:6:\"tables\";s:7:\"qlstest\";s:4:\"type\";s:6:\"string\";s:5:\"extra\";s:0:\"\";s:7:\"searchd\";s:1:\"1\";}i:1;a:6:{s:5:\"field\";s:3:\"sex\";s:4:\"name\";s:6:\"性别\";s:6:\"tables\";s:7:\"qlstest\";s:4:\"type\";s:4:\"bool\";s:5:\"extra\";s:12:\"1:�\�\r\n2:�\�\";s:7:\"searchd\";s:1:\"1\";}}','0','');
--
-- 表的结构yanyu_module
--

DROP TABLE IF EXISTS `yanyu_module`;
CREATE TABLE `yanyu_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '模块名',
  `china` varchar(30) NOT NULL COMMENT '中文名',
  `version` varchar(20) NOT NULL COMMENT '版本号',
  `summary` varchar(200) NOT NULL COMMENT '简介',
  `developer` varchar(50) NOT NULL COMMENT '开发者',
  `website` varchar(200) NOT NULL COMMENT '网址',
  `entry` varchar(50) NOT NULL COMMENT '前台入口',
  `is_setup` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否已安装 1已安装，2未安装',
  `sort` int(11) NOT NULL COMMENT '模块排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `name_2` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='模块管理表';

--
-- 转存表中的数据 yanyu_module
--

INSERT INTO `yanyu_module` VALUES('8','test','','','','','','','1','0');
--
-- 表的结构yanyu_qlstest
--

DROP TABLE IF EXISTS `yanyu_qlstest`;
CREATE TABLE `yanyu_qlstest` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT ' ',
  `sex` tinyint(2) NOT NULL DEFAULT '1' COMMENT ' ',
  `age` int(10) unsigned NOT NULL COMMENT ' ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 yanyu_qlstest
--

INSERT INTO `yanyu_qlstest` VALUES('1','qw','1','0');
--
-- 表的结构yanyu_user
--

DROP TABLE IF EXISTS `yanyu_user`;
CREATE TABLE `yanyu_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `roleid` int(5) unsigned NOT NULL COMMENT '角色ID',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `status` tinyint(4) DEFAULT '1' COMMENT '用户状态1为正常 2为禁用',
  `type` tinyint(1) DEFAULT '2' COMMENT '1:超级管理员2:权限用户',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- 转存表中的数据 yanyu_user
--

INSERT INTO `yanyu_user` VALUES('11','admin','123456','9','0','1','1');
INSERT INTO `yanyu_user` VALUES('12','test','123456','9','0','2','2');
--
-- 表的结构yanyu_user_role
--

DROP TABLE IF EXISTS `yanyu_user_role`;
CREATE TABLE `yanyu_user_role` (
  `roleid` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员角色id',
  `rolename` varchar(50) NOT NULL COMMENT '角色名称',
  `description` text NOT NULL COMMENT '描述',
  `rules` text NOT NULL COMMENT '角色权限节点id',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否禁用 1：否，2：禁用',
  PRIMARY KEY (`roleid`),
  KEY `listorder` (`listorder`),
  KEY `disabled` (`disabled`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='用户角色表';

--
-- 转存表中的数据 yanyu_user_role
--

INSERT INTO `yanyu_user_role` VALUES('9','管理�\�','网站管理�\�','1,2,3,4,5,6','2','1');
