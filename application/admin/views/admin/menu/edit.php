<?php $this->load->view('admin/index/basehead');?>
<script type="text/javascript">
    function showlog(obj)
    {
        if($(obj).hasClass('is_show'))
            return;
        $(obj).addClass('is_show');
        $('ul.nav-tabs li a[data-id="tab-2"]').click();
    }
    function closelog(obj)
    {
        $('#logtub').val($(obj).find('i').attr('class'));
        $('#logtub').removeClass('is_show');
        $('ul.nav-tabs li a[data-id="tab-1"]').click();
    }

</script>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo '菜单编辑';?></h5>
                </div>
                <div class="ibox-content">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" data-id="tab-1"  aria-expanded="true">基本</a> </li>
                          <li class=""><a data-toggle="tab" href="#tab-2"  data-id="tab-2" aria-expanded="false">图标</a> </li>
                    </ul>
                    <div class="tab-content">
                        <!--基本配置-->
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <form class="form-horizontal" method="post" action="">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">菜单名称</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[title]" value="<?php echo !empty($info['title'])?$info['title']:'';?>" />
                                            <span class="help-block m-b-none">（填菜单名称，必要参数）</span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">所属上级</label>
                                        <div class="col-sm-6">

                                            <select class="form-control m-b ctiy" name="data[pid]">
                                                <option value="0">--无上级--</option>
                                               <?php echo get_menu_select($menu,$this->input->get('parent_id',!empty($info['pid'])?$info['pid']:0));?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">url</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="data[url]" value="<?php echo !empty($info['url'])?$info['url']:'';?>" />
                                            <span class="help-block m-b-none">（填url，必要参数）</span>

                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">是否显示</label>
                                        <div class="col-sm-6">
                                            <select class="form-control m-b ctiy" name="data[hide]">
                                                <option value="1">显示</option>
                                                <option <?php echo !empty($info['hide'])&&$info['hide']==2?'selected=selected':'';?> value="2">隐藏</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">选择图标</label>
                                        <div class="col-sm-6">
                                            <input id="logtub" type="text" class="form-control" onfocus="showlog(this)" name="data[log]" value="<?php echo !empty($info['log'])?$info['log']:'';?>" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">排序</label>
                                        <div class="col-sm-6">

                                            <input type="text" class="form-control" name="data[sort]" value="<?php echo !empty($info['sort'])?$info['sort']:'';?>" />
                                            <span class="help-block m-b-none"></span>

                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <input type="hidden" name="action" value="<?php echo $_GET['action'];?>"/>
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
                                        <div class="col-sm-6 ">
                                        <section id="web-application" >

                                        <div class="row fontawesome-icon-list">



                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="adjust"><i class="fa fa-adjust"></i> adjust</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="anchor"><i class="fa fa-anchor"></i> anchor</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="archive"><i class="fa fa-archive"></i> archive</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="area-chart"><i class="fa fa-area-chart"></i> area-chart</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="arrows"><i class="fa fa-arrows"></i> arrows</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="arrows-h"><i class="fa fa-arrows-h"></i> arrows-h</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="arrows-v"><i class="fa fa-arrows-v"></i> arrows-v</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="asterisk"><i class="fa fa-asterisk"></i> asterisk</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="at"><i class="fa fa-at"></i> at</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="car"><i class="fa fa-automobile"></i> automobile <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="balance-scale"><i class="fa fa-balance-scale"></i> balance-scale</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="ban"><i class="fa fa-ban"></i> ban</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="university"><i class="fa fa-bank"></i> bank <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bar-chart"><i class="fa fa-bar-chart"></i> bar-chart</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bar-chart"><i class="fa fa-bar-chart-o"></i> bar-chart-o <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="barcode"><i class="fa fa-barcode"></i> barcode</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bars"><i class="fa fa-bars"></i> bars</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="battery-empty"><i class="fa fa-battery-0"></i> battery-0 <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="battery-quarter"><i class="fa fa-battery-1"></i> battery-1 <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="battery-half"><i class="fa fa-battery-2"></i> battery-2 <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="battery-three-quarters"><i class="fa fa-battery-3"></i> battery-3 <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="battery-full"><i class="fa fa-battery-4"></i> battery-4 <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="battery-empty"><i class="fa fa-battery-empty"></i> battery-empty</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="battery-full"><i class="fa fa-battery-full"></i> battery-full</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="battery-half"><i class="fa fa-battery-half"></i> battery-half</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="battery-quarter"><i class="fa fa-battery-quarter"></i> battery-quarter</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="battery-three-quarters"><i class="fa fa-battery-three-quarters"></i> battery-three-quarters</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bed"><i class="fa fa-bed"></i> bed</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="beer"><i class="fa fa-beer"></i> beer</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bell"><i class="fa fa-bell"></i> bell</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bell-o"><i class="fa fa-bell-o"></i> bell-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bell-slash"><i class="fa fa-bell-slash"></i> bell-slash</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bell-slash-o"><i class="fa fa-bell-slash-o"></i> bell-slash-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bicycle"><i class="fa fa-bicycle"></i> bicycle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="binoculars"><i class="fa fa-binoculars"></i> binoculars</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="birthday-cake"><i class="fa fa-birthday-cake"></i> birthday-cake</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bolt"><i class="fa fa-bolt"></i> bolt</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bomb"><i class="fa fa-bomb"></i> bomb</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="book"><i class="fa fa-book"></i> book</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bookmark"><i class="fa fa-bookmark"></i> bookmark</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bookmark-o"><i class="fa fa-bookmark-o"></i> bookmark-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="briefcase"><i class="fa fa-briefcase"></i> briefcase</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bug"><i class="fa fa-bug"></i> bug</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="building"><i class="fa fa-building"></i> building</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="building-o"><i class="fa fa-building-o"></i> building-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bullhorn"><i class="fa fa-bullhorn"></i> bullhorn</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bullseye"><i class="fa fa-bullseye"></i> bullseye</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bus"><i class="fa fa-bus"></i> bus</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="taxi"><i class="fa fa-cab"></i> cab <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="calculator"><i class="fa fa-calculator"></i> calculator</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="calendar"><i class="fa fa-calendar"></i> calendar</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="calendar-check-o"><i class="fa fa-calendar-check-o"></i> calendar-check-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="calendar-minus-o"><i class="fa fa-calendar-minus-o"></i> calendar-minus-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="calendar-o"><i class="fa fa-calendar-o"></i> calendar-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="calendar-plus-o"><i class="fa fa-calendar-plus-o"></i> calendar-plus-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="calendar-times-o"><i class="fa fa-calendar-times-o"></i> calendar-times-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="camera"><i class="fa fa-camera"></i> camera</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="camera-retro"><i class="fa fa-camera-retro"></i> camera-retro</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="car"><i class="fa fa-car"></i> car</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="caret-square-o-down"><i class="fa fa-caret-square-o-down"></i> caret-square-o-down</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="caret-square-o-left"><i class="fa fa-caret-square-o-left"></i> caret-square-o-left</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="caret-square-o-right"><i class="fa fa-caret-square-o-right"></i> caret-square-o-right</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="caret-square-o-up"><i class="fa fa-caret-square-o-up"></i> caret-square-o-up</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cart-arrow-down"><i class="fa fa-cart-arrow-down"></i> cart-arrow-down</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cart-plus"><i class="fa fa-cart-plus"></i> cart-plus</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cc"><i class="fa fa-cc"></i> cc</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="certificate"><i class="fa fa-certificate"></i> certificate</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="check"><i class="fa fa-check"></i> check</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="check-circle"><i class="fa fa-check-circle"></i> check-circle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="check-circle-o"><i class="fa fa-check-circle-o"></i> check-circle-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="check-square"><i class="fa fa-check-square"></i> check-square</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="check-square-o"><i class="fa fa-check-square-o"></i> check-square-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="child"><i class="fa fa-child"></i> child</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="circle"><i class="fa fa-circle"></i> circle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="circle-o"><i class="fa fa-circle-o"></i> circle-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="circle-o-notch"><i class="fa fa-circle-o-notch"></i> circle-o-notch</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="circle-thin"><i class="fa fa-circle-thin"></i> circle-thin</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="clock-o"><i class="fa fa-clock-o"></i> clock-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="clone"><i class="fa fa-clone"></i> clone</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="times"><i class="fa fa-close"></i> close <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cloud"><i class="fa fa-cloud"></i> cloud</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cloud-download"><i class="fa fa-cloud-download"></i> cloud-download</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cloud-upload"><i class="fa fa-cloud-upload"></i> cloud-upload</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="code"><i class="fa fa-code"></i> code</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="code-fork"><i class="fa fa-code-fork"></i> code-fork</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="coffee"><i class="fa fa-coffee"></i> coffee</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cog"><i class="fa fa-cog"></i> cog</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cogs"><i class="fa fa-cogs"></i> cogs</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="comment"><i class="fa fa-comment"></i> comment</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="comment-o"><i class="fa fa-comment-o"></i> comment-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="commenting"><i class="fa fa-commenting"></i> commenting</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="commenting-o"><i class="fa fa-commenting-o"></i> commenting-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="comments"><i class="fa fa-comments"></i> comments</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="comments-o"><i class="fa fa-comments-o"></i> comments-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="compass"><i class="fa fa-compass"></i> compass</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="copyright"><i class="fa fa-copyright"></i> copyright</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="creative-commons"><i class="fa fa-creative-commons"></i> creative-commons</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="credit-card"><i class="fa fa-credit-card"></i> credit-card</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="crop"><i class="fa fa-crop"></i> crop</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="crosshairs"><i class="fa fa-crosshairs"></i> crosshairs</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cube"><i class="fa fa-cube"></i> cube</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cubes"><i class="fa fa-cubes"></i> cubes</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cutlery"><i class="fa fa-cutlery"></i> cutlery</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="tachometer"><i class="fa fa-dashboard"></i> dashboard <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="database"><i class="fa fa-database"></i> database</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="desktop"><i class="fa fa-desktop"></i> desktop</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="diamond"><i class="fa fa-diamond"></i> diamond</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="dot-circle-o"><i class="fa fa-dot-circle-o"></i> dot-circle-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="download"><i class="fa fa-download"></i> download</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="pencil-square-o"><i class="fa fa-edit"></i> edit <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="ellipsis-h"><i class="fa fa-ellipsis-h"></i> ellipsis-h</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="ellipsis-v"><i class="fa fa-ellipsis-v"></i> ellipsis-v</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="envelope"><i class="fa fa-envelope"></i> envelope</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="envelope-o"><i class="fa fa-envelope-o"></i> envelope-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="envelope-square"><i class="fa fa-envelope-square"></i> envelope-square</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="eraser"><i class="fa fa-eraser"></i> eraser</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="exchange"><i class="fa fa-exchange"></i> exchange</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="exclamation"><i class="fa fa-exclamation"></i> exclamation</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="exclamation-circle"><i class="fa fa-exclamation-circle"></i> exclamation-circle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="exclamation-triangle"><i class="fa fa-exclamation-triangle"></i> exclamation-triangle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="external-link"><i class="fa fa-external-link"></i> external-link</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="external-link-square"><i class="fa fa-external-link-square"></i> external-link-square</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="eye"><i class="fa fa-eye"></i> eye</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="eye-slash"><i class="fa fa-eye-slash"></i> eye-slash</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="eyedropper"><i class="fa fa-eyedropper"></i> eyedropper</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="fax"><i class="fa fa-fax"></i> fax</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="rss"><i class="fa fa-feed"></i> feed <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="female"><i class="fa fa-female"></i> female</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="fighter-jet"><i class="fa fa-fighter-jet"></i> fighter-jet</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-archive-o"><i class="fa fa-file-archive-o"></i> file-archive-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-audio-o"><i class="fa fa-file-audio-o"></i> file-audio-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-code-o"><i class="fa fa-file-code-o"></i> file-code-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-excel-o"><i class="fa fa-file-excel-o"></i> file-excel-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-image-o"><i class="fa fa-file-image-o"></i> file-image-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-video-o"><i class="fa fa-file-movie-o"></i> file-movie-o <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-pdf-o"><i class="fa fa-file-pdf-o"></i> file-pdf-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-image-o"><i class="fa fa-file-photo-o"></i> file-photo-o <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-image-o"><i class="fa fa-file-picture-o"></i> file-picture-o <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-powerpoint-o"><i class="fa fa-file-powerpoint-o"></i> file-powerpoint-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-audio-o"><i class="fa fa-file-sound-o"></i> file-sound-o <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-video-o"><i class="fa fa-file-video-o"></i> file-video-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-word-o"><i class="fa fa-file-word-o"></i> file-word-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="file-archive-o"><i class="fa fa-file-zip-o"></i> file-zip-o <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="film"><i class="fa fa-film"></i> film</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="filter"><i class="fa fa-filter"></i> filter</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="fire"><i class="fa fa-fire"></i> fire</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="fire-extinguisher"><i class="fa fa-fire-extinguisher"></i> fire-extinguisher</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="flag"><i class="fa fa-flag"></i> flag</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="flag-checkered"><i class="fa fa-flag-checkered"></i> flag-checkered</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="flag-o"><i class="fa fa-flag-o"></i> flag-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bolt"><i class="fa fa-flash"></i> flash <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="flask"><i class="fa fa-flask"></i> flask</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="folder"><i class="fa fa-folder"></i> folder</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="folder-o"><i class="fa fa-folder-o"></i> folder-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="folder-open"><i class="fa fa-folder-open"></i> folder-open</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="folder-open-o"><i class="fa fa-folder-open-o"></i> folder-open-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="frown-o"><i class="fa fa-frown-o"></i> frown-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="futbol-o"><i class="fa fa-futbol-o"></i> futbol-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="gamepad"><i class="fa fa-gamepad"></i> gamepad</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="gavel"><i class="fa fa-gavel"></i> gavel</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cog"><i class="fa fa-gear"></i> gear <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="cogs"><i class="fa fa-gears"></i> gears <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="gift"><i class="fa fa-gift"></i> gift</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="glass"><i class="fa fa-glass"></i> glass</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="globe"><i class="fa fa-globe"></i> globe</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="graduation-cap"><i class="fa fa-graduation-cap"></i> graduation-cap</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="users"><i class="fa fa-group"></i> group <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hand-rock-o"><i class="fa fa-hand-grab-o"></i> hand-grab-o <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hand-lizard-o"><i class="fa fa-hand-lizard-o"></i> hand-lizard-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hand-paper-o"><i class="fa fa-hand-paper-o"></i> hand-paper-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hand-peace-o"><i class="fa fa-hand-peace-o"></i> hand-peace-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hand-pointer-o"><i class="fa fa-hand-pointer-o"></i> hand-pointer-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hand-rock-o"><i class="fa fa-hand-rock-o"></i> hand-rock-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hand-scissors-o"><i class="fa fa-hand-scissors-o"></i> hand-scissors-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hand-spock-o"><i class="fa fa-hand-spock-o"></i> hand-spock-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hand-paper-o"><i class="fa fa-hand-stop-o"></i> hand-stop-o <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hdd-o"><i class="fa fa-hdd-o"></i> hdd-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="headphones"><i class="fa fa-headphones"></i> headphones</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="heart"><i class="fa fa-heart"></i> heart</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="heart-o"><i class="fa fa-heart-o"></i> heart-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="heartbeat"><i class="fa fa-heartbeat"></i> heartbeat</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="history"><i class="fa fa-history"></i> history</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="home"><i class="fa fa-home"></i> home</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bed"><i class="fa fa-hotel"></i> hotel <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hourglass"><i class="fa fa-hourglass"></i> hourglass</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hourglass-start"><i class="fa fa-hourglass-1"></i> hourglass-1 <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hourglass-half"><i class="fa fa-hourglass-2"></i> hourglass-2 <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hourglass-end"><i class="fa fa-hourglass-3"></i> hourglass-3 <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hourglass-end"><i class="fa fa-hourglass-end"></i> hourglass-end</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hourglass-half"><i class="fa fa-hourglass-half"></i> hourglass-half</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hourglass-o"><i class="fa fa-hourglass-o"></i> hourglass-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="hourglass-start"><i class="fa fa-hourglass-start"></i> hourglass-start</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="i-cursor"><i class="fa fa-i-cursor"></i> i-cursor</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="picture-o"><i class="fa fa-image"></i> image <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="inbox"><i class="fa fa-inbox"></i> inbox</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="industry"><i class="fa fa-industry"></i> industry</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="info"><i class="fa fa-info"></i> info</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="info-circle"><i class="fa fa-info-circle"></i> info-circle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="university"><i class="fa fa-institution"></i> institution <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="key"><i class="fa fa-key"></i> key</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="keyboard-o"><i class="fa fa-keyboard-o"></i> keyboard-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="language"><i class="fa fa-language"></i> language</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="laptop"><i class="fa fa-laptop"></i> laptop</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="leaf"><i class="fa fa-leaf"></i> leaf</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="gavel"><i class="fa fa-legal"></i> legal <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="lemon-o"><i class="fa fa-lemon-o"></i> lemon-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="level-down"><i class="fa fa-level-down"></i> level-down</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="level-up"><i class="fa fa-level-up"></i> level-up</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="life-ring"><i class="fa fa-life-bouy"></i> life-bouy <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="life-ring"><i class="fa fa-life-buoy"></i> life-buoy <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="life-ring"><i class="fa fa-life-ring"></i> life-ring</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="life-ring"><i class="fa fa-life-saver"></i> life-saver <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="lightbulb-o"><i class="fa fa-lightbulb-o"></i> lightbulb-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="line-chart"><i class="fa fa-line-chart"></i> line-chart</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="location-arrow"><i class="fa fa-location-arrow"></i> location-arrow</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="lock"><i class="fa fa-lock"></i> lock</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="magic"><i class="fa fa-magic"></i> magic</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="magnet"><i class="fa fa-magnet"></i> magnet</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="share"><i class="fa fa-mail-forward"></i> mail-forward <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="reply"><i class="fa fa-mail-reply"></i> mail-reply <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="reply-all"><i class="fa fa-mail-reply-all"></i> mail-reply-all <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="male"><i class="fa fa-male"></i> male</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="map"><i class="fa fa-map"></i> map</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="map-marker"><i class="fa fa-map-marker"></i> map-marker</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="map-o"><i class="fa fa-map-o"></i> map-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="map-pin"><i class="fa fa-map-pin"></i> map-pin</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="map-signs"><i class="fa fa-map-signs"></i> map-signs</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="meh-o"><i class="fa fa-meh-o"></i> meh-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="microphone"><i class="fa fa-microphone"></i> microphone</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="microphone-slash"><i class="fa fa-microphone-slash"></i> microphone-slash</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="minus"><i class="fa fa-minus"></i> minus</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="minus-circle"><i class="fa fa-minus-circle"></i> minus-circle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="minus-square"><i class="fa fa-minus-square"></i> minus-square</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="minus-square-o"><i class="fa fa-minus-square-o"></i> minus-square-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="mobile"><i class="fa fa-mobile"></i> mobile</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="mobile"><i class="fa fa-mobile-phone"></i> mobile-phone <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="money"><i class="fa fa-money"></i> money</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="moon-o"><i class="fa fa-moon-o"></i> moon-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="graduation-cap"><i class="fa fa-mortar-board"></i> mortar-board <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="motorcycle"><i class="fa fa-motorcycle"></i> motorcycle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="mouse-pointer"><i class="fa fa-mouse-pointer"></i> mouse-pointer</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="music"><i class="fa fa-music"></i> music</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bars"><i class="fa fa-navicon"></i> navicon <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="newspaper-o"><i class="fa fa-newspaper-o"></i> newspaper-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="object-group"><i class="fa fa-object-group"></i> object-group</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="object-ungroup"><i class="fa fa-object-ungroup"></i> object-ungroup</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="paint-brush"><i class="fa fa-paint-brush"></i> paint-brush</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="paper-plane"><i class="fa fa-paper-plane"></i> paper-plane</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="paper-plane-o"><i class="fa fa-paper-plane-o"></i> paper-plane-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="paw"><i class="fa fa-paw"></i> paw</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="pencil"><i class="fa fa-pencil"></i> pencil</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="pencil-square"><i class="fa fa-pencil-square"></i> pencil-square</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="pencil-square-o"><i class="fa fa-pencil-square-o"></i> pencil-square-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="phone"><i class="fa fa-phone"></i> phone</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="phone-square"><i class="fa fa-phone-square"></i> phone-square</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="picture-o"><i class="fa fa-photo"></i> photo <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="picture-o"><i class="fa fa-picture-o"></i> picture-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="pie-chart"><i class="fa fa-pie-chart"></i> pie-chart</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="plane"><i class="fa fa-plane"></i> plane</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="plug"><i class="fa fa-plug"></i> plug</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="plus"><i class="fa fa-plus"></i> plus</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="plus-circle"><i class="fa fa-plus-circle"></i> plus-circle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="plus-square"><i class="fa fa-plus-square"></i> plus-square</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="plus-square-o"><i class="fa fa-plus-square-o"></i> plus-square-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="power-off"><i class="fa fa-power-off"></i> power-off</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="print"><i class="fa fa-print"></i> print</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="puzzle-piece"><i class="fa fa-puzzle-piece"></i> puzzle-piece</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="qrcode"><i class="fa fa-qrcode"></i> qrcode</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="question"><i class="fa fa-question"></i> question</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="question-circle"><i class="fa fa-question-circle"></i> question-circle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="quote-left"><i class="fa fa-quote-left"></i> quote-left</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="quote-right"><i class="fa fa-quote-right"></i> quote-right</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="random"><i class="fa fa-random"></i> random</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="recycle"><i class="fa fa-recycle"></i> recycle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="refresh"><i class="fa fa-refresh"></i> refresh</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="registered"><i class="fa fa-registered"></i> registered</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="times"><i class="fa fa-remove"></i> remove <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="bars"><i class="fa fa-reorder"></i> reorder <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="reply"><i class="fa fa-reply"></i> reply</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="reply-all"><i class="fa fa-reply-all"></i> reply-all</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="retweet"><i class="fa fa-retweet"></i> retweet</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="road"><i class="fa fa-road"></i> road</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="rocket"><i class="fa fa-rocket"></i> rocket</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="rss"><i class="fa fa-rss"></i> rss</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="rss-square"><i class="fa fa-rss-square"></i> rss-square</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="search"><i class="fa fa-search"></i> search</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="search-minus"><i class="fa fa-search-minus"></i> search-minus</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="search-plus"><i class="fa fa-search-plus"></i> search-plus</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="paper-plane"><i class="fa fa-send"></i> send <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="paper-plane-o"><i class="fa fa-send-o"></i> send-o <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="server"><i class="fa fa-server"></i> server</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="share"><i class="fa fa-share"></i> share</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="share-alt"><i class="fa fa-share-alt"></i> share-alt</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="share-alt-square"><i class="fa fa-share-alt-square"></i> share-alt-square</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="share-square"><i class="fa fa-share-square"></i> share-square</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="share-square-o"><i class="fa fa-share-square-o"></i> share-square-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="shield"><i class="fa fa-shield"></i> shield</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="ship"><i class="fa fa-ship"></i> ship</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="shopping-cart"><i class="fa fa-shopping-cart"></i> shopping-cart</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sign-in"><i class="fa fa-sign-in"></i> sign-in</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sign-out"><i class="fa fa-sign-out"></i> sign-out</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="signal"><i class="fa fa-signal"></i> signal</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sitemap"><i class="fa fa-sitemap"></i> sitemap</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sliders"><i class="fa fa-sliders"></i> sliders</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="smile-o"><i class="fa fa-smile-o"></i> smile-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="futbol-o"><i class="fa fa-soccer-ball-o"></i> soccer-ball-o <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort"><i class="fa fa-sort"></i> sort</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort-alpha-asc"><i class="fa fa-sort-alpha-asc"></i> sort-alpha-asc</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort-alpha-desc"><i class="fa fa-sort-alpha-desc"></i> sort-alpha-desc</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort-amount-asc"><i class="fa fa-sort-amount-asc"></i> sort-amount-asc</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort-amount-desc"><i class="fa fa-sort-amount-desc"></i> sort-amount-desc</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort-asc"><i class="fa fa-sort-asc"></i> sort-asc</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort-desc"><i class="fa fa-sort-desc"></i> sort-desc</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort-desc"><i class="fa fa-sort-down"></i> sort-down <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort-numeric-asc"><i class="fa fa-sort-numeric-asc"></i> sort-numeric-asc</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort-numeric-desc"><i class="fa fa-sort-numeric-desc"></i> sort-numeric-desc</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort-asc"><i class="fa fa-sort-up"></i> sort-up <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="space-shuttle"><i class="fa fa-space-shuttle"></i> space-shuttle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="spinner"><i class="fa fa-spinner"></i> spinner</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="spoon"><i class="fa fa-spoon"></i> spoon</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="square"><i class="fa fa-square"></i> square</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="square-o"><i class="fa fa-square-o"></i> square-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="star"><i class="fa fa-star"></i> star</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="star-half"><i class="fa fa-star-half"></i> star-half</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="star-half-o"><i class="fa fa-star-half-empty"></i> star-half-empty <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="star-half-o"><i class="fa fa-star-half-full"></i> star-half-full <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="star-half-o"><i class="fa fa-star-half-o"></i> star-half-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="star-o"><i class="fa fa-star-o"></i> star-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sticky-note"><i class="fa fa-sticky-note"></i> sticky-note</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sticky-note-o"><i class="fa fa-sticky-note-o"></i> sticky-note-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="street-view"><i class="fa fa-street-view"></i> street-view</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="suitcase"><i class="fa fa-suitcase"></i> suitcase</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sun-o"><i class="fa fa-sun-o"></i> sun-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="life-ring"><i class="fa fa-support"></i> support <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="tablet"><i class="fa fa-tablet"></i> tablet</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="tachometer"><i class="fa fa-tachometer"></i> tachometer</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="tag"><i class="fa fa-tag"></i> tag</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="tags"><i class="fa fa-tags"></i> tags</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="tasks"><i class="fa fa-tasks"></i> tasks</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="taxi"><i class="fa fa-taxi"></i> taxi</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="television"><i class="fa fa-television"></i> television</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="terminal"><i class="fa fa-terminal"></i> terminal</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="thumb-tack"><i class="fa fa-thumb-tack"></i> thumb-tack</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="thumbs-down"><i class="fa fa-thumbs-down"></i> thumbs-down</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="thumbs-o-down"><i class="fa fa-thumbs-o-down"></i> thumbs-o-down</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="thumbs-o-up"><i class="fa fa-thumbs-o-up"></i> thumbs-o-up</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="thumbs-up"><i class="fa fa-thumbs-up"></i> thumbs-up</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="ticket"><i class="fa fa-ticket"></i> ticket</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="times"><i class="fa fa-times"></i> times</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="times-circle"><i class="fa fa-times-circle"></i> times-circle</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="times-circle-o"><i class="fa fa-times-circle-o"></i> times-circle-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="tint"><i class="fa fa-tint"></i> tint</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="caret-square-o-down"><i class="fa fa-toggle-down"></i> toggle-down <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="caret-square-o-left"><i class="fa fa-toggle-left"></i> toggle-left <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="toggle-off"><i class="fa fa-toggle-off"></i> toggle-off</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="toggle-on"><i class="fa fa-toggle-on"></i> toggle-on</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="caret-square-o-right"><i class="fa fa-toggle-right"></i> toggle-right <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="caret-square-o-up"><i class="fa fa-toggle-up"></i> toggle-up <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="trademark"><i class="fa fa-trademark"></i> trademark</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="trash"><i class="fa fa-trash"></i> trash</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="trash-o"><i class="fa fa-trash-o"></i> trash-o</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="tree"><i class="fa fa-tree"></i> tree</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="trophy"><i class="fa fa-trophy"></i> trophy</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="truck"><i class="fa fa-truck"></i> truck</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="tty"><i class="fa fa-tty"></i> tty</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="television"><i class="fa fa-tv"></i> tv <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="umbrella"><i class="fa fa-umbrella"></i> umbrella</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="university"><i class="fa fa-university"></i> university</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="unlock"><i class="fa fa-unlock"></i> unlock</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="unlock-alt"><i class="fa fa-unlock-alt"></i> unlock-alt</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="sort"><i class="fa fa-unsorted"></i> unsorted <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="upload"><i class="fa fa-upload"></i> upload</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="user"><i class="fa fa-user"></i> user</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="user-plus"><i class="fa fa-user-plus"></i> user-plus</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="user-secret"><i class="fa fa-user-secret"></i> user-secret</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="user-times"><i class="fa fa-user-times"></i> user-times</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="users"><i class="fa fa-users"></i> users</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="video-camera"><i class="fa fa-video-camera"></i> video-camera</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="volume-down"><i class="fa fa-volume-down"></i> volume-down</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="volume-off"><i class="fa fa-volume-off"></i> volume-off</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="volume-up"><i class="fa fa-volume-up"></i> volume-up</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="exclamation-triangle"><i class="fa fa-warning"></i> warning <span class="text-muted">(alias)</span></a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="wheelchair"><i class="fa fa-wheelchair"></i> wheelchair</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="wifi"><i class="fa fa-wifi"></i> wifi</a></div>

                                        <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0);" onclick="closelog(this)" data-id="wrench"><i class="fa fa-wrench"></i> wrench</a></div>

                                        </div>

                                        </section>
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
