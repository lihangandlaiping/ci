<script src="<?php echo __ROOT__;?>/public/admin/js/jquery.min.js"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/bootstrap.min.js"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/plugins/layer/layer.min.js"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/hplus.min.js"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/plugins/sweetalert/sweetalert.min.js?t=2"></script>
<script type="text/javascript" src="<?php echo __ROOT__;?>/public/admin/js/contabs.min.js"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/plugins/pace/pace.min.js"></script>
<script src="<?php echo __ROOT__;?>/public/admin/js/common.js"></script>

</body>
<script>
    function updatePass(){
        qls.prompt('输入新密码：',function(str){
            qls.loading();
            $.post('<?php echo site_url('admin/index/updatePass');?>',{id:'<?php echo $admin_user['id']?>',pass:str},function(data){
                qls.close();
                if(data.code==1)
                {
                    swal(data.msg, "您已经永久删除了信息。", "success");
                    setTimeout(function(){sweetAlert.close();
                        location.href=data.url;
                    },2000);
                }
                else
                {
                    swal(data.msg, "您执行的删除操作失败。", "error");
                    setTimeout(function(){sweetAlert.close();},2000);
                }
            },'json');
        },1);
    }
    $(function(){
        var hrefs='';
        if($('#side-menu li a.J_menuItem').length>0)
        {
            hrefs=$('#side-menu li a.J_menuItem').first().attr('href');
            $('#content-main .J_iframe').attr('src',hrefs);
        }
        $('#side-menu li').click(function(){
            var width = $('.navbar-default').width();
            if(width > 70){
                return;
            }else{
                $('body').addClass('mini-navbar');
            }
        })

        $("body").toggleClass("mini-navbar");
        SmoothlyMenu();
    })
</script>
<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:17:11 GMT -->
</html>