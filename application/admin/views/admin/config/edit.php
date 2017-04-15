<?php $this->load->view('admin/index/basehead');?>
<script>
    function selecttypes(obj)
    {
        $.post('<?php echo site_url('data_content');?>',{type:$(obj).val()},function(data){
            $('#data_content').html(data);
        },'text')
    }

</script>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>配置文件编辑</h5>
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



                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">名称</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="data[title]" value="<?php echo !empty($info['title'])?$info['title']:'';?>"  />
                                            <span class="help-block m-b-none">（填中文名称）</span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">标识</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="data[name]" value="<?php echo !empty($info['name'])?$info['name']:'';?>"  />
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">数据类型</label>
                                        <div class="col-sm-6">
                                           <select class="form-control"  name="data[type]" onchange="selecttypes(this)">
                                               <option value="1" >字符串文本格式</option>
                                               <option value="2" <?php echo !empty($info['type'])&&$info['type']==2?'selected=selected':'';?>>日期格式</option>
                                               <option value="3" <?php echo !empty($info['type'])&&$info['type']==3?'selected=selected':'';?>>图片上传</option>
                                               <option value="4" <?php echo !empty($info['type'])&&$info['type']==4?'selected=selected':'';?>>文件上传</option>
                                           </select>
                                            <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">配置数据</label>
                                        <div class="col-sm-6" id="data_content">
                                            <textarea class="form-control"  name="data[content]"></textarea>

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
        <script>
           <?php if(!empty($info['type'])):?>
           $.post('<?php echo site_url('data_content');?>',{type:'<?php echo $info['type'];?>',val:'<?php echo $info['content'];?>'},function(data){
               $('#data_content').html(data);
           },'text')
            <?php endif;?>
            function looksl()
            {
                qls.open('填写示例','<table class="table table-striped"> <thead> <tr> ' +
                '<th>字段类型</th> ' +
                '<th>示例</th> ' +
                '</thead>' +
                ' <tbody>' +
                '<tr><td>其他表字段</td><td>' +
                'db_table:test2<br/>'+
                'search_field:level<br/>'+
                'primary_key:id<br/>'+
                '<br/>'+
                '</td><td>联动</td><td>' +
                'table:area<br/>'+
                'relation_field:parent_id<br/>'+
                'id:area_id<br/>'+
                'name:area_name<br/>'+
                '<br/>'+
                '</td><td>单选，多选，下拉，布尔</td><td>' +
                '1:男士<br/>'+
                '2:女士<br/>'+
                '3:外星人<br/>'+
                '<br/>'+
                '</td></tr>'+
                '</tbody></table>',['550px','300px']);
            }
            </script>
<?php $this->load->view('admin/index/basefooter');?>