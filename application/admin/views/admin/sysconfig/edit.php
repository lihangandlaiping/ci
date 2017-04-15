<?php $this->load->view('admin/index/basehead');?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo !empty($menuTitle)?$menuTitle:'';?></h5>
                </div>
                <div class="ibox-content">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">网站配置</a> </li>
                          <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">系统配置</a> </li>

                    </ul>
                    <div class="tab-content">
                        <!--基本配置-->
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <form class="form-horizontal" method="post" action="">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">网站首页</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="data[web_url]" value="<?php !empty($info['web_url'])?$info['web_url']:'';?>"  />
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">后台角标</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="data[admin_footer_title]" value="<?php echo !empty($info['admin_footer_title'])?$info['admin_footer_title']:'';?>"  />
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">网站关键字</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="data[web_seo_keyword]" value="<?php echo !empty($info['web_seo_keyword'])?$info['web_seo_keyword']:'';?>"  />
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">网站描述</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" rows="3" name="data[web_seo_describe]"><?php echo !empty($info['web_seo_describe'])?$info['web_seo_describe']:'';?></textarea>
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <button class="btn btn-primary submitform" type="button">确定</button>
                                            <button class="btn btn-white" type="button" onclick="javascript:window.history.go(-1);">返回</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--基本配置 END-->

                        <!--扩展-->


                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <form class="form-horizontal" method="post" action="">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">后台分页数</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="data[admin_page_size]" value="<?php echo !empty($info['admin_page_size'])?$info['admin_page_size']:'';?>"  />
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">备份分卷大小</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="data[admin_backup_size]" value="<?php echo !empty($info['admin_backup_size'])?$info['admin_backup_size']:'';?>"  />
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4 ">
                                            <button class="btn btn-primary submitform" type="button">确定</button>
                                            <button class="btn btn-white" type="submit">返回</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--扩展 END-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <script>
            function looksl()
            {
                qls.open('填写示例','<table class="table table-striped"> <thead> <tr> ' +
                '<th>字段类型</th> ' +
                '<th>示例</th> ' +
                '</thead>' +
                ' <tbody>' +
                '<tr><td>其他表字段</td><td>' +
                'db_table:test2<br/>'+
                'search_field:level<br/>'+
                'primary_key:id<br/>'+
                '<br/>'+
                '</td><td>联动</td><td>' +
                'table:area<br/>'+
                'relation_field:parent_id<br/>'+
                'id:area_id<br/>'+
                'name:area_name<br/>'+
                '<br/>'+
                '</td><td>单选，多选，下拉，布尔</td><td>' +
                '1:男士<br/>'+
                '2:女士<br/>'+
                '3:外星人<br/>'+
                '<br/>'+
                '</td></tr>'+
                '</tbody></table>',['550px','300px']);
            }
            </script>
<?php $this->load->view('admin/index/basefooter');?>