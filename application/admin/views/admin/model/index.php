<?php $this->load->view('admin/index/basehead');?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>模型列表</h5>
                </div>
                <div class="ibox-content">
                    <!--操作start-->
                    <div class="row">
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-w-m btn-primary" onClick="javascrtpt:window.location.href='<?php echo site_url('edit',array('modul_id'=>$modul_id));?>'">新增&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                            <button type="button" class="btn btn-w-m btn-primary deleteall">删除&nbsp;<span class="glyphicon glyphicon-remove"></span></button>
                            <button type="button" onclick="backup('')" class="btn btn-w-m btn-primary">备份全部&nbsp;<span class="fa fa-sticky-note"></span></button>
                            <a href="<?php echo site_url('selectDatabase');?>" class="btn btn-w-m btn-primary">备份管理&nbsp;<span class="glyphicon glyphicon-sort"></span></a>
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

                                    <th>模型标识</th>
                                    <th>所属模块</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td><input type="text" value="<?php echo !empty($_GET['name'])?$_GET['name']:'';?>" name="name" class="form-control" placeholder="模型标识" style="width:200px" /></td>
                                    <td>
                                        <select class="form-control m-b" name="modul_id">
                                            <option value="">不限</option>
                                            <?php foreach($module as $row):?>
                                            <option <?php echo !empty($_GET['modul_id'])&&$_GET['modul_id']==$row['id']?'selected=selected':'';?> value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                            <?php endforeach;?>


                                        </select>
                                    </td>
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
                                <th>模型标识</th>
                                <th>模型名称</th>
                                <th>所属模块</th>
                                <th >操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($list as $row):?>
                            <tr>
                                <td><input type="checkbox" value="<?php echo $row['id'];?>" class="i-checks" name="input[]"></td>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['title'];?></td>
                                <td><?php echo $row['modul_name'];?></td>

                                <td><a href="<?php echo site_url('edit',array('action'=>'edit','id'=>$row['id']));?>">编辑</a>&nbsp;&nbsp;&nbsp;
                                    <a href="<?php echo site_url('Field/index',array('model_id'=>$row['id']));?>">字段管理</a>&nbsp;&nbsp;&nbsp;
                                    <a href="<?php echo site_url('Field/getFieldShow',array('model_id'=>$row['id'],'type'=>1));?>">表单显示</a>&nbsp;&nbsp;&nbsp;
                                    <a href="<?php echo site_url('show_filed',array('id'=>$row['id']));?>">列表显示</a>
                                    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="sendGetAjax('<?php echo site_url('delete',array('id'=>$row['id']));?>')">删除</a>
                                    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="backup('<?php echo $row['id'];?>');">备份数据</a>
                                </td>
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

    function closemodal(str)
    {
        $('#'+str).remove();
    }
    function backup(id)
    {
        qls.prompt('请设置备注',function(str){
            qls.close();
            var url='<?php echo site_url('backup');?>?model_id='+id+'&bz='+str;
            closemodal('myModal5');
            showlogdel(url);
        });

    }
   function showlogdel(url)
   {
       var html='<div class="modal inmodal fade in" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;    background-color: rgba(0,0,0,0.4);"> ' +
               '<div class="modal-dialog modal-lg" style="margin-top: -369px;"> ' +
               '<div class="modal-content"> ' +
               '<div class="modal-header"> ' +
               '<button type="button" class="close" data-dismiss="modal" onclick="closemodal('+"'"+'myModal5'+"'"+')"><span aria-hidden="true">×</span>' +
   '<span class="sr-only">Close</span></button> ' +
   '<h4 class="modal-title">正在执行sql导出</h4> ' +
   '</div><small class="font-bold"> ' +
   '<div class="modal-body"> ' +
   '<iframe frameborder="0" width="100%" height="100%" src="'+url+'"></iframe> ' +
   '</div> ' +
   '<div class="modal-footer"> ' +
   '<button type="button" class="btn btn-white" onclick="closemodal('+"'"+'myModal5'+"'"+')" data-dismiss="modal">关闭</button> ' +
   '<!--<button type="button" class="btn btn-primary">保存</button>--> ' +
   '</div> ' +
   '</small></div><small class="font-bold"> ' +
   '</small></div><small class="font-bold"> ' +
   '</small></div>';
       $('body').append(html);
       $('#myModal5 .modal-dialog').animate({'margin-top':'30px'},200);
   }
</script>
<?php $this->load->view('admin/index/basefooter');?>