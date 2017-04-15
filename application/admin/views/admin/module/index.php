<?php $this->load->view('admin/index/basehead');?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>模块列表</h5>
                </div>
                <div class="ibox-content">
                    <!--操作start-->
                    <div class="row">
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-w-m btn-primary" onClick="javascrtpt:window.location.href='<?php echo site_url('edit');?>'">新增&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                            <button type="button" class="btn btn-w-m btn-primary deleteall">删除&nbsp;<span class="glyphicon glyphicon-remove"></span></button>
                            <!--<a href="<?php /*echo site_url('installPackage');*/?>" class="btn btn-w-m btn-primary">安装模块&nbsp;<span class="fa fa-link"></span></a>-->
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

                    <div style="height:10px;"></div>
                    <div class="table-responsive">
                        <table class="table table-striped" style="border:1px solid #e7eaec">
                            <thead>
                            <tr>
                                <th width="30"><input type="checkbox" class="i-checks i-checksAll" name="input[]"></th>
                                <th>ID</th>
                                <th>模块名</th>
                                <th>中文名</th>
                                <th>版本号</th>
                                <th>简介</th>
                                <th>网址</th>
                                <th>前台入口</th>

                                <th >操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($list as $row):?>
                            <tr>
                                <td><input type="checkbox" value="<?php echo !empty($row['id'])?$row['id']:'';?>" class="i-checks" name="input[]"></td>
                                <td><?php echo !empty($row['id'])?$row['id']:'';?></td>
                                <td><a href="<?php echo site_url('model/index',array('modul_id'=>$row['id']));?>"><?php echo !empty($row['name'])?$row['name']:'';?></a></td>
                                <td><?php echo !empty($row['china'])?$row['china']:'';?></td>
                                <td><?php echo !empty($row['idversion'])?$row['version']:'';?></td>
                                <td><?php echo !empty($row['summary'])?$row['summary']:'';?></td>
                                <td><?php echo !empty($row['website'])?$row['website']:'';?></td>
                                <td><?php echo !empty($row['entry'])?$row['entry']:'';?></td>

                                <td>
                                    <a href="<?php echo site_url('edit',array('action'=>'edit','id'=>$row['id']));?>">编辑</a>
                                    &nbsp;&nbsp;&nbsp;
                                   <!-- <a href="javascript:void(0);" onclick="sendGetAjax('<?php /*echo site_url('packaging',array('id'=>$row['id']));*/?>')">打包</a>&nbsp;&nbsp;&nbsp;-->
                                    <a href="javascript:void(0);" onclick="sendGetAjax('<?php echo site_url('delete',array('id'=>$row['id']));?>')">删除</a></td>
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