<?php $this->load->view('admin/index/basehead');?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>字段批量编辑</h5>
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
                                    <?php for($i=0;$i<10;$i++):?>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">字段名</label>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control"  name="data[<?php echo $i;?>][name]" value=""  />
                                            <span class="help-block m-b-none">（填字段名）</span>
                                        </div>
                                        <label class="col-sm-1 control-label">字段标识</label>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" name="data[<?php echo $i;?>][field]" value="" />
                                            <span class="help-block m-b-none">（填字段标识）</span>
                                        </div>
                                        <label class="col-sm-1 control-label">数据类型</label>
                                        <div class="col-sm-1">
                                            <select class="form-control" name="data[<?php echo $i;?>][type]">
                                                <option value="">请选择</option>
                                                <option value="string" <?php echo !empty($info['type'])&&$info['type']=='string'?'selected=selected':'';?> rule="varchar(255) NOT NULL">字符串</option>
                                                <option value="textarea" <?php echo !empty($info['type'])&&$info['type']=='textarea'?'selected=selected':'';?> rule="text NOT NULL">文本框</option>
                                                <option value="password" <?php echo !empty($info['type'])&&$info['type']=='password'?'selected=selected':'';?> rule="char(32) NOT NULL">密码</option>
                                                <option value="editor" <?php echo !empty($info['type'])&&$info['type']=='editor'?'selected=selected':'';?> rule="text NOT NULL">编辑器</option>
                                                <option value="num" <?php echo !empty($info['type'])&&$info['type']=='num'?'selected=selected':'';?> rule="int(10) UNSIGNED NOT NULL">数字</option>
                                                <option value="money" <?php echo !empty($info['type'])&&$info['type']=='money'?'selected=selected':'';?> rule="decimal(10,2)">金额</option>
                                                <option value="date" <?php echo !empty($info['type'])&&$info['type']=='date'?'selected=selected':'';?> rule="int(10) NOT NULL">日期</option>
                                                <option value="datetime" <?php echo !empty($info['type'])&&$info['type']=='datetime'?'selected=selected':'';?> rule="int(10) NOT NULL">时间</option>
                                                <option value="bool" <?php echo !empty($info['type'])&&$info['type']=='bool'?'selected=selected':'';?> rule="tinyint(2) NOT NULL">布尔</option>
                                                <option value="select" <?php echo !empty($info['type'])&&$info['type']=='select'?'selected=selected':'';?> rule="char(50) NOT NULL">下拉选择</option>
                                                <option value="linkage" <?php echo !empty($info['type'])&&$info['type']=='linkage'?'selected=selected':'';?> rule="varchar(100) NOT NULL">联动菜单</option>
                                                <option value="radio" <?php echo !empty($info['type'])&&$info['type']=='radio'?'selected=selected':'';?> rule="char(10) NOT NULL">单选</option>
                                                <option value="checkbox" <?php echo !empty($info['type'])&&$info['type']=='checkbox'?'selected=selected':'';?> rule="varchar(100)">多选</option>
                                                <option value="thumb" <?php echo !empty($info['type'])&&$info['type']=='thumb'?'selected=selected':'';?> rule="varchar(100) NOT NULL">上传图片</option>
                                                <option value="images" <?php echo !empty($info['type'])&&$info['type']=='images'?'selected=selected':'';?> rule="mediumtext">上传多图</option>
                                                <option value="attach" <?php echo !empty($info['type'])&&$info['type']=='attach'?'selected=selected':'';?> rule="varchar(255) NOT NULL">上传文件</option>
                                                <option value="attachs" <?php echo !empty($info['type'])&&$info['type']=='attachs'?'selected=selected':'';?> rule="mediumtext">上传多文件</option>
                                                <option value="tablefield" <?php echo !empty($info['type'])&&$info['type']=='tablefield'?'selected=selected':'';?> rule="varchar(255) NOT NULL">其他表字段值</option>

                                            </select>
                                            <span class="help-block m-b-none"></span>
                                            </div>
                                            <label class="col-sm-1 control-label">字段默认值</label>
                                            <div class="col-sm-1">
                                                <input type="text" class="form-control" name="data[<?php echo $i;?>][value]" value="" />
                                                <span class="help-block m-b-none"></span>
                                            </div>
                                        <label class="col-sm-1 control-label">参数</label>
                                        <div class="col-sm-1">
                                            <textarea class="form-control" aria-required="true" name="data[<?php echo $i;?>][extra]" style="height: 100px;"><?php echo !empty($info['extra'])?$info['extra']:'';?></textarea>

                                            <span class="help-block m-b-none" style="color: #3d7b8e;" onclick="looksl()">点击查看示例</span>
                                        </div>
                                        </div>
                                    <input type="hidden" name="data[<?php echo $i;?>][model_id]" value="<?php echo $_GET['model_id']?:(!empty($info['model_id'])?:'');?>"/>
                                    <?php endfor;?>










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
            function looksl()
            {
                qls.open('填写示例','<table class="table table-striped"> <thead> <tr> ' +
                '<th>字段类型</th> ' +
                '<th>示例</th> ' +
                '</thead>' +
                ' <tbody>' +
                '<tr><td>其他表字段</td><td>' +
                'db_table:test2<br/>'+
                'search_where:pid=0<br/>'+
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