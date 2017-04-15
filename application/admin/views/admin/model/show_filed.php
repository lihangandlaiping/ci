<?php $this->load->view('admin/index/basehead');?>
<body class="gray-bg">
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div >
            <div class="ibox">
                <div class="ibox-content">
                    <h3>列表显示字段</h3>
                    <p class="small"><i class="fa fa-hand-o-up"></i> 在列表之间拖动字段</p>

                    <div class="input-group">
                        <div class="col-sm-6" style="float: left">
                        <select class="form-control input-sm " id="tableids" onchange="selectfield(this)" >
                            <option value="">--请选择--</option>
                            <?php foreach($tables as $row):?>
                            <option value="<?php echo $row['table'];?>" fields="<?php echo $row['field'];?>"><?php echo $row['table'];?>(<?php echo $row['field'];?>)</option>
                            <?php endforeach;?>
                        </select>
                            </div>

                            <span class="input-group-btn" >
                                        <button onclick="addfield()" type="button" class="btn btn-sm btn-white"> <i class="fa fa-plus"></i> 添加</button>
                                </span>
                    </div>
                    <form action="<?php echo site_url('saveShowField');?>" id="formField">
                    <ul class="sortable-list connectList agile-list">
                        <?php foreach($fieldlist as $rows):?>
                        <li class="<?php echo !empty($rows['searchd'])&&$rows['searchd']==1?'success-element':'info-element';?>">
                            <?php echo $rows['field'];?>
                            <div class="agile-detail">
                                <input type="hidden" name="data[<?php echo str_replace('.','_',$rows['field']);?>][type]" value="<?php echo !empty($rows['type'])?$rows['type']:'';?>"/>
                                <input type="hidden" name="data[<?php echo str_replace('.','_',$rows['field']);?>][tables]" value="<?php echo !empty($rows['tables'])?$rows['tables']:''?>"/>
                                <input type="hidden" name="data[<?php echo str_replace('.','_',$rows['field']);?>][name]" value="<?php echo !empty($rows['name'])?$rows['name']:'';?>"/>
                                <input type="hidden" name="data[<?php echo str_replace('.','_',$rows['field']);?>][field]" value="<?php echo str_replace('.','_',$rows['field']);?>"/>
                                <input type="hidden" class="searchd" name="data[<?php echo str_replace('.','_',$rows['field']);?>][searchd]" value="<?php echo
!empty($rows['searchd'])&&$rows['searchd']==1?'1':'0';?>"/>

                                <a href="javascript:void(0);" class="pull-right btn btn-xs btn-danger" onclick="deletedata(this)">移出</a>
                                <a href="javascript:void(0);" onclick="searchdss(this,'<?php echo !empty($rows['searchd'])&&$rows['searchd']==1?'0':'1';?>')" class="pull-right btn btn-xs <?php echo !empty($rows['searchd'])&&$rows['searchd']==1?'btn-default':'btn-primary';?>"><?php echo !empty($rows['searchd'])&&$rows['searchd']==1?'取消搜索':'标记为搜索';?></a>
                               <i class="fa fa-clock-o"></i> <?php echo !empty($rows['name'])?$rows['name']:'';?>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
<div class="row">
    <div class="form-group">
    <label class="col-sm-1 control-label">页面操作</label>
    <?php echo $form->checkbox('listaction',array(array('1','新增'),array('2','批量删除'),array('3','修改'),array('4','删除')),!empty($listaction)?$listaction:'1,2,3,4');?>
</div>
    </div>
                        <input type="hidden" name="model_id" value="<?php echo !empty($model_id)?$model_id:'';?>">
                        </form>
                    <button type="button" onclick="submitform()" class="btn btn-w-m btn-primary">保存</button>
                </div>

            </div>
        </div>


    </div>


</div>
<script>
    var thismodelname='<?php echo !empty($thismodelname)?$thismodelname:'';?>';
    function searchdss(obj,val)
    {
        $(obj).parent().find('input.searchd').val(val);
        if(val==1)
        {
            $(obj).parent().parent().removeClass('info-element').addClass('success-element');
            $(obj).after('<a href="javascript:void(0);" onclick="searchdss(this,0)" class="pull-right btn btn-xs btn-default">取消搜索</a>');
        }
        else
        {
            $(obj).parent().parent().removeClass('success-element').addClass('info-element');
            $(obj).after('<a href="javascript:void(0);" onclick="searchdss(this,1)" class="pull-right btn btn-xs btn-primary">标记为搜索</a>');
        }
        $(obj).remove();
    }
    function submitform()
    {
        qls.loading();
        $.post($('#formField').attr('action'),$('#formField').serialize(),function(data){
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
    function deletedata(obj)
    {
        $(obj).parent().parent().remove();
    }
    function addfield()
    {
        var value=$('#fieldlist option:selected').attr('chinaname');
        qls.prompt('请输入列表显示名称',function(data){
            qls.close();
            if($('#fieldlist').length>0)
            {
                var table=$('#tableids').val();
                var fieldsd=$('#tableids option:selected').attr('fields');
                var tab=table;
                if(thismodelname==table&&fieldsd=='this'){table=table+'_';}
                else table=table+'_'+fieldsd+'_';
                var field=$('#fieldlist').val();
                var type=$('#fieldlist option:selected').attr('type');
                if($('ul.connectList input[value="'+table+field+'"]').length>0)return false;
                if(field==null)return false;
                var html='<li class="info-element"> ' +table.substr(0,table.length-1)+'.'+field+
                    '<div class="agile-detail"> ' +
                    '<input type="hidden" class="searchd" name="data[' +table+field+'][searchd]" value="0"/><input type="hidden" name="data[' +table+field+'][type]" value="' +type+'"/><input type="hidden" name="data[' +table+field+'][tables]" value="' +tab+'_'+fieldsd+'"/><input type="hidden" name="data[' +table+field+'][name]" value="' +data+'"/><input type="hidden" name="data[' +table+field+'][field]" value="' +table+field+'"/> ' +
                    '<a href="javascript:void(0);" class="pull-right btn btn-xs btn-danger" onclick="deletedata(this)">移出</a><a href="javascript:void(0);" onclick="searchdss(this,1)" class="pull-right btn btn-xs btn-primary">标记为搜索</a><i class="fa fa-clock-o"></i>  ' +data+
                    '</div> ' +
                    '</li>';
                $('ul.connectList').append(html);
            }
        },2,value);


    }
    function selectfield(obj)
    {
        var val=$(obj).val();
        if(val=='')return false;
        qls.loading();
        $.post('<?php echo site_url('selectfield');?>',{name:val},function(data){
            qls.close();
            if(data!=null)
            {
                var html='<div class="col-sm-6" style="float: left"><select class="form-control input-sm " id="fieldlist">';
                $.each(data,function(i,n){
                    html+='<option chinaname="'+ n.name+'" type="'+ n.type+'" value="'+ n.field+'">'+ n.field+'</option>';
                });
                html+='</select></div>';
                $('#fieldlist').parent().remove();
                $(obj).parent().after(html);
            }
        },'json');
    }
    $(document).ready(function(){$(".sortable-list").sortable({connectWith:".connectList"}).disableSelection()});
</script>
<script src="<?php echo __ROOT__;?>/public/admin/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/content.min.js?v=1.0.0"></script>
</body>
<?php $this->load->view('admin/index/basefooter');?>