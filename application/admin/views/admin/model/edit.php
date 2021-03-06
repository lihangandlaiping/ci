<?php $this->load->view('admin/index/basehead');?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>模型编辑</h5>
                </div>
                <div class="ibox-content">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">基本</a> </li>
                        <!--  <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">扩展</a> </li>-->
                    </ul>
                    <div class="tab-content">
                        <!--基本配置-->
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <form class="form-horizontal" method="post" action="<?php echo site_url('Model/edit');?>">

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">所属模块</label>
                                        <div class="col-sm-6">
                                            <select <?php echo !empty($_GET['action'])&&$_GET['action']=='edit'?'disabled=disabled':'';?> class="form-control" name="data[modul_id]">
                                             <?php foreach($module as $row):?>
                                                <option <?php echo !empty($info['modul_id'])&&$row['id']==$info['modul_id']?'selected=selected':'';?> value="<?php echo !empty($row['id'])?$row['id']:'';?>"><?php echo $row['name'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">模型标识</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="data[name]" value="<?php echo !empty($info['name'])?$info['name']:'';?>" <?php echo !empty($_GET['action'])&&$_GET['action']=='edit'?'disabled=disabled':'';?> />
                                            <span class="help-block m-b-none">（填模型标识，数据库名，【英文字母或下划线】必要参数）</span>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">模型名称</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[title]" value="<?php echo !empty($info['title'])?$info['title']:'';?>" />
                                            <span class="help-block m-b-none">（填模型名称）</span>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">驱动</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="data[engine_type]" <?php echo !empty($_GET['action'])&&$_GET['action']=='edit'?'disabled=disabled':'';?>>
                                                <option value="InnoDB">InnoDB</option>
                                                <option <?php echo !empty($info['engine_type'])&&$info['engine_type']=='MyISAM'?'selected=selected':'';?> value="MyISAM">MyISAM</option>
                                                </select>
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">级联表结构</label>
                                        <div class="col-sm-6">
                                            <select name="data[is_cascade]" class="form-control" onchange="is_cascade(this)">
                                                <option value="0">否</option>
                                                <option <?php echo !empty($info['is_cascade'])&&$info['is_cascade']==1?'selected=selected':'';?> value="1">是</option>
                                                </select>
                                            <span class="help-block m-b-none">（改表列表是否显示级联效果）</span>
                                        </div>
                                    </div>
                                    <div id="cascade" style="display: none">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">级联关系字段</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[cascade_field]" value="<?php echo !empty($info['cascade_field'])?$info['cascade_field']:'';?>" />
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                        </div>



                                    <div class="hr-line-dashed"></div>
                                    <input type="hidden" name="action" value="<?php echo !empty($_GET['action'])?$_GET['action']:'add';?>"/>
                                    <input type="hidden" name="id" value="<?php echo !empty($info['id'])?$info['id']:'';?>"/>
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
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-4 ">
                                            <button class="btn btn-primary" type="submit">确定</button>
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
            function is_cascade(obj)
            {
                if($(obj).val()==1)
                {
                    $('#cascade').show();
                }
                else
                {
                    $('#cascade').hide();
                }
            }
        </script>
<?php $this->load->view('admin/index/basefooter');?>