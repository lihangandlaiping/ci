<?php $this->load->view('admin/index/basehead');?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>模块编辑</h5>
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
                                        <label class="col-sm-1 control-label">模块名</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[name]" value="<?php echo !empty($info['name'])?$info['name']:'';?>" <?php echo !empty($_GET['action'])&&$_GET['action']=='edit'?'disabled=disabled':'';?> />
                                            <span class="help-block m-b-none">（填写模块名，英文字母 必要参数）</span>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">中文名</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[china]" value="<?php echo !empty($info['china'])?$info['china']:'';?>" />
                                            <span class="help-block m-b-none">（填中文名）</span>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">版本号</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[version]" value="<?php echo !empty($info['version'])?$info['version']:'';?>" />
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">简介</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[summary]" value="<?php echo !empty($info['summary'])?$info['summary']:'';?>" />
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">下载地址</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[website]" value="<?php !empty($info['website'])?$info['website']:'';?>" />
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">前台入口</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[entry]" value="<?php echo !empty($info['entry'])?$info['entry']:'';?>" />
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">前台入口</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[entry]" value="<?php echo !empty($info['entry'])?$info['entry']:'';?>" />
                                            <span class="help-block m-b-none"></span>
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
<?php $this->load->view('admin/index/basefooter');?>