<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $menuTitle;?></h5>
                </div>
                <div class="ibox-content">
                    <!--操作start-->
                    <div class="row">
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-w-m btn-primary" onClick="javascrtpt:window.location.href='<?php echo site_url('edit',array('parent_id'=>$parent_id));?>'">新增&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                            <button type="button" class="btn btn-w-m btn-primary deleteall">删除&nbsp;<span class="glyphicon glyphicon-remove"></span></button>
                           <!-- <button type="button" class="btn btn-w-m btn-primary">排序&nbsp;<span class="glyphicon glyphicon-sort"></span></button>-->
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
                  <!--  <div class="table-responsive">
                        <form  class="form-horizontal">
                            <table class="table table-striped table1">
                                <thead>
                                <tr>
                                    <th width="400px">地区</th>
                                    <th>关键字搜索</th>
                                    <th>当前积分（范围）</th>
                                    <th>累计积分（范围）</th>
                                    <th>用户等级</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td id="slecteds">
                                      </td>
                                    <td><input type="text"  class="form-control" placeholder="请输入关键字" style="width:200px" /></td>
                                    <td><input type="text" class="form-control"/>
                                        -
                                        <input type="text" class="form-control" /></td>
                                    <td><input type="text" class="form-control"  />
                                        -
                                        <input type="text" class="form-control" /></td>
                                    <td><select class="form-control m-b">
                                        <option>不限</option>
                                    </select></td>
                                    <td><select class="form-control m-b">
                                        <option>不限</option>
                                    </select></td>
                                    <td><button type="button" class="btn btn-w-m btn-primary">确定</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>-->
                    <!--搜索end-->
                    <div style="height:10px;"></div>
                    <div class="table-responsive">
                        <table class="table table-striped" style="border:1px solid #e7eaec">
                            <thead>
                            <tr>
                                <th width="30"><input type="checkbox" class="i-checks i-checksAll" name="input[]"></th>
                                <th>ID</th>
                                <th>菜单名称</th>
                                <th>url</th>
                                <th>是否显示</th>
                                <th>排序</th>
                                <th width="100">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($list as $row):?>
                            <tr>
                                <td><input type="checkbox" value="<?php echo $row['id'];?>" class="i-checks" name="input[]"></td>
                                <td><?php echo $row['id'];?></td>
                                <td><a href="<?php echo site_url('index',array('parent_id'=>$row['id']));?>"><?php echo $row['title'];?></a></td>
                                <td><?php echo $row['url'];?></td>
                                <td><?php echo $row['hide']==1?'显示':'隐藏';?></td>
                                <td><?php echo $row['sort'];?></td>
                                <td><a href="<?php echo site_url('edit',array('action'=>'edit','id'=>$row['id'],'parent_id'=>$row['pid']));?>">编辑</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="sendGetAjax('<?php echo site_url('delete',array('id'=>$row['id']));?>')">删除</a></td>
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

    })
</script>

