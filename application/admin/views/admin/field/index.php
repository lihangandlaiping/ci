<?php $this->load->view('admin/index/basehead');?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>字段列表</h5>
                </div>
                <div class="ibox-content">
                    <!--操作start-->
                    <div class="row">
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-w-m btn-primary" onClick="javascrtpt:window.location.href='<?php echo site_url('edit',array('model_id'=>$_GET['model_id']));?>'">新增&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                            <button type="button" class="btn btn-w-m btn-primary deleteall">删除&nbsp;<span class="glyphicon glyphicon-remove"></span></button>
                            <button type="button" onClick="javascrtpt:window.location.href='<?php echo site_url('add_all',array('model_id'=>$_GET['model_id']));?>'" class="btn btn-w-m btn-primary">批量添加&nbsp;<span class="fa fa-cubes"></span></button>
                        </div>
                        <!--<div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" placeholder="请输入关键词" class="input-sm form-control">
                <span class="input-group-btn">
                <button type="button" class="btn btn-sm btn-primary"> 搜索</button>
                </span> </div>
                        </div>-->
                    </div>
                    <!--操作end-->
                    <div style="height:10px;"></div>
                    <!--搜索start-->
                  <div class="table-responsive">
                        <form  class="form-horizontal">
                            <table class="table table-striped table1">
                                <thead>
                                <tr>

                                    <th>字段名</th>
                                    <th>字段标识</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td><input type="text" value="<?php echo !empty($_GET['name'])?$_GET['name']:'';?>" name="name" class="form-control" placeholder="字段名" style="width:200px" /></td>
                                    <td><input type="text" value="<?php echo !empty($_GET['field'])?$_GET['field']:'';?>" name="field" class="form-control" placeholder="字段定义" style="width:200px" /></td>
                                    <td><button type="submit" class="btn btn-w-m btn-primary">检索</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <!--搜索end-->
                    <div style="height:10px;"></div>
                    <div class="table-responsive">
                        <table class="table table-striped" style="border:1px solid #e7eaec">
                            <thead>
                            <tr>
                                <th width="30"><input type="checkbox" class="i-checks i-checksAll" name="input[]"></th>
                                <th>ID</th>
                                <th>字段名</th>
                                <th>字段标识</th>
                                <th>数据类型</th>
                                <th>备注</th>
                                <th >操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($list as $row):?>
                            <tr>
                                <td><input type="checkbox" value="<?php echo !empty($row['id'])?$row['id']:'';?>" class="i-checks" name="input[]"></td>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['field'];?></td>
                                <td><?php echo $row['type'];?></td>
                                <td><?php echo $row['remark'];?></td>
                                <td><a href="<?php echo site_url('edit',array('action'=>'edit','id'=>$row['id'],'model_id'=>$_GET['model_id']));?>">编辑</a>&nbsp;&nbsp;&nbsp;

                                    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="sendGetAjax('<?php echo site_url('delete',array('id'=>$row['id']));?>')">删除</a></td>
                            </tr>
                            <?php endforeach;?>

                            </tbody>
                        </table>
                    </div>

                    <div style="clear:both"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        qls.cascade('slecteds','area','parent_id',0,{"name":'area_name',"id":"area_id"},'15,16');
    })
</script>
<?php $this->load->view('admin/index/basefooter');?>