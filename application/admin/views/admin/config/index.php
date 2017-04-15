<?php $this->load->view('admin/index/basehead');?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>配置列表</h5>
                </div>
                <div class="ibox-content">
                    <!--操作start-->
                    <div class="row">
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-w-m btn-primary" onClick="javascrtpt:window.location.href='<?php echo site_url('edit',array('model_id'=>!empty($_GET['model_id'])?$_GET['model_id']:''));?>'">新增&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                            <button type="button" class="btn btn-w-m btn-primary deleteall">删除&nbsp;<span class="glyphicon glyphicon-remove"></span></button>
                          <!--  <button type="button" class="btn btn-w-m btn-primary">排序&nbsp;<span class="glyphicon glyphicon-sort"></span></button>-->
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


                                    <th>标识</th>
                                    <th>名称</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td><input type="text" value="<?php echo !empty($_GET['name'])&&$_GET['name']?$_GET['name']:'';?>" name="name" class="form-control" placeholder="标识" style="width:200px" /></td>
                                    <td><input type="text" value="<?php echo !empty($_GET['title'])&&$_GET['title']?$_GET['title']:'';?>" name="title" class="form-control" placeholder="名称" style="width:200px" /></td>
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

                                <th>名称</th>
                                <th>标识</th>

                                <th >操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($list as $row):?>
                            <tr>
                                <td><input type="checkbox" value="<?php echo $row['id'];?>" class="i-checks" name="input[]"></td>

                                <td><?php echo $row['title'];?></td>
                                <td><?php echo $row['name'];?></td>

                                <td>
                                    <a href="<?php echo site_url('edit',array('action'=>'edit','id'=>$row['id']));?>">编辑</a>&nbsp;&nbsp;&nbsp;
                                    <a href="javascript:void(0);" onclick="sendGetAjax('<?php echo site_url('delete',array('id'=>$row['id']));?>')">删除</a></td>
                            </tr>
                            <?php endforeach;?>

                            </tbody>
                        </table>
                    </div>
                    <?php echo !empty($_p)?$_p:'';?>
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