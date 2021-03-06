<?php $this->load->view('admin/index/basehead');?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>编辑角色</h5>
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
                                <form class="form-horizontal" method="post" action="">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">角色名称</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[rolename]" value="<?php echo !empty($info['rolename'])?$info['rolename']:'';?>" />
                                            <span class="help-block m-b-none">（填简称，建议六个字以内）</span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">描述</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[description]" value="<?php echo !empty($info['description'])?$info['description']:'';?>" />
                                            <span class="help-block m-b-none">（填密码，建议六到11个字以内）</span>

                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">排序号</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[listorder]" value="<?php echo !empty($info['listorder'])?$info['listorder']:'';?>" />
                                            <span class="help-block m-b-none">（填排序号，使用数字）</span>

                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">用户状态</label>
                                        <div class="col-sm-6">
                                            <select class="form-control m-b ctiy" name="data[disabled]">
                                                <option value="1">正常</option>
                                                <option <?php echo !empty($info['disabled'])&&$info['disabled']==2?'selected=selected':'';?> value="2">禁用</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="hr-line-dashed"></div>
                                    <input type="hidden" name="action" value="<?php echo !empty($_GET['action'])?$_GET['action']:'add';?>"/>
                                    <input type="hidden" name="id" value="<?php echo !empty($info['roleid'])?$info['roleid']:'';?>"/>
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
<?php $this->load->view('admin/index/basefooter');?>