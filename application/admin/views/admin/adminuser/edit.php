<?php $this->load->view('admin/index/basehead');?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>管理员编辑</h5>
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
                                        <label class="col-sm-1 control-label">用户名</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[username]" value="<?php echo !empty($info['username'])?$info['username']:'';?>" <?php echo $_GET['action']!='add'?'disabled="disabled"':'';?>/>
                                            <span class="help-block m-b-none">（填简称，建议六个字以内）</span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">密码</label>
                                        <div class="col-sm-6">

                                            <input type="text" class="form-control" name="data[password]" value="<?php echo !empty($info['password'])?$info['password']:'';?>" />
                                            <span class="help-block m-b-none">（填密码，建议六到11个字以内）</span>

                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">所属角色</label>
                                        <div class="col-sm-6">
                                            <select class="form-control m-b ctiy" name="data[roleid]">
                                                <?php foreach($role as $row):?>
                                                <option <?php echo !empty($info['roleid'])&&$row['roleid']==$info['roleid']?'selected=selected':'';?> value="<?php echo !empty($row['roleid'])?$row['roleid']:'';?>"><?php echo $row['rolename'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">用户状态</label>
                                        <div class="col-sm-6">
                                            <select class="form-control m-b ctiy" name="data[status]">
                                                <option value="1">正常</option>
                                                <option <?php echo !empty($info['status'])&&$info['status']==2?'selected=selected':'';?> value="2">禁用</option>
                                            </select>
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