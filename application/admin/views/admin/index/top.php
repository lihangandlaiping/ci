<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="http://www.zi-han.net/theme/hplus/search_results.html">
                <div class="form-group">
                   <!-- <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">-->
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
           <!-- <li class="dropdown"> <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#"> <i class="fa fa-envelope"></i> <span class="label label-warning">16</span> </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li class="m-t-xs">
                        <div class="dropdown-messages-box"> <a href="profile.html" class="pull-left"> <img alt="image" class="img-circle" src="img/a7.jpg"> </a>
                            <div class="media-body"> <small class="pull-right">46小时前</small> <strong>小四</strong> 这个在日本投降书上签字的军官，建国后一定是个不小的干部吧？ <br>
                                <small class="text-muted">3天前 2014.11.8</small> </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="dropdown-messages-box"> <a href="profile.html" class="pull-left"> <img alt="image" class="img-circle" src="img/a4.jpg"> </a>
                            <div class="media-body "> <small class="pull-right text-navy">25小时前</small> <strong>国民岳父</strong> 如何看待“男子不满自己爱犬被称为狗，刺伤路人”？——这人比犬还凶 <br>
                                <small class="text-muted">昨天</small> </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block"> <a class="J_menuItem" href="mailbox.html"> <i class="fa fa-envelope"></i> <strong> 查看所有消息</strong> </a> </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown"> <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#"> <i class="fa fa-bell"></i> <span class="label label-primary">8</span> </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li> <a href="mailbox.html">
                        <div> <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息 <span class="pull-right text-muted small">4分钟前</span> </div>
                    </a> </li>
                    <li class="divider"></li>
                    <li> <a href="profile.html">
                        <div> <i class="fa fa-qq fa-fw"></i> 3条新回复 <span class="pull-right text-muted small">12分钟钱</span> </div>
                    </a> </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block"> <a class="J_menuItem" href="notifications.html"> <strong>查看所有 </strong> <i class="fa fa-angle-right"></i> </a> </div>
                    </li>
                </ul>
            </li>-->
            <li class="hidden-xs"> <a href="<?php echo !empty($web_url['content'])?$web_url['content']:'';?>" target="_blank" data-index="0"><i class="glyphicon glyphicon-home"></i> 网站首页</a> </li>
            <li class="hidden-xs"> <a href="javascript:void(0);" onclick="sendGetAjax('<?php echo site_url('deleteCache');?>');"  data-index="0"><i class="glyphicon glyphicon-refresh"></i> 更新缓存</a> </li>
            <li class="dropdown hidden-xs"> <a aria-expanded="false"> <i class="glyphicon glyphicon-book"></i> 帮助手册 </a> </li>
            <li class="dropdown">
                <a class="right-sidebar-toggle dropdown" data-toggle="dropdown" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <?php echo $admin_user['username'];?> </a>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a href="javascript:void(0);" onclick="updatePass();">修改密码</a> </li>
                    <li class="divider"></li>

                    <li class="J_tabCloseOther"><a href="<?php echo site_url('loginOut');?>">退出登录</a> </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<div class="row content-tabs">
    <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i> </button>
    <nav class="page-tabs J_menuTabs">
        <div class="page-tabs-content"> <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a> </div>
    </nav>
    <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i> </button>
    <div class="btn-group roll-nav roll-right">
        <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span> </button>
        <ul role="menu" class="dropdown-menu dropdown-menu-right">
            <li class="J_tabShowActive"><a>定位当前选项卡</a> </li>
            <li class="divider"></li>
            <li class="J_tabCloseAll"><a>关闭全部选项卡</a> </li>
            <li class="J_tabCloseOther"><a>关闭其他选项卡</a> </li>
        </ul>
    </div>
    <a href="<?php echo site_url('loginOut');?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a> </div>