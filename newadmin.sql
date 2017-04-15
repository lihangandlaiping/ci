/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50540
Source Host           : 127.0.0.1:3306
Source Database       : newadmin

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-03-30 09:58:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yanyu_config
-- ----------------------------
DROP TABLE IF EXISTS `yanyu_config`;
CREATE TABLE `yanyu_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `content` text,
  `is_show` tinyint(1) DEFAULT '1' COMMENT '1用户自定义 2系统配置',
  `sort` varchar(255) DEFAULT NULL,
  `type` char(1) DEFAULT '1' COMMENT '1字符串文本格式,2日期格式,3图片上传,4文件上传',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yanyu_config
-- ----------------------------
INSERT INTO `yanyu_config` VALUES ('1', 'base_view_index', '列表视图层模板', '<?php $this->load->view(\'admin/index/basehead\');?>\r\n    <div class=\"wrapper wrapper-content animated fadeInRight\">\r\n        <div class=\"row\">\r\n            <div class=\"col-sm-12\">\r\n                <div class=\"ibox float-e-margins\">\r\n                    <div class=\"ibox-title\">\r\n                        <h5><?php echo !empty($menuTitle)?$menuTitle:\'\';?></h5>\r\n                    </div>\r\n                    <div class=\"ibox-content\">\r\n                        <!--操作start-->\r\n                        <div class=\"row\">\r\n                            <div class=\"col-sm-9\">\r\n<?php if(!empty($listaction)&&in_array(\'1\',$listaction)):?>\r\n                                <button type=\"button\" class=\"btn btn-w-m btn-primary\" onClick=\"javascrtpt:window.location.href=\'<?php echo site_url(\'edit\',array(!empty($cascade_field)?$cascade_field:\'\'=>$this->input->get(!empty($cascade_field)?$cascade_field:\'\',0)))?>\'\">新增&nbsp;<span class=\"glyphicon glyphicon-plus\"></span></button>\r\n    <?php endif;?>\r\n<?php if(!empty($listaction)&&in_array(\'2\',$listaction)):?>\r\n                                <button type=\"button\" class=\"btn btn-w-m btn-primary deleteall\">删除&nbsp;<span class=\"glyphicon glyphicon-remove\"></span></button>\r\n<?php endif;?>\r\n                            </div>\r\n\r\n                        </div>\r\n                        <!--操作end-->\r\n                        <div style=\"height:10px;\"></div>\r\n                        <!--搜索start-->\r\n                        <div class=\"\" id=\"searchform\">\r\n                            <form  class=\"form-horizontal\">\r\n                                <table class=\"table table-striped table1\">\r\n                                    <thead>\r\n                                    <tr>\r\n                                        <?php $is_search=false;?>\r\n                                        <?php foreach($field as $row):if(!empty($row[\'searchd\'])&&$row[\'searchd\']==1):?>\r\n                                            <?php $is_search=true;?>\r\n                                            <th><?php echo $row[\'name\'];?></th>\r\n                                        <?php endif;endforeach;?>\r\n                                        <?php if($is_search):?>\r\n                                            <th>操作</th>\r\n                                        <?php endif;?>\r\n                                    </tr>\r\n                                    </thead>\r\n                                    <tbody>\r\n                                    <tr>\r\n                                        <?php foreach($field as $row):if(!empty($row[\'searchd\'])&&$row[\'searchd\']==1):?>\r\n                                            <?php\r\n                                            switch ($row[\'type\']) {\r\n                                                case \'string\':\r\n                                                    echo \'<td>\'.$form->inputform($row[\'field\'],$this->input->get($row[\'field\'],\'\')).\'</td>\';\r\n                                                    break;\r\n                                                case \'num\':\r\n                                                    echo \'<td>\'.$form->inputform($row[\'field\'],$this->input->get($row[\'field\'],\'\')).\'</td>\';\r\n                                                    break;\r\n                                                case \'money\':\r\n                                                    echo \'<td>\'.$form->inputform($row[\'field\'],$this->input->get($row[\'field\'],\'\')).\'</td>\';\r\n                                                    break;\r\n                                                case \'date\':\r\n                                                    echo \'<td style=\"width: 260px;\"><div class=\"input-daterange input-group\" >\'.$form->timeform($row[\'field\'],$this->input->get($row[\'field\'].\'start\',\'\').\',\'.$this->input->get($row[\'field\'].\'end\',\'\'),1,2).\'</div></td>\';\r\n                                                    break;\r\n                                                case \'datetime\':\r\n                                                    echo \'<td style=\"width: 260px;\"><div class=\"input-daterange input-group\" >\'.$form->timeform($row[\'field\'],$this->input->get($row[\'field\'].\'start\',\'\').\',\'.$this->input->get($row[\'field\'].\'end\',\'\'),1).\'</div></td>\';\r\n                                                    break;\r\n                                                case \'bool\':\r\n\r\n                                                case \'select\':\r\n\r\n                                                case \'radio\':\r\n\r\n                                                case \'checkbox\':\r\n                                                    $vals = array_filter(preg_split(\'/[\\r\\n]+/s\', $row[\'extra\']));\r\n                                                    foreach ($vals as &$v) {\r\n                                                        $v = explode(\':\', $v);\r\n                                                    }\r\n                                                    echo  \'<td >\'.$form->selectform($row[\'field\'],$vals,$this->input->get($row[\'field\'],\'\'),1).\'</td>\';\r\n                                                    break;\r\n                                                case \'linkage\':\r\n                                                    $valss = array_filter(preg_split(\'/[\\r\\n]+/s\', $row[\'extra\']));\r\n                                                    $vals=array();\r\n                                                    foreach ($valss as $v) {\r\n                                                        $v = explode(\':\', $v);\r\n                                                        $vals[trim($v[0])]=trim($v[1]);\r\n                                                    }\r\n                                                    echo  \'<td >\'.$form->linkPage($row,$vals,$this->input->get($row[\'field\'],\'\')).\'</td>\';\r\n                                                    break;\r\n                                                case \'tablefield\':\r\n                                                    $newarray = array();\r\n                                                    $vals = array_filter(preg_split(\'/[\\r\\n]+/s\', $row[\'extra\']));\r\n                                                    foreach ($vals as &$v) {\r\n                                                        $v = explode(\':\', $v);\r\n                                                        $newarray[trim($v[0])] = $v[1];\r\n                                                    }\r\n                                                    $qlslist = $this->mastermodel->inIt($newarray[\'db_table\'])->field($newarray[\'primary_key\'].\',\'.$newarray[\'search_field\'])->getList();\r\n                                                    $valus = array();\r\n                                                    foreach ($qlslist as $rows) {\r\n                                                        $valus[] = array($rows[trim($newarray[\'primary_key\'])], $rows[$newarray[\'search_field\']]);\r\n                                                    }\r\n                                                    echo \'<td>\'.$form->selectform($row[\'field\'], $valus, $this->input->get($row[\'field\'],\'\'),1).\'</td>\';\r\n                                                    break;\r\n                                                default:\r\n                                                    echo \'<td>\'.$form->inputform($row[\'field\'],$this->input->get($row[\'field\'],\'\')).\'</td>\';\r\n                                                    break;\r\n                                            }\r\n                                            ?>\r\n                                        <?php endif;endforeach;?>\r\n                                        <?php if($is_search):?>\r\n                                            <td><button type=\"submit\" class=\"btn btn-w-m btn-primary\">检索</button></td>\r\n                                        <?php endif;?>\r\n                                    </tr>\r\n                                    </tbody>\r\n                                </table>\r\n                            </form>\r\n                        </div>\r\n                        <!--搜索end-->\r\n                        <div style=\"height:10px;\"></div>\r\n                        <div class=\"table-responsive\">\r\n                            <table class=\"table table-striped\" style=\"border:1px solid #e7eaec\">\r\n                                <thead>\r\n                                <tr>\r\n                                    <th width=\"30\"><input type=\"checkbox\" class=\"i-checks i-checksAll\" name=\"input[]\"></th>\r\n                                    <?php foreach($field as $rows):?>\r\n                                        <th><?php echo $rows[\'name\'];?></th>\r\n                                    <?php endforeach;?>\r\n                                    <th >操作</th>\r\n                                </tr>\r\n                                </thead>\r\n                                <tbody>\r\n                                <?php foreach($list as $key=>$row):?>\r\n                                    <tr>\r\n                                        <td><input type=\"checkbox\" value=\"<?php echo $row[\'id\'];?>\" class=\"i-checks\" name=\"input[]\"></td>\r\n                                        <?php foreach($field as $val):?>\r\n                                            <td><?php echo $row[$val[\'field\']];?></td>\r\n                                        <?php endforeach;?>\r\n\r\n                                        <td>\r\n                                            <?php if(!empty($listaction)&&in_array(\'3\',$listaction)):?>\r\n                                            <a href=\"<?php echo site_url(\'edit\',array(\'action\'=>\'edit\',\'id\'=>$row[\'id\']));?>\">编辑</a>&nbsp;&nbsp;&nbsp;\r\n                                            <?php endif;?>\r\n                                            <?php if(!empty($cascade_field)):?> <a href=\"<?php echo site_url(\'index\',array($cascade_field=>$row[\'id\']));?>\">下级数据</a><?php endif;?>\r\n                                            <?php if(!empty($listaction)&&in_array(\'4\',$listaction)):?>\r\n                                            &nbsp;&nbsp;&nbsp;<a href=\"javascript:void(0);\" onclick=\"sendGetAjax(\'<?php echo site_url(\'delete\',array(\'id\'=>$row[\'id\']));?>\')\">删除</a></td>\r\n                                            <?php endif;?>\r\n                                    </tr>\r\n                                <?php endforeach;?>\r\n\r\n                                </tbody>\r\n                            </table>\r\n                        </div>\r\n                        <?php echo $_p;?>\r\n                        <div style=\"clear:both\"></div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    <script src=\"__PUBLIC__/admin/js/demo/form-advanced-demo.min.js\"></script>\r\n    <script>\r\n        /*$(function(){\r\n         qls.cascade(\'slecteds\',\'area\',\'parent_id\',0,{\"name\":\'area_name\',\"id\":\"area_id\"},\'15,16\');\r\n         })*/\r\n    </script>\r\n<?php $this->load->view(\'admin/index/basefooter\');?>', '2', '', '1');
INSERT INTO `yanyu_config` VALUES ('3', 'base_view_edit', '表单视图模板', '<?php $this->load->view(\'admin/index/basehead\');?>\r\n<style>\r\n    div.form-control{margin: 0px;padding: 0px; height: auto;}\r\n</style>\r\n        \r\n<div class=\"wrapper wrapper-content animated fadeInRight\">\r\n    <div class=\"row\">\r\n        <div class=\"col-sm-12\">\r\n            <div class=\"ibox float-e-margins\">\r\n                <div class=\"ibox-title\">\r\n                    <h5><?php echo !empty($menuTitle)?$menuTitle:\'\';?></h5>\r\n                </div>\r\n                <div class=\"ibox-content\">\r\n                    <ul class=\"nav nav-tabs\">\r\n                        <li class=\"active\"><a data-toggle=\"tab\" href=\"#tab-1\" aria-expanded=\"true\">基本</a> </li>\r\n                        <!--  <li class=\"\"><a data-toggle=\"tab\" href=\"#tab-2\" aria-expanded=\"false\">扩展</a> </li>-->\r\n                    </ul>\r\n                    <div class=\"tab-content\">\r\n                        <!--基本配置-->\r\n                        <div id=\"tab-1\" class=\"tab-pane active\">\r\n                            <div class=\"panel-body\">\r\n                                <form class=\"form-horizontal\" method=\"post\" action=\"\">\r\n                                  <?php echo !empty($formstr)?$formstr:\'\';?>\r\n                                    <div class=\"hr-line-dashed\"></div>\r\n                                    <input type=\"hidden\" name=\"action\" value=\"<?php echo !empty($_GET[\'action\'])?$_GET[\'action\']:\'add\';?>\"/>\r\n                                    <input type=\"hidden\" name=\"id\" value=\"<?php echo !empty($info[\'id\'])?$info[\'id\']:\'\';?>\"/>\r\n                                    <div class=\"form-group\">\r\n                                        <div class=\"col-sm-4 col-sm-offset-1\">\r\n                                            <button class=\"btn btn-primary submitform\" type=\"button\">确定</button>\r\n                                            <button class=\"btn btn-white\" type=\"button\" onclick=\"javascript:window.history.go(-1);\">返回</button>\r\n                                        </div>\r\n                                    </div>\r\n                                </form>\r\n                            </div>\r\n                        </div>\r\n                        <!--基本配置 END-->\r\n\r\n                        <!--扩展-->\r\n                        <div id=\"tab-2\" class=\"tab-pane\">\r\n                            <div class=\"panel-body\">\r\n                                <form class=\"form-horizontal\">\r\n                                    <div class=\"form-group\">\r\n                                        <div class=\"col-sm-4 \">\r\n                                            <button class=\"btn btn-primary\" type=\"submit\">确定</button>\r\n                                            <button class=\"btn btn-white\" type=\"submit\">返回</button>\r\n                                        </div>\r\n                                    </div>\r\n                                </form>\r\n                            </div>\r\n                        </div>\r\n                        <!--扩展 END-->\r\n\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n\r\n\r\n<script src=\"__PUBLIC__/admin/js/demo/form-advanced-demo.min.js\"></script>\r\n<?php $this->load->view(\'admin/index/basefooter\');?>\r\n', '2', '', '1');
INSERT INTO `yanyu_config` VALUES ('5', 'base_controller', '控制器模板', '   /**\r\n     * 删除\r\n     * @param string $id\r\n     */\r\n    function delete($id=\'\')\r\n    {\r\n        if(!$id)$this->error(\'缺少数据id\');\r\n        if(!$this->model_name)$this->error(\'缺少数据库模型名称\');\r\n        if(strpos($id,\',\')!==FALSE)\r\n        {\r\n            $line=$this->mastermodel->inIt($this->model_name)->deleteData(array(\'id\'=>array(\'in\',$id)));\r\n        }\r\n        else\r\n        {\r\n            $line=$this->mastermodel->inIt($this->model_name)->deleteData(array(\'id\'=>$id));\r\n        }\r\n\r\n        if($line)$this->success(\'删除成功\',url(\'index\'));\r\n        else $this->error(\'删除失败\');\r\n    }\r\n\r\n    /**\r\n     * 列表\r\n     * @return \\Illuminate\\Contracts\\View\\Factory|\\Illuminate\\View\\View|\\think\\response\\View\r\n     */\r\n    function index()\r\n    {\r\n        $this->load->library(\'form\');\r\n        $fieldlist=$this->getFieldList();//获取显示字段\r\n\r\n        $where=$this->validSearch($fieldlist[\'showfield\']);\r\n\r\n//判断如果是级联列表\r\n        $module=$this->mastermodel->inIt(\'model\')->filed(\'is_cascade,cascade_field,listaction\')->getOne(array(\'name\'=>$this->model_name));\r\n\r\n        if($module[\'is_cascade\']==1){\r\n            $where[$this->model_name.\'.\'.trim($module[\'cascade_field\'])]=$this->input->get_post(trim($module[\'cascade_field\']),0);\r\n            $this->load->vars(\'cascade_field\',trim($module[\'cascade_field\']));\r\n        }\r\n        $order=\'\';\r\n        $field=\"{$this->model_name}.id,\".$fieldlist[\'fieldlist\'];\r\n//搜索封装验证\r\n//$list=$this->getListData($this->model_name.\" {$this->model_name}\",$where,$field,$order,$group,tableRelation($this->model_name));\r\n\r\n        $listresult= $this->mastermodel->inIt($this->model_name.\' \'.$this->model_name)->filed($field)->getPageList($where,$order,tableRelation($this->model_name));\r\n        $list=$listresult[\'list\'];\r\n        $_p=$listresult[\'page\'];\r\n        $list=$this->validDataList($list,$fieldlist[\'showfield\']);\r\n//生成搜索相关数据\r\n\r\n        $this->load->view($this->mudel_name.\'/\'.$this->model_name.\'/index\',array(\'list\'=>$list,\'_p\'=>$_p,\'field\'=>$fieldlist[\'showfield\'],\'model_name\'=>$this->model_name,\'form\'=>$this->form,\'listaction\'=>explode(\',\',$module[\'listaction\'])));\r\n\r\n    }\r\n\r\n    /**\r\n     * 编辑\r\n     * @return \\Illuminate\\Contracts\\View\\Factory|\\Illuminate\\View\\View|\\think\\response\\View\r\n     */\r\n    function edit()\r\n    {\r\n        $this->load->library(\'form\');\r\n        $action=$this->input->get_post(\'action\',\'add\');\r\n        $fieldlist=$this->getModelFromField($action);//获取表单字段\r\n        if($this->input->post())\r\n        {\r\n            $data=$this->validform($fieldlist,$action);//验证表单数据\r\n            if($action==\'edit\')\r\n            {\r\n                $line=$this->mastermodel->inIt($this->model_name)->updateData($data,array(\'id\'=>$this->input->post(\'id\',\'\')));\r\n                if($line)$this->success(\'修改成功\',site_url(\'index\'));\r\n                else $this->error(\'修改失败\');\r\n            }\r\n            else\r\n            {\r\n                $id=$this->mastermodel->inIt($this->model_name)->insertData($data);\r\n                if($id)$this->success(\'添加成功\',site_url(\'index\'));\r\n                else $this->error(\'添加失败\');\r\n            }\r\n        }\r\n        else\r\n        {\r\n            $_GET=$this->input->get();\r\n            $_GET[\'action\']=$action;\r\n            $cascade_field=\'\';\r\n            $form=$this->form;\r\n            $values=array();\r\n            if($action==\'edit\')\r\n            {\r\n                $values=$this->mastermodel->inIt($this->model_name)->getOne(array(\'id\'=>$_GET[\'id\']));\r\n            }\r\n            else\r\n            {\r\n\r\n                $module=$this->mastermodel->inIt(\'model\')->filed(\'is_cascade,cascade_field\')->getOne(array(\'name\'=>$this->model_name));\r\n                if($module[\'is_cascade\']==1){\r\n                    $values[trim($module[\'cascade_field\'])]=$this->input->get_post(trim($module[\'cascade_field\']),0);\r\n                    $cascade_field=trim($module[\'cascade_field\']);\r\n                }\r\n            }\r\n            $this->load->vars(\'info\',$values);\r\n            $this->load->vars(\'formstr\',$form->createFrom($fieldlist,$values,$cascade_field));\r\n            $this->load->view($this->mudel_name.\'/\'.$this->model_name.\'/edit\');\r\n        }\r\n    }', '2', '', '1');
INSERT INTO `yanyu_config` VALUES ('26', 'test', 'test', '/public/ueditor/php/upload/com/qls/img//20161020/14769564469172.png', '1', null, '3');
INSERT INTO `yanyu_config` VALUES ('18', 'web_url', '网站首页', '', '2', null, '1');
INSERT INTO `yanyu_config` VALUES ('19', 'admin_footer_title', '后台角标', '后台管理', '2', null, '1');
INSERT INTO `yanyu_config` VALUES ('20', 'web_seo_keyword', '网站seo关键字', '', '2', null, '1');
INSERT INTO `yanyu_config` VALUES ('21', 'web_seo_describe', '网站seo描述', '', '2', null, '1');
INSERT INTO `yanyu_config` VALUES ('22', 'admin_page_size', '后台分页数', '1', '2', null, '1');
INSERT INTO `yanyu_config` VALUES ('23', 'admin_backup_size', '后台数据库备份分卷', '', '2', null, '1');

-- ----------------------------
-- Table structure for yanyu_field
-- ----------------------------
DROP TABLE IF EXISTS `yanyu_field`;
CREATE TABLE `yanyu_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '1',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '字段名',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '字段注释',
  `field` varchar(100) NOT NULL DEFAULT '' COMMENT '字段定义',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '数据类型',
  `value` varchar(100) NOT NULL DEFAULT '' COMMENT '字段默认值',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示1 添加修改显示，2 添加显示，3 修改显示',
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='模型属性表';

-- ----------------------------
-- Records of yanyu_field
-- ----------------------------

-- ----------------------------
-- Table structure for yanyu_menu
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

-- ----------------------------
-- Records of yanyu_menu
-- ----------------------------
INSERT INTO `yanyu_menu` VALUES ('1', '系统管理', '0', '0', '', '1', '', 'fa fa-sun-o', '');
INSERT INTO `yanyu_menu` VALUES ('2', '菜单管理', '1', '0', 'admin/menu/index', '1', '', 'fa fa-bullhorn', '1');
INSERT INTO `yanyu_menu` VALUES ('3', '角色', '1', '0', 'admin/userrole/index', '1', '', 'fa fa-user', '1');
INSERT INTO `yanyu_menu` VALUES ('4', '管理员', '1', '0', 'admin/adminuser/index', '1', '', 'fa fa-group', '1');
INSERT INTO `yanyu_menu` VALUES ('5', '模块管理', '1', '0', 'admin/module/index', '1', '', 'fa fa-cloud', '1');
INSERT INTO `yanyu_menu` VALUES ('9', '模型管理', '1', '0', 'admin/model/index', '1', '', '', '1');
INSERT INTO `yanyu_menu` VALUES ('16', '接口管理', '15', '0', 'admin/Interfaced/index', '1', '', 'fa fa-share-square', '1');
INSERT INTO `yanyu_menu` VALUES ('12', '配置管理', '1', '0', 'admin/Configs/index', '1', '', '', '1');
INSERT INTO `yanyu_menu` VALUES ('14', '系统配置', '1', '0', 'admin/sysconfig/edit', '1', '', '', '1');
INSERT INTO `yanyu_menu` VALUES ('17', '推送管理', '15', '0', 'app/Jpushadmin/index', '1', '', '', '1');
INSERT INTO `yanyu_menu` VALUES ('24', '测试编辑', '23', '0', 'test/qlstestadmin/edit', '2', '', '', '23');

-- ----------------------------
-- Table structure for yanyu_model
-- ----------------------------
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
  `listaction` varchar(255) DEFAULT '1,2,3,4' COMMENT '1新增,2批量删除,3修改,4删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='文档模型表';

-- ----------------------------
-- Records of yanyu_model
-- ----------------------------

-- ----------------------------
-- Table structure for yanyu_module
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='模块管理表';

-- ----------------------------
-- Records of yanyu_module
-- ----------------------------

-- ----------------------------
-- Table structure for yanyu_user
-- ----------------------------
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

-- ----------------------------
-- Records of yanyu_user
-- ----------------------------
INSERT INTO `yanyu_user` VALUES ('11', 'admin', '123456', '9', '0', '1', '1');
INSERT INTO `yanyu_user` VALUES ('12', 'test', '123456', '9', '0', '1', '2');

-- ----------------------------
-- Table structure for yanyu_user_role
-- ----------------------------
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

-- ----------------------------
-- Records of yanyu_user_role
-- ----------------------------
INSERT INTO `yanyu_user_role` VALUES ('9', '管理员', '网站管理员', '1,2,3,4,5,23', '2', '1');
