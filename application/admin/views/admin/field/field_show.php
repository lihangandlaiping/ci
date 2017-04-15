<?php $this->load->view('admin/index/basehead');?>
<style>
    .shows{color: #000000;}
    .hides{color:#ccc;}
    </style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>表单列表</h5>
                </div>
                <div class="ibox-content">
                    <!--操作start-->
                    <div class="row">
                        <div class="col-sm-9">
                           <!-- <button type="button" class="btn btn-w-m btn-primary" onClick="javascrtpt:window.location.href='{:url('edit',array('model_id'=>$_GET['model_id']))}'">新增&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                            <button type="button" class="btn btn-w-m btn-primary deleteall">删除&nbsp;<span class="glyphicon glyphicon-remove"></span></button>-->
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

                    <!--搜索end-->
                    <div style="height:10px;"></div>
                    <div class="table-responsive">
                        <form action="<?php echo site_url('updateFieldShow');?>" id="fieldform" >
                        <table class="table table-striped"  style="border:1px solid #e7eaec">
                            <thead>
                            <tr>
                                <th width="30"><input type="checkbox" class="i-checks i-checksAll" name="input[]"></th>
                                <th>ID</th>
                                <th>字段名</th>
                                <th>字段标识</th>
                                <th>数据类型</th>
                                <th>排序号</th>
                                <th>是否必填</th>
                                <th>是否显示</th>
                               <!-- <th >操作</th>-->
                            </tr>
                            </thead>
                            <tbody id="listtable">
                            <?php foreach($list as $row):?>
                            <tr class="<?php echo $row['is_show']>0?'shows':'hides';?>">
                                <td><input type="checkbox" value="<?php echo $row['id'];?>" class="i-checks" name="input[]"></td>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['field'];?></td>
                                <td><?php echo $row['type'];?></td>
                                <td>

                                    <input type="text" name="data[<?php echo $row['id'];?>][show_srot]" value="<?php echo $row['show_srot'];?>"/>

                                </td>
                                <td>
                                    <select class="form-control" name="data[<?php echo $row['id'];?>][is_must]">
                                        <option value='0'>否</option>
                                        <option <?php echo $row['is_must']==1?'selected=selected':'';?> value='1'>是</option>
                                    </select>
                                </td>
                                <td>

                                    <select name="data[<?php echo $row['id'];?>][is_show]" onchange="showchange(this)">
                                        <option  value="0">不显示</option>
                                        <option <?php echo $row['is_show']==1?'selected=selected':'';?> value="1">添加/修改显示</option>
                                        <option <?php echo $row['is_show']==2?'selected=selected':'';?> value="2">添加显示</option>
                                        <option <?php echo $row['is_show']==3?'selected=selected':'';?> value="3">修改显示</option>
                                    </select>
                                   </td>
                                <!--<td><a href="{:url('edit',array('action'=>'edit','id'=>$row['id']))}">编辑</a>&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="sendGetAjax('{:url('delete',array('id'=>$row['id']))}')">删除</a></td>-->
                            </tr>
                            <?php endforeach;?>

                            </tbody>
                        </table>

                            </form>
                    </div>
                    <button type="button" class="btn btn-w-m btn-primary" onclick="submitform()">保存&nbsp;</button>
                    <div style="clear:both"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function submitform()
    {
        var action=$('#fieldform').attr('action');
        qls.loading();
        $.post(action,$('#fieldform').serialize(),function(data){
            qls.close();
            if(data.code==1)
            {
                qls.success(data.msg,data.url);
            }
            else
            {
                qls.error(data.msg,data.url);
            }
        },'json')
    }
    function reset()
    {
        var len=$('#listtable tr.hides').length;
        for(var i=0;i<len;i++)
        {
            var obj=$('#listtable tr.hides').eq(len-1).clone();
            $('#listtable tr.hides').eq(len-1).remove();
            if($('#listtable tr.shows').length>0)
            {
                $('#listtable tr.shows').last().after(obj);
            }
            else
            {
                $('#listtable tr.hides').eq(0).before(obj);
            }
        }
    }
    function showchange(obj)
    {
        var val=$(obj).val();
        var kb=$(obj).find('option:selected');
        $(obj).find('option').removeAttr('selected');
       // return false;
        $(kb).prop('selected',true);
        if(val>0)
        {
            $(obj).parents('tr').removeClass('hides').addClass('shows');
        }
        else
        {
            $(obj).parents('tr').removeClass('shows').addClass('hides');
        }
        reset();
    }
    function columnchange(obj)
    {
        var val=$(obj).val();
        var kb=$(obj).find('option:selected');
        $(obj).find('option').removeAttr('selected');
        // return false;
        $(kb).prop('selected',true);
        if(val==2)
        {
            $(obj).parents('tr').removeClass('hides').addClass('shows');
        }
        else
        {
            $(obj).parents('tr').removeClass('shows').addClass('hides');
        }
        reset();
    }
    $(function(){
        qls.cascade('slecteds','area','parent_id',0,{"name":'area_name',"id":"area_id"},'15,16');
    })
</script>
<?php $this->load->view('admin/index/basefooter');?>